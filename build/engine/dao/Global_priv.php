<?php
    namespace engine\dao;
   		
    class Global_priv implements \JsonSerializable {

		private $Host;
		private $User;
		private $Priv;

		public function getKeys() {
			return [
				'Host' =>$this->getHost(),
				'User' =>$this->getUser()
			];
		}

		public function jsonSerialize() {
			return [
				'Host' =>$this->getHost(),
				'User' =>$this->getUser(),
				'Priv' =>$this->getPriv()
			];
		}
			
		//HOST
		function getHost() {
			return $this->Host;
		}
		function setHost($Host) {
			return $this->Host = $Host;
		}
		
		//USER
		function getUser() {
			return $this->User;
		}
		function setUser($User) {
			return $this->User = $User;
		}
		
		//PRIV
		function getPriv() {
			return $this->Priv;
		}
		function setPriv($Priv) {
			return $this->Priv = $Priv;
		}
		
	}
?>