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
		public function __construct($ccdNumber,$ccdType, $filter)
		{
			$reader = new ReaderJSON();
			$this->setQuanTumEfficiency($reader->readQuantumEfficiency($ccdNumber,$filter));
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

	}
?>