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
		label{
			font-size: 15pt;
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

							<h1 class="documentFirstHeading">Exposure Time Calculator - IAGPOL </h1>
							<section>
								<!-- Introduction -->
								<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
	                            <br/>
                            </section>
                            <strong>ETC</strong>
							<br>
							<!-- Begging of Form -->
							<form method="post" id="fEtc" action="Controller/Controller.php" href="output.php#answers">
								<fieldset>
									<p>
										<label for="cMag">Magnitude</label><br>
										<input type="Number" name="tMag" id="cMag" placeholder="15" min="0" max="23" required="required" /><font>mag</font>
									</p>
									<p>
										<label for="tTemp">Integration time</label><br>
										<input type="Number" name="tTemp" id="cTemp" placeholder="60" min=0 max="100,000" /><font>s</font>
									</p>
									<p>
										<label for="cNwp">Number of WavePlate position</label>
										<br>
										<select name="tNwp" id="cNwp">
											<option value="4">4</option>
											<option value="8" selected="selected">8</option>
											<option value="12">12</option>
											<option value="16">16</option>
										</select>
									</p>
									<p>
										<!--Descobrir como isso interfere nos cálculos-->
										<label>WavePlate</label><br>
										<input type="radio" name="tWave" id="cWave1" checked="checked"  value="1/2"/>
											<label for="cWave1">1/2 wave</label>
											<input type="radio" name="tWave" id="cWave2" value="1/4"/>
											<label for="cWave2">1/4 wave</label>
									</p>
									<p>
										<label for="cSigma">Sigma P</label>
										<input type="Number" name="tSigmaP" id="cSigmaP" placeholder="0.1" min=0 max=100 />
										<font>%</font> &nbsp; &nbsp;&nbsp;&nbsp;
										<label for="cSigma">Sigma V</label>
										<input type="Number" name="tSigmaV" id="cSigmaV" placeholder="0.1" min=0 max=100/>
										<font>%</font>
									</p>
									<p>
										<label>Telescope</label><br>
										<input type="radio" name="tTel" id="cTel1" value="0.6">
										<label for="cTel1">0.6m</label>
										<input type="radio" name="tTel" id="cTel2" checked value="1.6">
										<label for="cTel2">1.6m</label>
									</p>
									<p>
										<label for="">Detector</label>
										<br>
										<!-- Begin Modal -->
										<a onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">Click to Choice a CCD</a>
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
										   <a class="tablink w3-bar-item w3-button" onclick="openCity(event, 'iKon-L936-BV')">iKon - 9867 & 10127</a>
										   <a class="tablink w3-bar-item w3-button" onclick="openCity(event, 'iKon-L936-EX')">iKon - 14912 & 17587</a>
										   <a class="tablink w3-bar-item w3-button" onclick="openCity(event, 'iKon-L936-BR')">iKon - 13739 & 13740</a>
										   <a class="tablink w3-bar-item w3-button" onclick="openCity(event, 'iXon-DU-888E-C00-#BV')">iXon - 4269 & 4335</a>
										  </div>
										  
										  <!-- Begin CCD 105 -->
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
										   		<td><input type="radio" name="tCCD" id="cCCD1" value="1" checked="checked" /><label for="cCCD1">Slow</label></td>
										   		<td>2.5</td>
										   		<td>2.5</td>
										   	</tr>
										   	<tr>
										   		<td><input type="radio" name="tCCD" id="cCCD2" value="2"/><label for="cCCD2">Fast</label></td>
										   		<td>4.0</td>
										   		<td>2.5</td>
										   	</tr>
										   </table>
										  </div>
										  <!-- End CCD 105 -->
										  <!-- Begin CCD 106 -->
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
										   		<td><input type="radio" name="tCCD" id="cCCD3" value="3"/><label for="cCCD3">Slow</label></td>
										   		<td>4.1</td>
										   		<td>5.0</td>
										   	</tr>
										   	<tr>
										   		<td><input type="radio" name="tCCD" id="cCCD4" value="4"/><label for="cCCD4">Fast</label></td>
										   		<td>9.5</td>
										   		<td>5.0</td>
										   	</tr>
										   </table>
										  </div>
										  <!-- End CCD 106 -->
										  <!-- Begin CCD iKon 10127 9867 -->
										  <div id="iKon-L936-BV" class="w3-container city">
										   <h1>CCD - iKon - 9867 & 10127</h1>
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
										   <h2>CCD Ikon 10127</h2>
										   <!-- Begin CCD Ikon table 10127 -->
										   <table id="BV-2">
										   		<tr>
										   			<td>Mode</td>
										   			<td><p>A/D Rate Mhz - all 16 bit</p></td>
										   			<td>Preamp setting</td>
										   			<td><P>CCD sensitivity e-per A/D count</p></td>
										   			<td><p>Single Pixel Noise(rms)</p></td>
										   			<td><p>Base Mean Level</p></td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD5" value="5"/><label for="cCCD5">1</label></td>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>7.1</td>
										   			<td>68.8</td>
										   			<td>2118</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD6" value="6"/><label for="cCCD6">2</label></td>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>4.0</td>
										   			<td>50.9</td>
										   			<td>3205</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD7" value="7"/><label for="cCCD7">3</label></td>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>2.0</td>
										   			<td>32.3</td>
										   			<td>4795</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD8" value="8"/><label for="cCCD8">4</label></td>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td> 3.5</td>
										   			<td>28.2</td>
										   			<td>1363</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD9" value="9"/><label for="cCCD9">5</label></td>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>18.3</td>
										   			<td>1769</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD10" value="10"/><label for="cCCD10">6</label></td>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.1</td>
										   			<td>2119</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD11" value="11"/><label for="cCCD11">7</label></td>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>11.2</td>
										   			<td>855</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD12" value="12"/><label for="cCCD12">8</label></td>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>6.9</td>
										   			<td>875</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD13" value="13"/><label for="cCCD13">9</label></td>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>0.9</td>
										   			<td>6.0</td>
										   			<td>887</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD14" value="14"/><label for="cCCD14">10</label></td>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.4</td>
										   			<td>4.1</td>
										   			<td>836</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD15" value="15"/><label for="cCCD15">11</label></td>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>3.2</td>
										   			<td>858</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD16" value="16"/><label for="cCCD16">12</label></td>
										   			<td>0.05</td>
										   			<td>x 4</td>
										   			<td>0.9</td>
										   			<td>2.9</td>
										   			<td>897</td>
										   		</tr>
										   </table>
										   <!-- Begind CCD Ikon table 9867 -->
										    <h2>CCD Ikon 9867</h2>
										   <table id="BV-3">
										   		<tr>
										   			<td>Mode</td>
										   			<td><p>A/D Rate Mhz - all 16 bit</p></td>
										   			<td>Preamp setting</td>
										   			<td><p>CCD sensitivity e-per A/D count</p></td>
										   			<td><p>Single Pixel Noise(rms)</p></td>
										   			<td><p>Base Mean Level</p></td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD17" value="17"/><label for="cCCD17">1</label></td>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>6.1</td>
										   			<td>56.3</td>
										   			<td>2196</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD18" value="18"/><label for="cCCD18">2</label></td>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>3.3</td>
										   			<td>35.0</td>
										   			<td>3340</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD19" value="19"/><label for="cCCD19">3</label></td>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>1.8</td>
										   			<td>29.7</td>
										   			<td>4983</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD20" value="20"/><label for="cCCD20">4</label></td>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td>3.7</td>
										   			<td>26.6</td>
										   			<td>1335</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD21" value="21"/><label for="cCCD21">5</label></td>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>2.0</td>
										   			<td>16.6</td>
										   			<td>1756</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD22" value="22"/><label for="cCCD22">6</label></td>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.2</td>
										   			<td>2094</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD23" value="23"/><label for="cCCD23">7</label></td>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>9.2</td>
										   			<td>930</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD24" value="24"/><label for="cCCD24">8</label></td>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>7.7</td>
										   			<td>909</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD25" value="25"/><label for="cCCD25">9</label></td>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>6.3</td>
										   			<td>839</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD26" value="26"/><label for="cCCD26">10</label></td>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>3.9</td>
										   			<td>873</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD27" value="27"/><label for="cCCD27">11</label></td>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>3.3</td>
										   			<td>852</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD28" value="28"/><label for="cCCD28">12</label></td>
										   			<td>0.05</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>3.1</td>
										   			<td>813</td>
										   		</tr>
										   </table>
										   <!--End CCD Ikon table 9867 -->
										  </div>
										  <!-- End tab CCD iKon 10127 9867 -->
										  <!-- Mudar Values daqui p frente -->
										  <!-- Begin CCD iKon 14912 -->
										  <div id="iKon-L936-EX" class="w3-container city">
											<h1> CCD - iKon - 14912 & 17587</h1>
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
										   <h2>CCD Ikon 14912</h2>
										   <table id="EX-2">
												<tr>
													<td>Mode</td>
													<td>A/D Rate</td>
													<td>Preamp setting</td>
													<td>CCD Sensivity</td>
													<td>Single Pixel Noise</td>
													<td>Base Mean Level</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD29" value="29"/><label for="cCCD29">1</label></td>
													<td>5.0</td>
													<td>x1</td>
													<td>8.9</td>
													<td>51.2</td>
													<td>1824</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD30" value="30"/><label for="cCCD30">2</label></td>
													<td>5.0</td>
													<td>x1</td>
													<td>22.6</td>
													<td>117.1</td>
													<td>909</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD31" value="31"/><label for="cCCD31">3</label></td>
													<td>5.0</td>
													<td>x2</td>
													<td>4.8</td>
													<td>40.7</td>
													<td>2676</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD32" value="32"/><label for="cCCD32">4</label></td>
													<td>5.0</td>
													<td>x2</td>
													<td>12.7</td>
													<td>87.8</td>
													<td>897</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD33" value="33"/><label for="cCCD33">5</label></td>
													<td>5.0</td>
													<td>x4</td>
													<td>2.3</td>
													<td>31.0</td>
													<td>3730</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD34" value="34"/><label for="cCCD34">6</label></td>
													<td>5.0</td>
													<td>x4</td>
													<td>7.0</td>
													<td>77.1</td>
													<td>926</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD35" value="35"/><label for="cCCD35">7</label></td>
													<td>3.0</td>
													<td>x1</td>
													<td>4.1</td>
													<td>19.6</td>
													<td>1266</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD36" value="36"/><label for="cCCD36">8</label></td>
													<td>3.0</td>
													<td>x1</td>
													<td>14.2</td>
													<td>68.3</td>
													<td>898</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD37" value="37"/><label for="cCCD37">9</label></td>
													<td>3.0</td>
													<td>x2</td>
													<td>2.1</td>
													<td>13.0</td>
													<td>1653</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD38" value="38"/><label for="cCCD38">10</label></td>
													<td>3.0</td>
													<td>x2</td>
													<td>7.6</td>
													<td>44.0</td>
													<td>1046</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD39" value="39"/><label for="cCCD39">11</label></td>
													<td>3.0</td>
													<td>x4</td>
													<td>1.2</td>
													<td>11.4</td>
													<td>2014</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD40" value="40"/><label for="cCCD40">12</label></td>
													<td>3.0</td>
													<td>x4</td>
													<td>4.1</td>
													<td>37.0</td>
													<td>1231</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD41" value="41"/><label for="cCCD41">13</label></td>
													<td>1.0</td>
													<td>x1</td>
													<td>3.8</td>
													<td>9.6</td>
													<td>883</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD42" value="42"/><label for="cCCD42">14</label></td>
													<td>1.0</td>
													<td>x1</td>
													<td>14.3</td>
													<td>39.3</td>
													<td>886</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD43" value="43"/><label for="cCCD43">15</label></td>
													<td>1.0</td>
													<td>x2</td>
													<td>2.1</td>
													<td>7.3</td>
													<td>900</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD44" value="44"/><label for="cCCD44">16</label></td>
													<td>1.0</td>
													<td>x2</td>
													<td>7.1</td>
													<td>24.5</td>
													<td>910</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD45" value="45"/><label for="cCCD45">17</label></td>
													<td>1.0</td>
													<td>x4</td>
													<td>1.1</td>
													<td>6.9</td>
													<td>920</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD46" value="46"/><label for="cCCD46">18</label></td>
													<td>1.0</td>
													<td>x4</td>
													<td>3.9</td>
													<td>22.6</td>
													<td>945</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD47" value="47"/><label for="cCCD47">19</label></td>
													<td>0.05</td>
													<td>x1</td>
													<td>3.9</td>
													<td>4.4</td>
													<td>919</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD48" value="48"/><label for="cCCD48">20</label></td>
													<td>0.05</td>
													<td>x1</td>
													<td>14.8</td>
													<td>14.5</td>
													<td>926</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD49" value="49"/><label for="cCCD49">21</label></td>
													<td>0.05</td>
													<td>x2</td>
													<td>2.0</td>
													<td>3.4</td>
													<td>910</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD50" value="50"/><label for="cCCD50">22</label></td>
													<td>0.05</td>
													<td>x2</td>
													<td>7.3</td>
													<td>10.0</td>
													<td>924</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD51" value="51"/><label for="cCCD51">23</label></td>
													<td>0.05</td>
													<td>x4</td>
													<td>1.1</td>
													<td>3.3</td>
													<td>893</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD52" value="52"/><label for="cCCD52">24</label></td>
													<td>0.05</td>
													<td>x4</td>
													<td>3.9</td>
													<td>9.1</td>
													<td>921</td>
												</tr>
										   </table>
										   <h2>CCD Ikon 17587</h2>
										   <table id="EX-3">
										   	<tr>
													<td>Mode</td>
													<td>A/D Rate</td>
													<td>Preamp setting</td>
													<td>CCD Sensivity</td>
													<td>Single Pixel Noise</td>
													<td>Base Mean Level</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD53" value="53"/><label for="cCCD53">1</label></td>
													<td>5.0</td>
													<td>x1</td>
													<td>8.0</td>
													<td>55.9</td>
													<td>1954</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD54" value="54"/><label for="cCCD54">2</label></td>
													<td>5.0</td>
													<td>x1</td>
													<td>23.2</td>
													<td>141.4</td>
													<td>999</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD55" value="55"/><label for="cCCD55">3</label></td>
													<td>5.0</td>
													<td>x2</td>
													<td>4.3</td>
													<td>38.9</td>
													<td>2831</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD56" value="56"/><label for="cCCD56">4</label></td>
													<td>5.0</td>
													<td>x2</td>
													<td>12.4</td>
													<td>90.6</td>
													<td>998</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD57" value="57"/><label for="cCCD57">5</label></td>
													<td>5.0</td>
													<td>x4</td>
													<td>2.2</td>
													<td>28.9</td>
													<td>3901</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD58" value="58"/><label for="cCCD58">6</label></td>
													<td>5.0</td>
													<td>x4</td>
													<td>6.1</td>
													<td>66.7</td>
													<td>1013</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD59" value="59"/><label for="cCCD59">7</label></td>
													<td>3.0</td>
													<td>x1</td>
													<td>4.0</td>
													<td>23.6</td>
													<td>1196</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD60" value="60"/><label for="cCCD60">8</label></td>
													<td>3.0</td>
													<td>x1</td>
													<td>14.2</td>
													<td>73.5</td>
													<td>854</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD61" value="61"/><label for="cCCD61">9</label></td>
													<td>3.0</td>
													<td>x2</td>
													<td>2.1</td>
													<td>13.4</td>
													<td>1521</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD62" value="62"/><label for="cCCD62">10</label></td>
													<td>3.0</td>
													<td>x2</td>
													<td>7.3</td>
													<td>49.1</td>
													<td>962</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD63" value="63"/><label for="cCCD63">11</label></td>
													<td>3.0</td>
													<td>x4</td>
													<td>1.1</td>
													<td>11.0</td>
													<td>1759</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD64" value="64"/><label for="cCCD64">12</label></td>
													<td>3.0</td>
													<td>x4</td>
													<td>3.5</td>
													<td>20.2</td>
													<td>914</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD65" value="65"/><label for="cCCD65">13</label></td>
													<td>1.0</td>
													<td>x1</td>
													<td>3.6</td>
													<td>9.1</td>
													<td>859</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD66" value="66"/><label for="cCCD66">14</label></td>
													<td>1.0</td>
													<td>x1</td>
													<td>13.8</td>
													<td>33.9</td>
													<td>859</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD67" value="67"/><label for="cCCD67">15</label></td>
													<td>1.0</td>
													<td>x2</td>
													<td>2.0</td>
													<td>7.5</td>
													<td>881</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD68" value="68"/><label for="cCCD68">16</label></td>
													<td>1.0</td>
													<td>x2</td>
													<td>6.7</td>
													<td>23.5</td>
													<td>881</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD69" value="69"/><label for="cCCD69">17</label></td>
													<td>1.0</td>
													<td>x4</td>
													<td>1.0</td>
													<td>6.6</td>
													<td>906</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD70" value="70"/><label for="cCCD70">18</label></td>
													<td>1.0</td>
													<td>x4</td>
													<td>3.5</td>
													<td>20.2</td>
													<td>914</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD71" value="71"/><label for="cCCD71">19</label></td>
													<td>0.05</td>
													<td>x1</td>
													<td>3.7</td>
													<td>4.9</td>
													<td>913</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD72" value="72"/><label for="cCCD72">20</label></td>
													<td>0.05</td>
													<td>x1</td>
													<td>14.2</td>
													<td>14.7</td>
													<td>918</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD73" value="73"/><label for="cCCD73">21</label></td>
													<td>0.05</td>
													<td>x2</td>
													<td>2.0</td>
													<td>4.3</td>
													<td>895</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD74" value="74"/><label for="cCCD74">22</label></td>
													<td>0.05</td>
													<td>x2</td>
													<td>6.8</td>
													<td>10.3</td>
													<td>907</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD75" value="75"/><label for="cCCD75">23</label></td>
													<td>0.05</td>
													<td>x4</td>
													<td>1.1</td>
													<td>3.3</td>
													<td>861</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD76" value="76"/><label for="cCCD76">24</label></td>
													<td>0.05</td>
													<td>x4</td>
													<td>3.6</td>
													<td>9.5</td>
													<td>884</td>
												</tr>
										   </table>
										  </div>
										  <!-- End CCD 14912-->
										  <!-- Begin CCD 13739 13740 17588-->
										  <div id="iKon-L936-BR" class="w3-container city">
										    <h1>CCD - iKon - 13739 & 13740</h1>
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
										   <h2>CCD iKon 13739</h2>
										   <table id="BR-2">
										   		<tr>
													<td>Mode</td>
													<td>A/D Rate</td>
													<td>Preamp setting</td>
													<td>CCD Sensivity</td>
													<td>Single Pixel Noise</td>
													<td>Base Mean Level</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD77" value="77"/><label for="cCCD77">1</label></td>
													<td>5.0</td>
													<td>x1</td>
													<td>8.3</td>
													<td>47.1</td>
													<td>1837</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD78" value="78"/><label for="cCCD78">2</label></td>
													<td>5.0</td>
													<td>x1</td>
													<td>27.1</td>
													<td>131.8</td>
													<td>810</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD79" value="79"/><label for="cCCD79">3</label></td>
													<td>5.0</td>
													<td>x2</td>
													<td>4.3</td>
													<td>43.1</td>
													<td>2729</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD80" value="80"/><label for="cCCD80">4</label></td>
													<td>5.0</td>
													<td>x2</td>
													<td>14.6</td>
													<td>87.9</td>
													<td>737</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD81" value="81"/><label for="cCCD81">5</label></td>
													<td>5.0</td>
													<td>x4</td>
													<td>2.3</td>
													<td>30.3</td>
													<td>3395</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD82" value="82"/><label for="cCCD82">6</label></td>
													<td>5.0</td>
													<td>x4</td>
													<td>7.1</td>
													<td>63.6</td>
													<td>604</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD83" value="83"/><label for="cCCD83">7</label></td>
													<td>3.0</td>
													<td>x1</td>
													<td>4.0</td>
													<td>18.3</td>
													<td>964</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD84" value="84"/><label for="cCCD84">8</label></td>
													<td>3.0</td>
													<td>x1</td>
													<td>17.9</td>
													<td>84.8</td>
													<td>940</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD85" value="85"/><label for="cCCD85">9</label></td>
													<td>3.0</td>
													<td>x2</td>
													<td>2.2</td>
													<td>12.3</td>
													<td>1720</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD86" value="86"/><label for="cCCD86">10</label></td>
													<td>3.0</td>
													<td>x2</td>
													<td>9.3</td>
													<td>50.3</td>
													<td>1655</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD87" value="87"/><label for="cCCD87">11</label></td>
													<td>3.0</td>
													<td>x4</td>
													<td>1.1</td>
													<td>10.2</td>
													<td>2629</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD88" value="88"/><label for="cCCD88">12</label></td>
													<td>3.0</td>
													<td>x4</td>
													<td>5.0</td>
													<td>40.4</td>
													<td>2994</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD89" value="89"/><label for="cCCD89">13</label></td>
													<td>1.0</td>
													<td>x1</td>
													<td>4.1</td>
													<td>9.7</td>
													<td>931</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD90" value="90"/><label for="cCCD90">14</label></td>
													<td>1.0</td>
													<td>x1</td>
													<td>18.4</td>
													<td>41.9</td>
													<td>1255</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD91" value="91"/><label for="cCCD91">15</label></td>
													<td>1.0</td>
													<td>x2</td>
													<td>2.2</td>
													<td>7.4</td>
													<td>1390</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD92" value="92"/><label for="cCCD92">16</label></td>
													<td>1.0</td>
													<td>x2</td>
													<td>9.3</td>
													<td>27.5</td>
													<td>1996</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD93" value="93"/><label for="cCCD93">17</label></td>
													<td>1.0</td>
													<td>x4</td>
													<td>1.0</td>
													<td>6.0</td>
													<td>2243</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD94" value="94"/><label for="cCCD94">18</label></td>
													<td>1.0</td>
													<td>x4</td>
													<td>5.1</td>
													<td>25.4</td>
													<td>3381</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD95" value="95"/><label for="cCCD95">19</label></td>
													<td>0.05</td>
													<td>x1</td>
													<td>4.0</td>
													<td>4.5</td>
													<td>923</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD96" value="96"/><label for="cCCD96">20</label></td>
													<td>0.05</td>
													<td>x1</td>
													<td>18.4</td>
													<td>41.9</td>
													<td>1255</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD97" value="97"/><label for="cCCD97">21</label></td>
													<td>0.05</td>
													<td>x2</td>
													<td>2.1</td>
													<td>4.4</td>
													<td>1388</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD98" value="98"/><label for="cCCD98">22</label></td>
													<td>0.05</td>
													<td>x2</td>
													<td>9.6</td>
													<td>13.9</td>
													<td>1954</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD99" value="99"/><label for="cCCD99">23</label></td>
													<td>0.05</td>
													<td>x4</td>
													<td>1.1</td>
													<td>3.7</td>
													<td>2252</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD100" value="100"/><label for="cCCD100">24</label></td>
													<td>0.05</td>
													<td>x4</td>
													<td>5.1</td>
													<td>11.8</td>
													<td>3312</td>
												</tr>
										   </table>
										   <h2>CCD iKon 13740</h2>
										   <table id="BR-3">
										   		<tr>
													<td>Mode</td>
													<td>A/D Rate</td>
													<td>Preamp setting</td>
													<td>CCD Sensivity</td>
													<td>Single Pixel Noise</td>
													<td>Base Mean Level</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD101" value="101"/><label for="cCCD101">1</label></td>
													<td>5.0</td>
													<td>x1</td>
													<td>7.7</td>
													<td>38.5</td>
													<td>1906</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD102" value="102"/><label for="cCCD102">2</label></td>
													<td>5.0</td>
													<td>x1</td>
													<td>23.8</td>
													<td>116.5</td>
													<td>938</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD103" value="103"/><label for="cCCD103">3</label></td>
													<td>5.0</td>
													<td>x2</td>
													<td>3.8</td>
													<td>23.9</td>
													<td>2753</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD104" value="104"/><label for="cCCD104">4</label></td>
													<td>5.0</td>
													<td>x2</td>
													<td>13.3</td>
													<td>74.8</td>
													<td>904</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD105" value="105"/><label for="cCCD105">5</label></td>
													<td>5.0</td>
													<td>x4</td>
													<td>2.0</td>
													<td>22.9</td>
													<td>3329</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD106" value="106"/><label for="cCCD106">6</label></td>
													<td>5.0</td>
													<td>x4</td>
													<td>6.3</td>
													<td>56.1</td>
													<td>805</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD107" value="107"/><label for="cCCD107">7</label></td>
													<td>3.0</td>
													<td>x1</td>
													<td>3.7</td>
													<td>17.4</td>
													<td>928</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD108" value="108"/><label for="cCCD108">8</label></td>
													<td>3.0</td>
													<td>x1</td>
													<td>16.3</td>
													<td>76.2</td>
													<td>972</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD109" value="109"/><label for="cCCD109">9</label></td>
													<td>3.0</td>
													<td>x2</td>
													<td>2.0</td>
													<td>11.8</td>
													<td>1617</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD110" value="110"/><label for="cCCD110">10</label></td>
													<td>3.0</td>
													<td>x2</td>
													<td>9.0</td>
													<td>49.7</td>
													<td>1673</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD111" value="111"/><label for="cCCD111">11</label></td>
													<td>3.0</td>
													<td>x4</td>
													<td>1.0</td>
													<td>8.8</td>
													<td>2353</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD112" value="112"/><label for="cCCD112">12</label></td>
													<td>3.0</td>
													<td>x4</td>
													<td>6.1</td>
													<td>49.6</td>
													<td>2957</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD113" value="113"/><label for="cCCD113">13</label></td>
													<td>1.0</td>
													<td>x1</td>
													<td>3.6</td>
													<td>9.7</td>
													<td>920</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD114" value="114"/><label for="cCCD114">14</label></td>
													<td>1.0</td>
													<td>x1</td>
													<td>16.3</td>
													<td>38.7</td>
													<td>1311</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD115" value="115"/><label for="cCCD115">15</label></td>
													<td>1.0</td>
													<td>x2</td>
													<td>1.9</td>
													<td>7.1</td>
													<td>1298</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD116" value="116"/><label for="cCCD116">16</label></td>
													<td>1.0</td>
													<td>x2</td>
													<td>8.5</td>
													<td>29.9</td>
													<td>2024</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD117" value="117"/><label for="cCCD117">17</label></td>
													<td>1.0</td>
													<td>x4</td>
													<td>1.0</td>
													<td>5.9</td>
													<td>1999</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD118" value="118"/><label for="cCCD118">18</label></td>
													<td>1.0</td>
													<td>x4</td>
													<td>4.8</td>
													<td>25.1</td>
													<td>3364</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD119" value="119"/><label for="cCCD119">19</label></td>
													<td>0.05</td>
													<td>x1</td>
													<td>3.8</td>
													<td>4.8</td>
													<td>955</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD120" value="120"/><label for="cCCD120">20</label></td>
													<td>0.05</td>
													<td>x1</td>
													<td>16.8</td>
													<td>17.5</td>
													<td>1320</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD121" value="121"/><label for="cCCD121">21</label></td>
													<td>0.05</td>
													<td>x2</td>
													<td>2.0</td>
													<td>4.4</td>
													<td>1340</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD122" value="122"/><label for="cCCD122">22</label></td>
													<td>0.05</td>
													<td>x2</td>
													<td>8.6</td>
													<td>12.9</td>
													<td>2025</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD123" value="123"/><label for="cCCD123">23</label></td>
													<td>0.05</td>
													<td>x4</td>
													<td>1.0</td>
													<td>3.7</td>
													<td>2053</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD124" value="124"/><label for="cCCD124">24</label></td>
													<td>0.05</td>
													<td>x4</td>
													<td>4.5</td>
													<td>11.6</td>
													<td>3335</td>
												</tr>
										   </table>
										   <h2>CCD iKon 17588</h2>
										   <table id="BR-4">
										   	<tr>
													<td>Mode</td>
													<td>A/D Rate</td>
													<td>Preamp setting</td>
													<td>CCD Sensivity</td>
													<td>Single Pixel Noise</td>
													<td>Base Mean Level</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD125" value="125"/><label for="cCCD125">1</label></td>
													<td>5.0</td>
													<td>x1</td>
													<td>5.4</td>
													<td>39.0</td>
													<td>2109</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD126" value="126"/><label for="cCCD126">2</label></td>
													<td>5.0</td>
													<td>x1</td>
													<td>17.4</td>
													<td>111.4</td>
													<td>917</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD127" value="127"/><label for="cCCD127">3</label></td>
													<td>5.0</td>
													<td>x2</td>
													<td>2.8</td>
													<td>30.8</td>
													<td>3179</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCC128" value="128"/><label for="cCCD128">4</label></td>
													<td>5.0</td>
													<td>x2</td>
													<td>9.1</td>
													<td>78.5</td>
													<td>933</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD129" value="129"/><label for="cCCD129">5</label></td>
													<td>5.0</td>
													<td>x4</td>
													<td>1.5</td>
													<td>24.2</td>
													<td>4302</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD130" value="130"/><label for="cCCD130">6</label></td>
													<td>5.0</td>
													<td>x4</td>
													<td>5.0</td>
													<td>59.7</td>
													<td>1043</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD131" value="131"/><label for="cCCD131">7</label></td>
													<td>3.0</td>
													<td>x1</td>
													<td>3.3</td>
													<td>17.3</td>
													<td>1162</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD132" value="132"/><label for="cCCD132">8</label></td>
													<td>3.0</td>
													<td>x1</td>
													<td>13.0</td>
													<td>66.1</td>
													<td>851</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD133" value="133"/><label for="cCCD133">9</label></td>
													<td>3.0</td>
													<td>x2</td>
													<td>1.6</td>
													<td>11.0</td>
													<td>1549</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD134" value="134"/><label for="cCCD134">10</label></td>
													<td>3.0</td>
													<td>x2</td>
													<td>7.1</td>
													<td>41.4</td>
													<td>934</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD135" value="135"/><label for="cCCD135">11</label></td>
													<td>3.0</td>
													<td>x4</td>
													<td>0.9</td>
													<td>11.1</td>
													<td>1599</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD136" value="136"/><label for="cCCD136">12</label></td>
													<td>3.0</td>
													<td>x4</td>
													<td>3.4</td>
													<td>31.7</td>
													<td>912</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD137" value="137"/><label for="cCCD137">13</label></td>
													<td>1.0</td>
													<td>x1</td>
													<td>3.2</td>
													<td>9.0</td>
													<td>869</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD138" value="138"/><label for="cCCD138">14</label></td>
													<td>1.0</td>
													<td>x1</td>
													<td>12.7</td>
													<td>30.5</td>
													<td>887</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD139" value="139"/><label for="cCCD139">15</label></td>
													<td>1.0</td>
													<td>x2</td>
													<td>1.7</td>
													<td>6.9</td>
													<td>896</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD140" value="140"/><label for="cCCD140">16</label></td>
													<td>1.0</td>
													<td>x2</td>
													<td>6.7</td>
													<td>25.6</td>
													<td>931</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD141" value="141"/><label for="cCCD141">17</label></td>
													<td>1.0</td>
													<td>x4</td>
													<td>0.9</td>
													<td>6.9</td>
													<td>940</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD142" value="142"/><label for="cCCD142">18</label></td>
													<td>1.0</td>
													<td>x4</td>
													<td>3.4</td>
													<td>24.6</td>
													<td>1010</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD143" value="143"/><label for="cCCD143">19</label></td>
													<td>0.05</td>
													<td>x1</td>
													<td>3.3</td>
													<td>4.4</td>
													<td>881</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD144" value="144"/><label for="cCCD144">20</label></td>
													<td>0.05</td>
													<td>x1</td>
													<td>13.0</td>
													<td>13.4</td>
													<td>897</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD145" value="145"/><label for="cCCD145">21</label></td>
													<td>0.05</td>
													<td>x2</td>
													<td>1.7</td>
													<td>3.8</td>
													<td>881</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD146" value="146"/><label for="cCCD146">22</label></td>
													<td>0.05</td>
													<td>x2</td>
													<td>6.9</td>
													<td>10.5</td>
													<td>913</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD147" value="147"/><label for="cCCD147">23</label></td>
													<td>0.05</td>
													<td>x4</td>
													<td>0.9</td>
													<td>3.4</td>
													<td>880</td>
												</tr>
												<tr>
													<td><input type="radio" name="tCCD" id="cCCD148" value="148"/><label for="cCCD148">24</label></td>
													<td>0.05</td>
													<td>x4</td>
													<td>3.6</td>
													<td>9.2</td>
													<td>943</td>
												</tr>
										   </table>
										  </div>
										  <!-- End CCD 13739 13740 -->
										  <!-- Begin CCD iXon 4269 4335 -->
										  <div id="iXon-DU-888E-C00-#BV" class="w3-container city">
										    <h1>CCD - iXon - 4269 & 4335</h1>
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
										    <!-- Begind CCD Ixon 4269 -->
										    <h2>CCD iXon 4269</h2>
										    <table id="iXon-2">
										    	<tr>
										    		<td>Mode</td>
										    		<td>A/D Rate</td>
										    		<td>Preamp setting</td>
										    		<td>CCD Sensitivity</td>
										    		<td>Single Pixel Noise</td>
										    		<td>Base Mean Level</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD149" value="149"/><label for="cCCD149">1</label></td>
										    		<td rowspan="2">10MHz 14bit EM Amplifier</td>
										    		<td>X2.4</td>
										    		<td>21.9</td>
										    		<td>52.9</td>
										    		<td>383</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD150" value="150"/><label for="cCCD150">2</label></td>
										    		<td>x 5.0</td>
										    		<td>10.3</td>
										    		<td>47.3</td>
										    		<td>373</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD151" value="151"/><label for="cCCD151">3</label></td>
										    		<td rowspan="3">5MHz 14 bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>48.2</td>
										    		<td>72.5</td>
										    		<td>396</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD152" value="152"/><label for="cCCD152">4</label></td>
										    		<td>x 2.4</td>
										    		<td>19.4</td>
										    		<td>45</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD153" value="153"/><label for="cCCD153">5</label></td>
										    		<td>x 5.0</td>
										    		<td>8.8</td>
										    		<td>35.7</td>
										    		<td>406</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD154" value="154"/><label for="cCCD154">6</label></td>
										    		<td rowspan="3">3MHz 14bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>47.8</td>
										    		<td>53.1</td>
										    		<td>407</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD155" value="155"/><label for="cCCD155">7</label></td>
										    		<td>x 2.4</td>
										    		<td>19.3</td>
										    		<td>32.4</td>
										    		<td>405</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD156" value="156"/><label for="cCCD156">8</label></td>
										    		<td>x 5.0</td>
										    		<td>8.6</td>
										    		<td>26.6</td>
										    		<td>405</td>
										    	</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD157" value="157"/><label for="cCCD157">9</label></td>
										   			<td rowspan="3">1MHz 16 bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>18.5</td>
										    		<td>31.4</td>
										    		<td>4000</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD158" value="158"/><label for="cCCD158">10</label></td>
										    		<td>x 2.4</td>
										    		<td>7.5</td>
										    		<td>19.5</td>
										    		<td>400</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD159" value="159"/><label for="cCCD159">11</label></td>
										    		<td>x 5.0</td>
										    		<td>3.4</td>
										    		<td>16.5</td>
										    		<td>399</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD160" value="160"/><label for="cCCD160">12</label></td>
										    		<td rowspan="3">3MHz 14 bit CON Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>10.1</td>
										    		<td>14.4</td>
										    		<td>388</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD161" value="161"/><label for="cCCD161">13</label></td>
										    		<td>x 2.4</td>
										    		<td>4</td>
										    		<td>10.7</td>
										    		<td>390</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD162" value="162"/><label for="cCCD162">14</label></td>
										    		<td>x 5.0</td>
										    		<td>1.8</td>
										    		<td>9.6</td>
										    		<td>395</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD163" value="163"/><label for="cCCD163">15</label></td>
										    		<td rowspan="3">1Mhz 16 bit CON Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>3.8</td>
										    		<td>8.2</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD164" value="164"/><label for="cCCD164">16</label></td>
										    		<td>x 2.4</td>
										    		<td>1.5</td>
										    		<td>6.3</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD165" value="165"/><label for="cCCD165">17</label></td>
										    		<td>x 5.0</td>
										    		<td>0.7</td>
										    		<td>5.7</td>
										    		<td>401</td>
										    	</tr>
										    </table>
										    <!-- End CCD iXon 4269-->
										    <!-- Begin CCD iXon 4335 -->
										    <h2>CCD iXon 4335</h2>
										    <table id="iXon-3">
										    	<tr>
										    		<td>Mode</td>
										    		<td>A/D Rate</td>
										    		<td>Preamp setting</td>
										    		<td>CCD sensitivy</td>
										    		<td>Single Pixel Noise</td>
										    		<td>Base Mean Level</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD166" value="166"/><label for="cCCD166">1</label></td>
										    		<td rowspan="2">10MHz 14 bit EM Amplifier</td>
										    		<td>x2.5</td>
										    		<td>22.5</td>
										    		<td>56.5</td>
										    		<td>379</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD167" value="167"/><label for="cCCD167">2</label></td>
										    		<td>x 5.1</td>
										    		<td>10.5</td>
										    		<td>48</td>
										    		<td>363</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD168" value="168"/><label for="cCCD168">3</label></td>
										    		<td rowspan="3">5 MHz 14 bit EM Amplifier</td>
										    		<td>x1.0</td>
										    		<td>49.8</td>
										    		<td>77.3</td>
										    		<td>407</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD169" value="169"/><label for="cCCD169">4</label></td>
										    		<td>x 2.5</td>
										    		<td>20.2</td>
										    		<td>48.9</td>
										    		<td>410</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD170" value="170"/><label for="cCCD170">5</label></td>
										    		<td>x 5.1</td>
										    		<td>8.9</td>
										    		<td>36.9</td>
										    		<td>419</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD171" value="171"/><label for="cCCD171">6</label></td>
										    		<td rowspan="3">3 MHz 14 bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>47.5</td>
										    		<td>51.9</td>
										    		<td>409</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD172" value="172"/><label for="cCCD172">7</label></td>
										    		<td>x  2.5</td>
										    		<td>19.8</td>
										    		<td>34.8</td>
										    		<td>414</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD173" value="173"/><label for="cCCD173">8</label></td>
										    		<td>x 5.1</td>
										    		<td>9</td>
										    		<td>28.7</td>
										    		<td>416</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD174" value="174"/><label for="cCCD174">9</label></td>
										    		<td rowspan="3">1 MHz 16bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>20</td>
										    		<td>33.9</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD175" value="175"/><label for="cCCD175">10</label></td>
										    		<td>x 2.5</td>
										    		<td>7.9</td>
										    		<td>20.5</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD176" value="176"/><label for="cCCD176">11</label></td>
										    		<td>x 5.1</td>
										    		<td>3.6</td>
										    		<td>17.2</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD177" value="177"/><label for="cCCD177">12</label></td>
										    		<td rowspan="3">3MHz 14 bit CON Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>9.9</td>
										    		<td>14.4</td>
										    		<td>396</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD178" value="178"/><label for="cCCD178">13</label></td>
										    		<td>x 2.5</td>
										    		<td>3.9</td>
										    		<td>10.6</td>
										    		<td>398</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD179" value="179"/><label for="cCCD179">14</label></td>
										    		<td>x 5.1</td>
										    		<td>1.7</td>
										    		<td>9.3</td>
										    		<td>400</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD180" value="180"/><label for="cCCD180">15</label></td>
										    		<td rowspan="3">1MHz 16 bit CON Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>3.7</td>
										    		<td>8.1</td>
										    		<td>400</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD181" value="181"/><label for="cCCD181">16</label></td>
										    		<td>x 2.5</td>
										    		<td>1.5</td>
										    		<td>6.3</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD182" value="182"/><label for="cCCD182">17</label></td>
										    		<td>x 5.1</td>
										    		<td>0.7</td>
										    		<td>5.7</td>
										    		<td>401</td>
										    	</tr>
										    </table>
										    <!-- End 43335 -->
										  </div>
										  <!-- End CCD Ixon 4269 4335  -->

										  <div class="w3-container w3-light-grey w3-padding">
										   <a class="w3-button w3-right w3-white w3-border" 
										   onclick="document.getElementById('id01').style.display='none'">Close</a>
										  </div>
										 </div>
										</div>
										<!-- End Modal -->
									</p>
									<p>	<label>Focal Reducer</label><br>
										<input type="radio" name="tFocal" id="cFocal1" value="1">
										<label for="cFocal1">Yes</label>
										<input type="radio" name="tFocal" id="cFocal2" checked value="0">
										<label for="cFocal2">No</label>
									</p>
									<p>									
										<label>Filter</label><br>
										<input type="radio" name="tFilter" id="cFil1" value="U">
										<label for="cFil1">U</label>
										<input type="radio" name="tFilter" id="cFil2" value="B">
										<label for="cFil2">B</label>
										<input type="radio" name="tFilter" id="cFil3" checked value="V">
										<label for="cFil3">V</label>
										<input type="radio" name="tFilter" id="cFil4" value="R">
										<label for="cFil4">R</label>
										<input type="radio" name="tFilter" id="cFil5" value="I">
										<label for="cFil5">I</label>
									</p>
									<p>
										<label>Moon Phase</label><br>
										<input type="radio" name="tMoon" id="cMoon1" checked="checked" value="1">
										<label for="cMoon1">New</label>
										<input type="radio" name="tMoon" id="cMoon2" value="2">
										<label for="cMoon2">Quarter</label>
										<input type="radio" name="tMoon" id="cMoon3" value="3">
										<label for="cMoon3">Full</label>
									</p>
									<p>
										<label>Sky quality</label><br>
										<input type="radio" name="tSky" id="cSky1" checked value="1">
										<label for="cSky1">Photometric</label>
										<input type="radio" name="tSky" id="cSky2" value="2">
										<label for="cSky2">Good</label>
										<input type="radio" name="tSky" id="cSky3" value="3">
										<label for="cSky3">Regular</label>
									</p>
									<p>
										<label for="cAperture">Aperture radius</label><br>
										<input type="Number" name="tAperture" id="cAperture" placeholder="2" required="required"><font>arcsec</font>
									</p>

									<input type="submit" name="bCalculate" value="Calculate">
									<input type="reset" name="breset" value="Reset Values">
								</fieldset>

							</form>
							<!-- End of Form -->   

							<section>
								<iframe src="output.php" id="output" name="output" height='800' width="80%"></iframe>								
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
