<?php
    namespace engine\dao;
   		
    class Servers implements \JsonSerializable {

		private $Server_name;
		private $Host;
		private $Db;
		private $Username;
		private $Password;
		private $Port;
		private $Socket;
		private $Wrapper;
		private $Owner;

		public function getKeys() {
			return [
				'Server_name' =>$this->getServer_name()
			];
		}

		public function jsonSerialize() {
			return [
				'Server_name' =>$this->getServer_name(),
				'Host' =>$this->getHost(),
				'Db' =>$this->getDb(),
				'Username' =>$this->getUsername(),
				'Password' =>$this->getPassword(),
				'Port' =>$this->getPort(),
				'Socket' =>$this->getSocket(),
				'Wrapper' =>$this->getWrapper(),
				'Owner' =>$this->getOwner()
			];
		}
			
		//SERVER_NAME
		function getServer_name() {
			return $this->Server_name;
		}
		function setServer_name($Server_name) {
			return $this->Server_name = $Server_name;
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
		
		//USERNAME
		function getUsername() {
			return $this->Username;
		}
		function setUsername($Username) {
			return $this->Username = $Username;
		}
		
		//PASSWORD
		function getPassword() {
			return $this->Password;
		}
		function setPassword($Password) {
			return $this->Password = $Password;
		}
		
		//PORT
		function getPort() {
			return $this->Port;
		}
		function setPort($Port) {
			return $this->Port = $Port;
		}
		
		//SOCKET
		function getSocket() {
			return $this->Socket;
		}
		function setSocket($Socket) {
			return $this->Socket = $Socket;
		}
		
		//WRAPPER
		function getWrapper() {
			return $this->Wrapper;
		}
		function setWrapper($Wrapper) {
			return $this->Wrapper = $Wrapper;
		}
		
		//OWNER
		function getOwner() {
			return $this->Owner;
		}
		function setOwner($Owner) {
			return $this->Owner = $Owner;
		}
		
	}
?>