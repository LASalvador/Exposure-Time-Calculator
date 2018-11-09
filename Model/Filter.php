<?php
 /**
  * This class represents the Filter used during the observation
  * @author: Lucas Almeida Salvador
  */
 include_once 'ReaderJSON.php';
 class Filter 
 {
 	/** Filter Width*/
 	private $filterWidth;
 	/** Effective wavelength of the filter*/
 	private $effectiveLenght;
 	/** Flux Magnitude Zero of the filter */
 	private $fluxZero;

 	/**
 	* Constructor: Sets up the Filter attributes
 	* 
 	* @param Filter choiced by the User
 	*/
 	function __construct($filter)
 	{
 		$reader = new ReaderJSON();
 		$this->setFilterWidth($reader->readFilter($filter, 'filterWidth'));
 		$this->setEffectiveLenght($reader->readFilter($filter,'effectiveLenght'));
 		$this->setFluxZero($reader->readFilter($filter,'fluxZero'));


 	}
 	/**
 	* Set's up Filter Width
 	* @param float $filter filter width 
 	*/
 	public function setFilterWidth($filter)
 	{
 		$this->filterWidth = $filter;
 	}
 	/**
 	* Return the Filter Width
 	* @return float Filter Width
 	*/
 	public function getFilterWidth()
 	{
 		return $this->filterWidth;
 	}
 	/**
 	* Set's the Effective Wavelenght
 	* @param float $effective wavelenght
 	*/
 	public function setEffectiveLenght($effective)
 	{
 		$this->effectiveLenght = $effective;
 	}
 	/**
 	* Return Effective Wavelenght
 	* @return float wavelenght
 	*/
 	public function getEffectiveLenght()
 	{
 		return $this->effectiveLenght;
 	}
 	/**
 	* Set's up Flux Magnitude Zero
 	* @param float $flux Flux Magnitude Zero
 	*/
 	public function setFluxZero($flux)
 	{
 		$this->fluxZero = $flux;
 	}
 	/**
 	* Return Flux Magnitude Zero
 	* @return float flux Magnitude Zero
 	*/
 	public function getFluxZero()
 	{
 		return $this->fluxZero;
 	}
 }
?>