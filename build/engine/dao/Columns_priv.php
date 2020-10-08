<?php
    namespace engine\dao;
   		
    class Columns_priv implements \JsonSerializable {

		private $Host;
		private $Db;
		private $User;
		private $Table_name;
		private $Column_name;
		private $Timestamp;
		private $Column_priv;

		public function getKeys() {
			return [
				'Host' =>$this->getHost(),
				'Db' =>$this->getDb(),
				'User' =>$this->getUser(),
				'Table_name' =>$this->getTable_name(),
				'Column_name' =>$this->getColumn_name()
			];
		}

		public function jsonSerialize() {
			return [
				'Host' =>$this->getHost(),
				'Db' =>$this->getDb(),
				'User' =>$this->getUser(),
				'Table_name' =>$this->getTable_name(),
				'Column_name' =>$this->getColumn_name(),
				'Timestamp' =>$this->getTimestamp(),
				'Column_priv' =>$this->getColumn_priv()
			];
		}
			
		//HOST
		function getHost() {
			return $this->Host;
		}
		function setHost($Host) {
			return $this->Host = $Host;
		}
		
		//DB
		function getDb() {
			return $this->Db;
		}
		function setDb($Db) {
			return $this->Db = $Db;
		}
		
		//USER
		function getUser() {
			return $this->User;
		}
		function setUser($User) {
			return $this->User = $User;
		}
		
		//TABLE_NAME
		function getTable_name() {
			return $this->Table_name;
		}
		function setTable_name($Table_name) {
			return $this->Table_name = $Table_name;
		}
		
		//COLUMN_NAME
		function getColumn_name() {
			return $this->Column_name;
		}
		function setColumn_name($Column_name) {
			return $this->Column_name = $Column_name;
		}
		
		//TIMESTAMP
		function getTimestamp() {
			return $this->Timestamp;
		}
		function setTimestamp($Timestamp) {
			return $this->Timestamp = $Timestamp;
		}
		
		//COLUMN_PRIV
		function getColumn_priv() {
			return $this->Column_priv;
		}
		function setColumn_priv($Column_priv) {
			return $this->Column_priv = $Column_priv;
		}
		
	}
?>