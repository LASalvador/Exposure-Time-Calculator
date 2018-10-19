<?php 
	session_start();	
	include '../Model/Filter.php'; 
	include '../Model/Sky.php';
	include '../Model/CCD.php';
	include '../Model/Instrument.php';
	include '../Model/Observation.php';

	$magnitude = isset($_POST['tMag'])? $_POST['tMag'] : 15;
	$time = isset($_POST['tTemp']) ? $_POST['tTemp']: 0;
	$nwp = $_POST['tNwp'];
	$wave = $_POST['tWave'];
	$sigmaP = isset($_POST['tSigmaP']) ? $_POST['tSigmaP']: 0;
	$sigmaV = isset($_POST['tSigmaV']) ? $_POST['tSigmaV']: 0;
	$dTel = $_POST['tTel'];
	$detector = $_POST['tCCD'];
	$focal = $_POST['tFocal'];
	$filter = $_POST['tFilter'];
	$moon = $_POST['tMoon'];
	$Sky = $_POST['tSky'];
	$aperture = isset($_POST['tAperture'])? $_POST['tAperture']: 2;

	echo '<h1>Input Values</h1>';
	echo 'magnitude'.$magnitude.'<br>';
	echo 'time'.$time.'<br>';
	echo 'NWP'.$nwp.'<br>';
	echo 'wave'.$wave.'<br>';
	echo 'SigmaP'.$sigmaP.'<br>';
	echo 'SigmaV'.$sigmaV.'<br>';
	echo 'dTel'.$dTel.'<br>';
	echo 'detector'.$detector.'<br>';
	echo 'focal reducer'.$focal.'<br>';
	echo 'filter'.$filter.'<br>'; 
	echo 'moonphase'.$moon.'<br>';
	echo 'sky quality'.$Sky.'<br>';
	echo 'aperture radius'.$aperture.'<br>';



	//create objects
	echo "<h1>Filter</h1>";
	$filtro =  new Filter($filter);       
	echo "effectiveLenght: ".$filtro->getEffectiveLenght().'<br>';
	echo "filterWidth: ".$filtro->getFilterWidth().'<br>';
	echo "fluxZero: ".$filtro->getFluxZero().'<br>';

	echo('<h1>CCD</h1>');
	$ccd = new CCD($detector, $filter);
	echo "QuantumEfficiency: ".$ccd->getQuanTumEfficiency().'<br>';
	echo "ReadoutNoise: ".$ccd->getReadoutNoise().'<br>';
	echo "Gain: ".$ccd->getGain().'<br>';
	echo "Number:".$ccd->getCCDNumber()."<br>";
	
	echo '<h1>Instrument</h1>';
	$instrument = new Instrument($nwp,$dTel,$focal,$ccd);
	echo 'NumberOfWavePlates '.$instrument->getNumberWavePlates().'<br>';
	echo 'Aperture '.$instrument->getAperture().'<br>';
	echo 'Focal Reducer: '.$instrument->getFocalReducer().'<br>';
	echo 'Plate Scale: '.$instrument->getPlateScale().'<br>';
	echo "QuantumEfficiency: ".$instrument->getCCD()->getQuanTumEfficiency().'<br>';
	echo "ReadoutNoise: ".$instrument->getCCD()->getReadoutNoise().'<br>';
	echo "Gain: ".$instrument->getCCD()->getGain().'<br>';	

	echo '<h1>SKY</h1>';
	$sky = new Sky($sky,$moon, $instrument->getCCD()->getQuanTumEfficiency(), $filtro->getFluxZero(), $filtro->getFilterWidth(), $filtro->getEffectiveLenght(), $instrument->getAperture(), $instrument->getPlateScale());
	echo 'Transparency'.$sky->getTransparencySky().'<br>';
	echo 'Magnitude'.$sky->getMagnitudeSky().'<br>';
	echo 'Number Of Photons: '.$sky->getNumberPhotons().'<br>';

	echo '<h1>Observation</h1>';
	$observation = new Observation($instrument->getCCD()->getQuanTumEfficiency(), $sky->getTransparencySky(), $filtro->getFluxZero(), $filtro->getFilterWidth(), $filtro->getEffectiveLenght(), $instrument->getAperture(), $magnitude, $aperture);
	echo 'Magnitude: '.$observation->getMagnitude().'<br>';
	echo 'Radius Aperture: '.$observation->getRadiusAperture().'<br>';
	echo 'Number pixels: '.$observation->getNumberPixels().'<br>';
	echo 'Number Photons: '.$observation->getNumberPhotons().'<br>';


 	if(isset($time) && $time!=0)
 	{
 		$observation->setTimeExposure(1,$time);
 		if($wave=='1/2')
 		{
 			$observation->setSignalNoiseRadio(1,$observation->getNumberPhotons(), $time, $observation->getNumberPixels(), $sky->getNumberPhotons(), $instrument->getCCD()->getReadoutNoise(),$instrument->getCCD()->getGain());
			$observation->setSigmaP(1, $observation->getSignalNoiseRadio(),$nwp); 
				//echo 'time'.$observation->getTimeExposure().'<br>';
				//echo 'SNR: '.$observation->getSignalNoiseRadio().'<br>';
				//echo 'sigmaP: '.$observation->getSigmaP().'<br>';
 
 		}
 		elseif ($wave=='1/4')
 		{
 			$observation->setSignalNoiseRadio($observation->getNumberPhotons(), $time, $observation->getNumberPixels(), $sky->getNumberPhotons(), $instrument->getCCD()->getReadoutNoise(),$instrument->getCCD()->getGain());
			$observation->setSigmaP(2, $observation->getSignalNoiseRadio(),$nwp); 
			$observation->setSigmaV(1, $observation->getSignalNoiseRadio(),$nwp); 

			//echo 'SNR: '.$observation->getSignalNoiseRadio().'<br>';
			//echo 'sigmaP: '.$observation->getSigmaP().'<br>';
			//echo 'sigmaV: '.$observation->getSigmaV().'<br>';
 		}
 	}
 	elseif( isset($sigmaP) && $sigmaP!=0)
 	{
 		$observation->setSigmaP(3,0,0,$sigmaP);
 		$observation->setSignalNoiseRadio(2,0,0,0,0,0,0, 1,$sigmaP,$nwp);
 		$observation->setTimeExposure(2,0, $observation->getNumberPhotons(), $observation->getSignalNoiseRadio(), $observation->getNumberPixels(), $sky->getNumberPhotons(), $instrument->getCCD()->getReadoutNoise(), $instrument->getCCD()->getGain());
 		

 	}
 	/*elseif (isset($sigmaV)) 
 	{
 		echo "entrei 3";
 		$observation->setSigmaV(2,0,0, $sigmaV);
 		$observation->setSignalNoiseRadio(2,0,0,0,0,0,0, 1/2,$sigmaP,$nwp);
 		$observation->setSigmaP(2, $observation->getSignalNoiseRadio(),$nwp); 
 		$observation->setTimeExposure(2,0, $observation->getNumberPhotons(), $observation->getSignalNoiseRadio(), $observation->getNumberPixels(), $sky->getNumberPhotons(), $instrument->getCCD()->getReadoutNoise(), $instrument->getCCD()->getGain());
 	}*/


 	echo 'time'.$observation->getTimeExposure().'<br>';
 	echo 'SNR: '.$observation->getSignalNoiseRadio().'<br>';
	echo 'sigmaP: '.$observation->getSigmaP().'<br>';
	echo 'sigmaV: '.$observation->getSigmaV().'<br>';

 	$_SESSION['quantumEfficiency'] = $instrument->getCCD()->getQuanTumEfficiency();
 	$_SESSION['gain'] = $instrument->getCCD()->getGain();
 	$_SESSION['readoutNoise'] = $instrument->getCCD()->getReadoutNoise();
 	$_SESSION['fluxZero']= $filtro->getFluxZero();
 	$_SESSION['central'] = $filtro->getEffectiveLenght();
 	$_SESSION['band'] = $filtro->getFilterWidth();
 	$_SESSION['sky'] = $sky->getTransparencySky();
 	$_SESSION['plateScale'] = $instrument->getPlateScale();

 	$_SESSION['time'] = $observation->getTimeExposure();
 	$_SESSION['sigmaP'] = $observation->getSigmaP();
 	$_SESSION['sigmaV'] = $observation->getSigmaV();
 	$_SESSION['snr'] = $observation->getSignalNoiseRadio(); 
	
	//header("location: ../output.php");
?>






