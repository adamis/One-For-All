<?php
    namespace engine\dao;
   		
    class Column_stats implements \JsonSerializable {

		private $db_name;
		private $table_name;
		private $column_name;
		private $min_value;
		private $max_value;
		private $nulls_ratio;
		private $avg_length;
		private $avg_frequency;
		private $hist_size;
		private $hist_type;
		private $histogram;

		public function getKeys() {
			return [
				'db_name' =>$this->getDb_name(),
				'table_name' =>$this->getTable_name(),
				'column_name' =>$this->getColumn_name()
			];
		}

		public function jsonSerialize() {
			return [
				'db_name' =>$this->getDb_name(),
				'table_name' =>$this->getTable_name(),
				'column_name' =>$this->getColumn_name(),
				'min_value' =>$this->getMin_value(),
				'max_value' =>$this->getMax_value(),
				'nulls_ratio' =>$this->getNulls_ratio(),
				'avg_length' =>$this->getAvg_length(),
				'avg_frequency' =>$this->getAvg_frequency(),
				'hist_size' =>$this->getHist_size(),
				'hist_type' =>$this->getHist_type(),
				'histogram' =>$this->getHistogram()
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
		
		//COLUMN_NAME
		function getColumn_name() {
			return $this->column_name;
		}
		function setColumn_name($column_name) {
			return $this->column_name = $column_name;
		}
		
		//MIN_VALUE
		function getMin_value() {
			return $this->min_value;
		}
		function setMin_value($min_value) {
			return $this->min_value = $min_value;
		}
		
		//MAX_VALUE
		function getMax_value() {
			return $this->max_value;
		}
		function setMax_value($max_value) {
			return $this->max_value = $max_value;
		}
		
		//NULLS_RATIO
		function getNulls_ratio() {
			return $this->nulls_ratio;
		}
		function setNulls_ratio($nulls_ratio) {
			return $this->nulls_ratio = $nulls_ratio;
		}
		
		//AVG_LENGTH
		function getAvg_length() {
			return $this->avg_length;
		}
		function setAvg_length($avg_length) {
			return $this->avg_length = $avg_length;
		}
		
		//AVG_FREQUENCY
		function getAvg_frequency() {
			return $this->avg_frequency;
		}
		function setAvg_frequency($avg_frequency) {
			return $this->avg_frequency = $avg_frequency;
		}
		
		//HIST_SIZE
		function getHist_size() {
			return $this->hist_size;
		}
		function setHist_size($hist_size) {
			return $this->hist_size = $hist_size;
		}
		
		//HIST_TYPE
		function getHist_type() {
			return $this->hist_type;
		}
		function setHist_type($hist_type) {
			return $this->hist_type = $hist_type;
		}
		
		//HISTOGRAM
		function getHistogram() {
			return $this->histogram;
		}
		function setHistogram($histogram) {
			return $this->histogram = $histogram;
		}
		
	}
?>