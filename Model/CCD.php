<?php
	/**
	 * This class represents the CCD.
	 * @author: Lucas Almeida Salvador
	 */

	include_once 'ReaderJSON.php';
	class CCD
	{
		/**  CCD's Readout Noise*/
		private $readoutNoise;
		/** CCD's gain */
		private $gain;
		/** CCD's quantum Efficiency */
		private $quantumEfficiency;
		/** CCD's serial number*/
		private $ccdNumber;

		private $binning;

		/**
		* Constructor: Sets up all attributes of CCD.
		*
		* @param int $ccdNumber number choiced on table ccd. 
		* @param char @filter represent the filter choiced.
		*/	
		public function __construct($ccdNumber, $filter, $binning)
		{

			$reader = new ReaderJSON();
			$this->setCCDNumber($ccdNumber);
			$this->setQuanTumEfficiency($reader->readQuantumEfficiency($this->getCCDNumber(),$filter));
			$this->setReadoutNoise($reader->readCCDvalues($ccdNumber,'readoutNoise'));
			$this->setGain($reader->readCCDvalues($ccdNumber,'gain'));
			$this->setBinning($binning);
		}
		/**
		* Sets up Readout Noise
		*
		* @param float $readoutNoise is the CCD's ReadoutNoise
		*/
		public function setReadoutNoise($readoutNoise)
		{
			$this->readoutNoise = $readoutNoise;
		}
		/**
		* Return the readout noise value
		*
		* @return float - readout noise value
		*/
		public function getReadoutNoise()
		{
			return $this->readoutNoise;
		}
		/**
		* Sets up Gain
		*
		* @param float $gain is the CCD's gain
		*/
		public function setGain($gain)
		{
			$this->gain = $gain;
		}
		/**
		* Return the gain value
		*
		* @return float - gain value
		*/
		public function getGain()
		{
			return $this->gain;
		}
		/**
		* Set up QuantumEfficiency value
		* 
		* @param float - $quantumEfficiency is the quantumEfficiency value
		*/
		public function setQuanTumEfficiency($quantum)
		{
			$this->quantumEfficiency = $quantum;
		}
		/**
		* Return the quantum efficiency value
		* 
		* @return quantum Efficiency value
		*/
		public function getQuanTumEfficiency()
		{
			return $this->quantumEfficiency;
		}
		/**
		* Define the CCDNumber(ID) 
		* @param float $number is the number select on table CCD
		*
		*/
		public function setCCDNumber($number)
		{
			if($number>=1 && $number<=2)
			{
				$this->ccdNumber = 'CCD1';
			}
			elseif($number>=2 && $number<=4)	
			{
				$this->ccdNumber = 'CCD2';
			}
			elseif($number>=5 && $number<=28)
			{
				$this->ccdNumber = 'CCD3';
			}
			if($number>=29 && $number<=76)	
			{
				$this->ccdNumber = 'CCD4';
			}
			if($number>=77 && $number<=148)
			{
				$this->ccdNumber = 'CCD5';
			}
			if($number>=149 && $number<=182)	
			{
				$this->ccdNumber = 'CCD6';
			}
		}
		/**
		* Return the CCD Number
		* @return string CCDNumber
		*/
		public function getCCDNumber()
		{
			return $this->ccdNumber;
		}
		public function setBinning($binning)
		{
			$this->binning = $binning;
		}
		public function getBinning()
		{
			return $this->binning;	
		}

	}
?>