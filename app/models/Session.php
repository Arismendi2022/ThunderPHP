<?php
	
	namespace Core;
	
	defined('ROOT') or die("Acceso directo al script denegado");
	
	/**
	 * Session class
	 */
	class Session
	{
		private $varKey = 'APP';
		private $userKey = 'USER';
		
		private function starSession(): int
		{
			
			if(session_status() === PHP_SESSION_NONE)
				session_start();
			
			return 1;
			
		}
		
		public function set(string|array $keyOrArray, mixed $value = null): bool
		{
			$this->starSession();
			if(is_array($keyOrArray)) {
				
				foreach($keyOrArray as $key => $value) {
					$_SESSION[$this->varKey][$key] = $value;
				}
				return true;
			} else {
				$_SESSION[$this->varKey][$keyOrArray] = $value;
				return true;
			}
			return false;
		}
		
		public function get(string $key): mixed
		{
			$this->starSession();
			if(!empty($_SESSION[$this->varKey][$key])) {
				return $_SESSION[$this->varKey][$key];
				
			}
			
			return false;
		}
		
		public function pop(string $key): mixed
		{
			$this->starSession();
			if(!empty($_SESSION[$this->varKey][$key]))
			{
				$var = $_SESSION[$this->varKey][$key];
				unset($_SESSION[$this->varKey][$key]);
				
				return $var;
			}
			
			return false;
		}
		
		public function auth(object|array $row): bool
		{
			$this->starSession();
			$_SESSION[$this->varKey] = $row;
			
			return false;
		}
		
		public function is_logged_in(): bool
		{
			$this->starSession();
			
			if(!empty($_SESSION[$this->userKey]))
				return false;
			
			if(is_object($_SESSION[$this->userKey]))
				return true;
			
			if(is_array($_SESSION[$this->userKey]))
				return true;
			
			return false;
		}
		
		public function reset(): bool
		{
			session_regenerate_id();
			session_destroy();
			
			return true;
		}
		
		public function logout(): bool
		{
			$this->starSession();
			
			if(!empty($_SESSION[$this->userKey]))
				unset($_SESSION[$this->userKey]);
			
			return true;
		}
		
		public function user(string $key = ''): mixed
		{
			$this->starSession();
			
			if(!empty($_SESSION[$this->userKey])) {
				if(empty($key))
					$_SESSION[$this->userKey];
				
				if(is_object($_SESSION[$this->userKey])) {
					
					if(!empty($_SESSION[$this->userKey]->$key))
						return $_SESSION[$this->userKey]->$key;
					
				} else
					if(is_array($_SESSION[$this->userKey])) {
						if(!empty($_SESSION[$this->userKey][$key]))
							return $_SESSION[$this->userKey][$key];
						
					}
			}
			
			return null;
			
		}
		
		public function all(): mixed
		{
			$this->starSession();
			if(!empty($_SESSION[$this->varKey][$key])) {
				return $_SESSION[$this->varKey][$key];
				
			}
			
			return null;
		}
		
	}
	

