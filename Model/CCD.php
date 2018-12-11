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
		/** CCD's binning */
		private $binning;
		/** CCD's pixel size */
		private $pixelSize;


		/**
		* Constructor: Sets up all attributes of CCD.
		*
		* @param int $ccdNumber number choiced on table ccd. 
		* @param char @filter represent the filter choiced.
		* @param int $binning binning choiced
		*/	
		public function __construct($ccdNumber, $mode ,$filter, $binning)
		{

			$reader = new ReaderJSON();
			$this->setCCDNumber($ccdNumber);
			$this->setQuanTumEfficiency($reader->readQuantumEfficiency($this->getCCDNumber(),$filter));
			$this->setReadoutNoise($reader->readCCDvalues($this->getCCDNumber(),$mode,'readoutNoise'));
			$this->setGain($reader->readCCDvalues($this->getCCDNumber(),$mode,'gain'));
			$this->setBinning($binning);
			$this->setPixelSize($reader->readCCDPixelSize($this->getCCDNumber()));
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
		* Define the CCD's serial number 
		* @param int $number is the serial number
		*
		*/
		public function setCCDNumber($number)
		{
			$this->ccdNumber = $number;
		}
		/**
		* Return the CCD Number
		* @return string CCDNumber
		*/
		public function getCCDNumber()
		{
			return $this->ccdNumber;
		}
		/**
		* Set's up binning
		* @param int $binning
		*/
		public function setBinning($binning)
		{
			$this->binning = $binning;
		}
		/**
		* Return binning
		* @return int binning
		*/
		public function getBinning()
		{
			return $this->binning;	
		}

		/**
		* Sets the CCD's pixel size
		* @param float pixel size
		*/
		public function setPixelSize($pixel)
		{
			$this->pixelSize = $pixel;
		}
		/**
		* Return the CCD's pixel size
		*/
		public function getPixelSize()
		{
			return $this->pixelSize;
		}


	}
?>