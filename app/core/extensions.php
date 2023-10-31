<?php
	
	function check_extensions()
	{
		$extensions =
			[
				'gd',
				'pdo_mysql'
			];
		
		$not_loaded = [];
		foreach($extensions as $ext) {
			if(!extension_loaded($ext))
				$not_loaded[] = $ext;
			
		}
		
		if(!empty($not_loaded))
			
			dd("cargue las siguientes extensiones en su archivo php.ini: " . implode(",", $not_loaded));
		
	}
	
	check_extensions();
