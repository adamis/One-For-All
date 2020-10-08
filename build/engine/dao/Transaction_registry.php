<?php
    namespace engine\dao;
   		
    class Transaction_registry implements \JsonSerializable {

		private $transaction_id;
		private $commit_id;
		private $begin_timestamp;
		private $commit_timestamp;
		private $isolation_level;

		public function getKeys() {
			return [
				'transaction_id' =>$this->getTransaction_id()
			];
		}

		public function jsonSerialize() {
			return [
				'transaction_id' =>$this->getTransaction_id(),
				'commit_id' =>$this->getCommit_id(),
				'begin_timestamp' =>$this->getBegin_timestamp(),
				'commit_timestamp' =>$this->getCommit_timestamp(),
				'isolation_level' =>$this->getIsolation_level()
			];
		}
			
		//TRANSACTION_ID
		function getTransaction_id() {
			return $this->transaction_id;
		}
		function setTransaction_id($transaction_id) {
			return $this->transaction_id = $transaction_id;
		}
		
		//COMMIT_ID
		function getCommit_id() {
			return $this->commit_id;
		}
		function setCommit_id($commit_id) {
			return $this->commit_id = $commit_id;
		}
		
		//BEGIN_TIMESTAMP
		function getBegin_timestamp() {
			return $this->begin_timestamp;
		}
		function setBegin_timestamp($begin_timestamp) {
			return $this->begin_timestamp = $begin_timestamp;
		}
		
		//COMMIT_TIMESTAMP
		function getCommit_timestamp() {
			return $this->commit_timestamp;
		}
		function setCommit_timestamp($commit_timestamp) {
			return $this->commit_timestamp = $commit_timestamp;
		}
		
		//ISOLATION_LEVEL
		function getIsolation_level() {
			return $this->isolation_level;
		}
		function setIsolation_level($isolation_level) {
			return $this->isolation_level = $isolation_level;
		}
		
	}
?>