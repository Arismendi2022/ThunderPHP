<?php
	
	$postdata = $req->post();
	
	$csrf = csrf_verify($postdata);
	if($csrf && $user->validate_insert($postdata)){
		
		$postdata['password']     = password_hash($postdata['password'],PASSWORD_DEFAULT);
		$postdata['date_created'] = date("Y-m-d H:i:s");
		
		$user->insert($postdata);
		
		message_success("Registro agregado exitosamente!");
		redirect($admin_route . '/' . $plugin_route . '/view/' . $user->insert_id);
	}
	
	if(!$csrf)
		$user->errors['email'] = "El formulario expiró!";
	
	set_value('errors',$user->errors);
		
	
