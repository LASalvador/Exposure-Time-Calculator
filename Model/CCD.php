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
		public function getCCDNumber()
		{
			return $this->ccdNumber;
		}

	}
?>