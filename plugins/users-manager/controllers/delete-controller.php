<?php
	
	if(!empty($row)){
		
		$postdata = $req->post();
		
		$csrf = csrf_verify($postdata);
		if($csrf){
			
			$user->delete($row->id);
			
			message_success("Registro eliminado exitosamente!");
			redirect($admin_route . '/' . $plugin_route);
		}
		
		$user->errors['email'] = "El formulario expiró!";
		
		set_value('errors',$user->errors);
	}else{
		
		message_fail("Registro no encontrado");
	}
