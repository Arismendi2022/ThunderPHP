<?php
	
	if(!empty($row)){
		
		$postdata = $req->post();
		
		$csrf = csrf_verify($postdata);
		if($csrf){
			
			if(user_can('delete_role')){
				
				$user_role->delete($row->id);
				
				message_success("Registro eliminado exitosamente!");
				redirect($admin_route . '/' . $plugin_route);
			}
		}
		
		$user_role->errors['role'] = "El formulario expiró!";
		
		set_value('errors',$user_role->errors);
	}else{
		
		message_fail("Registro no encontrado");
	}
