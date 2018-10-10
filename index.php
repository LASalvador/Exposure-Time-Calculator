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
							<form method="post" id="fEtc" action="Controller/Controller.php">
								<fieldset>
									<p>
										<label for="cMag">Magnitude</label><br>
										<input type="Number" name="tMag" id="cMag" placeholder="15" min="0" max="23" /><font>mag</font>
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
										<input type="radio" name="tWave" id="cWave1" checked="checked"  value="1"/>
											<label for="cWave1">1/2 wave</label>
											<input type="radio" name="tWave" id="cWave2" value="2"/>
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
										   <a class="tablink w3-bar-item w3-button" onclick="openCity(event, 'iKon-L936-EX')">iKon - 14912</a>
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
										   		<td><input type="radio" name="tCCD" id="cCCD1" value="A"/><label for="cCCD1">Slow</label></td>
										   		<td>2.5</td>
										   		<td>2.5</td>
										   	</tr>
										   	<tr>
										   		<td><input type="radio" name="tCCD" id="cCCD2" value="B"/><label for="cCCD2">Fast</label></td>
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
										   		<td><input type="radio" name="tCCD" id="cCCD3" value="C"/><label for="cCCD3">Slow</label></td>
										   		<td>4.1</td>
										   		<td>5.0</td>
										   	</tr>
										   	<tr>
										   		<td><input type="radio" name="tCCD" id="cCCD4" value="D"/><label for="cCCD4">Fast</label></td>
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
										   			<td><input type="radio" name="tCCD" id="cCCD5" value="E"/><label for="cCCD5">1</label></td>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>7.1</td>
										   			<td>68.8</td>
										   			<td>2118</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD6" value="F"/><label for="cCCD6">2</label></td>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>4.0</td>
										   			<td>50.9</td>
										   			<td>3205</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD7" value="G"/><label for="cCCD7">3</label></td>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>2.0</td>
										   			<td>32.3</td>
										   			<td>4795</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD8" value="H"/><label for="cCCD8">4</label></td>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td> 3.5</td>
										   			<td>28.2</td>
										   			<td>1363</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD9" value="I"/><label for="cCCD9">5</label></td>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>18.3</td>
										   			<td>1769</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD10" value="J"/><label for="cCCD10">6</label></td>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.1</td>
										   			<td>2119</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD11" value="K"/><label for="cCCD11">7</label></td>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>11.2</td>
										   			<td>855</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD12" value="L"/><label for="cCCD12">8</label></td>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>6.9</td>
										   			<td>875</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD13" value="M"/><label for="cCCD13">9</label></td>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>0.9</td>
										   			<td>6.0</td>
										   			<td>887</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD14" value="N"/><label for="cCCD14">10</label></td>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.4</td>
										   			<td>4.1</td>
										   			<td>836</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD15" value="O"/><label for="cCCD15">11</label></td>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>3.2</td>
										   			<td>858</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD16" value="P"/><label for="cCCD16">12</label></td>
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
										   			<td><input type="radio" name="tCCD" id="cCCD17" value="Q"/><label for="cCCD17">1</label></td>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>6.1</td>
										   			<td>56.3</td>
										   			<td>2196</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD18" value="R"/><label for="cCCD18">2</label></td>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>3.3</td>
										   			<td>35.0</td>
										   			<td>3340</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD19" value="S"/><label for="cCCD19">3</label></td>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>1.8</td>
										   			<td>29.7</td>
										   			<td>4983</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD20" value="T"/><label for="cCCD20">4</label></td>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td>3.7</td>
										   			<td>26.6</td>
										   			<td>1335</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD21" value="U"/><label for="cCCD21">5</label></td>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>2.0</td>
										   			<td>16.6</td>
										   			<td>1756</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD22" value="V"/><label for="cCCD22">6</label></td>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.2</td>
										   			<td>2094</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD23" value="W"/><label for="cCCD23">7</label></td>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>9.2</td>
										   			<td>930</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD24" value="X"/><label for="cCCD24">8</label></td>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>7.7</td>
										   			<td>909</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD25" value="Y"/><label for="cCCD25">9</label></td>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>6.3</td>
										   			<td>839</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD26" value="Z"/><label for="cCCD26">10</label></td>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>3.9</td>
										   			<td>873</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD27" value="AA"/><label for="cCCD27">11</label></td>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>3.3</td>
										   			<td>852</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD28" value="AB"/><label for="cCCD28">12</label></td>
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
											<h1> CCD - iKon - 14912</h1>
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
										   			<td>Mode</td>
										   			<td><p>A/D Rate Mhz - all 16 bit</p></td>
										   			<td>Preamp setting</td>
										   			<td><P>CCD sensitivity e-per A/D count</p></td>
										   			<td><p>Single Pixel Noise(rms)</p></td>
										   			<td><p>Base Mean Level</p></td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD29" value="29"/><label for="cCCD29">1</label></td>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>7.1</td>
										   			<td>68.8</td>
										   			<td>2118</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD30" value="30"/><label for="cCCD30">2</label></td>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>4.0</td>
										   			<td>50.9</td>
										   			<td>3205</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD31" value="31"/><label for="cCCD31">3</label></td>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>2.0</td>
										   			<td>32.3</td>
										   			<td>4795</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD32" value="32"/><label for="cCCD32">4</label></td>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td> 3.5</td>
										   			<td>28.2</td>
										   			<td>1363</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD33" value="33"/><label for="cCCD33">5</label></td>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>18.3</td>
										   			<td>1769</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD34" value="34"/><label for="cCCD34">6</label></td>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.1</td>
										   			<td>2119</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD35" value="35"/><label for="cCCD35">7</label></td>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>11.2</td>
										   			<td>855</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD36" value="36"/><label for="cCCD36">8</label></td>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>6.9</td>
										   			<td>875</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD37" value="37"/><label for="cCCD37">9</label></td>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>0.9</td>
										   			<td>6.0</td>
										   			<td>887</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD38" value="38"/><label for="cCCD38">10</label></td>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.4</td>
										   			<td>4.1</td>
										   			<td>836</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD39" value="39"/><label for="cCCD39">11</label></td>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>3.2</td>
										   			<td>858</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD40" value="40"/><label for="cCCD40">12</label></td>
										   			<td>0.05</td>
										   			<td>x 4</td>
										   			<td>0.9</td>
										   			<td>2.9</td>
										   			<td>897</td>
										   		</tr>
										   </table>
										   <table id="EX-3">
										   		<tr>
										   			<td>Mode</td>
										   			<td><p>A/D Rate Mhz - all 16 bit</p></td>
										   			<td>Preamp setting</td>
										   			<td><p>CCD sensitivity e-per A/D count</p></td>
										   			<td><p>Single Pixel Noise(rms)</p></td>
										   			<td><p>Base Mean Level</p></td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD41" value="41"/><label for="cCCD41">1</label></td>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>6.1</td>
										   			<td>56.3</td>
										   			<td>2196</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD42" value="42"/><label for="cCCD42">2</label></td>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>3.3</td>
										   			<td>35.0</td>
										   			<td>3340</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD43" value="43"/><label for="cCCD43">3</label></td>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>1.8</td>
										   			<td>29.7</td>
										   			<td>4983</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD44" value="44"/><label for="cCCD44">4</label></td>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td>3.7</td>
										   			<td>26.6</td>
										   			<td>1335</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD45" value="45"/><label for="cCCD45">5</label></td>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>2.0</td>
										   			<td>16.6</td>
										   			<td>1756</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD46" value="46"/><label for="cCCD46">6</label></td>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.2</td>
										   			<td>2094</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD47" value="47"/><label for="cCCD47">7</label></td>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>9.2</td>
										   			<td>930</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD48" value="48"/><label for="cCCD48">8</label></td>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>7.7</td>
										   			<td>909</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD49" value="49"/><label for="cCCD49">9</label></td>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>6.3</td>
										   			<td>839</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD50" value="50"/><label for="cCCD50">10</label></td>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>3.9</td>
										   			<td>873</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD51" value="51"/><label for="cCCD51">11</label></td>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>3.3</td>
										   			<td>852</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD52" value="52"/><label for="cCCD52">12</label></td>
										   			<td>0.05</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>3.1</td>
										   			<td>813</td>
										   		</tr>
										   </table>
										  </div>
										  <!-- End CCD 14912-->
										  <!-- Begin CCD 13739 13740-->
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
										   <table id="BR-2">
										   		<tr>
										   			<td>Mode</td>
										   			<td><p>A/D Rate Mhz - all 16 bit</p></td>
										   			<td>Preamp setting</td>
										   			<td><P>CCD sensitivity e-per A/D count</p></td>
										   			<td><p>Single Pixel Noise(rms)</p></td>
										   			<td><p>Base Mean Level</p></td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD53" value="53"/><label for="cCCD53">1</label></td>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>7.1</td>
										   			<td>68.8</td>
										   			<td>2118</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD54" value="54"/><label for="cCCD54">2</label></td>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>4.0</td>
										   			<td>50.9</td>
										   			<td>3205</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD55" value="55"/><label for="cCCD55">3</label></td>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>2.0</td>
										   			<td>32.3</td>
										   			<td>4795</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD56" value="56"/><label for="cCCD56">4</label></td>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td> 3.5</td>
										   			<td>28.2</td>
										   			<td>1363</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD57" value="57"/><label for="cCCD57">5</label></td>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>18.3</td>
										   			<td>1769</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD58" value="58"/><label for="cCCD58">6</label></td>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.1</td>
										   			<td>2119</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD59" value="59"/><label for="cCCD59">7</label></td>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>11.2</td>
										   			<td>855</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD60" value="60"/><label for="cCCD60">8</label></td>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>6.9</td>
										   			<td>875</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD61" value="61"/><label for="cCCD61">9</label></td>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>0.9</td>
										   			<td>6.0</td>
										   			<td>887</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD62" value="62"/><label for="cCCD62">10</label></td>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.4</td>
										   			<td>4.1</td>
										   			<td>836</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD63" value="63"/><label for="cCCD63">11</label></td>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.8</td>
										   			<td>3.2</td>
										   			<td>858</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD64" value="64"/><label for="cCCD64">12</label></td>
										   			<td>0.05</td>
										   			<td>x 4</td>
										   			<td>0.9</td>
										   			<td>2.9</td>
										   			<td>897</td>
										   		</tr>
										   </table>
										   <table id="BR-3">
										   		<tr>
										   			<td>Mode</td>
										   			<td><p>A/D Rate Mhz - all 16 bit</p></td>
										   			<td>Preamp setting</td>
										   			<td><p>CCD sensitivity e-per A/D count</p></td>
										   			<td><p>Single Pixel Noise(rms)</p></td>
										   			<td><p>Base Mean Level</p></td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD65" value="65"/><label for="cCCD65">1</label></td>
										   			<td>5.0</td>
										   			<td>x 1</td>
										   			<td>6.1</td>
										   			<td>56.3</td>
										   			<td>2196</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD66" value="66"/><label for="cCCD66">2</label></td>
										   			<td>5.0</td>
										   			<td>x 2</td>
										   			<td>3.3</td>
										   			<td>35.0</td>
										   			<td>3340</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD67" value="67"/><label for="cCCD67">3</label></td>
										   			<td>5.0</td>
										   			<td>x 4</td>
										   			<td>1.8</td>
										   			<td>29.7</td>
										   			<td>4983</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD68" value="68"/><label for="cCCD68">4</label></td>
										   			<td>3.0</td>
										   			<td>x 1</td>
										   			<td>3.7</td>
										   			<td>26.6</td>
										   			<td>1335</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD69" value="69"/><label for="cCCD69">5</label></td>
										   			<td>3.0</td>
										   			<td>x 2</td>
										   			<td>2.0</td>
										   			<td>16.6</td>
										   			<td>1756</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD70" value="70"/><label for="cCCD70">6</label></td>
										   			<td>3.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>12.2</td>
										   			<td>2094</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD71" value="71"/><label for="cCCD71">7</label></td>
										   			<td>1.0</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>9.2</td>
										   			<td>930</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD72" value="72"/><label for="cCCD72">8</label></td>
										   			<td>1.0</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>7.7</td>
										   			<td>909</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD73" value="73"/><label for="cCCD73">9</label></td>
										   			<td>1.0</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>6.3</td>
										   			<td>839</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD74" value="74"/><label for="cCCD74">10</label></td>
										   			<td>0.05</td>
										   			<td>x 1</td>
										   			<td>3.5</td>
										   			<td>3.9</td>
										   			<td>873</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD75" value="75"/><label for="cCCD75">11</label></td>
										   			<td>0.05</td>
										   			<td>x 2</td>
										   			<td>1.9</td>
										   			<td>3.3</td>
										   			<td>852</td>
										   		</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD76" value="76"/><label for="cCCD76">12</label></td>
										   			<td>0.05</td>
										   			<td>x 4</td>
										   			<td>1.0</td>
										   			<td>3.1</td>
										   			<td>813</td>
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
										    		<td><input type="radio" name="tCCD" id="cCCD77" value="77"/><label for="cCCD77">1</label></td>
										    		<td rowspan="2">10MHz 14bit EM Amplifier</td>
										    		<td>X2.4</td>
										    		<td>21.9</td>
										    		<td>52.9</td>
										    		<td>383</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD78" value="78"/><label for="cCCD78">2</label></td>
										    		<td>x 5.0</td>
										    		<td>10.3</td>
										    		<td>47.3</td>
										    		<td>373</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD79" value="79"/><label for="cCCD79">3</label></td>
										    		<td rowspan="3">5MHz 14 bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>48.2</td>
										    		<td>72.5</td>
										    		<td>396</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD80" value="80"/><label for="cCCD80">4</label></td>
										    		<td>x 2.4</td>
										    		<td>19.4</td>
										    		<td>45</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD81" value="81"/><label for="cCCD81">5</label></td>
										    		<td>x 5.0</td>
										    		<td>8.8</td>
										    		<td>35.7</td>
										    		<td>406</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD82" value="82"/><label for="cCCD82">6</label></td>
										    		<td rowspan="3">3MHz 14bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>47.8</td>
										    		<td>53.1</td>
										    		<td>407</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD83" value="83"/><label for="cCCD83">7</label></td>
										    		<td>x 2.4</td>
										    		<td>19.3</td>
										    		<td>32.4</td>
										    		<td>405</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD84" value="84"/><label for="cCCD84">8</label></td>
										    		<td>x 5.0</td>
										    		<td>8.6</td>
										    		<td>26.6</td>
										    		<td>405</td>
										    	</tr>
										   		<tr>
										   			<td><input type="radio" name="tCCD" id="cCCD85" value="85"/><label for="cCCD85">9</label></td>
										   			<td rowspan="3">1MHz 16 bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>18.5</td>
										    		<td>31.4</td>
										    		<td>4000</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD86" value="86"/><label for="cCCD86">10</label></td>
										    		<td>x 2.4</td>
										    		<td>7.5</td>
										    		<td>19.5</td>
										    		<td>400</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD87" value="87"/><label for="cCCD87">11</label></td>
										    		<td>x 5.0</td>
										    		<td>3.4</td>
										    		<td>16.5</td>
										    		<td>399</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD88" value="88"/><label for="cCCD88">12</label></td>
										    		<td rowspan="3">3MHz 14 bit CON Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>10.1</td>
										    		<td>14.4</td>
										    		<td>388</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD89" value="89"/><label for="cCCD89">13</label></td>
										    		<td>x 2.4</td>
										    		<td>4</td>
										    		<td>10.7</td>
										    		<td>390</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD90" value="90"/><label for="cCCD90">14</label></td>
										    		<td>x 5.0</td>
										    		<td>1.8</td>
										    		<td>9.6</td>
										    		<td>395</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD91" value="91"/><label for="cCCD91">15</label></td>
										    		<td rowspan="3">1Mhz 16 bit CON Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>3.8</td>
										    		<td>8.2</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD92" value="92"/><label for="cCCD92">16</label></td>
										    		<td>x 2.4</td>
										    		<td>1.5</td>
										    		<td>6.3</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD93" value="93"/><label for="cCCD93">17</label></td>
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
										    		<td><input type="radio" name="tCCD" id="cCCD94" value="94"/><label for="cCCD94">1</label></td>
										    		<td rowspan="2">10MHz 14 bit EM Amplifier</td>
										    		<td>x2.5</td>
										    		<td>22.5</td>
										    		<td>56.5</td>
										    		<td>379</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD95" value="95"/><label for="cCCD95">2</label></td>
										    		<td>x 5.1</td>
										    		<td>10.5</td>
										    		<td>48</td>
										    		<td>363</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD96" value="96"/><label for="cCCD96">3</label></td>
										    		<td rowspan="3">5 MHz 14 bit EM Amplifier</td>
										    		<td>x1.0</td>
										    		<td>49.8</td>
										    		<td>77.3</td>
										    		<td>407</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD97" value="97"/><label for="cCCD97">4</label></td>
										    		<td>x 2.5</td>
										    		<td>20.2</td>
										    		<td>48.9</td>
										    		<td>410</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD98" value="98"/><label for="cCCD98">5</label></td>
										    		<td>x 5.1</td>
										    		<td>8.9</td>
										    		<td>36.9</td>
										    		<td>419</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD99" value="99"/><label for="cCCD99">6</label></td>
										    		<td rowspan="3">3 MHz 14 bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>47.5</td>
										    		<td>51.9</td>
										    		<td>409</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD100" value="100"/><label for="cCCD100">7</label></td>
										    		<td>x  2.5</td>
										    		<td>19.8</td>
										    		<td>34.8</td>
										    		<td>414</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD101" value="101"/><label for="cCCD101">8</label></td>
										    		<td>x 5.1</td>
										    		<td>9</td>
										    		<td>28.7</td>
										    		<td>416</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD102" value="102"/><label for="cCCD102">9</label></td>
										    		<td rowspan="3">1 MHz 16bit EM Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>20</td>
										    		<td>33.9</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD103" value="103"/><label for="cCCD103">10</label></td>
										    		<td>x 2.5</td>
										    		<td>7.9</td>
										    		<td>20.5</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD104" value="104"/><label for="cCCD104">11</label></td>
										    		<td>x 5.1</td>
										    		<td>3.6</td>
										    		<td>17.2</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD105" value="105"/><label for="cCCD105">12</label></td>
										    		<td rowspan="3">3MHz 14 bit CON Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>9.9</td>
										    		<td>14.4</td>
										    		<td>396</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD106" value="106"/><label for="cCCD106">13</label></td>
										    		<td>x 2.5</td>
										    		<td>3.9</td>
										    		<td>10.6</td>
										    		<td>398</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD107" value="107"/><label for="cCCD107">14</label></td>
										    		<td>x 5.1</td>
										    		<td>1.7</td>
										    		<td>9.3</td>
										    		<td>400</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD108" value="108"/><label for="cCCD108">15</label></td>
										    		<td rowspan="3">1MHz 16 bit CON Amplifier</td>
										    		<td>x 1.0</td>
										    		<td>3.7</td>
										    		<td>8.1</td>
										    		<td>400</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD100" value="109"/><label for="cCCD109">16</label></td>
										    		<td>x 2.5</td>
										    		<td>1.5</td>
										    		<td>6.3</td>
										    		<td>401</td>
										    	</tr>
										    	<tr>
										    		<td><input type="radio" name="tCCD" id="cCCD110" value="110"/><label for="cCCD110">17</label></td>
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
										<input type="radio" name="tFocal" id="cFocal1" value="True">
										<label for="cFocal1">Yes</label>
										<input type="radio" name="tFocal" id="cFocal2" checked value="False">
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
