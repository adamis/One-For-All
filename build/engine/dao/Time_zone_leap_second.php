<?php
    namespace engine\dao;
   		
    class Time_zone_leap_second implements \JsonSerializable {

		private $Transition_time;
		private $Correction;

		public function getKeys() {
			return [
				'Transition_time' =>$this->getTransition_time()
			];
		}

		public function jsonSerialize() {
			return [
				'Transition_time' =>$this->getTransition_time(),
				'Correction' =>$this->getCorrection()
			];
		}
			
		//TRANSITION_TIME
		function getTransition_time() {
			return $this->Transition_time;
		}
		function setTransition_time($Transition_time) {
			return $this->Transition_time = $Transition_time;
		}
		
		//CORRECTION
		function getCorrection() {
			return $this->Correction;
		}
		function setCorrection($Correction) {
			return $this->Correction = $Correction;
		}
		
	}
?>