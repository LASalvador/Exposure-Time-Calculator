<?php
	/**
	 * This class do the graph dates and build the graph 
	 * @author: Lucas Almeida Salvador
	 */

	include '../libs/phplot-6.2.0/phplot.php';
	class Graphics 
	{
		private $observation;
		private $sky;
		private $instrument;
		function __construct($observationObject,$skyObject, $instrumentObject)
		{
			
			$this->setObservation($observationObject);
			$this->setSky($skyObject);
			$this->setInstrument($instrumentObject);
		}

		public function setObservation(Observation $observationObject)
		{
			$this->observation = $observationObject;
		}
		public function getObservation()
		{	
			return $this->observation;
		}
		public function setSky(Sky $skyObject)
		{	
			$this->sky = $skyObject;
		}
		public function getSky()
		{	
			return $this->sky;
		}
		public function setInstrument(Instrument $instrumentObject)
		{
			$this->instrument = $instrumentObject;
		}
		public function getInstrument()
		{	
			return $this->instrument;
		}
		public function generateValues($timeIntegration , $nwp, $wave)
		{
			if($timeIntegration>500)
			{
				$timeRange = $timeIntegration;
			}
			else
			{
				$timeRange = 500;
			}


			$data = array();
			//defining in 1s
			if($wave=='1/2')
	 		{	
	 			$this->getObservation()->setSignalNoiseRadio(1,$this->getObservation()->getNumberPhotons(), 1, $this->getObservation()->getNumberPixels(), $this->getSky()->getNumberPhotons(),$this->getInstrument()->getCCD()->getReadoutNoise(),$this->getInstrument()->getCCD()->getGain(), $this->getInstrument()->getCCD()->getBinning());

				$this->getObservation()->setSigmaP(1,$this->getObservation()->getSignalNoiseRadio(),$nwp);
	 		}
	 		elseif ($wave=='1/4')
	 		{	
	 				$this->getObservation()->setSignalNoiseRadio(1,$this->getObservation()->getNumberPhotons(), 1, $this->getObservation()->getNumberPixels(), $this->getSky()->getNumberPhotons(),$this->getInstrument()->getCCD()->getReadoutNoise(),$this->getInstrument()->getCCD()->getGain(),  $this->getInstrument()->getCCD()->getBinning());

				$this->getObservation()->setSigmaP(2,$this->getObservation()->getSignalNoiseRadio(),$nwp);
	 		}

			$data[] = array('',1, round($this->getObservation()->getSigmaP(),3) );

			for ($time=10; $time <=$timeRange; $time+=10) 
			{ 
				if($wave=='1/2')
		 		{
		 			$this->getObservation()->setSignalNoiseRadio(1,$this->getObservation()->getNumberPhotons(), $time, $this->getObservation()->getNumberPixels(), $this->getSky()->getNumberPhotons(),$this->getInstrument()->getCCD()->getReadoutNoise(),$this->getInstrument()->getCCD()->getGain(),  $this->getInstrument()->getCCD()->getBinning());

					$this->getObservation()->setSigmaP(1,$this->getObservation()->getSignalNoiseRadio(),$nwp);
		 		}
		 		elseif ($wave=='1/4')
		 		{	
		 			$this->getObservation()->setSignalNoiseRadio(1,$this->getObservation()->getNumberPhotons(), $time, $this->getObservation()->getNumberPixels(), $this->getSky()->getNumberPhotons(),$this->getInstrument()->getCCD()->getReadoutNoise(),$this->getInstrument()->getCCD()->getGain(),  $this->getInstrument()->getCCD()->getBinning());

					$this->getObservation()->setSigmaP(2,$this->getObservation()->getSignalNoiseRadio(),$nwp);
		 		}


				$data[] = array('', $time, round($this->getObservation()->getSigmaP(), 3) );
			}
			return $data;
		}
	}
?>