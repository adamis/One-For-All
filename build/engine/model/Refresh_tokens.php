<?php
    namespace engine\model;
   		
    class Refresh_tokens implements \JsonSerializable {

		private $token;
		private $created_at;
		private $expires_at;
		private $revoked;
		private $username;

		public function getKeys() {
			return [
				'token' =>$this->getToken()
			];
		}

		public function jsonSerialize() {
			return [
				'token' =>$this->getToken(),
				'created_at' =>$this->getCreated_at(),
				'expires_at' =>$this->getExpires_at(),
				'revoked' =>$this->getRevoked(),
				'username' =>$this->getUsername()
			];
		}
			
		//TOKEN
		function getToken() {
			return $this->token;
		}
		function setToken($token) {
			return $this->token = $token;
		}
		
		//CREATED_AT
		function getCreated_at() {
			return $this->created_at;
		}
		function setCreated_at($created_at) {
			return $this->created_at = $created_at;
		}
		
		//EXPIRES_AT
		function getExpires_at() {
			return $this->expires_at;
		}
		function setExpires_at($expires_at) {
			return $this->expires_at = $expires_at;
		}
		
		//REVOKED
		function getRevoked() {
			return $this->revoked;
		}
		function setRevoked($revoked) {
			return $this->revoked = $revoked;
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