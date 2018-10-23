 
<!DOCTYPE html>
<html>
<head>
	<title>Output</title>
	<meta charset="utf-8">
	<style>
	.output{
			background-color: #dddddd;
		}
	section.values{
		border-top: 1px solid #606060;
		border-bottom: 1px solid #606060;
	}
	footer{
		border-top: 1px solid #606060;
	}	
	</style>
</head>
<body>
	<!-- Begin Output View -->
	<div class="output">
		<!--Begin intermediate values -->
		<section id="intermediate-values">
			<h2> intermediate values</h2>
			<?php
				session_start();
				$quantum = isset($_SESSION['quantumEfficiency'])? $_SESSION['quantumEfficiency']: 0; 
				$gain = isset($_SESSION['gain'])?$_SESSION['gain']: 0;
				$readoutNoise = isset($_SESSION['readoutNoise'])?$_SESSION['readoutNoise']: 0;
				$fluxZero = isset($_SESSION['fluxZero'])?$_SESSION['fluxZero']: 0;
				$central = isset($_SESSION['central'])?$_SESSION['central']: 0;
				$band = isset($_SESSION['band'])?$_SESSION['band']: 0;
				$sky = isset($_SESSION['tSky'])?$_SESSION['tSky']: 0;
				$plateScale = isset($_SESSION['plateScale'])?$_SESSION['plateScale']: 0; 
				
				 echo "<h4>Quantum Efficiency<h5></h4>";
				 echo $quantum;
				 echo "<h4>Gain</h4>";
				 echo $gain;
				 echo "<h4>Readout Noise</h4>";
				 echo $readoutNoise;
				 echo "<h4>Zero magnitude flux</h4>";
				 echo $fluxZero;
				 echo "<h4>Central wavelenght</h4>";
				 echo $central;
				 echo "<h4>Band width</h4>";
				 echo $band;
				 echo "<h4>Sky transparence</h4>";
				 echo $sky;
				 echo "<h4>Plate scale</h4>";
				 echo $plateScale;
			?>		

		</section>
		<!-- End intermediate values -->
		<!-- Begin Final values -->
		<section class="values">
			<h2> Final values</h2>
			<?php
				session_start();
				$time = isset($_SESSION['timeExposure']) ? $_SESSION['timeExposure'] : 0;
				$sigmaP = isset($_SESSION['sigmaP']) ? $_SESSION['sigmaP']: 0;
				$sigmaV = isset($_SESSION['sigmaV']) ? $_SESSION['sigmaV']: 0; 
				$snr = isset($_SESSION['snr']) ? $_SESSION['snr']: 0;

				echo "<h4>Integration Time</h4>";
				echo $time;
				echo "<h4>Sigma P</h4>";
				echo number_format($sigmaP,2);
				echo "<h4>Sigma V</h4>";
				echo number_format($sigmaV,2);
				echo "<h4>Signal Noise Radio</h4>";
				echo number_format($snr,2);
			?>
		</section>
		<!--End Final values -->
	</div>
	<?php
			session_start();
			echo '<h1>Input Values</h1>';
			echo 'Magnitude: '.$_SESSION['inMag'].'<br>';
			echo 'Time: '.$_SESSION['inTime'] .'<br>';
			echo 'Number Of WavePlates: '.$_SESSION['inNwp'].'<br>';
			echo 'Wave: '.$_SESSION['inWave'].'<br>';
			echo 'SigmaP: '.$_SESSION['inSigmaP'].'<br>';
			echo 'Telescope Diameter: '.$_SESSION['inDTel'].'<br>';
			echo 'Focal Reducer: '.$_SESSION['inFocal'].'<br>';
			echo 'Filter: '.$_SESSION['inFilter'].'<br>'; 
			echo 'Sky quality: '.$_SESSION['inTsky'].'<br>';
			echo 'Aperture radius: '.$_SESSION['inAperture'].'<br>';

			//observation
			echo '<h1>Observation</h1>';
			echo 'Magnitude: '.$_SESSION['inMag'].'<br>';
			echo 'Radius Aperture: '.$_SESSION['inAperture'].'<br>';
			echo 'Number pixels: '.number_format($_SESSION['numberPixels'],2).'<br>';
			echo 'Number Photons: '.number_format($_SESSION['numberPhotons'],2).'<br>';
		 	echo 'Integration time: '.number_format($_SESSION['timeExposure'],2).'<br>';
		 	echo 'SNR: '.number_format($_SESSION['snr'],2).'<br>';
			echo 'sigmaP: '.number_format($_SESSION['sigmaP'],2).'<br>';
			echo 'sigmaV: '.number_format($_SESSION['sigmaV'],2).'<br>';
			//filter
			echo '<h1>Filter</h1>';
			echo "effectiveLenght: ".$_SESSION['band'].'<br>';
			echo "filterWidth: ".$_SESSION['band'].'<br>';
			echo "fluxZero: ".$_SESSION['fluxZero'].'<br>';
			
			// instrument
			echo '<h1>Instrument</h1>';
			echo 'NumberOfWavePlates '.$_SESSION['nwp'].'<br>';
			echo 'Telescope Diameter:'.$_SESSION['dTel'].'<br>';
			echo 'Focal Reducer: '.$_SESSION['focalReducer'].'<br>';
			echo 'Plate Scale: '.$_SESSION['plateScale'].'<br>';
			echo "QuantumEfficiency: ".$_SESSION['quantumEfficiency'].'<br>';
			echo "ReadoutNoise: ".$_SESSION['readoutNoise'].'<br>';
			echo "Gain: ".$_SESSION['gain'].'<br>';


			echo '<h1>Sky</h1>';
			echo 'Transparency: '.$_SESSION['tSky'].'<br>';
			echo 'Sky magnitude: '.$_SESSION['magSky'].'<br>';
			echo 'Number Of Photons: '.number_format($_SESSION['nSky'],2).'<br>';
	?>
	<!-- End Output View -->

	<footer>
		<p>Calculated by Exposure Time Calculator/IAGPOL</p>
		<?php 	echo "<p>".date("m/d/Y")."</p>";?>
		<p>Developed in CEA/INPE</p>
	</footer>
</body> 
</html>