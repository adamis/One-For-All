<?php
    namespace engine\dao;
   		
    class Help_category implements \JsonSerializable {

		private $help_category_id;
		private $name;
		private $parent_category_id;
		private $url;

		public function getKeys() {
			return [
				'help_category_id' =>$this->getHelp_category_id()
			];
		}

		public function jsonSerialize() {
			return [
				'help_category_id' =>$this->getHelp_category_id(),
				'name' =>$this->getName(),
				'parent_category_id' =>$this->getParent_category_id(),
				'url' =>$this->getUrl()
			];
		}
			
		//HELP_CATEGORY_ID
		function getHelp_category_id() {
			return $this->help_category_id;
		}
		function setHelp_category_id($help_category_id) {
			return $this->help_category_id = $help_category_id;
		}
		
		//NAME
		function getName() {
			return $this->name;
		}
		function setName($name) {
			return $this->name = $name;
		}
		
		//PARENT_CATEGORY_ID
		function getParent_category_id() {
			return $this->parent_category_id;
		}
		function setParent_category_id($parent_category_id) {
			return $this->parent_category_id = $parent_category_id;
		}
		
		//URL
		function getUrl() {
			return $this->url;
		}
		function setUrl($url) {
			return $this->url = $url;
		}
		
	}
?>