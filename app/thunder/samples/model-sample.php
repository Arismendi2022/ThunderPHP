<?php

namespace {NAMESPACE};

defined('ROOT') or die("Acceso directo al script denegado");

	/**
	 * {CLASS_NAME} class
	 */

	class {CLASS_NAME} extends Model
	{
		protected $table = '{TABLE_NAME}s';
		public $primary_key = 'id';

		protected $allowedColumns = [
			'column1',
			'date_created',
		];

		protected $allowedUpdateColumns = [
			'column1',
			'date_created',
			'date_deleted',
			'deleted',
		];

		public function validate_insert(array $data):bool
		{
			if(empty($data['email'])) {

				$this->errors['email'] = 'El Email es requerido';
			}else
			if($this->first(['email' => $data['email']]))
			{
				$this->errors['email'] = 'Este Email ya está en uso';
			}else
			if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
			{
				$this->errors['email'] = 'El Email no es válido';
			}
			return empty($this->errors);

		}


		public function validate_update(array $data):bool
		{
			$email_arr = [
				'email'=>$data['email']
			];

			$email_arr_not = [

				$this->primary_key => $data[$this->primary_key] ?? 0
			];

			if(empty($data['email']))
			{
				$this->errors['email'] = 'El Email es requerido';
			}else
			if($this->first($email_arr,$email_arr_not))
			{
				$this->errors['email'] = 'Este Email ya está en uso';
			}else
			if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
			{
				$this->errors['email'] = 'El Email no es válido';
			}

			return empty($this->errors);
		}

	}


