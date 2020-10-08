<?php
    namespace engine\dao;
   		
    class Innodb_table_stats implements \JsonSerializable {

		private $database_name;
		private $table_name;
		private $last_update;
		private $n_rows;
		private $clustered_index_size;
		private $sum_of_other_index_sizes;

		public function getKeys() {
			return [
				'database_name' =>$this->getDatabase_name(),
				'table_name' =>$this->getTable_name()
			];
		}

		public function jsonSerialize() {
			return [
				'database_name' =>$this->getDatabase_name(),
				'table_name' =>$this->getTable_name(),
				'last_update' =>$this->getLast_update(),
				'n_rows' =>$this->getN_rows(),
				'clustered_index_size' =>$this->getClustered_index_size(),
				'sum_of_other_index_sizes' =>$this->getSum_of_other_index_sizes()
			];
		}
			
		//DATABASE_NAME
		function getDatabase_name() {
			return $this->database_name;
		}
		function setDatabase_name($database_name) {
			return $this->database_name = $database_name;
		}
		
		//TABLE_NAME
		function getTable_name() {
			return $this->table_name;
		}
		function setTable_name($table_name) {
			return $this->table_name = $table_name;
		}
		
		//LAST_UPDATE
		function getLast_update() {
			return $this->last_update;
		}
		function setLast_update($last_update) {
			return $this->last_update = $last_update;
		}
		
		//N_ROWS
		function getN_rows() {
			return $this->n_rows;
		}
		function setN_rows($n_rows) {
			return $this->n_rows = $n_rows;
		}
		
		//CLUSTERED_INDEX_SIZE
		function getClustered_index_size() {
			return $this->clustered_index_size;
		}
		function setClustered_index_size($clustered_index_size) {
			return $this->clustered_index_size = $clustered_index_size;
		}
		
		//SUM_OF_OTHER_INDEX_SIZES
		function getSum_of_other_index_sizes() {
			return $this->sum_of_other_index_sizes;
		}
		function setSum_of_other_index_sizes($sum_of_other_index_sizes) {
			return $this->sum_of_other_index_sizes = $sum_of_other_index_sizes;
		}
		
	}
?>