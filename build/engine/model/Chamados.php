<?php
    namespace engine\model;
   		
    class Chamados implements \JsonSerializable {

		private $id;
		private $date_create;
		private $date_update;
		private $descricao;
		private $diagnostico;
		private $execucao;
		private $fk_condominio_id;
		private $fk_notas_fiscais_id;
		private $fk_status_id;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize() {
			return [
				'id' =>$this->getId(),
				'date_create' =>$this->getDate_create(),
				'date_update' =>$this->getDate_update(),
				'descricao' =>$this->getDescricao(),
				'diagnostico' =>$this->getDiagnostico(),
				'execucao' =>$this->getExecucao(),
				'fk_condominio_id' =>$this->getFk_condominio_id(),
				'fk_notas_fiscais_id' =>$this->getFk_notas_fiscais_id(),
				'fk_status_id' =>$this->getFk_status_id()
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
		
		//DESCRICAO
		function getDescricao() {
			return $this->descricao;
		}
		function setDescricao($descricao) {
			return $this->descricao = $descricao;
		}
		
		//DIAGNOSTICO
		function getDiagnostico() {
			return $this->diagnostico;
		}
		function setDiagnostico($diagnostico) {
			return $this->diagnostico = $diagnostico;
		}
		
		//EXECUCAO
		function getExecucao() {
			return $this->execucao;
		}
		function setExecucao($execucao) {
			return $this->execucao = $execucao;
		}
		
		//FK_CONDOMINIO_ID
		function getFk_condominio_id() {
			return $this->fk_condominio_id;
		}
		function setFk_condominio_id($fk_condominio_id) {
			return $this->fk_condominio_id = $fk_condominio_id;
		}
		
		//FK_NOTAS_FISCAIS_ID
		function getFk_notas_fiscais_id() {
			return $this->fk_notas_fiscais_id;
		}
		function setFk_notas_fiscais_id($fk_notas_fiscais_id) {
			return $this->fk_notas_fiscais_id = $fk_notas_fiscais_id;
		}
		
		//FK_STATUS_ID
		function getFk_status_id() {
			return $this->fk_status_id;
		}
		function setFk_status_id($fk_status_id) {
			return $this->fk_status_id = $fk_status_id;
		}
		
	}
?>