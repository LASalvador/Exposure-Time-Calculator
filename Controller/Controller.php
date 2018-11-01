<?php 
	session_start();	
	include '../Model/Filter.php'; 
	include '../Model/Sky.php';
	include '../Model/CCD.php';
	include '../Model/Instrument.php';
	include '../Model/Observation.php';
	include '../Model/Graphics.php';

	$magnitude = isset($_POST['tMag'])? $_POST['tMag'] : 15;
	$nwp = $_POST['tNwp'];
	$wave = $_POST['tWave'];
	$dTel = $_POST['tTel'];
	$detector = $_POST['tCCD'];
	$focal = $_POST['tFocal'];
	$filter = $_POST['tFilter'];
	$tSky = $_POST['tSky'];
	$aperture = isset($_POST['tAperture'])? $_POST['tAperture']: 2;
	$sigmaP = isset($_POST['tSigmaP']) ? $_POST['tSigmaP']: 0;
	$time = isset($_POST['tTemp']) ? $_POST['tTemp']: 0;
	$mode = $_POST['tMode'];

	
	$filtro =  new Filter($filter);       
	
	$ccd = new CCD($detector, $filter);
	
	$instrument = new Instrument($nwp,$dTel,$focal,$ccd);
		
	$sky = new Sky($tSky,$filter, $instrument->getCCD()->getQuanTumEfficiency(), $filtro->getFluxZero(), $filtro->getFilterWidth(), $filtro->getEffectiveLenght(), $instrument->getAperture(), $instrument->getPlateScale());

	$observation = new Observation($instrument->getCCD()->getQuanTumEfficiency(), $sky->getTransparencySky(), $filtro->getFluxZero(), $filtro->getFilterWidth(), $filtro->getEffectiveLenght(), $instrument->getAperture(), $magnitude, $aperture);
	
 	if($mode==1)
 	{
 		$observation->setTimeExposure(1,$time);
 		if($wave=='1/2')
 		{
 			$observation->setSignalNoiseRadio(1,$observation->getNumberPhotons(), $time, $observation->getNumberPixels(), $sky->getNumberPhotons(), $instrument->getCCD()->getReadoutNoise(),$instrument->getCCD()->getGain());
			$observation->setSigmaP(1, $observation->getSignalNoiseRadio(),$nwp); 
 		}
 		elseif ($wave=='1/4')
 		{	
 			$observation->setSignalNoiseRadio(1,$observation->getNumberPhotons(), $time, $observation->getNumberPixels(), $sky->getNumberPhotons(), $instrument->getCCD()->getReadoutNoise(),$instrument->getCCD()->getGain());
			$observation->setSigmaP(2, $observation->getSignalNoiseRadio(),$nwp); 
			$observation->setSigmaV($observation->getSigmaP()); 
 		}
 	}
 	else
 	{
 		if($wave=='1/2')
 		{
 			$observation->setSigmaP(3,0,0,$sigmaP);
 			$observation->setSignalNoiseRadio(2,0,0,0,0,0,0,1,$sigmaP,$instrument->getNumberWavePlates());
 			$observation->setTimeExposure(2,0, $observation->getNumberPhotons(), $observation->getSignalNoiseRadio(), $observation->getNumberPixels(), $sky->getNumberPhotons(), $instrument->getCCD()->getReadoutNoise(), $instrument->getCCD()->getGain());
 		}
 		elseif ($wave=='1/4')
 		{
 			$observation->setSigmaP(3,0,0,$sigmaP);
 			$observation->setSigmaV($observation->getSigmaP());
 			$observation->setSignalNoiseRadio(2,0,0,0,0,0,0,sqrt(2),$sigmaP,$instrument->getNumberWavePlates());
 			$observation->setTimeExposure(2,0, $observation->getNumberPhotons(), $observation->getSignalNoiseRadio(), $observation->getNumberPixels(), $sky->getNumberPhotons(), $instrument->getCCD()->getReadoutNoise(), $instrument->getCCD()->getGain());
 		}

 	}


	$snr = $observation->getSignalNoiseRadio();
	$sigmaP = $observation->getSigmaP();
 	$sigmaV = $observation->getSigmaV();

 	$graph = new Graphics($observation, $sky, $instrument, $wave);
	$data = $graph->generateValues($observation->getTimeExposure(), $nwp, $wave);


 	//Keep the values

 	//Input values
	$_SESSION['inMag'] = $magnitude;
	$_SESSION['inNwp'] = $nwp;
	$_SESSION['inWave'] = $wave;
	$_SESSION['inDTel'] = $dTel;
	$_SESSION['inFocal'] = $focal;
	$_SESSION['inFilter'] = $filter; 
	$_SESSION['inTsky'] = $tSky;
	$_SESSION['inAperture'] = $aperture;

	if($mode == 1)
	{
		$_SESSION['inTime'] = $time;
		$_SESSION['inSigmaP']= 0;
	}
	else
	{
		$_SESSION['inTime'] = 0;
		$_SESSION['inSigmaP']= $sigmaP;
	}	

	//saving observation values
	$_SESSION['numberPixels'] = $observation->getNumberPixels();
	$_SESSION['numberPhotons'] =$observation->getNumberPhotons();
	$_SESSION['timeExposure'] = $observation->getTimeExposure();
	$_SESSION['snr'] = $snr;
	$_SESSION['sigmaP'] = $sigmaP;
 	$_SESSION['sigmaV'] = $sigmaV;


	//filter
	$_SESSION['fluxZero']= $filtro->getFluxZero();
 	$_SESSION['central'] = $filtro->getEffectiveLenght();
 	$_SESSION['band'] = $filtro->getFilterWidth();


	// instrument
	$_SESSION['quantumEfficiency'] = $instrument->getCCD()->getQuanTumEfficiency();
 	$_SESSION['gain'] = $instrument->getCCD()->getGain();
 	$_SESSION['readoutNoise'] = $instrument->getCCD()->getReadoutNoise();
 	$_SESSION['plateScale'] = $instrument->getPlateScale();
 	$_SESSION['nwp'] = $instrument->getNumberWavePlates();
 	$_SESSION['dTel'] = $instrument->getAperture();
 	$_SESSION['focalReducer'] = $instrument->getFocalReducer();

 	//SKY 
 	$_SESSION['tSky'] = $sky->getTransparencySky();
 	$_SESSION['magSky'] = $sky->getMagnitudeSky();
 	$_SESSION['nSky'] = $sky->getNumberPhotons();
 	$_SESSION['data'] = $data;

 	header("location: ../output.php");
?>






