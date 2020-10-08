<?php
    namespace engine\dao;
   		
    class Table_stats implements \JsonSerializable {

		private $db_name;
		private $table_name;
		private $cardinality;

		public function getKeys() {
			return [
				'db_name' =>$this->getDb_name(),
				'table_name' =>$this->getTable_name()
			];
		}

		public function jsonSerialize() {
			return [
				'db_name' =>$this->getDb_name(),
				'table_name' =>$this->getTable_name(),
				'cardinality' =>$this->getCardinality()
			];
		}
			
		//DB_NAME
		function getDb_name() {
			return $this->db_name;
		}
		function setDb_name($db_name) {
			return $this->db_name = $db_name;
		}
		
		//TABLE_NAME
		function getTable_name() {
			return $this->table_name;
		}
		function setTable_name($table_name) {
			return $this->table_name = $table_name;
		}
		
		//CARDINALITY
		function getCardinality() {
			return $this->cardinality;
		}
		function setCardinality($cardinality) {
			return $this->cardinality = $cardinality;
		}
		
	}
?>