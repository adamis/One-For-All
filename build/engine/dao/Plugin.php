<?php
    namespace engine\dao;
   		
    class Plugin implements \JsonSerializable {

		private $name;
		private $dl;

		public function getKeys() {
			return [
				'name' =>$this->getName()
			];
		}

		public function jsonSerialize() {
			return [
				'name' =>$this->getName(),
				'dl' =>$this->getDl()
			];
		}
			
		//NAME
		function getName() {
			return $this->name;
		}
		function setName($name) {
			return $this->name = $name;
		}
		
		//DL
		function getDl() {
			return $this->dl;
		}
		function setDl($dl) {
			return $this->dl = $dl;
		}
		
	}
?>