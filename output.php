 
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
	}
	h5{
		color: #000000;
	}
	</style>
</head>
<body>
	<!-- Begin Output View -->
	<div class="output">
		<!--Begin intermediate values -->
		<section id="intermediate-values">
			<?php
				session_start();
				$quantum = isset($_SESSION['quantumEfficiency'])? $_SESSION['quantumEfficiency']: 0; 
				$gain = isset($_SESSION['gain'])?$_SESSION['gain']: 0;
				$readoutNoise = isset($_SESSION['readoutNoise'])?$_SESSION['readoutNoise']: 0;
				$fluxZero = isset($_SESSION['fluxZero'])?$_SESSION['fluxZero']: 0;
				$central = isset($_SESSION['central'])?$_SESSION['central']: 0;
				$band = isset($_SESSION['band'])?$_SESSION['band']: 0;
				$sky = isset($_SESSION['sky'])?$_SESSION['sky']: 0;
				$plateScale = isset($_SESSION['plateScale'])?$_SESSION['plateScale']: 0; 
				
				 echo "<h4>Quantum Efficiency</h4>";
				 echo "<h5>".$quantum."</h5>";
				 echo "<h4>Gain</h4>";
				 echo "<h5>".$gain."</h5>";
				 echo "<h4>Readout Noise</h4>";
				 echo "<h5>".$readoutNoise."</h5>";
				 echo "<h4>Zero magnitude flux</h4>";
				 echo "<h5>".$fluxZero."</h5>";
				 echo "<h4>Central wavelenght</h4>";
				 echo "<h5>".$central."</h5>";
				 echo "<h4>Band width</h4>";
				 echo "<h5>".$band."</h5>";
				 echo "<h4>Sky transparence</h4>";
				 echo "<h5>".$sky."</h5>";
				 echo "<h4>Plate scale</h4>";
				 echo "<h5>".$plateScale."</h5>";
			?>		

		</section>
		<!-- End intermediate values -->
		<!-- Begin Final values -->
		<section class="values">
			<?php
				session_start();
				$time = isset($_SESSION['time']) ? $_SESSION['time'] : 0;
				$sigmaP = isset($_SESSION['sigmaP']) ? $_SESSION['sigmaP']: 0;
				$sigmaV = isset($_SESSION['sigmaV']) ? $_SESSION['sigmaV']: 0; 
				$snr = isset($_SESSION['snr']) ? $_SESSION['snr']: 0;

				echo "<h4>Integration Time</h4>";
				echo "<h5>".$time."</h5>";
				echo "<h4>Sigma P</h4>";
				echo "<h5>".$sigmaP."</h5>";
				echo "<h4>Sigma V</h4>";
				echo "<h5>".$sigmaV."</h5>";
				echo "<h4>Signal Noise Radio</h4>";
				echo "<h5>".$snr."</h5>";

				echo "Calculated by Exposure Time Calculator/IAGPOL<br>";
				echo date ("d-m-Y")."<br>";
				echo "link";
			?>
		</section>
		<!--End Final values -->
	</div>
	<!-- End Output View -->
</body> 
</html>