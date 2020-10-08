<?php
    namespace engine\dao;
   		
    class Innodb_index_stats implements \JsonSerializable {

		private $database_name;
		private $table_name;
		private $index_name;
		private $last_update;
		private $stat_name;
		private $stat_value;
		private $sample_size;
		private $stat_description;

		public function getKeys() {
			return [
				'database_name' =>$this->getDatabase_name(),
				'table_name' =>$this->getTable_name(),
				'index_name' =>$this->getIndex_name(),
				'stat_name' =>$this->getStat_name()
			];
		}

		public function jsonSerialize() {
			return [
				'database_name' =>$this->getDatabase_name(),
				'table_name' =>$this->getTable_name(),
				'index_name' =>$this->getIndex_name(),
				'last_update' =>$this->getLast_update(),
				'stat_name' =>$this->getStat_name(),
				'stat_value' =>$this->getStat_value(),
				'sample_size' =>$this->getSample_size(),
				'stat_description' =>$this->getStat_description()
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
		
		//INDEX_NAME
		function getIndex_name() {
			return $this->index_name;
		}
		function setIndex_name($index_name) {
			return $this->index_name = $index_name;
		}
		
		//LAST_UPDATE
		function getLast_update() {
			return $this->last_update;
		}
		function setLast_update($last_update) {
			return $this->last_update = $last_update;
		}
		
		//STAT_NAME
		function getStat_name() {
			return $this->stat_name;
		}
		function setStat_name($stat_name) {
			return $this->stat_name = $stat_name;
		}
		
		//STAT_VALUE
		function getStat_value() {
			return $this->stat_value;
		}
		function setStat_value($stat_value) {
			return $this->stat_value = $stat_value;
		}
		
		//SAMPLE_SIZE
		function getSample_size() {
			return $this->sample_size;
		}
		function setSample_size($sample_size) {
			return $this->sample_size = $sample_size;
		}
		
		//STAT_DESCRIPTION
		function getStat_description() {
			return $this->stat_description;
		}
		function setStat_description($stat_description) {
			return $this->stat_description = $stat_description;
		}
		
	}
?>