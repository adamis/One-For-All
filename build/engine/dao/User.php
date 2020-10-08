<?php
    namespace engine\dao;
   		
    class User implements \JsonSerializable {

		private $Host;
		private $User;
		private $Password;
		private $Select_priv;
		private $Insert_priv;
		private $Update_priv;
		private $Delete_priv;
		private $Create_priv;
		private $Drop_priv;
		private $Reload_priv;
		private $Shutdown_priv;
		private $Process_priv;
		private $File_priv;
		private $Grant_priv;
		private $References_priv;
		private $Index_priv;
		private $Alter_priv;
		private $Show_db_priv;
		private $Super_priv;
		private $Create_tmp_table_priv;
		private $Lock_tables_priv;
		private $Execute_priv;
		private $Repl_slave_priv;
		private $Repl_client_priv;
		private $Create_view_priv;
		private $Show_view_priv;
		private $Create_routine_priv;
		private $Alter_routine_priv;
		private $Create_user_priv;
		private $Event_priv;
		private $Trigger_priv;
		private $Create_tablespace_priv;
		private $Delete_history_priv;
		private $ssl_type;
		private $ssl_cipher;
		private $x509_issuer;
		private $x509_subject;
		private $max_questions;
		private $max_updates;
		private $max_connections;
		private $max_user_connections;
		private $plugin;
		private $authentication_string;
		private $password_expired;
		private $is_role;
		private $default_role;
		private $max_statement_time;

		public function getKeys() {
			return [
			];
		}

		public function jsonSerialize() {
			return [
				'Host' =>$this->getHost(),
				'User' =>$this->getUser(),
				'Password' =>$this->getPassword(),
				'Select_priv' =>$this->getSelect_priv(),
				'Insert_priv' =>$this->getInsert_priv(),
				'Update_priv' =>$this->getUpdate_priv(),
				'Delete_priv' =>$this->getDelete_priv(),
				'Create_priv' =>$this->getCreate_priv(),
				'Drop_priv' =>$this->getDrop_priv(),
				'Reload_priv' =>$this->getReload_priv(),
				'Shutdown_priv' =>$this->getShutdown_priv(),
				'Process_priv' =>$this->getProcess_priv(),
				'File_priv' =>$this->getFile_priv(),
				'Grant_priv' =>$this->getGrant_priv(),
				'References_priv' =>$this->getReferences_priv(),
				'Index_priv' =>$this->getIndex_priv(),
				'Alter_priv' =>$this->getAlter_priv(),
				'Show_db_priv' =>$this->getShow_db_priv(),
				'Super_priv' =>$this->getSuper_priv(),
				'Create_tmp_table_priv' =>$this->getCreate_tmp_table_priv(),
				'Lock_tables_priv' =>$this->getLock_tables_priv(),
				'Execute_priv' =>$this->getExecute_priv(),
				'Repl_slave_priv' =>$this->getRepl_slave_priv(),
				'Repl_client_priv' =>$this->getRepl_client_priv(),
				'Create_view_priv' =>$this->getCreate_view_priv(),
				'Show_view_priv' =>$this->getShow_view_priv(),
				'Create_routine_priv' =>$this->getCreate_routine_priv(),
				'Alter_routine_priv' =>$this->getAlter_routine_priv(),
				'Create_user_priv' =>$this->getCreate_user_priv(),
				'Event_priv' =>$this->getEvent_priv(),
				'Trigger_priv' =>$this->getTrigger_priv(),
				'Create_tablespace_priv' =>$this->getCreate_tablespace_priv(),
				'Delete_history_priv' =>$this->getDelete_history_priv(),
				'ssl_type' =>$this->getSsl_type(),
				'ssl_cipher' =>$this->getSsl_cipher(),
				'x509_issuer' =>$this->getX509_issuer(),
				'x509_subject' =>$this->getX509_subject(),
				'max_questions' =>$this->getMax_questions(),
				'max_updates' =>$this->getMax_updates(),
				'max_connections' =>$this->getMax_connections(),
				'max_user_connections' =>$this->getMax_user_connections(),
				'plugin' =>$this->getPlugin(),
				'authentication_string' =>$this->getAuthentication_string(),
				'password_expired' =>$this->getPassword_expired(),
				'is_role' =>$this->getIs_role(),
				'default_role' =>$this->getDefault_role(),
				'max_statement_time' =>$this->getMax_statement_time()
			];
		}
			
		//HOST
		function getHost() {
			return $this->Host;
		}
		function setHost($Host) {
			return $this->Host = $Host;
		}
		
		//USER
		function getUser() {
			return $this->User;
		}
		function setUser($User) {
			return $this->User = $User;
		}
		
		//PASSWORD
		function getPassword() {
			return $this->Password;
		}
		function setPassword($Password) {
			return $this->Password = $Password;
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
		
		//RELOAD_PRIV
		function getReload_priv() {
			return $this->Reload_priv;
		}
		function setReload_priv($Reload_priv) {
			return $this->Reload_priv = $Reload_priv;
		}
		
		//SHUTDOWN_PRIV
		function getShutdown_priv() {
			return $this->Shutdown_priv;
		}
		function setShutdown_priv($Shutdown_priv) {
			return $this->Shutdown_priv = $Shutdown_priv;
		}
		
		//PROCESS_PRIV
		function getProcess_priv() {
			return $this->Process_priv;
		}
		function setProcess_priv($Process_priv) {
			return $this->Process_priv = $Process_priv;
		}
		
		//FILE_PRIV
		function getFile_priv() {
			return $this->File_priv;
		}
		function setFile_priv($File_priv) {
			return $this->File_priv = $File_priv;
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
		
		//SHOW_DB_PRIV
		function getShow_db_priv() {
			return $this->Show_db_priv;
		}
		function setShow_db_priv($Show_db_priv) {
			return $this->Show_db_priv = $Show_db_priv;
		}
		
		//SUPER_PRIV
		function getSuper_priv() {
			return $this->Super_priv;
		}
		function setSuper_priv($Super_priv) {
			return $this->Super_priv = $Super_priv;
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
		
		//EXECUTE_PRIV
		function getExecute_priv() {
			return $this->Execute_priv;
		}
		function setExecute_priv($Execute_priv) {
			return $this->Execute_priv = $Execute_priv;
		}
		
		//REPL_SLAVE_PRIV
		function getRepl_slave_priv() {
			return $this->Repl_slave_priv;
		}
		function setRepl_slave_priv($Repl_slave_priv) {
			return $this->Repl_slave_priv = $Repl_slave_priv;
		}
		
		//REPL_CLIENT_PRIV
		function getRepl_client_priv() {
			return $this->Repl_client_priv;
		}
		function setRepl_client_priv($Repl_client_priv) {
			return $this->Repl_client_priv = $Repl_client_priv;
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
		
		//CREATE_USER_PRIV
		function getCreate_user_priv() {
			return $this->Create_user_priv;
		}
		function setCreate_user_priv($Create_user_priv) {
			return $this->Create_user_priv = $Create_user_priv;
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
		
		//CREATE_TABLESPACE_PRIV
		function getCreate_tablespace_priv() {
			return $this->Create_tablespace_priv;
		}
		function setCreate_tablespace_priv($Create_tablespace_priv) {
			return $this->Create_tablespace_priv = $Create_tablespace_priv;
		}
		
		//DELETE_HISTORY_PRIV
		function getDelete_history_priv() {
			return $this->Delete_history_priv;
		}
		function setDelete_history_priv($Delete_history_priv) {
			return $this->Delete_history_priv = $Delete_history_priv;
		}
		
		//SSL_TYPE
		function getSsl_type() {
			return $this->ssl_type;
		}
		function setSsl_type($ssl_type) {
			return $this->ssl_type = $ssl_type;
		}
		
		//SSL_CIPHER
		function getSsl_cipher() {
			return $this->ssl_cipher;
		}
		function setSsl_cipher($ssl_cipher) {
			return $this->ssl_cipher = $ssl_cipher;
		}
		
		//X509_ISSUER
		function getX509_issuer() {
			return $this->x509_issuer;
		}
		function setX509_issuer($x509_issuer) {
			return $this->x509_issuer = $x509_issuer;
		}
		
		//X509_SUBJECT
		function getX509_subject() {
			return $this->x509_subject;
		}
		function setX509_subject($x509_subject) {
			return $this->x509_subject = $x509_subject;
		}
		
		//MAX_QUESTIONS
		function getMax_questions() {
			return $this->max_questions;
		}
		function setMax_questions($max_questions) {
			return $this->max_questions = $max_questions;
		}
		
		//MAX_UPDATES
		function getMax_updates() {
			return $this->max_updates;
		}
		function setMax_updates($max_updates) {
			return $this->max_updates = $max_updates;
		}
		
		//MAX_CONNECTIONS
		function getMax_connections() {
			return $this->max_connections;
		}
		function setMax_connections($max_connections) {
			return $this->max_connections = $max_connections;
		}
		
		//MAX_USER_CONNECTIONS
		function getMax_user_connections() {
			return $this->max_user_connections;
		}
		function setMax_user_connections($max_user_connections) {
			return $this->max_user_connections = $max_user_connections;
		}
		
		//PLUGIN
		function getPlugin() {
			return $this->plugin;
		}
		function setPlugin($plugin) {
			return $this->plugin = $plugin;
		}
		
		//AUTHENTICATION_STRING
		function getAuthentication_string() {
			return $this->authentication_string;
		}
		function setAuthentication_string($authentication_string) {
			return $this->authentication_string = $authentication_string;
		}
		
		//PASSWORD_EXPIRED
		function getPassword_expired() {
			return $this->password_expired;
		}
		function setPassword_expired($password_expired) {
			return $this->password_expired = $password_expired;
		}
		
		//IS_ROLE
		function getIs_role() {
			return $this->is_role;
		}
		function setIs_role($is_role) {
			return $this->is_role = $is_role;
		}
		
		//DEFAULT_ROLE
		function getDefault_role() {
			return $this->default_role;
		}
		function setDefault_role($default_role) {
			return $this->default_role = $default_role;
		}
		
		//MAX_STATEMENT_TIME
		function getMax_statement_time() {
			return $this->max_statement_time;
		}
		function setMax_statement_time($max_statement_time) {
			return $this->max_statement_time = $max_statement_time;
		}
		
	}
?>