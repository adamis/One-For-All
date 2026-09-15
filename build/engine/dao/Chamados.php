<?php
    namespace engine\dao;
   		
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
		private $anexos;
		private $como_reproduzir;
		private $prioridade;
		private $fk_usuario_criador_id;

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
				'descricao' =>$this->getDescricao(),
				'diagnostico' =>$this->getDiagnostico(),
				'execucao' =>$this->getExecucao(),
				'fk_condominio_id' =>$this->getFk_condominio_id(),
				'fk_notas_fiscais_id' =>$this->getFk_notas_fiscais_id(),
				'fk_status_id' =>$this->getFk_status_id(),
				'anexos' =>$this->getAnexos(),
				'como_reproduzir' =>$this->getComo_reproduzir(),
				'prioridade' =>$this->getPrioridade(),
				'fk_usuario_criador_id' =>$this->getFk_usuario_criador_id()
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
		
		//ANEXOS
		function getAnexos() {
			return $this->anexos;
		}
		function setAnexos($anexos) {
			return $this->anexos = $anexos;
		}
		
		//COMO_REPRODUZIR
		function getComo_reproduzir() {
			return $this->como_reproduzir;
		}
		function setComo_reproduzir($como_reproduzir) {
			return $this->como_reproduzir = $como_reproduzir;
		}
		
		//PRIORIDADE
		function getPrioridade() {
			return $this->prioridade;
		}
		function setPrioridade($prioridade) {
			return $this->prioridade = $prioridade;
		}
		
		//FK_USUARIO_CRIADOR_ID
		function getFk_usuario_criador_id() {
			return $this->fk_usuario_criador_id;
		}
		function setFk_usuario_criador_id($fk_usuario_criador_id) {
			return $this->fk_usuario_criador_id = $fk_usuario_criador_id;
		}
		
	}
?>