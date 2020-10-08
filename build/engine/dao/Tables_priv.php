<?php
    namespace engine\dao;
   		
    class Tables_priv implements \JsonSerializable {

		private $Host;
		private $Db;
		private $User;
		private $Table_name;
		private $Grantor;
		private $Timestamp;
		private $Table_priv;
		private $Column_priv;

		public function getKeys() {
			return [
				'Host' =>$this->getHost(),
				'Db' =>$this->getDb(),
				'User' =>$this->getUser(),
				'Table_name' =>$this->getTable_name()
			];
		}

		public function jsonSerialize() {
			return [
				'Host' =>$this->getHost(),
				'Db' =>$this->getDb(),
				'User' =>$this->getUser(),
				'Table_name' =>$this->getTable_name(),
				'Grantor' =>$this->getGrantor(),
				'Timestamp' =>$this->getTimestamp(),
				'Table_priv' =>$this->getTable_priv(),
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
		
		//GRANTOR
		function getGrantor() {
			return $this->Grantor;
		}
		function setGrantor($Grantor) {
			return $this->Grantor = $Grantor;
		}
		
		//TIMESTAMP
		function getTimestamp() {
			return $this->Timestamp;
		}
		function setTimestamp($Timestamp) {
			return $this->Timestamp = $Timestamp;
		}
		
		//TABLE_PRIV
		function getTable_priv() {
			return $this->Table_priv;
		}
		function setTable_priv($Table_priv) {
			return $this->Table_priv = $Table_priv;
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