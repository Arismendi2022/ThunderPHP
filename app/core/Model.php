<?php
	
	namespace Model;
	
	use \Core\Database;
	
	/**
	 * Model class
	 */
	class Model extends Database
	{
		public $order 				= 'desc';
		public $order_column 	= 'id';
		
		public $limit 				= 10;
		public $errors 				= [];
		
		public function where(array $where_array = [], array $where_not_array = [], string $data_type = 'object'): array|bool
		{
			$query = "select * from $this->table where ";
			
			if (!empty($where_array)) {
				foreach ($where_not_array as $key => $value) {
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
			if (!empty($row))
				return $row[0];
			
			return false;
		}
		
		public function getAll(string $data_type = 'object'): array|bool
		{
			$query = "select * from $this->table order by $this->order_column $this->order limit $limit offset $offset";
			return $this->where($query, [], $data_type);
			
		}
		
		public function insert(array $data){
		
		}
		
		public function update(string|int $id, array $data){
		
		}
		
		public function delete(string|int $id){
		
		}
		
		
	}
