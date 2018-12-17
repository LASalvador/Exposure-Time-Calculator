<?php
	/**
	 * This class generate the data set to build the graph 
	 * @author: Lucas Almeida Salvador
	 */
	namespace App\Model;
	class Graphics 
	{
		/** Observation object */
		private $observation;
		/** Sky object */
		private $sky;
		/** Instrument object*/
		private $instrument;


		/**
		* Constructor: Sets up Graphics attributes
		* @param $observationObject Observation object
		* @param $skyObject Sky object
		* @param $instrument Instrument object 
		*/
		function __construct($observationObject,$skyObject, $instrumentObject)
		{
			
			$this->setObservation($observationObject);
			$this->setSky($skyObject);
			$this->setInstrument($instrumentObject);
		}
		/**
		* Sets Observation
		* @param Observation $observationObject
		*/
		public function setObservation(Observation $observationObject)
		{
			$this->observation = $observationObject;
		}
		/**
		* Return Observation
		* @return observation
		*/
		public function getObservation()
		{	
			return $this->observation;
		}
		/**
		* Sets Sky
		* @param Sky $skyObject
		*/
		public function setSky(Sky $skyObject)
		{	
			$this->sky = $skyObject;
		}
		/**
		* Return sky
		* @return sky
		*/
		public function getSky()
		{	
			return $this->sky;
		}
		/**
		* Sets Instrument
		* @param Instrument $instrumentObject
		*/
		public function setInstrument(Instrument $instrumentObject)
		{
			$this->instrument = $instrumentObject;
		}
		/**
		* Return object
		* @return Instrument
		*/
		public function getInstrument()
		{	
			return $this->instrument;
		}
		/**
		* Generate a dataset to build the graph. The values is generate from 1 to 500. If $timeIntegration>500 
		* @param float $timeIntegration Integration Time 
		* @param int $nwp Number of WavePlates Positions 
		* @param float $wave Waveplate 
		* @return Array $data dataset to build the graph
		*/
		public function generateValues($timeIntegration , $nwp, $wave)
		{
			// To determine to $timeRange ends in 500 or $timeIntegration
			if($timeIntegration>500)
			{
				$timeRange = $timeIntegration;
			}
			else
			{
				$timeRange = 500;
			}
			$data = array();
			// defining the values at $time = 1
			if($wave=='1/2')
	 		{	
	 			$this->getObservation()->setSignalNoiseRatio(1,$this->getObservation()->getNumberPhotons(), 1, $this->getObservation()->getNumberPixels(), $this->getSky()->getNumberPhotons(),$this->getInstrument()->getCCD()->getReadoutNoise(),$this->getInstrument()->getCCD()->getGain(), $this->getInstrument()->getCCD()->getBinning());

				$this->getObservation()->setSigmaP(1,$this->getObservation()->getSignalNoiseRatio(),$nwp);
	 		}
	 		elseif ($wave=='1/4')
	 		{	
	 				$this->getObservation()->setSignalNoiseRatio(1,$this->getObservation()->getNumberPhotons(), 1, $this->getObservation()->getNumberPixels(), $this->getSky()->getNumberPhotons(),$this->getInstrument()->getCCD()->getReadoutNoise(),$this->getInstrument()->getCCD()->getGain(),  $this->getInstrument()->getCCD()->getBinning());

				$this->getObservation()->setSigmaP(2,$this->getObservation()->getSignalNoiseRatio(),$nwp);
	 		}

			$data[] = array('',1, round($this->getObservation()->getSigmaP(),3) );
			//Defining the values begin 10 to $timeRange
			for ($time=10; $time <=$timeRange; $time+=10) 
			{ 
				if($wave=='1/2')
		 		{
		 			$this->getObservation()->setSignalNoiseRatio(1,$this->getObservation()->getNumberPhotons(), $time, $this->getObservation()->getNumberPixels(), $this->getSky()->getNumberPhotons(),$this->getInstrument()->getCCD()->getReadoutNoise(),$this->getInstrument()->getCCD()->getGain(),  $this->getInstrument()->getCCD()->getBinning());

					$this->getObservation()->setSigmaP(1,$this->getObservation()->getSignalNoiseRatio(),$nwp);
		 		}
		 		elseif ($wave=='1/4')
		 		{	
		 			$this->getObservation()->setSignalNoiseRatio(1,$this->getObservation()->getNumberPhotons(), $time, $this->getObservation()->getNumberPixels(), $this->getSky()->getNumberPhotons(),$this->getInstrument()->getCCD()->getReadoutNoise(),$this->getInstrument()->getCCD()->getGain(),  $this->getInstrument()->getCCD()->getBinning());

					$this->getObservation()->setSigmaP(2,$this->getObservation()->getSignalNoiseRatio(),$nwp);
		 		}


				$data[] = array('', $time, round($this->getObservation()->getSigmaP(), 3) );
			}
			return $data;
		}
	}
?>