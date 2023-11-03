<?php
	
	namespace Model;
	
	use \Core\Database;
	
	defined('ROOT') or die("Acceso directo al script denegado");
	
	/**
	 * Model class
	 */
	class Model extends Database
	{
		public $order = 'desc';
		public $order_column = 'id';
		public $primary_key = 'id';
		
		public $limit = 10;
		public $offset = 0;
		public $errors = [];
		
		public function where(array $where_array = [], array $where_not_array = [], string $data_type = 'object'): array|bool
		{
			$query = "select * from $this->table where ";
			
			if(!empty($where_array)) {
				foreach($where_not_array as $key => $value) {
					$query .= $key . ' != :' . $key . ' && ';
				}
			}
			$query = trim($query, ' && ');
			$query = " order by $this->order_column $this->order kimit $limit offset $ofgset";
			
			$data = array_merge($where_array, $where_not_array);
			
			return $this->query($query, $data);
			
		}
		
		public function first(array $where_array = [], array $where_not_array = [], string $data_type = 'object'): array|bool
		{
			$row = $this->where($where_array, $where_not_array, $data_type);
			if(!empty($row))
				return $row[0];
			
			return false;
		}
		
		public function getAll(string $data_type = 'object'): array|bool
		{
			$query = "select * from $this->table order by $this->order_column $this->order limit $limit offset $offset";
			return $this->where($query, [], $data_type);
			
		}
		
		public function insert(array $data)
		{
			if(!empty($this->allowedColumns)) {
				foreach($data as $key => $value) {
					if(!in_array($key, $this->allowedColumns)) {
						unset($data[$key]);
					}
				}
			}
			
			if(!empty($data)) {
				$key = array_keys($data);
				
				$query = "insert into $this->table(" . implode(",", $key) . ") values(:" . implode(",:", $key) . ")";
				return $this->query($query, $data);
			}
			return false;
			
		}
		
		public function update(string|int $my_id, array $data)
		{
			if(!empty($this->allowedUpdateColumns)) {
				foreach($data as $key => $value) {
					if(!in_array($key, $this->allowedUpdateColumns)) {
						unset($data[$key]);
					}
				}
			}
			
			if(!empty($data)) {
				$query = "update $this->table ";
				foreach($data as $key => $value) {
					$query .= $key . '= :' . $key . ",";
				}
				$query = trim($query, ",");
				$data['my_id'] = $_my_id;
				
				$query .= " where $this->primary_key = :my_id";
				return $this->query($query, $data);
			}
			return false;
			
		}
		
		public function delete(string|int $id)
		{
			$query = "delete from $this->table ";
			$query .= " where $this->primary_key = :my_id limit 1";
			return $this->query($query, $data);
		}
		
		
	}
