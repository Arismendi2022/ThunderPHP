<?php
	
	$user = new \Basicauth\User;
	
	if(csrf_verify($req->post())){
		
		$postdata = $req->post();
		$row      = $user->first(['email' => $postdata['email']]);
		
		if($row){
			
			if(password_verify($postdata['password'],$row->password)){
				
				$ses->auth($row);
				redirect('home');
			}
		}
		
		message_fail('Correo o contraseña equivocada');
	}else {
		message_fail('El formulario expiró! Por favor refresca');
	}