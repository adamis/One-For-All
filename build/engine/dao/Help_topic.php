<?php
    namespace engine\dao;
   		
    class Help_topic implements \JsonSerializable {

		private $help_topic_id;
		private $name;
		private $help_category_id;
		private $description;
		private $example;
		private $url;

		public function getKeys() {
			return [
				'help_topic_id' =>$this->getHelp_topic_id()
			];
		}

		public function jsonSerialize() {
			return [
				'help_topic_id' =>$this->getHelp_topic_id(),
				'name' =>$this->getName(),
				'help_category_id' =>$this->getHelp_category_id(),
				'description' =>$this->getDescription(),
				'example' =>$this->getExample(),
				'url' =>$this->getUrl()
			];
		}
			
		//HELP_TOPIC_ID
		function getHelp_topic_id() {
			return $this->help_topic_id;
		}
		function setHelp_topic_id($help_topic_id) {
			return $this->help_topic_id = $help_topic_id;
		}
		
		//NAME
		function getName() {
			return $this->name;
		}
		function setName($name) {
			return $this->name = $name;
		}
		
		//HELP_CATEGORY_ID
		function getHelp_category_id() {
			return $this->help_category_id;
		}
		function setHelp_category_id($help_category_id) {
			return $this->help_category_id = $help_category_id;
		}
		
		//DESCRIPTION
		function getDescription() {
			return $this->description;
		}
		function setDescription($description) {
			return $this->description = $description;
		}
		
		//EXAMPLE
		function getExample() {
			return $this->example;
		}
		function setExample($example) {
			return $this->example = $example;
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