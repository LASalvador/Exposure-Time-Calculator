<?php 	
	include '../Model/Filter.php'; 
	include '../Model/Sky.php';
	include '../Model/CCD.php';

	$magnitude = $_POST['tMag'];
	$time = isset($_POST['tTemp']) ? $_POST['tTemp']: 0;
	$nwp = $_POST['tNwp'];
	$wave = $_POST['tWave'];
	$sigmaP = $_POST['tSigmaP'];
	$sigmaV = $_POST['tSigmaV'];
	$dTel = $_POST['tTel'];
	$detector = $_POST['tCCD'];
	$focal = $_POST['tFocal'];
	$filter = $_POST['tFilter'];
	$moon = $_POST['tMoon'];
	$Sky = $_POST['tSky'];
	$aperture = $_POST['tAperture'];

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

	echo '<h1>SKY</h1>';
	$sky = new Sky($sky,$moon);
	echo 'Transparency'.$sky->getTransparencySky().'<br>';
	echo 'Magnitude'.$sky->getMagnitudeSky().'<br>';

	echo('<h1>CCD</h1>');
	$ccd = new CCD($detector, $filter);
	echo "QuantumEfficiency: ".$ccd->getQuanTumEfficiency().'<br>';
	echo "ReadoutNoise: ".$ccd->getReadoutNoise().'<br>';
	echo "Gain: ".$ccd->getGain().'<br>';
	