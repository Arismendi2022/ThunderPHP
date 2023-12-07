<?php
	
	if(!empty($row)){
		
		$postdata = $req->post();
		
		$csrf = csrf_verify($postdata);
		if($csrf){
			
			if(user_can('delete_user')){
				
				$user->delete($row->id);
				
				if(file_exists($row->image))
					unlink($row->image);
				
				message_success("Registro eliminado exitosamente!");
				redirect($admin_route . '/' . $plugin_route);
			}
		}
		
		$user->errors['email'] = "El formulario expiró!";
		
		set_value('errors',$user->errors);
	}else{
		
		message_fail("Registro no encontrado");
	}
