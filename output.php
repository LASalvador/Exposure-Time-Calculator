 
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
	</style>
</head>
<body>
	<!-- Begin Output View -->
	<div class="output" id="answer">
		<!--Begin intermediate values -->
		<section id="intermediate-values">
				<h4>Quantum Efficiency</h4>
					<h5><? session_start(); isset($_SESSION['quantumEfficiency'])? echo $_SESSION['quantumEfficiency']: ''; ?></h5>
				<h4>Gain</h4>
					<h5><? session_start(); isset($_SESSION['gain'])?$_SESSION['gain']: '';?></h5>
				<h4>Readout Noise</h4>
					<h5><? session_start(); isset($_SESSION['readoutNoise'])?$_SESSION['readoutNoise']: ''; ?></h5>
				<h4>Zero magnitude flux</h4>
					<h5><? session_start(); isset($_SESSION['fluxZero'])?$_SESSION['fluxZero']: ''; ?></h5>
				<h4>Central wavelenght</h4>
					<h5><? session_start(); isset($_SESSION['central'])?$_SESSION['central']: ''; ?></h5>
				<h4>Band width</h4>
					<h5><? session_start(); isset($_SESSION['band'])?$_SESSION['band']: ''; ?></h5>
				<h4>Sky transparence</h4>
					<h5><? session_start(); isset($_SESSION['sky'])?$_SESSION['sky']: ''; ?></h5>
				<h4>Plate scale</h4>
					<h5><? session_start(); isset($_SESSION['plateScale'])?$_SESSION['plateScale']: ''; ?></h5>

		</section>
		<!-- End intermediate values -->
		<!-- Begin Final values -->
		<section class="values">
			<h4>Integration Time</h4>
				<h5><? session_start(); isset($_SESSION['time'])?$_SESSION['time']: '';?></h5>
			<h4>Sigmpa P</h4>
				<h5><?session_start(); isset($_SESSION['sigmaP'])?$_SESSION['sigmaP']: ''; ?></h5>
			<h4>Sigma V</h4>
				<h5><?session_start(); isset($_SESSION['sigmaV'])?$_SESSION['sigmaV']: ''; ?></h5>
			<h4>Signal Noise Radio</h4>
				<h5><?session_start(); isset($_SESSION['snr'])?$_SESSION['snr']: ''; ?></h5>
		</section>
		<!--End Final values -->
	</div>
	<!-- End Output View -->
</body> 
</html>