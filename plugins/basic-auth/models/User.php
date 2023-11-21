<?php
	
	namespace Model;
	
	defined('ROOT') or die("Acceso directo al script denegado");
	
	/**
	 * User class
	 */
	class User extends Model{
		protected $table = 'users';
		public $primary_key = 'id';
		
		protected $allowedColumns = [
				'first_name',
				'last_name',
				'image',
				'email',
				'password',
				'date_created',
			];
		
		protected $allowedUpdateColumns = [
				'first_name',
				'last_name',
				'image',
				'email',
				'password',
				'deleted',
				'date_created',
				'date_update',
				'date_deleted',
			];
		
		public function validate_insert(array $data):bool
		{
			if(empty($data['first_name'])){
				$this->errors['first_name'] = 'Se requiere un nombre';
			}else if(!preg_match("/^[a-zA-Z]+$/",trim($data['first_name']))){
				$this->errors['first_name'] = 'Solo se permiten letras sin espacios en el nombre';
			}
			if(empty($data['last_name'])){
				$this->errors['last_name'] = 'Se requiere un apellido';
			}else if(!preg_match("/^[a-zA-Z]+$/",trim($data['last_name']))){
				$this->errors['last_name'] = 'Solo se permiten letras sin espacios en el apellido';
			}
			
			if(empty($data['email']))
			{
				$this->errors['email'] = 'El Email es requerido';
			}else if($this->first(['email' => $data['email']])){
				$this->errors['email'] = 'Este Email ya está en uso';
			}else if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
				$this->errors['email'] = 'El Email no es válido';
			}
			return empty($this->errors);
			
		}
		
		
		public function validate_update(array $data):bool
		{
			if(empty($data['first_name'])){
				$this->errors['first_name'] = 'Se requiere un nombre';
			}else if(!preg_match("/^[a-zA-Z]+$/",trim($data['first_name']))){
				$this->errors['first_name'] = 'Solo se permiten letras sin espacios en el nombre';
			}
			if(empty($data['last_name'])){
				$this->errors['last_name'] = 'Se requiere un apellido';
			}else if(!preg_match("/^[a-zA-Z]+$/",trim($data['last_name']))){
				$this->errors['last_name'] = 'Solo se permiten letras sin espacios en el apellido';
			}
			
			$email_arr = [
				'email' => $data['email']
			];
			
			$email_arr_not = [
				$this->primary_key => $data[$this->primary_key] ?? 0
			];
			
			if(empty($data['email'])){
				$this->errors['email'] = 'El Email es requerido';
			}else if($this->first($email_arr,$email_arr_not)){
				$this->errors['email'] = 'Este Email ya está en uso';
			}else if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
				$this->errors['email'] = 'El Email no es válido';
			}
			
			return empty($this->errors);
		}
		
	}


