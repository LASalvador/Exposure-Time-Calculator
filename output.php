 <?php 
 	session_start();

 	include './libs/phplot-6.2.0/phplot.php';


	$quantum = isset($_SESSION['quantumEfficiency'])? $_SESSION['quantumEfficiency']: 0; 
	$gain = isset($_SESSION['gain'])?$_SESSION['gain']: 0;
	$readoutNoise = isset($_SESSION['readoutNoise'])?$_SESSION['readoutNoise']: 0;
	$fluxZero = isset($_SESSION['fluxZero'])?$_SESSION['fluxZero']: 0;
	$central = isset($_SESSION['central'])?$_SESSION['central']: 0;
	$band = isset($_SESSION['band'])?$_SESSION['band']: 0;
	$sky = isset($_SESSION['tSky'])?$_SESSION['tSky']: 0;
	$plateScale = isset($_SESSION['plateScale'])?$_SESSION['plateScale']: 0; 
	$time = isset($_SESSION['timeExposure']) ? $_SESSION['timeExposure'] : 0;
	$sigmaP = isset($_SESSION['sigmaP']) ? $_SESSION['sigmaP']: 0;
	$sigmaV = isset($_SESSION['sigmaV']) ? $_SESSION['sigmaV']: 0; 
	$snr = isset($_SESSION['snr']) ? $_SESSION['snr']: 0;
	$data = $_SESSION['data'];


	function annotate_plot($img, $plot)
	{
		global $time, $sigmaP;
		# Allocate our own colors, rather than poking into the PHPlot object:
		$green = imagecolorresolve($img, 0, 216, 0);
		# Get the pixel coordinates of the data points for the best and worst:
		list($time_x, $sigma_y) = $plot->GetDeviceXY($time, $sigmaP);
		# Draw ellipses centered on those two points:
		imageellipse($img, $time_x, $sigma_y, 50, 20, $green);
		# Place some text above the points:
		$font = '3';
		$fh = imagefontheight($font);
		$fw = imagefontwidth($font);
		//imagestring($img, $font, $time_x-$fw*4, $sigma_y-$fh-10,'', $green);
		//$plot->DrawText('', 0, $time $sigmaP-10, $green,'Bad News!', 'center', 'bottom');
	}

	$plot = new PHPlot(1200,600);
	$plot->SetFailureImage(False); // No error images
	$plot->SetPrintImage(False); // No automatic output
	$plot->SetDataValues($data);
	$plot->SetDataType('data-data');
	$plot->SetTitle("Polarization Error X Time");
	$plot->SetXLabelType('data');
	$plot->SetXTitle("Integration Time (s)");
	$plot->SetPrecisionX(0)
;	$plot->SetYLabelType('data');
	$plot->SetYTitle("Polarization Error (%)");
	$plot->SetPrecisionY(2);
	//$plot->SetYDataLabelPos('plotin');

	//$plot->SetFontTTF('x_title', 'liberation/LiberationSans-Regular.ttf', 12);
	//$plot->SetFontTTF('y_title', 'liberation/LiberationSans-Regular.ttf', 12);
	//$plot->SetFontTTF('x_label', 'liberation/LiberationSans-Regular.ttf', 11);
	//$plot->SetFontTTF('y_label', 'liberation/LiberationSans-Regular.ttf', 11);

	# Force the bottom of the plot to be at Y=0, and omit
	# the bottom "$0M" tick label because it looks odd:
	$plot->SetPlotAreaWorld(NULL, 0);
	$plot->SetSkipBottomTick(True);

	# Establish the drawing callback to do the annotation:
	$plot->SetCallback('draw_all', 'annotate_plot', $plot);

	$plot->DrawGraph();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ETC Results</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/css-output.css">
</head>
<body>
	<!-- Begin Output View -->
	<div class="output">
		<!-- Begin Final values -->
		<section class="values">
			<h2> Final values</h2>
			<?php
				echo '<span>Integration time:</span> '.$time.' s<br>';
				echo '<span>Error of the linear polarization:</span> '.number_format($sigmaP,2).' %<br>';
				if($sigmaV!=0)
				{
					echo '<span>Error of the circular polarization:</span> '.number_format($sigmaV,2).' %<br>';
				}	
				echo '<span>Signal to noise ratio:</span> '.number_format($snr,2).'<br>';
			?>
		</section>
		<!--End Final values -->
		<!-- Begin Input values -->
		<section>
			<h4>Input Values</h4>
			<?php
				session_start();
				echo 'Magnitude: '.$_SESSION['inMag'].' mag<br>';
				if($_SESSION['inTime']!=0)
				{
					echo 'Integration time: '.$_SESSION['inTime'] .' s<br>';
				}
				echo 'Number of Waveṕlate position: '.$_SESSION['inNwp'].'<br>';
				echo 'Waveplate: '.$_SESSION['inWave'].'<br>';
				if($_SESSION['inSigmaP']!=0)
				{
					echo 'Error of the linear polarization: '.$_SESSION['inSigmaP'].' %<br>';
				}
				echo 'Telescope Diameter: '.$_SESSION['inDTel'].' m<br>';
				if($_SESSION['inFocal']==0)
				{
					echo 'Focal Reducer: No <br>';
				}
				else
				{
					echo 'Focal Reducer: Yes <br>';
				}
				echo 'Filter: '.$_SESSION['inFilter'].'<br>'; 
				echo 'Sky quality: '.$_SESSION['inTsky'].'<br>';
				echo 'Aperture radius: '.$_SESSION['inAperture'].' arcsec<br>';
			?>
		</section>
		<!-- End final values -->
		<!--Begin intermediate values -->
		<section id="intermediate-values">
			<h4>Intermediate values</h4>
			<?php
				session_start();
				//observation
				echo 'Number of pixels corresponding to the aperture radius: '.number_format($_SESSION['numberPixels'],2).'<br>';
				echo 'Number of photons from the source per second: '.number_format($_SESSION['numberPhotons'],2).'<br>';
				//filter
				echo 'Filter effective wavelength: '.$_SESSION['central'].'<br>';
				echo 'Filter width: '.$_SESSION['band'].' micron<br>';
				echo 'Flux of zero magnitude: '.$_SESSION['fluxZero'].' 10<sup>-23</sup>W m<sup>-2</sup> Hz<sup>-1</sup><br>';
				// instrument
				echo 'Plate scale: '.$_SESSION['plateScale'].' arcsec/pix<br>';
				echo 'Quantum efficiency: '.$_SESSION['quantumEfficiency'].'<br>';
				echo 'Readout noise: '.$_SESSION['readoutNoise'].' e<sup>-</sup><br>';
				echo 'Gain: '.$_SESSION['gain'].' e<sup>-</sup>/ADU<br>';
				echo 'Sky Transparency: '.$_SESSION['tSky'].'<br>';
				echo 'Sky magnitude: '.$_SESSION['magSky'].' mag<br>';
				echo 'Number of photons from the sky per second: '.number_format($_SESSION['nSky'],2).'<br>';
			?>
		</section>
		<!-- End intermediate values -->	
		<img src="<?php echo $plot->EncodeImage();?>" alt="Graph Polarization Error X Time">
	<!-- End Output View -->
	</div>
	<footer>
		<p>Calculated by Exposure Time Calculator/IAGPOL</p>
		<?php 	echo "<p>".date("F j, Y, g:i:s a")."</p>";?>
		<p>Developed in CEA/INPE</p>
	</footer>
</body> 
</html>