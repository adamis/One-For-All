<?php
    namespace engine\dao;
   		
    class Ad_servidores implements \JsonSerializable {

		private $id;
		private $date_create;
		private $date_update;
		private $hostname;
		private $last_seen;
		private $nome;
		private $status;
		private $fk_condominio_id;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize(): mixed {
			return [
				'id' =>$this->getId(),
				'date_create' =>$this->getDate_create(),
				'date_update' =>$this->getDate_update(),
				'hostname' =>$this->getHostname(),
				'last_seen' =>$this->getLast_seen(),
				'nome' =>$this->getNome(),
				'status' =>$this->getStatus(),
				'fk_condominio_id' =>$this->getFk_condominio_id()
			];
		}
			
		//ID
		function getId() {
			return $this->id;
		}
		function setId($id) {
			return $this->id = $id;
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
		
		//HOSTNAME
		function getHostname() {
			return $this->hostname;
		}
		function setHostname($hostname) {
			return $this->hostname = $hostname;
		}
		
		//LAST_SEEN
		function getLast_seen() {
			return $this->last_seen;
		}
		function setLast_seen($last_seen) {
			return $this->last_seen = $last_seen;
		}
		
		//NOME
		function getNome() {
			return $this->nome;
		}
		function setNome($nome) {
			return $this->nome = $nome;
		}
		
		//STATUS
		function getStatus() {
			return $this->status;
		}
		function setStatus($status) {
			return $this->status = $status;
		}
		
		//FK_CONDOMINIO_ID
		function getFk_condominio_id() {
			return $this->fk_condominio_id;
		}
		function setFk_condominio_id($fk_condominio_id) {
			return $this->fk_condominio_id = $fk_condominio_id;
		}
		
	}
?>