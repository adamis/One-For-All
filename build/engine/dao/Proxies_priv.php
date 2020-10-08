<?php
    namespace engine\dao;
   		
    class Proxies_priv implements \JsonSerializable {

		private $Host;
		private $User;
		private $Proxied_host;
		private $Proxied_user;
		private $With_grant;
		private $Grantor;
		private $Timestamp;

		public function getKeys() {
			return [
				'Host' =>$this->getHost(),
				'User' =>$this->getUser(),
				'Proxied_host' =>$this->getProxied_host(),
				'Proxied_user' =>$this->getProxied_user()
			];
		}

		public function jsonSerialize() {
			return [
				'Host' =>$this->getHost(),
				'User' =>$this->getUser(),
				'Proxied_host' =>$this->getProxied_host(),
				'Proxied_user' =>$this->getProxied_user(),
				'With_grant' =>$this->getWith_grant(),
				'Grantor' =>$this->getGrantor(),
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
		
		//USER
		function getUser() {
			return $this->User;
		}
		function setUser($User) {
			return $this->User = $User;
		}
		
		//PROXIED_HOST
		function getProxied_host() {
			return $this->Proxied_host;
		}
		function setProxied_host($Proxied_host) {
			return $this->Proxied_host = $Proxied_host;
		}
		
		//PROXIED_USER
		function getProxied_user() {
			return $this->Proxied_user;
		}
		function setProxied_user($Proxied_user) {
			return $this->Proxied_user = $Proxied_user;
		}
		
		//WITH_GRANT
		function getWith_grant() {
			return $this->With_grant;
		}
		function setWith_grant($With_grant) {
			return $this->With_grant = $With_grant;
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
		
	}
?>