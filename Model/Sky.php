<?php
	/**
	 * This class represents the Atmospheric conditions at the time of observation
	 * @author: Lucas Almeida Salvador
	 */
	class Sky
	{
		private $numberPhotons;
		private $transparencySky;
		private $magnitudeSky;
		function __construct($transparencySky, $moonPhase, $q , $f0, $filterWidth, $effectiveLenght, $dTel, $plateScale)
		{
			$this->setTransparencySky($transparencySky);
			$this->setMagnitudeSky($moonPhase);
			$this->setNumberPhotons($this->getMagnitudeSky(), $this->getTransparencySky(), $q, $f0, $filterWidth, $effectiveLenght, $dTel, $plateScale);
		}
		public function setNumberPhotons($mSky, $tSky, $q , $f0, $filterWidth, $effectiveLenght, $dTel, $plateScale)
		{
			$n = $q * $tSky * 1.18531e10* $f0 * ($filterWidth/$effectiveLenght) * pow($dTel, 2) * pow($plateScale, 2) * pow(10, -0.4*$mSky);
				$this->numberPhotons = $n;
		}
		public function getNumberPhotons()
		{
			return $this->numberPhotons;
		}
		public function setTransparencySky($transparency)
		{
			if($transparency == 1)
			{
				$this->transparencySky = 0.7;
			}
			else if($transparency ==2)
			{
				$this->transparencySky = 0.5;	
			}
			else
			{
				$this->transparencySky = 0.3;
			}
		}
		public function getTransparencySky()
		{
			return $this->transparencySky;
		}
		public function setMagnitudeSky($magnitude)
		{
			if($magnitude == 1)
			{
				$this->magnitudeSky = 24;
			}
			else if($magnitude == 2)
			{
				$this->magnitudeSky = 23;	
			}
			else
			{
				$this->magnitudeSky = 22;
			}
		}
		public function getMagnitudeSky()
		{
			return $this->magnitudeSky;
		}

	}
?>