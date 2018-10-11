<?php
 /**
  * This class represents the Instrument IAGPOL and its main attributes
  * @author: Lucas Almeida Salvador
  */
 class Instrument 
 {
 	private $numberWavePlates;
 	private $aperture;
 	private $focalReducer;
 	private $plateScale;
 	private $ccd;
 	function __construct($numberWavePlates, $dTel,$focal,$ccd)
 	{
 		$this->setNumberWavePlates($numberWavePlates);
 		$this->setAperture($dTel);
 		$this->setFocalReducer($focal);
 		$this->setCCD($ccd);
 		$this->setPlateScale($ccd->getCCDNumber(),$focal, $dTel);
 	}
 	public function setNumberWavePlates($number)
 	{
 		$this->numberWavePlates = $number;
 	}
 	public function getNumberWavePlates()
 	{
 		return $this->numberWavePlates;
 	}
 	public function setAperture($aperture)
 	{
 		$this->aperture = $aperture;
 	}
 	public function getAperture()
 	{
 		 return $this->aperture;	
 	}
 	public function setFocalReducer($focalReducer)
 	{
 		$this->focalReducer = $focalReducer;
 	}
 	public function getFocalReducer()
 	{
 		return $this->focalReducer;
 	}
 	public function setPlateScale($ccdNumber, $focalReducer, $dTel)
 	{

 		if($ccdNumber == "CCD2")
 		{
 			if($focalReducer == 1 && $dTel == 0.6)
 			{
 				$this->plateScale = 1.208;		
 			}
 			elseif ($focalReducer == 1 && $dTel == 1.6) 
 			{
 				$this->plateScale = 0.64;
 			}
 			elseif($focalReducer == 0 && $dTel == 0.6)
 			{
 				$this->plateScale = 0.604;
 			}
 			elseif($focalReducer == 0 && $dTel == 1.6)
 			{
 				$this->plateScale = 0.32;
 			}
 		}
 		else
 		{
 			if($focalReducer == 1 && $dTel == 0.6)
 			{
 				$this->plateScale = 0.68;		
 			}
 			elseif($focalReducer == 1 && $dTel == 1.6) 
 			{
 				$this->plateScale = 0.36;
 			}
 			elseif($focalReducer == 0 && $dTel == 0.6)
 			{
 				$this->plateScale = 0.34;
 			}
 			elseif($focalReducer == 0 && $dTel == 1.6)
 			{
 				$this->plateScale = 0.18;
 			}

 		}
 	}
 	public function getPlateScale()
 	{
 		return $this->plateScale;
 	}
 	public function setCCD(CCD $ccd)
 	{
 		$this->ccd = $ccd;
 	}
 	public function getCCD()
 	{
 		return $this->ccd;
 	}
 }
?>