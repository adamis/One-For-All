<?php
    namespace engine\dao;
   		
    class Event implements \JsonSerializable {

		private $db;
		private $name;
		private $body;
		private $definer;
		private $execute_at;
		private $interval_value;
		private $interval_field;
		private $created;
		private $modified;
		private $last_executed;
		private $starts;
		private $ends;
		private $status;
		private $on_completion;
		private $sql_mode;
		private $comment;
		private $originator;
		private $time_zone;
		private $character_set_client;
		private $collation_connection;
		private $db_collation;
		private $body_utf8;

		public function getKeys() {
			return [
				'db' =>$this->getDb(),
				'name' =>$this->getName()
			];
		}

		public function jsonSerialize() {
			return [
				'db' =>$this->getDb(),
				'name' =>$this->getName(),
				'body' =>$this->getBody(),
				'definer' =>$this->getDefiner(),
				'execute_at' =>$this->getExecute_at(),
				'interval_value' =>$this->getInterval_value(),
				'interval_field' =>$this->getInterval_field(),
				'created' =>$this->getCreated(),
				'modified' =>$this->getModified(),
				'last_executed' =>$this->getLast_executed(),
				'starts' =>$this->getStarts(),
				'ends' =>$this->getEnds(),
				'status' =>$this->getStatus(),
				'on_completion' =>$this->getOn_completion(),
				'sql_mode' =>$this->getSql_mode(),
				'comment' =>$this->getComment(),
				'originator' =>$this->getOriginator(),
				'time_zone' =>$this->getTime_zone(),
				'character_set_client' =>$this->getCharacter_set_client(),
				'collation_connection' =>$this->getCollation_connection(),
				'db_collation' =>$this->getDb_collation(),
				'body_utf8' =>$this->getBody_utf8()
			];
		}
			
		//DB
		function getDb() {
			return $this->db;
		}
		function setDb($db) {
			return $this->db = $db;
		}
		
		//NAME
		function getName() {
			return $this->name;
		}
		function setName($name) {
			return $this->name = $name;
		}
		
		//BODY
		function getBody() {
			return $this->body;
		}
		function setBody($body) {
			return $this->body = $body;
		}
		
		//DEFINER
		function getDefiner() {
			return $this->definer;
		}
		function setDefiner($definer) {
			return $this->definer = $definer;
		}
		
		//EXECUTE_AT
		function getExecute_at() {
			return $this->execute_at;
		}
		function setExecute_at($execute_at) {
			return $this->execute_at = $execute_at;
		}
		
		//INTERVAL_VALUE
		function getInterval_value() {
			return $this->interval_value;
		}
		function setInterval_value($interval_value) {
			return $this->interval_value = $interval_value;
		}
		
		//INTERVAL_FIELD
		function getInterval_field() {
			return $this->interval_field;
		}
		function setInterval_field($interval_field) {
			return $this->interval_field = $interval_field;
		}
		
		//CREATED
		function getCreated() {
			return $this->created;
		}
		function setCreated($created) {
			return $this->created = $created;
		}
		
		//MODIFIED
		function getModified() {
			return $this->modified;
		}
		function setModified($modified) {
			return $this->modified = $modified;
		}
		
		//LAST_EXECUTED
		function getLast_executed() {
			return $this->last_executed;
		}
		function setLast_executed($last_executed) {
			return $this->last_executed = $last_executed;
		}
		
		//STARTS
		function getStarts() {
			return $this->starts;
		}
		function setStarts($starts) {
			return $this->starts = $starts;
		}
		
		//ENDS
		function getEnds() {
			return $this->ends;
		}
		function setEnds($ends) {
			return $this->ends = $ends;
		}
		
		//STATUS
		function getStatus() {
			return $this->status;
		}
		function setStatus($status) {
			return $this->status = $status;
		}
		
		//ON_COMPLETION
		function getOn_completion() {
			return $this->on_completion;
		}
		function setOn_completion($on_completion) {
			return $this->on_completion = $on_completion;
		}
		
		//SQL_MODE
		function getSql_mode() {
			return $this->sql_mode;
		}
		function setSql_mode($sql_mode) {
			return $this->sql_mode = $sql_mode;
		}
		
		//COMMENT
		function getComment() {
			return $this->comment;
		}
		function setComment($comment) {
			return $this->comment = $comment;
		}
		
		//ORIGINATOR
		function getOriginator() {
			return $this->originator;
		}
		function setOriginator($originator) {
			return $this->originator = $originator;
		}
		
		//TIME_ZONE
		function getTime_zone() {
			return $this->time_zone;
		}
		function setTime_zone($time_zone) {
			return $this->time_zone = $time_zone;
		}
		
		//CHARACTER_SET_CLIENT
		function getCharacter_set_client() {
			return $this->character_set_client;
		}
		function setCharacter_set_client($character_set_client) {
			return $this->character_set_client = $character_set_client;
		}
		
		//COLLATION_CONNECTION
		function getCollation_connection() {
			return $this->collation_connection;
		}
		function setCollation_connection($collation_connection) {
			return $this->collation_connection = $collation_connection;
		}
		
		//DB_COLLATION
		function getDb_collation() {
			return $this->db_collation;
		}
		function setDb_collation($db_collation) {
			return $this->db_collation = $db_collation;
		}
		
		//BODY_UTF8
		function getBody_utf8() {
			return $this->body_utf8;
		}
		function setBody_utf8($body_utf8) {
			return $this->body_utf8 = $body_utf8;
		}
		
	}
?>