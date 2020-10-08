<?php
    namespace engine\dao;
   		
    class Db implements \JsonSerializable {

		private $Host;
		private $Db;
		private $User;
		private $Select_priv;
		private $Insert_priv;
		private $Update_priv;
		private $Delete_priv;
		private $Create_priv;
		private $Drop_priv;
		private $Grant_priv;
		private $References_priv;
		private $Index_priv;
		private $Alter_priv;
		private $Create_tmp_table_priv;
		private $Lock_tables_priv;
		private $Create_view_priv;
		private $Show_view_priv;
		private $Create_routine_priv;
		private $Alter_routine_priv;
		private $Execute_priv;
		private $Event_priv;
		private $Trigger_priv;
		private $Delete_history_priv;

		public function getKeys() {
			return [
				'Host' =>$this->getHost(),
				'Db' =>$this->getDb(),
				'User' =>$this->getUser()
			];
		}

		public function jsonSerialize() {
			return [
				'Host' =>$this->getHost(),
				'Db' =>$this->getDb(),
				'User' =>$this->getUser(),
				'Select_priv' =>$this->getSelect_priv(),
				'Insert_priv' =>$this->getInsert_priv(),
				'Update_priv' =>$this->getUpdate_priv(),
				'Delete_priv' =>$this->getDelete_priv(),
				'Create_priv' =>$this->getCreate_priv(),
				'Drop_priv' =>$this->getDrop_priv(),
				'Grant_priv' =>$this->getGrant_priv(),
				'References_priv' =>$this->getReferences_priv(),
				'Index_priv' =>$this->getIndex_priv(),
				'Alter_priv' =>$this->getAlter_priv(),
				'Create_tmp_table_priv' =>$this->getCreate_tmp_table_priv(),
				'Lock_tables_priv' =>$this->getLock_tables_priv(),
				'Create_view_priv' =>$this->getCreate_view_priv(),
				'Show_view_priv' =>$this->getShow_view_priv(),
				'Create_routine_priv' =>$this->getCreate_routine_priv(),
				'Alter_routine_priv' =>$this->getAlter_routine_priv(),
				'Execute_priv' =>$this->getExecute_priv(),
				'Event_priv' =>$this->getEvent_priv(),
				'Trigger_priv' =>$this->getTrigger_priv(),
				'Delete_history_priv' =>$this->getDelete_history_priv()
			];
		}
			
		//HOST
		function getHost() {
			return $this->Host;
		}
		function setHost($Host) {
			return $this->Host = $Host;
		}
		
		//DB
		function getDb() {
			return $this->Db;
		}
		function setDb($Db) {
			return $this->Db = $Db;
		}
		
		//USER
		function getUser() {
			return $this->User;
		}
		function setUser($User) {
			return $this->User = $User;
		}
		
		//SELECT_PRIV
		function getSelect_priv() {
			return $this->Select_priv;
		}
		function setSelect_priv($Select_priv) {
			return $this->Select_priv = $Select_priv;
		}
		
		//INSERT_PRIV
		function getInsert_priv() {
			return $this->Insert_priv;
		}
		function setInsert_priv($Insert_priv) {
			return $this->Insert_priv = $Insert_priv;
		}
		
		//UPDATE_PRIV
		function getUpdate_priv() {
			return $this->Update_priv;
		}
		function setUpdate_priv($Update_priv) {
			return $this->Update_priv = $Update_priv;
		}
		
		//DELETE_PRIV
		function getDelete_priv() {
			return $this->Delete_priv;
		}
		function setDelete_priv($Delete_priv) {
			return $this->Delete_priv = $Delete_priv;
		}
		
		//CREATE_PRIV
		function getCreate_priv() {
			return $this->Create_priv;
		}
		function setCreate_priv($Create_priv) {
			return $this->Create_priv = $Create_priv;
		}
		
		//DROP_PRIV
		function getDrop_priv() {
			return $this->Drop_priv;
		}
		function setDrop_priv($Drop_priv) {
			return $this->Drop_priv = $Drop_priv;
		}
		
		//GRANT_PRIV
		function getGrant_priv() {
			return $this->Grant_priv;
		}
		function setGrant_priv($Grant_priv) {
			return $this->Grant_priv = $Grant_priv;
		}
		
		//REFERENCES_PRIV
		function getReferences_priv() {
			return $this->References_priv;
		}
		function setReferences_priv($References_priv) {
			return $this->References_priv = $References_priv;
		}
		
		//INDEX_PRIV
		function getIndex_priv() {
			return $this->Index_priv;
		}
		function setIndex_priv($Index_priv) {
			return $this->Index_priv = $Index_priv;
		}
		
		//ALTER_PRIV
		function getAlter_priv() {
			return $this->Alter_priv;
		}
		function setAlter_priv($Alter_priv) {
			return $this->Alter_priv = $Alter_priv;
		}
		
		//CREATE_TMP_TABLE_PRIV
		function getCreate_tmp_table_priv() {
			return $this->Create_tmp_table_priv;
		}
		function setCreate_tmp_table_priv($Create_tmp_table_priv) {
			return $this->Create_tmp_table_priv = $Create_tmp_table_priv;
		}
		
		//LOCK_TABLES_PRIV
		function getLock_tables_priv() {
			return $this->Lock_tables_priv;
		}
		function setLock_tables_priv($Lock_tables_priv) {
			return $this->Lock_tables_priv = $Lock_tables_priv;
		}
		
		//CREATE_VIEW_PRIV
		function getCreate_view_priv() {
			return $this->Create_view_priv;
		}
		function setCreate_view_priv($Create_view_priv) {
			return $this->Create_view_priv = $Create_view_priv;
		}
		
		//SHOW_VIEW_PRIV
		function getShow_view_priv() {
			return $this->Show_view_priv;
		}
		function setShow_view_priv($Show_view_priv) {
			return $this->Show_view_priv = $Show_view_priv;
		}
		
		//CREATE_ROUTINE_PRIV
		function getCreate_routine_priv() {
			return $this->Create_routine_priv;
		}
		function setCreate_routine_priv($Create_routine_priv) {
			return $this->Create_routine_priv = $Create_routine_priv;
		}
		
		//ALTER_ROUTINE_PRIV
		function getAlter_routine_priv() {
			return $this->Alter_routine_priv;
		}
		function setAlter_routine_priv($Alter_routine_priv) {
			return $this->Alter_routine_priv = $Alter_routine_priv;
		}
		
		//EXECUTE_PRIV
		function getExecute_priv() {
			return $this->Execute_priv;
		}
		function setExecute_priv($Execute_priv) {
			return $this->Execute_priv = $Execute_priv;
		}
		
		//EVENT_PRIV
		function getEvent_priv() {
			return $this->Event_priv;
		}
		function setEvent_priv($Event_priv) {
			return $this->Event_priv = $Event_priv;
		}
		
		//TRIGGER_PRIV
		function getTrigger_priv() {
			return $this->Trigger_priv;
		}
		function setTrigger_priv($Trigger_priv) {
			return $this->Trigger_priv = $Trigger_priv;
		}
		
		//DELETE_HISTORY_PRIV
		function getDelete_history_priv() {
			return $this->Delete_history_priv;
		}
		function setDelete_history_priv($Delete_history_priv) {
			return $this->Delete_history_priv = $Delete_history_priv;
		}
		
	}
?>