<?php
    namespace engine\model;
   		
    class Configs implements \JsonSerializable {

		private $id;
		private $chave;
		private $date_create;
		private $date_update;
		private $valor;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize() {
			return [
				'id' =>$this->getId(),
				'chave' =>$this->getChave(),
				'date_create' =>$this->getDate_create(),
				'date_update' =>$this->getDate_update(),
				'valor' =>$this->getValor()
			];
		}
			
		//ID
		function getId() {
			return $this->id;
		}
		function setId($id) {
			return $this->id = $id;
		}
		
		//CHAVE
		function getChave() {
			return $this->chave;
		}
		function setChave($chave) {
			return $this->chave = $chave;
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
		
		//VALOR
		function getValor() {
			return $this->valor;
		}
		function setValor($valor) {
			return $this->valor = $valor;
		}
		
	}
?>