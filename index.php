<?php
	
	session_start();
	
	$minPHPVersion = '8.0';
	if(phpversion() < $minPHPVersion)
		die("Necesitas una versión mínima de PHP $minPHPVersion para ejecutar esta app");
	
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOTPATH', __DIR__ . DS);
	
	require 'config.php';
	require 'app' . DS . 'core' . DS . 'init.php';
	
	DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);
	
	$ACTIONS = [];
	$FILTERS = [];
	$APP['URL'] = split_url($_GET['url'] ?? 'home');
	$APP['permissions'] = [];
	$USER_DATA = [];
	
	/** load plugins  **/
	$PLUGINS = get_plugin_folders();
	if(!load_plugins($PLUGINS))
		
		die("<center><h1 style='font-family: Tahoma'>¡No se encontraron complementos! coloque al menos un complemento en la carpeta de complementos</h1></center>");
	
	$APP['permissions'] = do_filter('user_permissions', $APP['permissions']);
	
	/** load the app */
	$app = new \Core\App();
	$app->index();
