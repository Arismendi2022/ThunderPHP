<?php
	
	namespace Migration;

	defined('FCPATH') or die("Acceso directo al script denegado");

	use \Core\Database;
	
	/**
	 * Migration class
	 */
	class Migration extends Database
	{
		private $columns      = [];
		private $keys         = [];
		private $data         = [];
		private $primaryKeys  = [];
		private $foreignKeys  = [];
		private $uniqueKeys   = [];
		private $fullTextKeys = [];
		
		
		public function createTable(string $table)
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
				
				$this->columns      = [];
				$this->keys         = [];
				$this->data         = [];
				$this->primaryKeys  = [];
				$this->foreignKeys  = [];
				$this->uniqueKeys   = [];
				$this->fullTextKeys = [];
				
				echo "\n\rTabla $table creada exitosamente!";
			} else {
				echo "\n\r¡No se encontraron datos de columna! No se pudo crear la tabla: $table";
			}
			
		}
		
		public function insert(string $table)
		{
			if (!empty($this->data) && is_array ($this->data)) {
				foreach ($data as $row) {
					
					$key = array_keys ($row);
					$columns_string = implode (",", $key);
					$values_string = ':' . implode(",:", $key);
					
				    $query = "INSERT INTO $table ($columns_string) VALUES ($values_string)";
						$this->query ($query, $row);
				}
				
				$this->data = [];
				echo "\n\rDatos insertados exitosamente en la tabla: $table";
			} else {
				echo "\n\r¡No se encontraron datos de fila! No hay datos insertados en la tabla.: $table";
			}
		}
		
		public function addColumn(string $column)
		{
			
			$this->columns[] = $column;
		}
		
		public function addKey(string $key)
		{
			
			$this->keys[] = $key;
		}
		
		public function addPrimaryKey(string $primaryKey)
		{
			
			$this->primaryKeys[] = $primaryKey;
		}

		public function addUniqueKey(string $key)
		{
			$this->uniqueKeys[] = $key;
		}

		public function addFullTextKey(string $key)
		{
			$this->fullTextKeys[] = $key;
		}
		
		public function addData(string $data)
		{
			
			$this->data[] = $data;
		}
		
		public function dropTable(string $table)
		{
			$query = "DROP TABLE IF EXISTS $table";
			$this->query ($query);
			
			echo "\n\rTabla $table ¡borrada exitosamente!";
			
		}
		
	}

