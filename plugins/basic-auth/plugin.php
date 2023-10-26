<?php
	
	use \Core\Database;
	
	$image = new \Core\Image;
	copy('image.jpg', 'image_resized.jpg');
	$image->resize ('image_resized.jpg');
	
	add_action('view', function () {
	
	});
	
	add_action('controller', function () {
		
		//$db = new Database;
		//dd($db->query("select * from users"));
		
	});