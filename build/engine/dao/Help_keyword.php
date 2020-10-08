<?php
    namespace engine\dao;
   		
    class Help_keyword implements \JsonSerializable {

		private $help_keyword_id;
		private $name;

		public function getKeys() {
			return [
				'help_keyword_id' =>$this->getHelp_keyword_id()
			];
		}

		public function jsonSerialize() {
			return [
				'help_keyword_id' =>$this->getHelp_keyword_id(),
				'name' =>$this->getName()
			];
		}
			
		//HELP_KEYWORD_ID
		function getHelp_keyword_id() {
			return $this->help_keyword_id;
		}
		function setHelp_keyword_id($help_keyword_id) {
			return $this->help_keyword_id = $help_keyword_id;
		}
		
		//NAME
		function getName() {
			return $this->name;
		}
		function setName($name) {
			return $this->name = $name;
		}
		
	}
?>