<?php
    namespace engine\model;
   		
    class Telas implements \JsonSerializable {

		private $id;
		private $label;
		private $icon;
		private $router_link;
		private $fk_menu_id;
		private $date_create;
		private $date_update;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize() {
			return [
				'id' =>$this->getId(),
				'label' =>$this->getLabel(),
				'icon' =>$this->getIcon(),
				'router_link' =>$this->getRouter_link(),
				'fk_menu_id' =>$this->getFk_menu_id(),
				'date_create' =>$this->getDate_create(),
				'date_update' =>$this->getDate_update()
			];
		}
			
		//ID
		function getId() {
			return $this->id;
		}
		function setId($id) {
			return $this->id = $id;
		}
		
		//LABEL
		function getLabel() {
			return $this->label;
		}
		function setLabel($label) {
			return $this->label = $label;
		}
		
		//ICON
		function getIcon() {
			return $this->icon;
		}
		function setIcon($icon) {
			return $this->icon = $icon;
		}
		
		//ROUTER_LINK
		function getRouter_link() {
			return $this->router_link;
		}
		function setRouter_link($router_link) {
			return $this->router_link = $router_link;
		}
		
		//FK_MENU_ID
		function getFk_menu_id() {
			return $this->fk_menu_id;
		}
		function setFk_menu_id($fk_menu_id) {
			return $this->fk_menu_id = $fk_menu_id;
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
		
	}
?>