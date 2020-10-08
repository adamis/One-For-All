<?php
    namespace engine\dao;
   		
    class Time_zone_name implements \JsonSerializable {

		private $Name;
		private $Time_zone_id;

		public function getKeys() {
			return [
				'Name' =>$this->getName()
			];
		}

		public function jsonSerialize() {
			return [
				'Name' =>$this->getName(),
				'Time_zone_id' =>$this->getTime_zone_id()
			];
		}
			
		//NAME
		function getName() {
			return $this->Name;
		}
		function setName($Name) {
			return $this->Name = $Name;
		}
		
		//TIME_ZONE_ID
		function getTime_zone_id() {
			return $this->Time_zone_id;
		}
		function setTime_zone_id($Time_zone_id) {
			return $this->Time_zone_id = $Time_zone_id;
		}
		
	}
?>