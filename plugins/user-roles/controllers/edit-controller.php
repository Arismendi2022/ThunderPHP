<?php
	
	if(!empty($row)){
		$postdata       = $req->post();
		$postdata['id'] = $row->id;
		
		$csrf = csrf_verify($postdata);
		
		if($csrf && $user_role->validate_update($postdata)){
			
			if(user_can('edit_role')){
				
				unset($postdata['id']);
				$user_role->update($row->id,$postdata);
				
				message_success("Registro editado exitosamente!");
				redirect($admin_route . '/' . $plugin_route . '/view/' . $row->id);
			}
		}
		
		if(!$csrf)
			$user_role->errors['email'] = "El formulario expiró!";
		
		set_value('errors',$user_role->errors);
		
	}else{
		
		message_fail("Registro no encontrado");
	}
	
