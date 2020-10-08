<?php
    namespace engine\dao;
   		
    class Func implements \JsonSerializable {

		private $name;
		private $ret;
		private $dl;
		private $type;

		public function getKeys() {
			return [
				'name' =>$this->getName()
			];
		}

		public function jsonSerialize() {
			return [
				'name' =>$this->getName(),
				'ret' =>$this->getRet(),
				'dl' =>$this->getDl(),
				'type' =>$this->getType()
			];
		}
			
		//NAME
		function getName() {
			return $this->name;
		}
		function setName($name) {
			return $this->name = $name;
		}
		
		//RET
		function getRet() {
			return $this->ret;
		}
		function setRet($ret) {
			return $this->ret = $ret;
		}
		
		//DL
		function getDl() {
			return $this->dl;
		}
		function setDl($dl) {
			return $this->dl = $dl;
		}
		
		//TYPE
		function getType() {
			return $this->type;
		}
		function setType($type) {
			return $this->type = $type;
		}
		
	}
?>