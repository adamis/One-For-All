<?php
    namespace engine\dao;
   		
    class Gtid_slave_pos implements \JsonSerializable {

		private $domain_id;
		private $sub_id;
		private $server_id;
		private $seq_no;

		public function getKeys() {
			return [
				'domain_id' =>$this->getDomain_id(),
				'sub_id' =>$this->getSub_id()
			];
		}

		public function jsonSerialize() {
			return [
				'domain_id' =>$this->getDomain_id(),
				'sub_id' =>$this->getSub_id(),
				'server_id' =>$this->getServer_id(),
				'seq_no' =>$this->getSeq_no()
			];
		}
			
		//DOMAIN_ID
		function getDomain_id() {
			return $this->domain_id;
		}
		function setDomain_id($domain_id) {
			return $this->domain_id = $domain_id;
		}
		
		//SUB_ID
		function getSub_id() {
			return $this->sub_id;
		}
		function setSub_id($sub_id) {
			return $this->sub_id = $sub_id;
		}
		
		//SERVER_ID
		function getServer_id() {
			return $this->server_id;
		}
		function setServer_id($server_id) {
			return $this->server_id = $server_id;
		}
		
		//SEQ_NO
		function getSeq_no() {
			return $this->seq_no;
		}
		function setSeq_no($seq_no) {
			return $this->seq_no = $seq_no;
		}
		
	}
?>