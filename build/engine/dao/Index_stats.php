<?php
    namespace engine\dao;
   		
    class Index_stats implements \JsonSerializable {

		private $db_name;
		private $table_name;
		private $index_name;
		private $prefix_arity;
		private $avg_frequency;

		public function getKeys() {
			return [
				'db_name' =>$this->getDb_name(),
				'table_name' =>$this->getTable_name(),
				'index_name' =>$this->getIndex_name(),
				'prefix_arity' =>$this->getPrefix_arity()
			];
		}

		public function jsonSerialize() {
			return [
				'db_name' =>$this->getDb_name(),
				'table_name' =>$this->getTable_name(),
				'index_name' =>$this->getIndex_name(),
				'prefix_arity' =>$this->getPrefix_arity(),
				'avg_frequency' =>$this->getAvg_frequency()
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
		
		//INDEX_NAME
		function getIndex_name() {
			return $this->index_name;
		}
		function setIndex_name($index_name) {
			return $this->index_name = $index_name;
		}
		
		//PREFIX_ARITY
		function getPrefix_arity() {
			return $this->prefix_arity;
		}
		function setPrefix_arity($prefix_arity) {
			return $this->prefix_arity = $prefix_arity;
		}
		
		//AVG_FREQUENCY
		function getAvg_frequency() {
			return $this->avg_frequency;
		}
		function setAvg_frequency($avg_frequency) {
			return $this->avg_frequency = $avg_frequency;
		}
		
	}
?>