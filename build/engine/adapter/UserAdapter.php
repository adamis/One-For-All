<?php
namespace engine\adapter;
use engine\dao\User;
use engine\utils\FilterWhere;

class UserAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listUser = $this->connection->getAll("user", $where, $orderColun, $order, $page, $sizePage);        
        $listUserResult = Array(); 
    	
    	foreach ($listUser as $result){
            $user = new User();            
         

            //HOST
            $user->setHost($result['Host']);

            //USER
            $user->setUser($result['User']);

            //PASSWORD
            $user->setPassword($result['Password']);

            //SELECT_PRIV
            $user->setSelect_priv($result['Select_priv']);

            //INSERT_PRIV
            $user->setInsert_priv($result['Insert_priv']);

            //UPDATE_PRIV
            $user->setUpdate_priv($result['Update_priv']);

            //DELETE_PRIV
            $user->setDelete_priv($result['Delete_priv']);

            //CREATE_PRIV
            $user->setCreate_priv($result['Create_priv']);

            //DROP_PRIV
            $user->setDrop_priv($result['Drop_priv']);

            //RELOAD_PRIV
            $user->setReload_priv($result['Reload_priv']);

            //SHUTDOWN_PRIV
            $user->setShutdown_priv($result['Shutdown_priv']);

            //PROCESS_PRIV
            $user->setProcess_priv($result['Process_priv']);

            //FILE_PRIV
            $user->setFile_priv($result['File_priv']);

            //GRANT_PRIV
            $user->setGrant_priv($result['Grant_priv']);

            //REFERENCES_PRIV
            $user->setReferences_priv($result['References_priv']);

            //INDEX_PRIV
            $user->setIndex_priv($result['Index_priv']);

            //ALTER_PRIV
            $user->setAlter_priv($result['Alter_priv']);

            //SHOW_DB_PRIV
            $user->setShow_db_priv($result['Show_db_priv']);

            //SUPER_PRIV
            $user->setSuper_priv($result['Super_priv']);

            //CREATE_TMP_TABLE_PRIV
            $user->setCreate_tmp_table_priv($result['Create_tmp_table_priv']);

            //LOCK_TABLES_PRIV
            $user->setLock_tables_priv($result['Lock_tables_priv']);

            //EXECUTE_PRIV
            $user->setExecute_priv($result['Execute_priv']);

            //REPL_SLAVE_PRIV
            $user->setRepl_slave_priv($result['Repl_slave_priv']);

            //REPL_CLIENT_PRIV
            $user->setRepl_client_priv($result['Repl_client_priv']);

            //CREATE_VIEW_PRIV
            $user->setCreate_view_priv($result['Create_view_priv']);

            //SHOW_VIEW_PRIV
            $user->setShow_view_priv($result['Show_view_priv']);

            //CREATE_ROUTINE_PRIV
            $user->setCreate_routine_priv($result['Create_routine_priv']);

            //ALTER_ROUTINE_PRIV
            $user->setAlter_routine_priv($result['Alter_routine_priv']);

            //CREATE_USER_PRIV
            $user->setCreate_user_priv($result['Create_user_priv']);

            //EVENT_PRIV
            $user->setEvent_priv($result['Event_priv']);

            //TRIGGER_PRIV
            $user->setTrigger_priv($result['Trigger_priv']);

            //CREATE_TABLESPACE_PRIV
            $user->setCreate_tablespace_priv($result['Create_tablespace_priv']);

            //DELETE_HISTORY_PRIV
            $user->setDelete_history_priv($result['Delete_history_priv']);

            //SSL_TYPE
            $user->setSsl_type($result['ssl_type']);

            //SSL_CIPHER
            $user->setSsl_cipher($result['ssl_cipher']);

            //X509_ISSUER
            $user->setX509_issuer($result['x509_issuer']);

            //X509_SUBJECT
            $user->setX509_subject($result['x509_subject']);

            //MAX_QUESTIONS
            $user->setMax_questions($result['max_questions']);

            //MAX_UPDATES
            $user->setMax_updates($result['max_updates']);

            //MAX_CONNECTIONS
            $user->setMax_connections($result['max_connections']);

            //MAX_USER_CONNECTIONS
            $user->setMax_user_connections($result['max_user_connections']);

            //PLUGIN
            $user->setPlugin($result['plugin']);

            //AUTHENTICATION_STRING
            $user->setAuthentication_string($result['authentication_string']);

            //PASSWORD_EXPIRED
            $user->setPassword_expired($result['password_expired']);

            //IS_ROLE
            $user->setIs_role($result['is_role']);

            //DEFAULT_ROLE
            $user->setDefault_role($result['default_role']);

            //MAX_STATEMENT_TIME
            $user->setMax_statement_time($result['max_statement_time']);
            $listUserResult[] = $user;
        }

        return $listUserResult;
    }

    /**
     * Create
     */
    public function create($user) {
        return $this->connection->merge($user);        
    }

    /**
     * Delete
     */
    public function delete($user){
         return $this->connection->delete($user);
    }
}
?>