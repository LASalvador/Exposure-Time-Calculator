<?php 
	require_once __DIR__.'/vendor/autoload.php';

	use App\Router;

	$app = new Router();
	//rota para home da ETC
	$app->get('/',function(){
		return \App\Controller\AppController::index();
	});
	// rota para carregar about da ETC 
	$app->get('/about',function(){
		return \App\Controller\AppController::about();
	});
	// rota para carregar o form IAGPOL
	$app->get('/IAGPOL',function(){
		return \App\Controller\AppController::loadForm('IAGPOL');
	});
	// rota para enviar o form IAGPOL
	$app->post('/IAGPOL',function(){
		return \App\Controller\AppController::submitFormIAGPOL();
	});
	// rota para carregar o information do IAGPOL
	$app->get('/IAGPOL/Information', function() {
		return \App\Controller\AppController::loadInformation('IAGPOL');
	});
	//rota para cerregar o output do IAGPOL
	$app->get('/IAGPOL/Output',function(){
		return \App\Controller\AppController::loadOuput('IAGPOL');
	});
	// rota para carregar o form SPARC4
	$app->get('/SPARC4',function(){
		return \App\Controller\AppController::loadForm('SPARC4');
	});
	// rota para enviar o form SPARC4
	$app->post('/SPARC4',function(){
		return \App\Controller\AppController::submitFormSPARC4();
	});
	// rota para carregar o information do SPARC4
	$app->get('/SPARC4/Information', function() {
		return \App\Controller\AppController::loadInformation('SPARC4');
	});
	//rota para cerregar o output do SPARC4
	$app->get('/SPARC4/Output',function(){
		return \App\Controller\AppController::loadOuput('SPARC4');
	});
	// rota para carregar o form SPARC4
	$app->get('/CD',function(){
		return \App\Controller\AppController::loadForm('CD');
	});
	// rota para enviar o form SPARC4
	$app->post('/CD',function(){
		return \App\Controller\AppController::submitFormCD();
	});
	// rota para carregar o information do SPARC4
	$app->get('/CD/Information', function() {
		return \App\Controller\AppController::loadInformation('CD');
	});
	//rota para cerregar o output do SPARC4
	$app->get('/CD/Output',function(){
		return \App\Controller\AppController::loadOuput('CD');
	});

	$app->run();
?>