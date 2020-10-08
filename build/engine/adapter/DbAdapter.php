<?php
namespace engine\adapter;
use engine\dao\Db;
use engine\utils\FilterWhere;

class DbAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listDb = $this->connection->getAll("db", $where, $orderColun, $order, $page, $sizePage);        
        $listDbResult = Array(); 
    	
    	foreach ($listDb as $result){
            $db = new Db();            
         

            //HOST
            $db->setHost($result['Host']);

            //DB
            $db->setDb($result['Db']);

            //USER
            $db->setUser($result['User']);

            //SELECT_PRIV
            $db->setSelect_priv($result['Select_priv']);

            //INSERT_PRIV
            $db->setInsert_priv($result['Insert_priv']);

            //UPDATE_PRIV
            $db->setUpdate_priv($result['Update_priv']);

            //DELETE_PRIV
            $db->setDelete_priv($result['Delete_priv']);

            //CREATE_PRIV
            $db->setCreate_priv($result['Create_priv']);

            //DROP_PRIV
            $db->setDrop_priv($result['Drop_priv']);

            //GRANT_PRIV
            $db->setGrant_priv($result['Grant_priv']);

            //REFERENCES_PRIV
            $db->setReferences_priv($result['References_priv']);

            //INDEX_PRIV
            $db->setIndex_priv($result['Index_priv']);

            //ALTER_PRIV
            $db->setAlter_priv($result['Alter_priv']);

            //CREATE_TMP_TABLE_PRIV
            $db->setCreate_tmp_table_priv($result['Create_tmp_table_priv']);

            //LOCK_TABLES_PRIV
            $db->setLock_tables_priv($result['Lock_tables_priv']);

            //CREATE_VIEW_PRIV
            $db->setCreate_view_priv($result['Create_view_priv']);

            //SHOW_VIEW_PRIV
            $db->setShow_view_priv($result['Show_view_priv']);

            //CREATE_ROUTINE_PRIV
            $db->setCreate_routine_priv($result['Create_routine_priv']);

            //ALTER_ROUTINE_PRIV
            $db->setAlter_routine_priv($result['Alter_routine_priv']);

            //EXECUTE_PRIV
            $db->setExecute_priv($result['Execute_priv']);

            //EVENT_PRIV
            $db->setEvent_priv($result['Event_priv']);

            //TRIGGER_PRIV
            $db->setTrigger_priv($result['Trigger_priv']);

            //DELETE_HISTORY_PRIV
            $db->setDelete_history_priv($result['Delete_history_priv']);
            $listDbResult[] = $db;
        }

        return $listDbResult;
    }

    /**
     * Create
     */
    public function create($db) {
        return $this->connection->merge($db);        
    }

    /**
     * Delete
     */
    public function delete($db){
         return $this->connection->delete($db);
    }
}
?>