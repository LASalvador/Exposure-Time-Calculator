<?php
 /**
  * This class represents the Observation and its attributes
  * @author: Lucas Almeida Salvador
  */
 class Observation
 {
 	/** Polarization Error on WavePlate 1/2 */
 	private $sigmaP;
 	/** Polarization Error on WavePlate 1/4 */
 	private $sigmaV;
 	/** Number of source photons */
 	private $numberPhotons;
 	/** Mag of Observation */
 	private $magnitude;
 	/** Signal to Noise Ratio */
 	private $signalNoiseRatio;
 	/** Number of source pixels */
 	private $numberPixels;
 	/** Number of Aperture Radius to photometry */
 	private $radiusAperture;
 	/** Integration Time or ExposureTime*/
 	private $timeExposure;
 	/** It's a factor to correct possible difference between this ETC results and the real measurements */
 	private $fCalib;

 	/**
 	* Constructor: Sets up the Observation attributes(Fcalib, Magnitude, RadiusAperture, NumberPixels and NumberPhotons)
 	* @param float $q Quantum Efficiency
 	* @param float $tSky Sky Transparency
 	* @param float $f0 flux of a zero magnitude source
 	* @param float $filterWidth FilterWidth
 	* @param float $effectiveLenght EffectiveWaveLenght of Filter
 	* @param float $dTel Telescope's Diameter
 	* @param float $mag Magnitude of Source
 	* @param float $rap Aperture Radius to photometry
 	* @param float $plateScale Plate Scale of Instrument
 	* @param float $fCalib It's a factor to correct possible difference between this ETC results and the real measurements
 	* @param int $binning Binning of CCD
 	*/ 
 	function __construct($q, $tSky, $f0, $filterWidth, $effectiveLenght, $dTel , $mag, $rap, $platescale, $fCalib, $binning)
 	{
 		$this->setFcalib($fCalib);
 		$this->setMagnitude($mag);
 		$this->setRadiusAperture($rap);
 		$this->setNumberPixels($rap, $platescale, $binning);
 		$this->setNumberPhotons($q, $tSky, $f0, $filterWidth, $effectiveLenght, $dTel , $mag);
 	}
 	/**
 	* Sets up Error of the linear polarization or sigmaP 
 	* @param int $type Defines how to calculate SigmaP
 	* @param float $snr Signal To noise ratio
 	* @param int $nwp Number of WavePlate Positions
 	* @param float $sigmaP sigma P (this values is used in Mode SigmaP->Int. Time)
 	*/
 	public function setSigmaP($type, $snr = 0, $nwp = 0, $sigmaP = 0)
 	{
 		// when wave 1/2
 		if($type == 1)
 		{ 
 			$temp = (100/sqrt($nwp))*(1/$snr);
 			$this->sigmaP = $temp;
 		}
 		// when wave 1/4
 		elseif($type == 2)
 		{ 
 			$temp = 100 * ((sqrt(2)/sqrt($nwp)) * (1/$snr));
 			$this->sigmaP = $temp;
 		}
 		// when ETC mode used is SigmaP-> Int. Time
 		else
 		{
 			$this->sigmaP = $sigmaP;	
 		}
 	}
 	/**
 	* Return the Error of the linear polarization or sigmaP 
 	* @return float $sigmaP 
 	*/
 	public function getSigmaP()
 	{
 		return	$this->sigmaP;
 	}
 	/**
 	* Sets up Error of the circular polarization or sigmaV 
 	* @param float $sigmaV sigmaV
 	*/
 	public function setSigmaV($sigmaV)
 	{
 			$this->sigmaV = $sigmaV;
 	}
 	/**
 	* Return the Error of the circular polarization 
 	* @return float $sigmaV SigmaV
 	*/
 	public function getSigmaV()
 	{
 		return $this->sigmaV;
 	}
 	/**
 	* Sets up  Number of source photons
 	* @param float $q Quantum Efficiency
 	* @param float $tSky Sky Transparency
 	* @param float $f0 flux of a zero magnitude source
 	* @param float $filterWidth FilterWidth
 	* @param float $effectiveLenght EffectiveWaveLenght of Filter
 	* @param float $dTel Telescope's Diameter
 	* @param float $mag Magnitude of Source
 	*/
 	public function setNumberPhotons($q, $tSky, $f0, $filterWidth, $effectiveLenght, $dTel , $mag)
 	{
 			$this->numberPhotons = $this->getFcalib() *  $q * $tSky * 1.18531e10 * $f0 * ($filterWidth/$effectiveLenght) * ($dTel * $dTel) *  pow(10, -0.4*$mag);
 	}
 	/**
 	* Return Number of source photons
 	* @return float $numberPhotons number Photons of source
 	*/
 	public function getNumberPhotons()
 	{
 		return $this->numberPhotons;
 	}
 	/**
 	* Sets up Magnitude of source
 	* @param float $mag Magnitude of Source
 	*/
 	public function setMagnitude($mag)
 	{
 		$this->magnitude = $mag;
 	}
 	/**
 	* Return Magnitude of source
 	* @return float $mag Magnitude of Source
 	*/
 	public function getMagnitude()
 	{	
 		return $this->magnitude;
 	}
 	/**
 	* Sets up Signal to Noise Ratio
 	* @param int $type Type of calculation
 	* @param float $n Number photons of source
 	* @param float $t Integration Time
 	* @param float $nPix number of pixels
 	* @param float $nS number photons of Sky
 	* @param float $nR Readout Noise of CCD
 	* @param float $g Gain of CCD
 	* @param int $binning Binning of CCD
 	* @param float $k constant used on Type 2 of calculation
 	* @param float $sigma Error of Polarization
 	* @param int $nwp number of WavePlates positions
 	*/
 	public function setSignalNoiseRatio($type, $n = 0, $t = 0, $nPix = 0, $nS = 0, $nR = 0, $g = 0, $binning = 0 , $k = 0, $sigma = 0, $nwp = 0)
 	{
 		//When ETC is in Mode 1 (Int. Time -> Sigma)
 		if($type == 1)
 		{		
 			$this->signalNoiseRatio = $n*$t/sqrt($n*$t+2*$nPix*($nS*$t + $binning * pow($nR,2) + pow(0.289, 2) * pow($g,2))); 	
 		}
 		//When ETC is in Mode 2 (Sigma -> Int. Time)
 		elseif($type==2)
 		{
 			$snr = $k * (100/sqrt($nwp)) * (1/$sigma);
 			$this->signalNoiseRatio = $snr;
 		}
 	}
 	/**
 	* Return Signal to Noise Ratio
 	* @return float $signalNoiseRaio  Signal to Noise Ratio
 	*/	
 	public function getSignalNoiseRatio()
 	{
 		return $this->signalNoiseRatio;
 	}
 	/**
 	* Sets up the Number of Pixels 
 	* @param float  $rap Aperture Radius
 	* @param float $plateScale Plate Scale of CCD
 	* @param float *binning Binning of CCD.
 	*/
 	public function setNumberPixels($rap, $platescale, $binning)
 	{
 		$this->numberPixels =  3.14159 * pow(($rap/($platescale * $binning)), 2);
 	}
 	/**
 	* Return Number of Pixels
 	* @return float $numberPixels number pixels Of source
 	*/
 	public function getNumberPixels()
 	{
 		return $this->numberPixels;
 	}
 	/**
 	* Sets up Aperture Radius 
 	* @param int $rap Aperture Radius
 	*/
 	public function setRadiusAperture($rap)
 	{
 		$this->radiusAperture = $rap;
 	}
 	/**
 	* Return Aperture Radius
 	* @return int $radiusAperture
 	*/
 	public function getRadiusAperture()
 	{
 		return $this->radiusAperture;
 	}
 	/**
 	* Sets up time Exposure or Integration Time
 	* @param int $type Mode to Calculation Int. Time
 	* @param float $t Integration Time
 	* @param float $n Number photons of Source
 	* @param float $snr Signal to noise ratio
 	* @param float $nPix Number Pixels of Source
 	* @param float $nS Number photons of Sky
 	* @param float $nR ReadoutNoise of CCD
 	* @param float $g Gain of CCD
 	* @param float $binning Binning of CCD
 	*/
 	public function setTimeExposure($type,$t = 0, $n=0, $snr = 0, $nPix = 0, $nS = 0, $nR = 0, $g = 0, $binning = 0)
 	{
 		if($type==1) 
 		{
 			$this->timeExposure = $t;
 		}
 		elseif($type==2)
 		{
 			$a = pow($n,2);
 			$b = -1 * pow($snr,2) * ($n + 2*$nPix * $nS);
 			$c = -2 * $nPix * pow($snr,2) * ($binning * pow($nR,2) + pow(0.289, 2) * pow($g, 2));
 			$t = (-$b + sqrt(pow($b,2) -4 * $a * $c))/2/$a;
 			
 			$this->timeExposure = $t;
 		}
 	}
 	/**
 	* return time Exposure 
 	* @return float $timeExposure Exposure Time
 	*/
 	public function getTimeExposure()
 	{
 		return $this->timeExposure;
 	}
 	/**
 	* Sets up Fcalib
 	* @param float $value Fcalib
 	*/
 	public function setFcalib($value)
 	{
 		$this->fCalib = $value;
 	}
 	/**
    * Return Fcalib
 	* @return float $value Fcalib
 	*/
 	public function getFcalib()
 	{
 		return $this->fCalib;
 	}

 }
?>