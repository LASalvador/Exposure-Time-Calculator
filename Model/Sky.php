<?php
	/**
	 * This class represents the Atmospheric conditions at the time of observation
	 * @author: Lucas Almeida Salvador
	 */

	include_once 'ReaderJSON.php';
	class Sky
	{
		private $numberPhotons;
		private $transparencySky;
		private $magnitudeSky;
		function __construct($transparencySky, $filter, $q , $f0, $filterWidth, $effectiveLenght, $dTel, $plateScale)
		{
			$reader = new ReaderJSON();
			$this->setTransparencySky($reader->readFilter($filter,$transparencySky));
			$this->setMagnitudeSky($reader->readFilter($filter,'sky'));
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
			$this->transparencySky = $transparency;
		}
		public function getTransparencySky()
		{
			return $this->transparencySky;
		}
		public function setMagnitudeSky($magnitude)
		{
			$this->magnitudeSky = $magnitude;
		}
		public function getMagnitudeSky()
		{
			return $this->magnitudeSky;
		}

	}
?>