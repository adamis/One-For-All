<?php
    namespace engine\dao;
   		
    class Users implements \JsonSerializable {

		private $id;
		private $enabled;
		private $password;
		private $roles;
		private $username;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize(): mixed {
			return [
				'id' =>$this->getId(),
				'enabled' =>$this->getEnabled(),
				'password' =>$this->getPassword(),
				'roles' =>$this->getRoles(),
				'username' =>$this->getUsername()
			];
		}
			
		//ID
		function getId() {
			return $this->id;
		}
		function setId($id) {
			return $this->id = $id;
		}
		
		//ENABLED
		function getEnabled() {
			return $this->enabled;
		}
		function setEnabled($enabled) {
			return $this->enabled = $enabled;
		}
		
		//PASSWORD
		function getPassword() {
			return $this->password;
		}
		function setPassword($password) {
			return $this->password = $password;
		}
		
		//ROLES
		function getRoles() {
			return $this->roles;
		}
		function setRoles($roles) {
			return $this->roles = $roles;
		}
		
		//USERNAME
		function getUsername() {
			return $this->username;
		}
		function setUsername($username) {
			return $this->username = $username;
		}
		
	}
?>