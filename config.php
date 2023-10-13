<?php
	
	define('DEBUG', true);
	
	define('APP_NAME','pluginPHP app');
	define('APP_DESCRIPTION','The best websit');
	
	if ($_SERVER['SERVER_NAME'] == 'localhost') {
		/** The name of your database */
		define('DB_NAME', 'pluginphp_db');
		
		/** Database username */
		define('DB_USER', 'root');
		
		/** Database password */
		define('DB_PASSWORD', '');
		
		/** Database hostname */
		define('DB_HOST', 'localhost');
		
		/** Database driver */
		define('DB_DRIVER', 'mysql');
		
		define('ROOT', 'http://localhost/pluginphp');
	} else {
		/** The name of your database */
		define('DB_NAME', 'pluginphp_db');
		
		/** Database username */
		define('DB_USER', 'root');
		
		/** Database password */
		define('DB_PASSWORD', '');
		
		/** Database hostname */
		define('DB_HOST', 'localhost');
		
		/** Database driver */
		define('DB_DRIVER', 'mysql');
		
		define('ROOT', 'https://yourwebsite.com');
		
	}
	