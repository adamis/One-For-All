<?php
    namespace engine\dao;
   		
    class Time_zone_transition implements \JsonSerializable {

		private $Time_zone_id;
		private $Transition_time;
		private $Transition_type_id;

		public function getKeys() {
			return [
				'Time_zone_id' =>$this->getTime_zone_id(),
				'Transition_time' =>$this->getTransition_time()
			];
		}

		public function jsonSerialize() {
			return [
				'Time_zone_id' =>$this->getTime_zone_id(),
				'Transition_time' =>$this->getTransition_time(),
				'Transition_type_id' =>$this->getTransition_type_id()
			];
		}
			
		//TIME_ZONE_ID
		function getTime_zone_id() {
			return $this->Time_zone_id;
		}
		function setTime_zone_id($Time_zone_id) {
			return $this->Time_zone_id = $Time_zone_id;
		}
		
		//TRANSITION_TIME
		function getTransition_time() {
			return $this->Transition_time;
		}
		function setTransition_time($Transition_time) {
			return $this->Transition_time = $Transition_time;
		}
		
		//TRANSITION_TYPE_ID
		function getTransition_type_id() {
			return $this->Transition_type_id;
		}
		function setTransition_type_id($Transition_type_id) {
			return $this->Transition_type_id = $Transition_type_id;
		}
		
	}
?>