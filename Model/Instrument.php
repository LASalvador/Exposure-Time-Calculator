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
 	private $cdd
 	function __construct(argument)
 	{
 		# code...
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
 	public function getAperture ($value='')
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
 	public function setPlateScale($plateScale)
 	{
 		$this->plateScale = $plateScale;
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