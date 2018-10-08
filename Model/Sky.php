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
		
		function __construct($transparency, $magnitude)
		{
			//$this->setNumberPhotons();
			$this->setTransparencySky($transparency);
			$this->setMagnitudeSky($magnitude);
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
		public function getMagnitudeSKy()
		{
			return $this->magnitudeSky;
		}

	}
?>