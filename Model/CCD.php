<?php
	/**
	 * This class represents the CCD.
	 * @author: Lucas Almeida Salvador
	 */
	class CCD
	{
		private $readoutNoise;
		private $gain;
		private $quantumEfficiency;
		public function __construct(argument)
		{
			# code...
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

	}
?>