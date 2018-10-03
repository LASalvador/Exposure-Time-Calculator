<?php include($_SERVER['DOCUMENT_ROOT']."/include/functions.php"); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" dir="ltr">
<head>
	<title>INPE/ETC</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="/img/favicon.png" />

	<link media="screen" href="/css/plone.css" type="text/css" rel="stylesheet" id="plone-css" />    
	<link media="all" href="/css/main.css" type="text/css" rel="stylesheet" id="main-css" />  
	<link media="all" href="/css/style.css" type="text/css" rel="stylesheet" id="style-css" />

	<link media="all" href="/css/css-intranet-inpe.css" rel="stylesheet" id="intranet-css" /> 
	<link media="all" href="/css/css-menu.css" rel="stylesheet" id="menu-css" /> 
	<link media="all" rel="stylesheet" type="text/css" href="/css/css-servico-inpe.css"/>
	<link media="all" href="/css/css-branco-inpe.css" rel="stylesheet">   

	<!-- CONTRASTE -->
	<link media="all" href="/css/css-intranet-inpe-contraste.css" rel="stylesheet" id="intranet-css-contraste" /> 
	<link media="all" href="/css/css-menu-contraste.css" rel="stylesheet" id="menu-css-contraste" /> 

	<script src="/js/jquery/jquery-1.9.1.js" type="application/javascript"></script>  
	<script src="/js/jquery/jquery.cookie.js" type="application/javascript"></script>  
	<script src="/js/functions.js" type="application/javascript"></script>

	<!-- css do modal -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>  
	<!-- JS do Modal-->
	<script type="text/javascript" src="/js/modal.js"></script>
	<style>
		.city {display:none}
		table{
			border: 1px solid #606060 ;
			border-spacing: 0px;
		}
		table td{
			border: 1px solid #606060 ;
			margin: 2px;
			padding: 5px;
		}
	</style>


</head>

<body>
	<!-- TOPO -->    
	<?php include($_SERVER['DOCUMENT_ROOT']."/topo.php"); ?>


	<!-- CONTEUDO -->
	<div id="main" role="main">
		<div id="plone-content">

			<div id="portal-columns" class="row">

				<!-- RASTRO -->
				<div id="viewlet-above-content">
					<div id="portal-breadcrumbs">
						<span id="breadcrumbs-you-are-here">
							Você está aqui: 
							<span>
								<?= rastro();?>
							</span>
						</span>
					</div>
				</div>


				<!-- Column 1 - MENU -->      
				<?php include($_SERVER['DOCUMENT_ROOT']."/menu.php"); ?>	

				<!-- Conteudo -->
				<div id="portal-column-content" class="cell width-3:4 position-1:4">

					<div id="main-content">    
						<div id="content">

							<h1 class="documentFirstHeading">Exposure Time Calculator</h1>
							<section>
								<!-- Introduction -->
								<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
	                            <br/>
                            </section>
                            <strong>ETC</strong>
							<br>
							<!-- Begging of Form -->
							<form method="post" id="fEtc" action="">
								<fieldset>
									<p>
										<label for="cMag">Magnitude</label><br>
										<input type="Number" name="tMag" id="cMag" placeholder="15" min="0" max="23" /><font>mag</font>
									</p>
									<p>
										<label for="tTemp">Time Integration</label><br>
										<input type="Number" name="tTemp" id="cTemp" placeholder="60" min=0 max="100.000" /><font>s</font>
									</p>
									<p>
										<label for="">Number of WavePlate</label>
										<br>
										<select id="cNwp">
											<option value="4">4</option>
											<option value="8" selected="selected">8</option>
											<option value="12">12</option>
											<option value="16">16</option>
										</select>
									</p>
									<p>
										<label>WavePlate</label><br>
										<input type="radio" name="tWave" id="cWave1" checked="checked" />
											<label for="cWave1">1/2 waveplate</label>
											<input type="radio" name="tWave" id="cWave2"/>
											<label for="cWave2">1/4 waveplate</label>
									</p>
									<p>
										<label for="cSigma">Sigma P</label>
										<input type="Number" name="tSigma" id="cSigmaP" placeholder="0.1" min=0 max=100 />
										<font>%</font> &nbsp; &nbsp;&nbsp;&nbsp;
										<label for="cSigma">Sigma V</label>
										<input type="Number" name="tSigma" id="cSigmaV" placeholder="0.1" min=0 max=100/>
										<font>%</font>
									</p>
									<p>
										<label>Telescope</label><br>
										<input type="radio" name="tTel" id="cTel1">
										<label for="cTel1">0.6m</label>
										<input type="radio" name="tTel" id="cTel2" checked>
										<label for="cTel2">1.6m</label>
									</p>
									<p>
										<label for="">Detector</label>
										<br>

										<a onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-gray">Click to Choice a CCD</a>
										<div id="id01" class="w3-modal">
										 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
										  <header class="w3-container w3-blue"> 
										   <span onclick="document.getElementById('id01').style.display='none'" 
										   class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
										   <h2>CCDs</h2>
										  </header>
										  <!-- Realiza as transições de tabs -->
										  <div class="w3-bar w3-border-bottom">
										   <a class="tablink w3-bar-item w3-button" onclick="openCity(event, '105')">CCD 105</a>
										   <a class="tablink w3-bar-item w3-button" onclick="openCity(event, '106')">CCD 106</a>
										   <a class="tablink w3-bar-item w3-button" onclick="openCity(event, 'iKon-L936-BV')">iKon-L936-BV</a>
										   <a class="tablink w3-bar-item w3-button" onclick="openCity(event, 'iKon-L936-EX')">iKon-L936-EX</a>
										   <a class="tablink w3-bar-item w3-button" onclick="openCity(event, 'iKon-L936-BR')">iKon-L936-BR</a>
										   <a class="tablink w3-bar-item w3-button" onclick="openCity(event, 'iXon-DU-888E-C00-#BV')">iXon-DU-888E-C00-#BV</a>
										  </div>
										  

										  <div id="105" class="w3-container city">
										   <h1> CCD - 105</h1>
										   <table id="105-1">
											   	<tr>
											   		<td>Type</td>
											   		<td colspan="2">Marconi CCD42-40-1-368</td>
											   	</tr>
											   	<tr>
											   		<td> Image Size[pixels]</td>
											   		<td> 2048 X 2048</td>
											   	</tr>
											   	<tr>
											   		<td> Pixel Size[microns]</td>
											   		<td> 13,5 X 13,5</td>
											   	</tr>
											   	<tr>
											   		<td> Dark current [e-/pixel/s]</td>
											   		<td> 1.5X10<sup>-4</sup></td>
											   	</tr>
											   	<tr>
											   		<td>Saturation</td>
											   		<td> 9X10<sup>4</sup></td>
											   	</tr>
											   	<tr>
											   		<td>Controller</td>
											   		<td>WI Mark2e</td>
											   	</tr>
										   </table>
										   <table id="105-2">
										   	<tr>
										   		<td>Mode</td>
										   		<td>Readout Noise</td>
										   		<td>Gain</td>
										   	</tr>
										   	<tr>
										   		<td>Slow</td>
										   		<td>2.5</td>
										   		<td>2.5</td>
										   	</tr>
										   	<tr>
										   		<td>Fast</td>
										   		<td>4.0</td>
										   		<td>2.5</td>
										   	</tr>
										   </table>
										  </div>

										  <div id="106" class="w3-container city">
										   <h1>CCD - 106</h1>
										   	<table id="106-1">
										   	<tr>
										   		<td>Type</td>
										   		<td colspan="2">SITe SI003AB</td>
										   	</tr>
										   	<tr>
										   		<td> Image Size[pixels]</td>
										   		<td> 1024 X 1024</td>
										   	</tr>
										   	<tr>
										   		<td> Pixel Size[microns]</td>
										   		<td> 24 X 24</td>
										   	</tr>
										   	<tr>
										   		<td> Dark current [e-/pixel/s]</td>
										   		<td> 43 at 170K</td>
										   	</tr>
										   	<tr>
										   		<td>Saturation</td>
										   		<td>230K</td>
										   	</tr>
										   	<tr>
										   		<td>Controller</td>
										   		<td>WI Mark2e</td>
										   	</tr>
										   </table>
										   <table id="106-2">
										   	<tr>
										   		<td>Mode</td>
										   		<td>Readout Noise</td>
										   		<td>Gain</td>
										   	</tr>
										   	<tr>
										   		<td>Slow</td>
										   		<td>4.1</td>
										   		<td>5.0</td>
										   	</tr>
										   	<tr>
										   		<td>Fast</td>
										   		<td>9.5</td>
										   		<td>5.0</td>
										   	</tr>
										   </table>
										  </div>

										  <div id="iKon-L936-BV" class="w3-container city">
										   <h1>CCD - iKon-L936-BV </h1>
										   <table id="BV-1">
										   		<tr>
										   			<td>Type</td>
										   			<td>E2V CCD42-40</td>
										   		</tr>
										   		<tr>
										   			<td>Image Size[pixels]</td>
										   			<td>2048 X 2048</td>
										   		</tr>
										   		<tr>
										   			<td>Pixel Size[microns]</td>
										   			<td>13.5 X 13.5</td>
										   		</tr>
										   </table>
										   <br>
										   <table id="BV-2">
										   		<tr>
										   			<td><p>A/D Rate Mhz - all 16 bit</p></td>
										   			<td>Preamp setting</td>
										   			<td><P>CCD sensitivity e-per A/D count</p></td>
										   			<td><p>Single Pixel Noise(rms)</p></td>
										   			<td><p>Base Mean Level</p></td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>7.1</td>
										   			<td>68.8</td>
										   			<td>2118</td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>4.0</td>
										   			<td>50.9</td>
										   			<td>3205</td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>2.0</td>
										   			<td>32.3</td>
										   			<td>4795</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td> 3.5</td>
										   			<td>28.2</td>
										   			<td>1363</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>18.3</td>
										   			<td>1769</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.1</td>
										   			<td>2119</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>11.2</td>
										   			<td>855</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>6.9</td>
										   			<td>875</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>0.9</td>
										   			<td>6.0</td>
										   			<td>887</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.4</td>
										   			<td>4.1</td>
										   			<td>836</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>3.2</td>
										   			<td>858</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 4</td>
										   			<td>0.9</td>
										   			<td>2.9</td>
										   			<td>897</td>
										   		</tr>
										   </table>
										   <table id="BV-3">
										   		<td><p>A/D Rate Mhz - all 16 bit</p></td>
										   			<td>Preamp setting</td>
										   			<td><P>CCD sensitivity e-per A/D count</p></td>
										   			<td><p>Single Pixel Noise(rms)</p></td>
										   			<td><p>Base Mean Level</p></td>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>6.1</td>
										   			<td>56.3</td>
										   			<td>2196</td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>3.3</td>
										   			<td>35.0</td>
										   			<td>3340</td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>1.8</td>
										   			<td>29.7</td>
										   			<td>4983</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td>3.7</td>
										   			<td>26.6</td>
										   			<td>1335</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>2.0</td>
										   			<td>16.6</td>
										   			<td>1756</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.2</td>
										   			<td>2094</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>9.2</td>
										   			<td>930</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>7.7</td>
										   			<td>909</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>6.3</td>
										   			<td>839</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>3.9</td>
										   			<td>873</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>3.3</td>
										   			<td>852</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>3.1</td>
										   			<td>813</td>
										   		</tr>
										   </table>
										  </div>

										  <div id="iKon-L936-EX" class="w3-container city">
											<h1> CCD - iKon-L936-EX</h1>
											<table id="EX-1">
										   		<tr>
										   			<td>Type</td>
										   			<td>E2V CCD42-40</td>
										   		</tr>
										   		<tr>
										   			<td>Image Size[pixels]</td>
										   			<td>2048 X 2048</td>
										   		</tr>
										   		<tr>
										   			<td>Pixel Size[microns]</td>
										   			<td>13.5 X 13.5</td>
										   		</tr>
										   </table>
										   <br>
										   <table id="EX-2">
										   		<tr>
										   			<td><p>A/D Rate Mhz - all 16 bit</p></td>
										   			<td>Preamp setting</td>
										   			<td><P>CCD sensitivity e-per A/D count</p></td>
										   			<td><p>Single Pixel Noise(rms)</p></td>
										   			<td><p>Base Mean Level</p></td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>7.1</td>
										   			<td>68.8</td>
										   			<td>2118</td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>4.0</td>
										   			<td>50.9</td>
										   			<td>3205</td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>2.0</td>
										   			<td>32.3</td>
										   			<td>4795</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td> 3.5</td>
										   			<td>28.2</td>
										   			<td>1363</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>18.3</td>
										   			<td>1769</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.1</td>
										   			<td>2119</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>11.2</td>
										   			<td>855</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>6.9</td>
										   			<td>875</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>0.9</td>
										   			<td>6.0</td>
										   			<td>887</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.4</td>
										   			<td>4.1</td>
										   			<td>836</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>3.2</td>
										   			<td>858</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 4</td>
										   			<td>0.9</td>
										   			<td>2.9</td>
										   			<td>897</td>
										   		</tr>
										   </table>
										   <table id="EX-3">
										   		<td><p>A/D Rate Mhz - all 16 bit</p></td>
										   			<td>Preamp setting</td>
										   			<td><P>CCD sensitivity e-per A/D count</p></td>
										   			<td><p>Single Pixel Noise(rms)</p></td>
										   			<td><p>Base Mean Level</p></td>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>6.1</td>
										   			<td>56.3</td>
										   			<td>2196</td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>3.3</td>
										   			<td>35.0</td>
										   			<td>3340</td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>1.8</td>
										   			<td>29.7</td>
										   			<td>4983</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td>3.7</td>
										   			<td>26.6</td>
										   			<td>1335</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>2.0</td>
										   			<td>16.6</td>
										   			<td>1756</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.2</td>
										   			<td>2094</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>9.2</td>
										   			<td>930</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>7.7</td>
										   			<td>909</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>6.3</td>
										   			<td>839</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>3.9</td>
										   			<td>873</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>3.3</td>
										   			<td>852</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>3.1</td>
										   			<td>813</td>
										   		</tr>
										   </table>
										  </div>

										  <div id="iKon-L936-BR" class="w3-container city">
										    <h1>CCD - iKon-L936-BR</h1>
										     <table id="BR-1">
										   		<tr>
										   			<td>Type</td>
										   			<td>E2V CCD42-40</td>
										   		</tr>
										   		<tr>
										   			<td>Image Size[pixels]</td>
										   			<td>2048 X 2048</td>
										   		</tr>
										   		<tr>
										   			<td>Pixel Size[microns]</td>
										   			<td>13.5 X 13.5</td>
										   		</tr>
										   </table>
										   <br>
										   <table id="BR-2">
										   		<tr>
										   			<td><p>A/D Rate Mhz - all 16 bit</p></td>
										   			<td>Preamp setting</td>
										   			<td><P>CCD sensitivity e-per A/D count</p></td>
										   			<td><p>Single Pixel Noise(rms)</p></td>
										   			<td><p>Base Mean Level</p></td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>7.1</td>
										   			<td>68.8</td>
										   			<td>2118</td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>4.0</td>
										   			<td>50.9</td>
										   			<td>3205</td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>2.0</td>
										   			<td>32.3</td>
										   			<td>4795</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td> 3.5</td>
										   			<td>28.2</td>
										   			<td>1363</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>18.3</td>
										   			<td>1769</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.1</td>
										   			<td>2119</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>11.2</td>
										   			<td>855</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>6.9</td>
										   			<td>875</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>0.9</td>
										   			<td>6.0</td>
										   			<td>887</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.4</td>
										   			<td>4.1</td>
										   			<td>836</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>3.2</td>
										   			<td>858</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 4</td>
										   			<td>0.9</td>
										   			<td>2.9</td>
										   			<td>897</td>
										   		</tr>
										   </table>
										   <table id="BR-3">
										   		<td><p>A/D Rate Mhz - all 16 bit</p></td>
										   			<td>Preamp setting</td>
										   			<td><P>CCD sensitivity e-per A/D count</p></td>
										   			<td><p>Single Pixel Noise(rms)</p></td>
										   			<td><p>Base Mean Level</p></td>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>6.1</td>
										   			<td>56.3</td>
										   			<td>2196</td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>3.3</td>
										   			<td>35.0</td>
										   			<td>3340</td>
										   		</tr>
										   		<tr>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>1.8</td>
										   			<td>29.7</td>
										   			<td>4983</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td>3.7</td>
										   			<td>26.6</td>
										   			<td>1335</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>2.0</td>
										   			<td>16.6</td>
										   			<td>1756</td>
										   		</tr>
										   		<tr>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.2</td>
										   			<td>2094</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>9.2</td>
										   			<td>930</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>7.7</td>
										   			<td>909</td>
										   		</tr>
										   		<tr>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>6.3</td>
										   			<td>839</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>3.9</td>
										   			<td>873</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>3.3</td>
										   			<td>852</td>
										   		</tr>
										   		<tr>
										   			<td>0.05</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>3.1</td>
										   			<td>813</td>
										   		</tr>
										   </table>
										  </div>
										  <div id="iXon-DU-888E-C00-#BV" class="w3-container city">
										    <h1>CCD - iXon-DU-888E-C00-#BV</h1>
										    <table id="iXon-1">
										    	<tr>
										    		<td>Image Size[pixels]</td>
										    		<td>1024 X 1024</td>
										    	</tr>
										    	<tr>
										    		<td>Pixel Size[microns]</td>
										    		<td>13,0 X 13,0</td>
										    	</tr>
										    </table>
										    <table id="iXon-2">
										    	<tr>
										    		<td>A/D Rate</td>
										    		<td>Preamp setting</td>
										    		<td>CCD Sensitivity</td>
										    		<td>Single Pixel Noise</td>
										    		<td>Base Mean Level</td>
										    	</tr>
										    	<tr>
										    		<td rowspan="2">10MHz 14bit EM Amplifier</td>
										    		<td>X2.4</td>
										    		<td>21.9</td>
										    		<td>52.9</td>
										    		<td>383</td>
										    	</tr>
										    	<tr>
										    		<td>x 5.0</td>
										    		<td>10.3</td>
										    		<td>47.3</td>
										    		<td>373</td>
										    	</tr>
										    	<tr>
										    		<td rowspan="3">5MHz 14 bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>48.2</td>
										    		<td>72.5</td>
										    		<td>396</td>
										    	</tr>
										    	<tr>
										    		<td>x 2.4</td>
										    		<td>19.4</td>
										    		<td>45</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td>x 5.0</td>
										    		<td>8.8</td>
										    		<td>35.7</td>
										    		<td>406</td>
										    	</tr>
										    	<tr>
										    		<td rowspan="3">3MHz 14bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>47.8</td>
										    		<td>53.1</td>
										    		<td>407</td>
										    	</tr>
										    	<tr>
										    		<td>x 2.4</td>
										    		<td>19.3</td>
										    		<td>32.4</td>
										    		<td>405</td>
										    	</tr>
										    	<tr>
										    		<td>x 5.0</td>
										    		<td>8.6</td>
										    		<td>26.6</td>
										    		<td>405</td>
										    	</tr>
										   		<tr>
										   			<td>1MHz 16 bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>18.5</td>
										    		<td>31.4</td>
										    		<td>4000</td>
										    	</tr>
										    	<tr>
										    		<td>x 2.4</td>
										    		<td>7.5</td>
										    		<td>19.5</td>
										    		<td>400</td>
										    	</tr>
										    	<tr>
										    		<td>x 5.0</td>
										    		<td>3.4</td>
										    		<td>16.5</td>
										    		<td>399</td>
										    	</tr>
										    	<tr>
										    		<td rowspan="3">3MHz 14 bit CON Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>10.1</td>
										    		<td>14.4</td>
										    		<td>388</td>
										    	</tr>
										    	<tr>
										    		<td>x 2.4</td>
										    		<td>4</td>
										    		<td>10.7</td>
										    		<td>390</td>
										    	</tr>
										    	<tr>
										    		<td>x 5.0</td>
										    		<td>1.8</td>
										    		<td>9.6</td>
										    		<td>395</td>
										    	</tr>
										    	<tr>
										    		<td rowspan="3">1Mhz 16 bit CON Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>3.8</td>
										    		<td>8.2</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td>x 2.4</td>
										    		<td>1.5</td>
										    		<td>6.3</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td>x 5.0</td>
										    		<td>0.7</td>
										    		<td>5.7</td>
										    		<td>401</td>
										    	</tr>
										    </table>
										    <table id="iXon-3">
										    	<tr>
										    		<td>A/D Rate</td>
										    		<td>Preamp setting</td>
										    		<td>CCD sensitivy</td>
										    		<td>Single Pixel Noise</td>
										    		<td>Base Mean Level</td>
										    	</tr>
										    	<tr>
										    		<td rowspan="2">10MHz 14 bit EM Amplifier</td>
										    		<td>x2.5</td>
										    		<td>22.5</td>
										    		<td>56.5</td>
										    		<td>379</td>
										    	</tr>
										    	<tr>
										    		<td>x 5.1</td>
										    		<td>10.5</td>
										    		<td>48</td>
										    		<td>363</td>
										    	</tr>
										    	<tr>
										    		<td rowspan="3">5 MHz 14 bit EM Amplifier</td>
										    		<td>x1.0</td>
										    		<td>49.8</td>
										    		<td>77.3</td>
										    		<td>407</td>
										    	</tr>
										    	<tr>
										    		<td>x 2.5</td>
										    		<td>20.2</td>
										    		<td>48.9</td>
										    		<td>410</td>
										    	</tr>
										    	<tr>
										    		<td>x 5.1</td>
										    		<td>8.9</td>
										    		<td>36.9</td>
										    		<td>419</td>
										    	</tr>
										    	<tr>
										    		<td rowspan="3">3 MHz 14 bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>47.5</td>
										    		<td>51.9</td>
										    		<td>409</td>
										    	</tr>
										    	<tr>
										    		<td>x  2.5</td>
										    		<td>19.8</td>
										    		<td>34.8</td>
										    		<td>414</td>
										    	</tr>
										    	<tr>
										    		<td>x 5.1</td>
										    		<td>9</td>
										    		<td>28.7</td>
										    		<td>416</td>
										    	</tr>
										    	<tr>
										    		<td rowspan="3">1 MHz 16bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>20</td>
										    		<td>33.9</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td>x 2.5</td>
										    		<td>7.9</td>
										    		<td>20.5</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td>x 5.1</td>
										    		<td>3.6</td>
										    		<td>17.2</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td rowspan="3">3MHz 14 bit CON Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>9.9</td>
										    		<td>14.4</td>
										    		<td>396</td>
										    	</tr>
										    	<tr>
										    		<td>x 2.5</td>
										    		<td>3.9</td>
										    		<td>10.6</td>
										    		<td>398</td>
										    	</tr>
										    	<tr>
										    		<td>x 5.1</td>
										    		<td>1.7</td>
										    		<td>9.3</td>
										    		<td>400</td>
										    	</tr>
										    	<tr>
										    		<td rowspan="3">1MHz 16 bit CON Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>3.7</td>
										    		<td>8.1</td>
										    		<td>400</td>
										    	</tr>
										    	<tr>
										    		<td>x 2.5</td>
										    		<td>1.5</td>
										    		<td>6.3</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td>x 5.1</td>
										    		<td>0.7</td>
										    		<td>5.7</td>
										    		<td>401</td>
										    	</tr>
										    </table>
										  </div>

										  <div class="w3-container w3-light-grey w3-padding">
										   <a class="w3-button w3-right w3-white w3-border" 
										   onclick="document.getElementById('id01').style.display='none'">Close</a>
										  </div>
										 </div>
										</div>
									</p>
									<p>											<label>Focal Reducer</label><br>
										<input type="radio" name="tFocal" id="cFocal1">
										<label for="cFocal1">Yes</label>
										<input type="radio" name="tFocal" id="cFocal2" checked>
										<label for="cFocal2">No</label>
									</p>
									<p>									
										<label>Filter</label><br>
										<input type="radio" name="tFilter" id="cFil1">
										<label for="cFil1">U</label>
										<input type="radio" name="tFilter" id="cFil2">
										<label for="cFil2">B</label>
										<input type="radio" name="tFilter" id="cFil3" checked>
										<label for="cFil3">V</label>
										<input type="radio" name="tFilter" id="cFil4">
										<label for="cFil4">R</label>
										<input type="radio" name="tFilter" id="cFil5">
										<label for="cFil5">I</label>
									</p>
									<p>
										<label>Moon Phase</label><br>
										<input type="radio" name="tMoon" id="cMoon1" checked="">
										<label for="cMoon1">New</label>
										<input type="radio" name="tMoon" id="cMoon2">
										<label for="cMoon2">Quarter</label>
										<input type="radio" name="tMoon" id="cMoon3">
										<label for="cMoon3">Full</label>
									</p>
									<p>
										<label>Sky quality</label><br>
										<input type="radio" name="tSky" id="cSky1" checked>
										<label for="cSky1">Photometric</label>
										<input type="radio" name="tSky" id="cSky2">
										<label for="cSky2">Good</label>
										<input type="radio" name="tSky" id="cSky3">
										<label for="cSky3">Regular</label>
									</p>
									<p>
										<label for="cAperture">Aperture</label><br>
										<input type="Number" name="tAperture" id="cAperture" placeholder="2"><font>arcsec</font>
									</p>

									<input type="submit" name="bCalculate" value="Calculate">
									<input type="reset" name="breset" value="Reset Values">
								</fieldset>

							</form>
							<!-- End of Form -->   

							<section>
								<iframe src="output.php" name="output" height='800' width="80%"></iframe>								
							</section>
                            <p>

                            <strong>Desenvolvido por <a href="http://www.cea.inpe.br/" title="Acesse COCTI/INPE" target="_blank">CEA/INPE</a></strong>
                            </p>
							
                            <div class="clear"></div>
						</div>
					</div>
				</div>
				<!-- Fim do Conteudo -->            

				<div class="clear"></div>
				<div id="voltar-topo"><a href="#topo" title="Acesse Voltar para o topo">Voltar para o topo</a></div>


			</div>
		</div>
	</div>
	<!-- FIM CONTEUDO -->

	<div class="clear"><!-- --></div>

	<!-- Footer -->
	<?php include($_SERVER['DOCUMENT_ROOT']."/rodape.php"); ?>
	<!-- /Footer-->

</body>  
</html>
