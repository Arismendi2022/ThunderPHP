<?php

namespace UsersManager;
use \Model\Model;

defined('ROOT') or die("Direct script access denied");

/**
 * User_role class
 */
class User_role extends Model
{

	protected $table = 'user_roles';
	public $primary_key = 'id';

	protected $allowedColumns = [
		'role',
		'disabled',
	];
	
	protected $allowedUpdateColumns = [
		'role',
		'disabled',
	];


	public function validate_insert(array $data):bool
	{

 		if(empty($data['role']))
 		{
 			$this->errors['role'] = 'Se requiere rol';
 		}else
 		if($this->first(['role'=>$data['role']]))
 		{
 			$this->errors['role'] = 'Ese rol ya está en uso.';
 		}else
 		if(!preg_match("/^[a-zA-Z ]+$/",$data['role']))
 		{
 			$this->errors['role'] = 'El rol solo puede tener letras y espacios.';
 		}
 		

 		return empty($this->errors);
	}

	public function validate_update(array $data):bool
	{
		
		$role_arr = [
			'role'=>$data['role']
		];
		$role_arr_not = [
			$this->primary_key => $data[$this->primary_key] ?? 0
		];
		
		if(empty($data['role']))
 		{
 			$this->errors['role'] = 'Se requiere rol';
 		}else
 		if($this->first($role_arr,$role_arr_not))
 		{
 			$this->errors['role'] = 'Ese rol ya está en uso.';
 		}else
 		if(!preg_match("/^[a-zA-Z ]+$/",$data['role']))
 		{
 			$this->errors['role'] = 'El rol solo puede tener letras y espacios.';
 		}

		return empty($this->errors);
	}
}