<?php
    namespace engine\model;
   		
    class Servicos implements \JsonSerializable {

		private $id;
		private $date_create;
		private $date_update;
		private $descricao;
		private $name;
		private $valor;
		private $fk_condominio_id;

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
				'name' =>$this->getName(),
				'valor' =>$this->getValor(),
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
		
		//DESCRICAO
		function getDescricao() {
			return $this->descricao;
		}
		function setDescricao($descricao) {
			return $this->descricao = $descricao;
		}
		
		//NAME
		function getName() {
			return $this->name;
		}
		function setName($name) {
			return $this->name = $name;
		}
		
		//VALOR
		function getValor() {
			return $this->valor;
		}
		function setValor($valor) {
			return $this->valor = $valor;
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