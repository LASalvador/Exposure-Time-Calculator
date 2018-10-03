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
		
		function __construct(argument)
		{
			# code...
		}
		public function setNumberPhotons($numberPhotons)
		{
			$this->numberPhotons = $numberPhotons;
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
		public function getMagnitudeSKy()
		{
			return $this->magnitudeSky;
		}

	}
?>