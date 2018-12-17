<?php
	/**
	 * This class represents the Atmospheric conditions at the time of observation
	 * @author: Lucas Almeida Salvador
	 */
	namespace App\Model;
	include_once 'ReaderJSON.php';
	class Sky
	{
		/** Number Photons of Sky */
		private $numberPhotons;
		/** transparency of Sky */
		private $transparencySky;
		/** magnitude of Sky */
		private $magnitudeSky;
		/** It's a factor to correct possible difference between this ETC results and the real measurements */
		private $fCalib;

		/**
		* Constructor: sets up attributes of class
		* @param String $transparencySky Transparency of Sky
		* @param float $airMass airMass during the observation
		* @param String $filter Filter selected
		* @param String $moonPhase moon phase selected
		* @param float $q Quantum Efficiency
		* @param float $f0 flux of a zero magnitude source
		* @param float $filterWidth FilterWidth
		* @param float $effectiveLenght EffectiveWaveLenght of Filter
		* @param float $dTel Telescope's Diameter
		* @param float $plateScale Plate Scale of CCD
		* @param float $fCalib fCalib
 		* @param float $binning Binning of CCD.
		*/
		function __construct($transparencySky, $airMass , $filter, $moonPhase , $q , $f0, $filterWidth, $effectiveLenght, $dTel, $plateScale, $fCalib, $binning, $fArea, $tTel,$tInstr)
		{
			$this->setFcalib($fCalib);
			$reader = new ReaderJSON();
			$this->setTransparencySky($reader->readFilter($filter,$transparencySky), $airMass);
			$this->setMagnitudeSky($reader->readMsky($filter,'sky',$moonPhase));
			$this->setNumberPhotons($this->getMagnitudeSky(), $this->getTransparencySky(), $q, $f0, $filterWidth, $effectiveLenght, $dTel, $plateScale, $binning, $fArea, $tTel,$tInstr);
		}
		/**
		* Sets up Number Photons of Sky
		* @param float $mSky magnitude of Sky
		* @param float $tSky Transparency of Sky
		* @param float $q Quantum Efficiency
		* @param float $f0 flux of a zero magnitude source
		* @param float $filterWidth FilterWidth
		* @param float $effectiveLenght EffectiveWaveLenght of Filter
		* @param float $dTel Telescope's Diameter
		* @param float $plateScale Plate Scale of CCD
 		* @param float $binning Binning of CCD.
		*/
		public function setNumberPhotons($mSky, $tSky, $q , $f0, $filterWidth, $effectiveLenght, $dTel, $plateScale, $binning, $fArea, $tTel,$tInstr)
		{
			$n = $this->getFcalib() *  $q * $tSky * 1.18531e10* $f0 * ($filterWidth/$effectiveLenght) * pow($dTel, 2) * pow($plateScale, 2) * pow($binning, 2) * pow(10, -0.4*$mSky) * $fArea * $tTel * $tInstr;
				$this->numberPhotons = $n;
		}
		/**
		* Return numberPhotons 
		* @return float numberPhotons
		*/
		public function getNumberPhotons()
		{
			return $this->numberPhotons;
		}
		/**
		* Sets up Transparency of Sky 
		* @param float $k coefficient of extinction
		* @param float $x air mass
		*/
		public function setTransparencySky($k , $x)
		{
			$this->transparencySky = pow(10,-0.4*$k*$x);
		}
		/**
		* Return Transparency of Sky
		* @return float $transparencySky
		*/
		public function getTransparencySky()
		{
			return $this->transparencySky;
		}
		/**
		* Sets up Magnitude of Sky
		* @param float $magnitude magnitude of sky
		*/
		public function setMagnitudeSky($magnitude)
		{
			$this->magnitudeSky = $magnitude;
		}
		/**
		* Return Magnitude of Sky
		* @return float $magnitude magnitude of sky
		*/
		public function getMagnitudeSky()
		{
			return $this->magnitudeSky;
		}
		/**
		* Set FCablib
		* @param $value Fcalib
		*/
		public function setFcalib($value)
	 	{
	 		$this->fCalib = $value;
	 	}
	 	/**
		* Return Fcalib
		* @return Fcalib
		*/
	 	public function getFcalib()
	 	{
	 		return $this->fCalib;
	 	}
	}
?>