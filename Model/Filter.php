<?php
 /**
  * This class represents the Filter used during the observation
  */
 class Filter 
 {
 	private $centerBandLength;
 	private $filterWidth;
 	private $effectiveLenght;
 	private $fluxZero;

 	function __construct(argument)
 	{
 		# code...
 	}
 	public function setCenterBandLength($centerBandLength)
 	{
 		$this->centerBandLength = $centerBandLength;
 	}
 	public function getCenterBandLength()
 	{
 		return $this->centerBandLength;
 	}
 	public function setFilterWidth($filter)
 	{
 		$this->filterWidth = $filter;
 	}
 	public function getFilterWidth()
 	{
 		return $this->filterWidth;
 	}
 	public function setEffectiveLenght($effectiveLenght)
 	{
 		$this->effectiveLenght = $effectiveLenght;
 	}
 	public function getEffectiveLenght()
 	{
 		return $this->effectiveLenght;
 	}
 	public function setFluxZerou($flux)
 	{
 		$this->fluxZero = $flux;
 	}
 	public function getFluxZero()
 	{
 		return $this->fluxZero;
 	}
 }
?>