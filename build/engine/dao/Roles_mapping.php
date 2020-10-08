<?php
    namespace engine\dao;
   		
    class Roles_mapping implements \JsonSerializable {

		private $Host;
		private $User;
		private $Role;
		private $Admin_option;

		public function getKeys() {
			return [
			];
		}

		public function jsonSerialize() {
			return [
				'Host' =>$this->getHost(),
				'User' =>$this->getUser(),
				'Role' =>$this->getRole(),
				'Admin_option' =>$this->getAdmin_option()
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
		
		//ROLE
		function getRole() {
			return $this->Role;
		}
		function setRole($Role) {
			return $this->Role = $Role;
		}
		
		//ADMIN_OPTION
		function getAdmin_option() {
			return $this->Admin_option;
		}
		function setAdmin_option($Admin_option) {
			return $this->Admin_option = $Admin_option;
		}
		
	}
?>