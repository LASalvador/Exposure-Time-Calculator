<?php 
	
	namespace App\Controller;

 	use App\Model\Filter;
 	use App\Model\CCD;
 	use App\Model\Instrument;
 	use App\Model\Sky;
 	use App\Model\Observation;
 	use App\Model\Graphics;

	final class Appcontroller extends Controller
	{	//Load the homepage
		public static function index()
		{
			return self::view('home');
		}
		//load the about page
		public static function about()
		{
			return self::view('about');
		}
		//load the form required
		public static function loadForm($etc)
		{
			return self::view('form'.$etc);
		}
		// do the calculations to ETC IAGPOL
		public static function submitFormIAGPOL()
		{
			//Getting values
			$magnitude  = self::params('tMag');
			$nwp = self::params('tNwp');
			$wave = self::params('tWave');
			$binning = self::params('tBin');
			$dTel = self::params('tTel');
			$detector = self::params('tCCD');
			$focal = self::params('tFocal');
			$filter = self::params('tFilter');
			$moon = self::params('tMoon');
			$tSky = self::params('tSky');
			$airMass = self::params('tAirMass');
			$aperture = self::params('tAperture');
			$sigmaP = self::params('tSigmaP');
			$time = self::params('tTime');
			$mode = self::params('tMode');
		
			$detector = json_decode($detector);
			//Building objects
			$filtro =  new Filter($filter); 
			
			$ccd = new CCD($detector->serialNumber, $detector->mode, $filter, $binning);
			
			$instrument = new Instrument($nwp,$dTel, $focal ,$ccd);
			$instrument->setFArea(0.804);
			$instrument->setTTel($filter);
			$instrument->setTInstr($focal);
			$instrument->setTFilter($filter);

			$sky = new Sky($tSky, $airMass,$filter, $moon , $instrument->getCCD()->getQuanTumEfficiency(), $filtro->getFluxZero(), $filtro->getFilterWidth(), $filtro->getEffectiveLenght(), $instrument->getAperture(), $instrument->getPlateScale(),1, $ccd->getBinning(), $instrument->getFArea(),$instrument->getTTel(),$instrument->getTInstr(), $instrument->getTFilter());
			// Build Observation Object
			$observation = new Observation($instrument->getCCD()->getQuanTumEfficiency(), $sky->getTransparencySky(), $filtro->getFluxZero(), $filtro->getFilterWidth(), $filtro->getEffectiveLenght(), $instrument->getAperture(), $magnitude, $aperture, $instrument->getPlateScale(), 1, $ccd->getBinning(), $instrument->getFArea(), $instrument->getTTel(), $instrument->getTInstr(), $instrument->getTFilter());
			// Defining mode
			if($mode==1)
		 	{
		 		$inTime = $time;
				$inSigma = 0;
		 		$observation->setTimeExposure(1,$time);

		 		//Generate values according WavePlate 
		 		if($wave=='1/2')
		 		{
		 			$observation->setSignalNoiseRatio(1,$observation->getNumberPhotons(), $time, $observation->getNumberPixels(), $sky->getNumberPhotons(), $instrument->getCCD()->getReadoutNoise(),$instrument->getCCD()->getGain(), $ccd->getBinning());
					$observation->setSigmaP(1, $observation->getSignalNoiseRatio(),$nwp); 
		 		}
		 		elseif ($wave=='1/4')
		 		{	
		 			$observation->setSignalNoiseRatio(1,$observation->getNumberPhotons(), $time, $observation->getNumberPixels(), $sky->getNumberPhotons(), $instrument->getCCD()->getReadoutNoise(),$instrument->getCCD()->getGain(), $ccd->getBinning());
					$observation->setSigmaP(2, $observation->getSignalNoiseRatio(),$nwp); 
					$observation->setSigmaV($observation->getSigmaP()); 
		 		}
		 	}
		 	else
		 	{
		 		$inTime = 0;
				$inSigma = $sigmaP;
		 		// Generate values according WavePlate
		 		if($wave=='1/2')
		 		{
		 			$observation->setSigmaP(3,0,0,$sigmaP);
		 			$observation->setSignalNoiseRatio(2,0,0,0,0,0,0,0,1,$sigmaP,$instrument->getNumberWavePlates());
		 			$observation->setTimeExposure(2,0, $observation->getNumberPhotons(), $observation->getSignalNoiseRatio(), $observation->getNumberPixels(), $sky->getNumberPhotons(), $instrument->getCCD()->getReadoutNoise(), $instrument->getCCD()->getGain(), $ccd->getBinning());
		 		}
		 		elseif ($wave=='1/4')
		 		{
		 			$observation->setSigmaP(3,0,0,$sigmaP);
		 			$observation->setSigmaV($observation->getSigmaP());
		 			$observation->setSignalNoiseRatio(2,0,0,0,0,0,0,0,sqrt(2),$sigmaP,$instrument->getNumberWavePlates());
		 			$observation->setTimeExposure(2,0, $observation->getNumberPhotons(), $observation->getSignalNoiseRatio(), $observation->getNumberPixels(), $sky->getNumberPhotons(), $instrument->getCCD()->getReadoutNoise(), $instrument->getCCD()->getGain(),$ccd->getBinning());
		 		}

		 	}
		 	$snr = $observation->getSignalNoiseRatio();
			$sigmaP = $observation->getSigmaP();
 			$sigmaV = $observation->getSigmaV();
			//Generate Data set
		 	$graph = new Graphics($observation, $sky, $instrument);
			$data = $graph->generateValues($observation->getTimeExposure(), $nwp, $wave);
			//Building the array
			$results = array(
				'inMag' => $magnitude,
				'inNwp' => $nwp,
				'inWave' => $wave,
				'inDTel' => $dTel,
				'inFocal' => $focal,
				'inTSky' => $tSky, 
				'inAperture' => $aperture,
				'inMoon' => $moon,
				'inAirMass' => $airMass,
				'inTime' => $inTime,
				'inSigma' => $inSigma,
				'inFilter' => $filter,
				'inTsky' => $tSky,
				'numberPixels' => $observation->getNumberPixels() ,
				'numberPhotons' => $observation->getNumberPhotons(),
				'timeExposure' =>  $observation->getTimeExposure(),
				'snr' => $snr,
				'sigmaP' => $sigmaP,
				'sigmaV' => $sigmaV,
				'fCalib' => $observation->getFcalib(),
				'fluxZero' => $filtro->getFluxZero(),
				'central' => $filtro->getEffectiveLenght(),
				'band' => $filtro->getFilterWidth(),
				'quantumEfficiency' => $instrument->getCCD()->getQuanTumEfficiency(),
				'gain' => $instrument->getCCD()->getGain(),
				'readoutNoise' => $instrument->getCCD()->getReadoutNoise(),
				'plateScale' => $instrument->getPlateScale(),
				'binning' => $ccd->getBinning(),
				'tSky' => $sky->getTransparencySky(),
				'magSky' =>  $sky->getMagnitudeSky(),
				'nSky' =>  $sky->getNumberPhotons(),
				'dataSet' => $data,
			);
			//Saving values 
			self::saveValues('results', $results);
			//Redirect the page
			self::redirect('/IAGPOL/Output');
		}
		public static function loadOuput($etc)
		{	
			return self::view('output'.$etc);
		}
	}
?>
