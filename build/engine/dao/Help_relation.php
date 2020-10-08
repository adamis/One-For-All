<?php
    namespace engine\dao;
   		
    class Help_relation implements \JsonSerializable {

		private $help_topic_id;
		private $help_keyword_id;

		public function getKeys() {
			return [
				'help_keyword_id' =>$this->getHelp_keyword_id(),
				'help_topic_id' =>$this->getHelp_topic_id()
			];
		}

		public function jsonSerialize() {
			return [
				'help_topic_id' =>$this->getHelp_topic_id(),
				'help_keyword_id' =>$this->getHelp_keyword_id()
			];
		}
			
		//HELP_TOPIC_ID
		function getHelp_topic_id() {
			return $this->help_topic_id;
		}
		function setHelp_topic_id($help_topic_id) {
			return $this->help_topic_id = $help_topic_id;
		}
		
		//HELP_KEYWORD_ID
		function getHelp_keyword_id() {
			return $this->help_keyword_id;
		}
		function setHelp_keyword_id($help_keyword_id) {
			return $this->help_keyword_id = $help_keyword_id;
		}
		
	}
?>