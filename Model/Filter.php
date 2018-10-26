<?php
 /**
  * This class represents the Filter used during the observation
  * @author: Lucas Almeida Salvador
  */
 include_once 'ReaderJSON.php';
 class Filter 
 {
 	private $filterWidth;
 	private $effectiveLenght;
 	private $fluxZero;

 	function __construct($filter)
 	{
 		$reader = new ReaderJSON();
 		$this->setFilterWidth($reader->readFilter($filter, 'filterWidth'));
 		$this->setEffectiveLenght($reader->readFilter($filter,'effectiveLenght'));
 		$this->setFluxZero($reader->readFilter($filter,'fluxZero'));


 	}
 	public function setFilterWidth($filter)
 	{
 		$this->filterWidth = $filter;
 	}
 	public function getFilterWidth()
 	{
 		return $this->filterWidth;
 	}
 	public function setEffectiveLenght($effective)
 	{
 		$this->effectiveLenght = $effective;
 	}
 	public function getEffectiveLenght()
 	{
 		return $this->effectiveLenght;
 	}
 	public function setFluxZero($flux)
 	{
 		$this->fluxZero = $flux;
 	}
 	public function getFluxZero()
 	{
 		return $this->fluxZero;
 	}
 }
?>