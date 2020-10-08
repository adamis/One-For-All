<?php
    namespace engine\dao;
   		
    class Time_zone implements \JsonSerializable {

		private $Time_zone_id;
		private $Use_leap_seconds;

		public function getKeys() {
			return [
				'Time_zone_id' =>$this->getTime_zone_id()
			];
		}

		public function jsonSerialize() {
			return [
				'Time_zone_id' =>$this->getTime_zone_id(),
				'Use_leap_seconds' =>$this->getUse_leap_seconds()
			];
		}
			
		//TIME_ZONE_ID
		function getTime_zone_id() {
			return $this->Time_zone_id;
		}
		function setTime_zone_id($Time_zone_id) {
			return $this->Time_zone_id = $Time_zone_id;
		}
		
		//USE_LEAP_SECONDS
		function getUse_leap_seconds() {
			return $this->Use_leap_seconds;
		}
		function setUse_leap_seconds($Use_leap_seconds) {
			return $this->Use_leap_seconds = $Use_leap_seconds;
		}
		
	}
?>