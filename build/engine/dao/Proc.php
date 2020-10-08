<?php
    namespace engine\dao;
   		
    class Proc implements \JsonSerializable {

		private $db;
		private $name;
		private $type;
		private $specific_name;
		private $language;
		private $sql_data_access;
		private $is_deterministic;
		private $security_type;
		private $param_list;
		private $returns;
		private $body;
		private $definer;
		private $created;
		private $modified;
		private $sql_mode;
		private $comment;
		private $character_set_client;
		private $collation_connection;
		private $db_collation;
		private $body_utf8;
		private $aggregate;

		public function getKeys() {
			return [
				'db' =>$this->getDb(),
				'name' =>$this->getName(),
				'type' =>$this->getType()
			];
		}

		public function jsonSerialize() {
			return [
				'db' =>$this->getDb(),
				'name' =>$this->getName(),
				'type' =>$this->getType(),
				'specific_name' =>$this->getSpecific_name(),
				'language' =>$this->getLanguage(),
				'sql_data_access' =>$this->getSql_data_access(),
				'is_deterministic' =>$this->getIs_deterministic(),
				'security_type' =>$this->getSecurity_type(),
				'param_list' =>$this->getParam_list(),
				'returns' =>$this->getReturns(),
				'body' =>$this->getBody(),
				'definer' =>$this->getDefiner(),
				'created' =>$this->getCreated(),
				'modified' =>$this->getModified(),
				'sql_mode' =>$this->getSql_mode(),
				'comment' =>$this->getComment(),
				'character_set_client' =>$this->getCharacter_set_client(),
				'collation_connection' =>$this->getCollation_connection(),
				'db_collation' =>$this->getDb_collation(),
				'body_utf8' =>$this->getBody_utf8(),
				'aggregate' =>$this->getAggregate()
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
		
		//TYPE
		function getType() {
			return $this->type;
		}
		function setType($type) {
			return $this->type = $type;
		}
		
		//SPECIFIC_NAME
		function getSpecific_name() {
			return $this->specific_name;
		}
		function setSpecific_name($specific_name) {
			return $this->specific_name = $specific_name;
		}
		
		//LANGUAGE
		function getLanguage() {
			return $this->language;
		}
		function setLanguage($language) {
			return $this->language = $language;
		}
		
		//SQL_DATA_ACCESS
		function getSql_data_access() {
			return $this->sql_data_access;
		}
		function setSql_data_access($sql_data_access) {
			return $this->sql_data_access = $sql_data_access;
		}
		
		//IS_DETERMINISTIC
		function getIs_deterministic() {
			return $this->is_deterministic;
		}
		function setIs_deterministic($is_deterministic) {
			return $this->is_deterministic = $is_deterministic;
		}
		
		//SECURITY_TYPE
		function getSecurity_type() {
			return $this->security_type;
		}
		function setSecurity_type($security_type) {
			return $this->security_type = $security_type;
		}
		
		//PARAM_LIST
		function getParam_list() {
			return $this->param_list;
		}
		function setParam_list($param_list) {
			return $this->param_list = $param_list;
		}
		
		//RETURNS
		function getReturns() {
			return $this->returns;
		}
		function setReturns($returns) {
			return $this->returns = $returns;
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
		
		//AGGREGATE
		function getAggregate() {
			return $this->aggregate;
		}
		function setAggregate($aggregate) {
			return $this->aggregate = $aggregate;
		}
		
	}
?>