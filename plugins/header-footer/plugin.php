<?php
	
	/**
	 * Plugin name: Header Footer
	 * Autor: Arismendi
	 * Description: Plugin Created for thunder php
	 *
	 **/
	
	
	/** displays the view file **/
	add_action('before_view', function(){
		
		require plugin_path('views/header.php');
	});
	
	add_action('after_view', function(){
		
		require plugin_path('views/footer.php');
	});
	