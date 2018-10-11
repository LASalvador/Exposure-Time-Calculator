<?php
	/**
	 * This class represents the CCD.
	 * @author: Lucas Almeida Salvador
	 */

	include_once 'ReaderJSON.php';
	class CCD
	{
		private $readoutNoise;
		private $gain;
		private $quantumEfficiency;
		private $ccdNumber;
		public function __construct($ccdType, $filter)
		{

			$reader = new ReaderJSON();
			$this->setCCDNumber($ccdType);
			$this->setQuanTumEfficiency($reader->readQuantumEfficiency($this->getCCDNumber(),$filter));
			$this->setReadoutNoise($reader->readCCDvalues($ccdType,'readoutNoise'));
			$this->setGain($reader->readCCDvalues($ccdType,'gain'));
		}
		public function setReadoutNoise($readoutNoise)
		{
			$this->readoutNoise = $readoutNoise;
		}
		public function getReadoutNoise()
		{
			return $this->readoutNoise;
		}
		public function setGain($gain)
		{
			$this->gain = $gain;
		}
		public function getGain()
		{
			return $this->gain;
		}
		public function setQuanTumEfficiency($quantum)
		{
			$this->quantumEfficiency = $quantum;
		}
		public function getQuanTumEfficiency()
		{
			return $this->quantumEfficiency;
		}
		public function setCCDNumber($letter)
		{
			if($letter>='A' && $letter<='B')
			{
				$this->ccdNumber = 'CCD1';
			}
			if($letter>='C' && $letter<='D')	
			{
				$this->ccdNumber = 'CCD2';
			}
			if($letter>='E' && $letter<='AB')
			{
				$this->ccdNumber = 'CCD3';
			}
			/*if($letter>='' && $letter<='')	
			{
				$this->ccdNumber = 'CCD4';
			}
			if($letter>='' && $letter<='')
			{
				$this->ccdNumber = 'CCD5';
			}
			if($letter>='' && $letter<='')	
			{
				$this->ccdNumber = 'CCD6';
			}*/
		}
		public function getCCDNumber()
		{
			return $this->ccdNumber;
		}

	}
?>