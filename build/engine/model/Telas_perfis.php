<?php
    namespace engine\model;
   		
    class Telas_perfis implements \JsonSerializable {

		private $id;
		private $date_create;
		private $date_update;
		private $fk_perfil_id;
		private $fk_telas_id;

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
				'fk_perfil_id' =>$this->getFk_perfil_id(),
				'fk_telas_id' =>$this->getFk_telas_id()
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
		
		//FK_PERFIL_ID
		function getFk_perfil_id() {
			return $this->fk_perfil_id;
		}
		function setFk_perfil_id($fk_perfil_id) {
			return $this->fk_perfil_id = $fk_perfil_id;
		}
		
		//FK_TELAS_ID
		function getFk_telas_id() {
			return $this->fk_telas_id;
		}
		function setFk_telas_id($fk_telas_id) {
			return $this->fk_telas_id = $fk_telas_id;
		}
		
	}
?>