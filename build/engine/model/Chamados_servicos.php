<?php
    namespace engine\model;
   		
    class Chamados_servicos implements \JsonSerializable {

		private $id;
		private $date_create;
		private $date_update;
		private $fk_chamados_id;
		private $fk_servicos_id;

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
				'fk_chamados_id' =>$this->getFk_chamados_id(),
				'fk_servicos_id' =>$this->getFk_servicos_id()
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
		
		//FK_CHAMADOS_ID
		function getFk_chamados_id() {
			return $this->fk_chamados_id;
		}
		function setFk_chamados_id($fk_chamados_id) {
			return $this->fk_chamados_id = $fk_chamados_id;
		}
		
		//FK_SERVICOS_ID
		function getFk_servicos_id() {
			return $this->fk_servicos_id;
		}
		function setFk_servicos_id($fk_servicos_id) {
			return $this->fk_servicos_id = $fk_servicos_id;
		}
		
	}
?>