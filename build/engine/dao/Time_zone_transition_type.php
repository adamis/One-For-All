<?php
    namespace engine\dao;
   		
    class Time_zone_transition_type implements \JsonSerializable {

		private $Time_zone_id;
		private $Transition_type_id;
		private $Offset;
		private $Is_DST;
		private $Abbreviation;

		public function getKeys() {
			return [
				'Time_zone_id' =>$this->getTime_zone_id(),
				'Transition_type_id' =>$this->getTransition_type_id()
			];
		}

		public function jsonSerialize() {
			return [
				'Time_zone_id' =>$this->getTime_zone_id(),
				'Transition_type_id' =>$this->getTransition_type_id(),
				'Offset' =>$this->getOffset(),
				'Is_DST' =>$this->getIs_DST(),
				'Abbreviation' =>$this->getAbbreviation()
			];
		}
			
		//TIME_ZONE_ID
		function getTime_zone_id() {
			return $this->Time_zone_id;
		}
		function setTime_zone_id($Time_zone_id) {
			return $this->Time_zone_id = $Time_zone_id;
		}
		
		//TRANSITION_TYPE_ID
		function getTransition_type_id() {
			return $this->Transition_type_id;
		}
		function setTransition_type_id($Transition_type_id) {
			return $this->Transition_type_id = $Transition_type_id;
		}
		
		//OFFSET
		function getOffset() {
			return $this->Offset;
		}
		function setOffset($Offset) {
			return $this->Offset = $Offset;
		}
		
		//IS_DST
		function getIs_DST() {
			return $this->Is_DST;
		}
		function setIs_DST($Is_DST) {
			return $this->Is_DST = $Is_DST;
		}
		
		//ABBREVIATION
		function getAbbreviation() {
			return $this->Abbreviation;
		}
		function setAbbreviation($Abbreviation) {
			return $this->Abbreviation = $Abbreviation;
		}
		
	}
?>