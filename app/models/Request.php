<?php
	
	namespace Core;
	
	defined('ROOT') or die("Acceso directo al script denegado");
	
	/**
	 * Request class
	 */
	class Request
	{
		public function method(): string
		{
			
			return $_SERVER['REQUEST_METHOD'];
		}
		
		public function posted(): bool
		{
			
			return $_SERVER['REQUEST_METHOD'] == 'POST';
		}
		
		public function post(string $key = ''): string|array
		{
			if(empty($key))
				return $_POST;
			
			if(!empty($_POST[$key]))
				return $_POST[$key];
			
			return '';
		}
		
		public function input(string $key, string $default = ''): string
		{
			if(!empty($_POST[$key]))
				return $_POST[$key];
			
			return $default;
		}
		
		public function get(string $key = ''): string
		{
			if(empty($key))
				return $_GET;
			
			if(!empty($_GET[$key]))
				return $_GET[$key];
			
			return '';
		}
		
		public function files(string $key = ''): string|array
		{
			if(empty($key))
				return $_FILES;
			
			if(!empty($_FILES[$key]))
				return $_FILES[$key];
			
			return '';
		}
		
		public function all(string $key = ''): string|array
		{
			if(empty($key))
				return $_REQUEST;
			
			if(!empty($_REQUEST[$key]))
				return $_REQUEST[$key];
			
			return '';
		}
		
		
	}
