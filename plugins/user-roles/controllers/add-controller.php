<?php
	
	$postdata = $req->post();
	
	$csrf = csrf_verify($postdata);
	if($csrf && $user_role->validate_insert($postdata)){
		
		if(user_can('add_role')){
			
			$user_role->insert($postdata);
			
			message_success("Registro agregado exitosamente!");
			redirect($admin_route . '/' . $plugin_route . '/view/' . $user_role->insert_id);
			
		}
	}
	
	if(!$csrf)
		$user_role->errors['email'] = "El formulario expiró!";
	
	set_value('errors',$user_role->errors);
	