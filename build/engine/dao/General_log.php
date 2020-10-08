<?php
    namespace engine\dao;
   		
    class General_log implements \JsonSerializable {

		private $event_time;
		private $user_host;
		private $thread_id;
		private $server_id;
		private $command_type;
		private $argument;

		public function getKeys() {
			return [
			];
		}

		public function jsonSerialize() {
			return [
				'event_time' =>$this->getEvent_time(),
				'user_host' =>$this->getUser_host(),
				'thread_id' =>$this->getThread_id(),
				'server_id' =>$this->getServer_id(),
				'command_type' =>$this->getCommand_type(),
				'argument' =>$this->getArgument()
			];
		}
			
		//EVENT_TIME
		function getEvent_time() {
			return $this->event_time;
		}
		function setEvent_time($event_time) {
			return $this->event_time = $event_time;
		}
		
		//USER_HOST
		function getUser_host() {
			return $this->user_host;
		}
		function setUser_host($user_host) {
			return $this->user_host = $user_host;
		}
		
		//THREAD_ID
		function getThread_id() {
			return $this->thread_id;
		}
		function setThread_id($thread_id) {
			return $this->thread_id = $thread_id;
		}
		
		//SERVER_ID
		function getServer_id() {
			return $this->server_id;
		}
		function setServer_id($server_id) {
			return $this->server_id = $server_id;
		}
		
		//COMMAND_TYPE
		function getCommand_type() {
			return $this->command_type;
		}
		function setCommand_type($command_type) {
			return $this->command_type = $command_type;
		}
		
		//ARGUMENT
		function getArgument() {
			return $this->argument;
		}
		function setArgument($argument) {
			return $this->argument = $argument;
		}
		
	}
?>