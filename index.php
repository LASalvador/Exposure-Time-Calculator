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

							<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                            <br/>
                            <strong>ETC</strong>

							<br><br>

							<!-- Begging of Form -->
							<form method="post" id="fEtc" action="">
								<fieldset>
									<p>
										<label for="cMag">Magnitude</label><br>
										<input type="Number" name="tMag" id="cMag" placeholder="15" min="0" max="23" /><font>mag</font>
									</p>
									<p>
										<label for="tTemp">Time Integration</label>
										<input type="Number" name="tTemp" id="cTemp" placeholder="60" min=0.001 max="100.000" /><font>s</font>
									</p>
									<p>
										<label for="">Number of WavePlate</label>	
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
										<!--Adicionar Modal -->
										<font color="red">Choice detector<strong>Chamar modal</strong></font>
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
										<label for="cSky2">God</label>
										<input type="radio" name="tSky" id="cSky3">
										<label for="cSky3">Regular</label>
									</p>
									<p>
										<label for="cAperture">Aperture</label>
										<input type="Number" name="tAperture" id="cAperture" placeholder="2"><font>arcsec</font>
									</p>

									<input type="submit" name="bCalculate" value="Calculate">
									<input type="reset" name="breset" value="Reset Values">
								</fieldset>

							</form>
							<!-- End of Form -->
                            
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
