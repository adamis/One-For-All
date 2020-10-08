<?php
    namespace engine\dao;
   		
    class Slow_log implements \JsonSerializable {

		private $start_time;
		private $user_host;
		private $query_time;
		private $lock_time;
		private $rows_sent;
		private $rows_examined;
		private $db;
		private $last_insert_id;
		private $insert_id;
		private $server_id;
		private $sql_text;
		private $thread_id;
		private $rows_affected;

		public function getKeys() {
			return [
			];
		}

		public function jsonSerialize() {
			return [
				'start_time' =>$this->getStart_time(),
				'user_host' =>$this->getUser_host(),
				'query_time' =>$this->getQuery_time(),
				'lock_time' =>$this->getLock_time(),
				'rows_sent' =>$this->getRows_sent(),
				'rows_examined' =>$this->getRows_examined(),
				'db' =>$this->getDb(),
				'last_insert_id' =>$this->getLast_insert_id(),
				'insert_id' =>$this->getInsert_id(),
				'server_id' =>$this->getServer_id(),
				'sql_text' =>$this->getSql_text(),
				'thread_id' =>$this->getThread_id(),
				'rows_affected' =>$this->getRows_affected()
			];
		}
			
		//START_TIME
		function getStart_time() {
			return $this->start_time;
		}
		function setStart_time($start_time) {
			return $this->start_time = $start_time;
		}
		
		//USER_HOST
		function getUser_host() {
			return $this->user_host;
		}
		function setUser_host($user_host) {
			return $this->user_host = $user_host;
		}
		
		//QUERY_TIME
		function getQuery_time() {
			return $this->query_time;
		}
		function setQuery_time($query_time) {
			return $this->query_time = $query_time;
		}
		
		//LOCK_TIME
		function getLock_time() {
			return $this->lock_time;
		}
		function setLock_time($lock_time) {
			return $this->lock_time = $lock_time;
		}
		
		//ROWS_SENT
		function getRows_sent() {
			return $this->rows_sent;
		}
		function setRows_sent($rows_sent) {
			return $this->rows_sent = $rows_sent;
		}
		
		//ROWS_EXAMINED
		function getRows_examined() {
			return $this->rows_examined;
		}
		function setRows_examined($rows_examined) {
			return $this->rows_examined = $rows_examined;
		}
		
		//DB
		function getDb() {
			return $this->db;
		}
		function setDb($db) {
			return $this->db = $db;
		}
		
		//LAST_INSERT_ID
		function getLast_insert_id() {
			return $this->last_insert_id;
		}
		function setLast_insert_id($last_insert_id) {
			return $this->last_insert_id = $last_insert_id;
		}
		
		//INSERT_ID
		function getInsert_id() {
			return $this->insert_id;
		}
		function setInsert_id($insert_id) {
			return $this->insert_id = $insert_id;
		}
		
		//SERVER_ID
		function getServer_id() {
			return $this->server_id;
		}
		function setServer_id($server_id) {
			return $this->server_id = $server_id;
		}
		
		//SQL_TEXT
		function getSql_text() {
			return $this->sql_text;
		}
		function setSql_text($sql_text) {
			return $this->sql_text = $sql_text;
		}
		
		//THREAD_ID
		function getThread_id() {
			return $this->thread_id;
		}
		function setThread_id($thread_id) {
			return $this->thread_id = $thread_id;
		}
		
		//ROWS_AFFECTED
		function getRows_affected() {
			return $this->rows_affected;
		}
		function setRows_affected($rows_affected) {
			return $this->rows_affected = $rows_affected;
		}
		
	}
?>