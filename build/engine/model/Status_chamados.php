<?php
    namespace engine\model;
   		
    class Status_chamados implements \JsonSerializable {

		private $id;
		private $date_create;
		private $date_update;
		private $descricao;

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
				'descricao' =>$this->getDescricao()
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
		
	}
?>