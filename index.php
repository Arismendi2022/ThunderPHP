<?php
	
	session_start ();
	
	$minPHPVersion = '8.0';
	if (phpversion () < $minPHPVersion)
		die("You need a minimun of PHP version $minPHPVersion to run this app");
	
	define ('DS', DIRECTORY_SEPARATOR);
	define ('ROOTPATH', __DIR__ . DS);
	
	require 'config.php';
	require 'app' . DS . 'core' . DS . 'init.php';
	
	DEBUG ? ini_set ('display_errors', 1) : ini_set ('display_errors', 0);
	
	$ACTIONS = [];
	$FILTERS = [];
	$APP['URL'] = split_url ($_GET['url'] ?? 'home');
	$USER_DATA = [];
	
	/** load plugins  **/
	$PLUGINS = get_plugin_folders ();
	if (!load_plugins ($PLUGINS))
		
		die("<center><h1 style='font-family: Tahoma'>No plugins were found! please put at least one pluging in the plugins folder</h1></center>");
	
	$app = new \Core\App();
	$app->index ();
