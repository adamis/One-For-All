<?php
    namespace engine\dao;
   		
    class Logs_autenticacao implements \JsonSerializable {

		private $id;
		private $data_hora;
		private $ip_address;
		private $user_agent;
		private $usuario;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize(): mixed {
			return [
				'id' =>$this->getId(),
				'data_hora' =>$this->getData_hora(),
				'ip_address' =>$this->getIp_address(),
				'user_agent' =>$this->getUser_agent(),
				'usuario' =>$this->getUsuario()
			];
		}
			
		//ID
		function getId() {
			return $this->id;
		}
		function setId($id) {
			return $this->id = $id;
		}
		
		//DATA_HORA
		function getData_hora() {
			return $this->data_hora;
		}
		function setData_hora($data_hora) {
			return $this->data_hora = $data_hora;
		}
		
		//IP_ADDRESS
		function getIp_address() {
			return $this->ip_address;
		}
		function setIp_address($ip_address) {
			return $this->ip_address = $ip_address;
		}
		
		//USER_AGENT
		function getUser_agent() {
			return $this->user_agent;
		}
		function setUser_agent($user_agent) {
			return $this->user_agent = $user_agent;
		}
		
		//USUARIO
		function getUsuario() {
			return $this->usuario;
		}
		function setUsuario($usuario) {
			return $this->usuario = $usuario;
		}
		
	}
?>