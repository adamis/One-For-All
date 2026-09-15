<?php
    namespace engine\dao;
   		
    class Mqtt_config implements \JsonSerializable {

		private $id;
		private $client_id_prefix;
		private $command_timeout_seconds;
		private $date_create;
		private $date_update;
		private $exec_topic_template;
		private $host;
		private $password;
		private $porta;
		private $protocolo;
		private $result_topic_filter;
		private $server_topic;
		private $username;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize(): mixed {
			return [
				'id' =>$this->getId(),
				'client_id_prefix' =>$this->getClient_id_prefix(),
				'command_timeout_seconds' =>$this->getCommand_timeout_seconds(),
				'date_create' =>$this->getDate_create(),
				'date_update' =>$this->getDate_update(),
				'exec_topic_template' =>$this->getExec_topic_template(),
				'host' =>$this->getHost(),
				'password' =>$this->getPassword(),
				'porta' =>$this->getPorta(),
				'protocolo' =>$this->getProtocolo(),
				'result_topic_filter' =>$this->getResult_topic_filter(),
				'server_topic' =>$this->getServer_topic(),
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
		
		//CLIENT_ID_PREFIX
		function getClient_id_prefix() {
			return $this->client_id_prefix;
		}
		function setClient_id_prefix($client_id_prefix) {
			return $this->client_id_prefix = $client_id_prefix;
		}
		
		//COMMAND_TIMEOUT_SECONDS
		function getCommand_timeout_seconds() {
			return $this->command_timeout_seconds;
		}
		function setCommand_timeout_seconds($command_timeout_seconds) {
			return $this->command_timeout_seconds = $command_timeout_seconds;
		}
		
		//DATE_CREATE
		function getDate_create() {
			return $this->date_create;
		}
		function setDate_create($date_create) {
			return $this->date_create = $date_create;
		}
		
		//DATE_UPDATE
		function getDate_update() {
			return $this->date_update;
		}
		function setDate_update($date_update) {
			return $this->date_update = $date_update;
		}
		
		//EXEC_TOPIC_TEMPLATE
		function getExec_topic_template() {
			return $this->exec_topic_template;
		}
		function setExec_topic_template($exec_topic_template) {
			return $this->exec_topic_template = $exec_topic_template;
		}
		
		//HOST
		function getHost() {
			return $this->host;
		}
		function setHost($host) {
			return $this->host = $host;
		}
		
		//PASSWORD
		function getPassword() {
			return $this->password;
		}
		function setPassword($password) {
			return $this->password = $password;
		}
		
		//PORTA
		function getPorta() {
			return $this->porta;
		}
		function setPorta($porta) {
			return $this->porta = $porta;
		}
		
		//PROTOCOLO
		function getProtocolo() {
			return $this->protocolo;
		}
		function setProtocolo($protocolo) {
			return $this->protocolo = $protocolo;
		}
		
		//RESULT_TOPIC_FILTER
		function getResult_topic_filter() {
			return $this->result_topic_filter;
		}
		function setResult_topic_filter($result_topic_filter) {
			return $this->result_topic_filter = $result_topic_filter;
		}
		
		//SERVER_TOPIC
		function getServer_topic() {
			return $this->server_topic;
		}
		function setServer_topic($server_topic) {
			return $this->server_topic = $server_topic;
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