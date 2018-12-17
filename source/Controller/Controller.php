<?php
namespace App\Controller;
use App\Router;

abstract class Controller
{
	protected final function view(string $_name, array $vars=[])
	{ 
 		$_filename = __DIR__."/../../views/{$_name}.php";
 		if(!file_exists($_filename))
 			die("View {$_name} not found!");

 		include_once $_filename;
	}

	protected final function params(string $name)
	{
 		$params = Router::getRequestedMethod();

 		if(!isset($params[$name]))
 			return null;

 		return $params[$name];
	}

	protected final function redirect(string $rota)
	{
		$url = (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'];

		$folders = explode('?', $_SERVER['REQUEST_URI'])[0];

		header('Location:'.$url.$folders.'?r='.$rota);
		exit();
	}
	protected final function saveValues($tagName, $value)
	{
		session_start();
		$_SESSION[$tagName] = $value;
	}
}

?>