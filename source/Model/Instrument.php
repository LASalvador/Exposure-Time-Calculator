<?php
 /**
  * This class represents the Instrument IAGPOL and its main attributes
  * @author: Lucas Almeida Salvador
  */
 namespace App\Model;
	
 use App\Model\ReaderJSON;
 class Instrument 
 {
 	/** Number of Wave Plates Positions to the Instrument*/
 	private $numberWavePlates;
 	/** Telescope's Diameter of aperture*/
 	private $aperture;
 	/** Focal Reducer */
 	private $focalReducer;
 	/** Plate Scale on CCD */
 	private $plateScaleCCD;
 	/** CCD */
 	private $ccd;
 	/** Plata Scale in telescope*/
 	private $plateScaleTelescope;
 	/** The fraction of the telescope area that effectively collects photons*/
 	private $fArea;
 	/** The transmission of the telescope surface*/
 	private $tTel;
 	/** the transmission in the instrument*/
 	private $tInstr;


 	/**
 	* Constructor: Sets up the Instrument attributes
 	* 
 	* @param int $numberWavePlates number of Wave Plates Positions 
 	* @param float $dTel Telescope's Diameter of aperture
 	* @param int $focal Focal reducer
 	* @param CCD $ccd CCD
 	*/
 	function __construct($numberWavePlates, $dTel, $focalReducer,$ccd)
 	{
 		$this->setNumberWavePlates($numberWavePlates);
 		$this->setAperture($dTel);
 		$this->setFocalReducer($focal);
 		$this->setCCD($ccd);
 		$this->setPlateScaleTelescope($dTel);
 		$this->setPlateScale($focalReducer);
 	}
 	/**
 	* Sets up Number of WavePlate Positions
 	* @param int $number Number of WavePlate Positions
 	*/
 	public function setNumberWavePlates($number)
 	{
 		$this->numberWavePlates = $number;
 	}
 	/**
 	* Return number of waveplate positions
 	* @return int $numberWavePlates
 	*/
 	public function getNumberWavePlates()
 	{
 		return $this->numberWavePlates;
 	}
 	/**
 	* Sets up Telescope's Diameter of aperture
 	* @param float aperture Diameter of aperture
 	*/
 	public function setAperture($aperture)
 	{
 		$this->aperture = $aperture;
 	}
 	/**
 	* Return Telescope's Diameter of aperture
 	* @return float $aperture
 	*/
 	public function getAperture()
 	{
 		 return $this->aperture;	
 	}
 	/**
 	* Sets up Focal Reducer
 	* @param boolean $focalReducer
 	*/
 	public function setFocalReducer($focalReducer)
 	{
 		$this->focalReducer = $focalReducer;
 	}
 	/**
 	* return Focal Reducer
 	* @return boolean Focal reducer
 	*/
 	public function getFocalReducer()
 	{
 		return $this->focalReducer;
 	}
 	/**
 	* Sets up Plate Scale
 	* @param String $ccd Number CCD's number
 	* @param boolean $focalReducer focal reducer on Instrument
 	* @param Float $dTel Telescope's Diameter of aperture
 	*/
 	public function setPlateScale($focalReducer)
 	{
 		if($focalReducer == 1)
 		{
 			$factor = 2;
 		}
 		else
 		{
 			$factor = 1;
 		}
 		$this->plateScaleCCD = $this->getPlateScaleTelescope() * $this->getCCD()->getPixelSize() * $factor;
 	}
 	/**
 	* Return PlateScale   
 	* @return float $plateScale PlateScale
 	*/
 	public function getPlateScale()
 	{
 		return $this->plateScaleCCD;
 	}
 	/**
 	* Sets up CCD
 	* @param CCD $ccd CDD used in the observation
 	*/
 	public function setCCD(CCD $ccd)
 	{
 		$this->ccd = $ccd;
 	}
 	/** 
 	* Return CCD
 	*/
 	public function getCCD()
 	{
 		return $this->ccd;
 	}
 	/**
 	* Sets the Plate Scale Telescope
 	* @param float $dTel telescope Diameter
 	*/
 	public function setPlateScaleTelescope($dTel)
 	{	
 		/**Defining the plate scale according to the diameter of the telescope
 		* This values taken from http://lnapadrao.lna.br/OPD/telescopios/telescopios-do-opd
 		*/
 		if($dTel == 1.6)
 		{
 			$this->plateScaleTelescope = 13.09;
 		}
 		else
 		{
 			$this->plateScaleTelescope = 29.09;	
 		}
 	}
 	/**
 	* Returns the plate scale telescope
 	*/
 	public function getPlateScaleTelescope()
 	{
 		return $this->plateScaleTelescope;
 	}
 	/**
 	* Sets the fArea of telescope
 	* @param float $area The fraction of the telescope area that effectively collects photons 
 	*/
 	public function setFArea($area)
 	{
 		$this->fArea = $area;
 	}
 	/**
 	*	Return the fArea 
 	*/
 	public function getFArea()
 	{
 		return $this->fArea;
 	}
 	/**
 	* Sets the tTel
 	* @param char $filter represents the chosen filter
 	*/
 	public function setTTel($filter)
 	{
 		$reader = new ReaderJSON();
 		$tTel = $reader->readFilter($filter, 'tTel');
 		$this->tTel = $tTel;
 	}
 	/**
 	* Return tTel
 	*/
 	public function getTTel()
 	{
 		return $this->tTel;
 	}
 	public function setTInstr($focal)
 	{
 		if($focal)
 			$this->tInstr = 0.90;
 		else
 			$this->tInstr = 0.95;
 	}
 	public function getTInstr()
 	{
 		return $this->tInstr;
 	}









 }
?>