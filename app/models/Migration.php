<?php
	
	namespace Migration;
	
	use \Core\Database;
	
	/**
	 * Migration class
	 */
	class Migration extends Database
	{
		private $columns = [];
		private $keys = [];
		private $data = [];
		private $primaryKeys = [];
		private $foreignKeys = [];
		private $uniqueKeys = [];
		private $fullTextKeys = [];
		
		
		public function createTable()
		{
			if (!empty($this->columns)) {
				
				$query = "CREATE TABLE IF NOT EXISTS $table (";
				
				$query .= implode (",", $this->columns) . ',';
				
				foreach ($this->primaryKeys as $key) {
					$query .= "primary key ($key),";
				}
				
				foreach ($this->keys as $key) {
					$query .= "key ($key),";
				}
				
				foreach ($this->uniqueKeys as $key) {
					$query .= "unique key $key ($key),";
				}
				
				foreach ($this->fullTextKeys as $key) {
					$query .= "fulltext key $key ($key),";
				}
				
				$query = trim ($query, ",");
				
				$query .= ")ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4";
				
				$this->query ($query);
				
				$this->$columns = [];
				$this->$keys = [];
				$this->$data = [];
				$this->$primaryKeys = [];
				$this->$foreignKeys = [];
				$this->$uniqueKeys = [];
				$this->$fullTextKeys = [];
				
				echo "\n\r Table $table created successfully!";
			} else {
				echo "\n\r Column data not fount! Could not create table: $table";
			}
			
		}
		
		public function insert(string $table)
		{
			if (!empty($this->data) && is_array ($this->data)) {
				foreach ($data as $row) {
					
					$key = array_keys ($row);
					$columns_string = implode (",", $key);
					$values_string = ':' . implode(",:", $keu);
					
				    $query = "INSERT INTO $table ($columns_string) VALUES ($values_string)";
						$this->query ($query, $row);
				}
				
				$this->data = [];
				echo "\n\r Data inserted successfully in table: $table";
			} else {
				echo "\n\r Row data not fount! No data inserted in table: $table";
			}
		}
		
		public function addColumn(string $column)
		{
			
			$this->$columns[] = $column;
		}
		
		public function addKey(string $key)
		{
			
			$this->$keys[] = $key;
		}
		
		public function addPrimaryKey(string $primaryKey)
		{
			
			$this->$primaryKeys[] = $primaryKey;
		}
		
		public function addData(string $data)
		{
			
			$this->$data[] = $data;
		}
		
		public function drop()
		{
			$query = "DROP TABLE IF EXISTS $table";
			$this->query ($query);
			
			echo "\n\r Table $table deleted successfully!";
			
		}
		
	}

