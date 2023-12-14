<?php
	
	/**
	 * Plugin name: Basic Admin
	 * Autor: Arismendi
	 * Description: Proporciona un área de administración básica
	 *
	 *
	 **/
	
	set_value([
		'plugin_route' => 'admin',
		'logout_page' => 'logout',
	]);
	
	/** set user permissions for this plugin **/
	add_filter('permissions',function($permissions){
		
		$permissions[] = 'view_admin_page';
		
		return $permissions;
	});
	
	/** run this after a form submit **/
	add_action('before_controller',function(){
		
		$vars = get_value();
		
		if(page() == $vars['plugin_route'] && !user_can('view_admin_page')){
			
			message("Acceso a la página de administración denegado! por favor intente con un inicio de sesión diferente");
			redirect('login');
		}
		
	});
	
	/** run this adter a form submit */
	add_action('controller',function(){
		
		do_action(plugin_id() . '_controller');
		
	});
	
	/** displays the view file **/
	add_action('view',function(){
		
		$vars = get_value();
		
		$section_title = ucfirst(str_replace("-"," ",(URL(1) ?? '')));
		
		if(empty($section_title))
			$section_title = "Dashboard";
		
		$section_title = do_filter(plugin_id() . '_before_section_title',$section_title);
		
		$links       = [];
		$obj         = (object)[];
		$obj->title  = 'Dashboard';
		$obj->link   = ROOT . '/' . $vars['plugin_route'];
		$obj->icon   = 'fa-solid fa-gauge';
		$obj->parent = 0;
		$links[]     = $obj;
		
		$links = do_filter(plugin_id() . '_before_admin_links',$links);
		
		$bottom_links = [];
		
		$obj            = (object)[];
		$obj->title     = 'Sitio Web';
		$obj->link      = ROOT;
		$obj->icon      = 'fa-solid fa-earth-americas';
		$obj->parent    = 0;
		$bottom_links[] = $obj;
		
		$obj            = (object)[];
		$obj->title     = 'Cerrar Sesión';
		$obj->link      = ROOT . '/' . $vars['logout_page'];
		$obj->icon      = 'fa-solid fa-right-from-bracket';
		$obj->parent    = 0;
		$bottom_links[] = $obj;
		
		require plugin_path('views/view.php');
	});
	
	
	
	
	
	
