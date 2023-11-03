<?php
	
	namespace Model;
	
	defined('ROOT') or die("Acceso directo al script denegado");
	
	/**
	 * Model class
	 */
	
	class User extends Model
	{
		protected $table = 'users';
		
		protected $allowedColumns = [
			'email',
			'password',
			'date_created',
		];
		
		protected $allowedUpdateColumns = [
			'email',
			'password',
			'date_update',
		];
		
		function __construct()
		{
			dd("esto es de la clase de usuario");
		}
	}
