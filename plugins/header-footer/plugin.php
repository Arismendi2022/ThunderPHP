<link rel="stylesheet" type="text/css" href="<?= plugin_http_dir() . 'css/style.css' ?>">
<?php
	
	add_action('controller', function () {
		
		$arr = ['name' => 'Mary', 'age' => 30];
		set_value($arr);
		
	});
	
	add_action('after_view', function () {
		echo "<center>Website Copyright 2023</center>";
	});
	
	add_action('view', function () {
		dd(get_value());
		
	});
	
	add_action('before_view', function () {
		
		echo "<center><div><a href=''>Home </a> . About us . Contact us</div></center>";
		
	});
