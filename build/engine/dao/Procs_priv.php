<?php
    namespace engine\dao;
   		
    class Procs_priv implements \JsonSerializable {

		private $Host;
		private $Db;
		private $User;
		private $Routine_name;
		private $Routine_type;
		private $Grantor;
		private $Proc_priv;
		private $Timestamp;

		public function getKeys() {
			return [
				'Host' =>$this->getHost(),
				'Db' =>$this->getDb(),
				'User' =>$this->getUser(),
				'Routine_name' =>$this->getRoutine_name(),
				'Routine_type' =>$this->getRoutine_type()
			];
		}

		public function jsonSerialize() {
			return [
				'Host' =>$this->getHost(),
				'Db' =>$this->getDb(),
				'User' =>$this->getUser(),
				'Routine_name' =>$this->getRoutine_name(),
				'Routine_type' =>$this->getRoutine_type(),
				'Grantor' =>$this->getGrantor(),
				'Proc_priv' =>$this->getProc_priv(),
				'Timestamp' =>$this->getTimestamp()
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
		
		//ROUTINE_NAME
		function getRoutine_name() {
			return $this->Routine_name;
		}
		function setRoutine_name($Routine_name) {
			return $this->Routine_name = $Routine_name;
		}
		
		//ROUTINE_TYPE
		function getRoutine_type() {
			return $this->Routine_type;
		}
		function setRoutine_type($Routine_type) {
			return $this->Routine_type = $Routine_type;
		}
		
		//GRANTOR
		function getGrantor() {
			return $this->Grantor;
		}
		function setGrantor($Grantor) {
			return $this->Grantor = $Grantor;
		}
		
		//PROC_PRIV
		function getProc_priv() {
			return $this->Proc_priv;
		}
		function setProc_priv($Proc_priv) {
			return $this->Proc_priv = $Proc_priv;
		}
		
		//TIMESTAMP
		function getTimestamp() {
			return $this->Timestamp;
		}
		function setTimestamp($Timestamp) {
			return $this->Timestamp = $Timestamp;
		}
		
	}
?>