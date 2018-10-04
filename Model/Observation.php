
<?php
 /**
  * This class represents the Observation and its attributes
  * @author: Lucas Almeida Salvador
  */
 class Observation
 {
 	private $sigmaP;
 	private $sigmaV;
 	private $numberPhotons;
 	private $magnitude;
 	private $flux;
 	private $signalNoiseRadio;
 	private $numberPixels;
 	private $radiusAperture;
 	private $timeExposure;
 	const PI = 3.14159;
 	const H = 6.62607e-34; 
 	const K = 1.18531e10;

 	function __construct()
 	{
 		echo "fala galera to sendo criado";
 	}
 	/*public function setSigmaP($snr, $nwp, $type)
 	{
 		if(type == 1)
 		{
 			temp = (100/sqrt($snr)) *(1/nwp);
 			$this->sigmaP = temp;
 		}
 		else
 		{
 			temp = (1/2) * ((100/sqrt($snr)) * (1/nwp));
 			$this->sigmaP = temp;
 		}
 	}*/
 	public function getSigmaP()
 	{
 		return	$this->sigmaP;
 	}
 	/*
 	public function setSigmaV($snr, $nwp)
 	{
 		temp = (1/sqrt(2)) * (100/sqrt($snr)) * (1/nwp);
 		$this->sigmaV = temp;
 	}*/
 	public function getSigmaV()
 	{
 		return $this->sigmaV;
 	}
 	/*
 	public function setNumberPhotons($q, $tSky, $f0, $filterWidth, $effectiveLenght, $dTel , $mag)
 	{
 			$this->flux = $q * $tSky * K * $f0 * ($filterWidth/$effectiveLenght) * (dTel * dTel) * 10e-0.4*$mag;
 	}*/
 	public function getNumberPhotons()
 	{
 		return $this->numberPhotons;
 	}
 	public function setMagnitude($mag)
 	{
 		$this->magnitude = $mag;
 	}
 	public function getMagnitude()
 	{	
 		return $this->magnitude;
 	}
 	/*public function setFlux($q, $tSky, $f0, $filterWidth, $effectiveLenght, $dTel , $mag)
 	{
 		$this->flux = $q * $tSky * K * $f0 * ($filterWidth/$effectiveLenght) * (dTel * dTel) * 10e-0.4*$mag;
 	}*/
 	public function getFlux($value='')
 	{
 		return $this->flux;
 	}
 	/*public function setSignalNoiseRadio($n, $t, $nPix, $nS, $nR, $g);
 	{	
 		$this->signalNoiseRadio = $n*$t/sqrt($n*$t+2*$nPix*($nS*$t+pow($nR,2)+pow(0.289, 2)*pow($g,2))); 	
 	}*/
 	public function getSignalNoiseRadio()
 	{
 		return $this->signalNoiseRadio;
 	}
 	/*public function setNumberPixels($rap)
 	{
 		$this->numberPixels = PI * ($rap * $rap);
 	}*/
 	public function getNumberPixels()
 	{
 		return $this->numberPixels;
 	}
 	public function setRadiusAperture($rap)
 	{
 		$this->radiusAperture = $rap;
 	}
 	public function getRadiusAperture()
 	{
 		return $this->radiusAperture;
 	}
 	/*public function setTimeExposure($type,$t, $n, $snr, $n, $npix, $ns, $nr , $g);
 	{
 		if ($type == 1) 
 		{
 			$this->timeExposure = $t;
 		}
 		else
 		{
 			$t = ($snr *( $n + 2* $npix *$ns) + sqrt(pow(-($snr *( $n + 2* $npix *$ns)), 2) - 4 * (pow($n,2)) * (-2*$npix* pow($snr,2) * (pow($nr,2) + pow(0.289, 2)*pow($g,2))))/2*pow($n, 2);
 			$this->timeExposure = $t;
 		}
 	}*/
 	public function getTimeExposure()
 	{
 		return $this->timeExposure;
 	}

 }
?>