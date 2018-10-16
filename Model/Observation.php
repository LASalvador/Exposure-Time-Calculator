
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
 	private $signalNoiseRadio;
 	private $numberPixels;
 	private $radiusAperture;
 	private $timeExposure;

 	function __construct($q, $tSky, $f0, $filterWidth, $effectiveLenght, $dTel , $mag, $rap )
 	{
 		$this->setMagnitude($mag);
 		$this->setRadiusAperture($rap);
 		$this->setNumberPixels($rap);
 		$this->setNumberPhotons($q, $tSky, $f0, $filterWidth, $effectiveLenght, $dTel , $mag);
 	}
 	public function setSigmaP($type, $snr = 0, $nwp = 0 , $sigmaP = 0)
 	{
 		if($type == 1)
 		{ // in this type use wave 1/2
 			$temp = (100/sqrt($snr))*(1/$nwp);
 			$this->sigmaP = $temp;
 		}
 		elseif($type == 2)
 		{ // this type use wave 1/4
 			$temp = (1/2) * ((100/sqrt($snr)) * (1/$nwp));
 			$this->sigmaP = $temp;
 		}
 		else
 		{
 			$this->sigmaP = $sigmaP;	
 		}
 	}
 	public function getSigmaP()
 	{
 		return	$this->sigmaP;
 	}
 	public function setSigmaV($type, $snr = 0, $nwp = 0, $sigmaV = 0)
 	{
 		if($type == 1)
 		{
 			$temp = (1/sqrt(2)) * (100/sqrt($snr)) * (1/$nwp);
 			$this->sigmaV = $temp;
 		}
 		else
 		{
 			$this->sigmaV = $getSigmaV;
 		}
 	}
 	public function getSigmaV()
 	{
 		return $this->sigmaV;
 	}
 	public function setNumberPhotons($q, $tSky, $f0, $filterWidth, $effectiveLenght, $dTel , $mag)
 	{
 			$this->numberPhotons = $q * $tSky * 1.18531e10 * $f0 * ($filterWidth/$effectiveLenght) * ($dTel * $dTel) *  pow(10, 0.4*$mag);
 	}
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
 	public function setSignalNoiseRadio($n, $t, $nPix, $nS, $nR, $g)
 	{		
 		$this->signalNoiseRadio = $n*$t/sqrt($n*$t+2*$nPix*($nS*$t + pow($nR,2) + pow(0.289, 2) * pow($g,2))); 	
 	}	
 	public function getSignalNoiseRadio()
 	{
 		return $this->signalNoiseRadio;
 	}
 	public function setNumberPixels($rap)
 	{
 		$this->numberPixels =  3.14159 * pow($rap, 2);
 	}
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
 	public function setTimeExposure($type,$t = 0, $n=0, $snr = 0, $nPix = 0, $nS = 0, $nR = 0, $g = 0)
 	{
 		if($type==1) 
 		{
 			$this->timeExposure = $t;
 		}
 		else
 		{
 			$t = ($snr *( $n + 2* $nPix *$ns) + sqrt(pow(-($snr *( $n + 2* $nPix *$ns)), 2) - 4 * (pow($n,2)) * (-2*$nPix* pow($snr,2) * (pow($nr,2) + pow(0.289, 2)*pow($g,2))))/2*pow($n, 2));
 			$this->timeExposure = $t;
 		}
 	}
 	public function getTimeExposure()
 	{
 		return $this->timeExposure;
 	}

 }
?>