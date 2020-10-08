<?php
namespace engine\adapter;
use engine\dao\Slow_log;
use engine\utils\FilterWhere;

class Slow_logAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listSlow_log = $this->connection->getAll("slow_log", $where, $orderColun, $order, $page, $sizePage);        
        $listSlow_logResult = Array(); 
    	
    	foreach ($listSlow_log as $result){
            $slow_log = new Slow_log();            
         

            //START_TIME
            $slow_log->setStart_time($result['start_time']);

            //USER_HOST
            $slow_log->setUser_host($result['user_host']);

            //QUERY_TIME
            $slow_log->setQuery_time($result['query_time']);

            //LOCK_TIME
            $slow_log->setLock_time($result['lock_time']);

            //ROWS_SENT
            $slow_log->setRows_sent($result['rows_sent']);

            //ROWS_EXAMINED
            $slow_log->setRows_examined($result['rows_examined']);

            //DB
            $slow_log->setDb($result['db']);

            //LAST_INSERT_ID
            $slow_log->setLast_insert_id($result['last_insert_id']);

            //INSERT_ID
            $slow_log->setInsert_id($result['insert_id']);

            //SERVER_ID
            $slow_log->setServer_id($result['server_id']);

            //SQL_TEXT
            $slow_log->setSql_text($result['sql_text']);

            //THREAD_ID
            $slow_log->setThread_id($result['thread_id']);

            //ROWS_AFFECTED
            $slow_log->setRows_affected($result['rows_affected']);
            $listSlow_logResult[] = $slow_log;
        }

        return $listSlow_logResult;
    }

    /**
     * Create
     */
    public function create($slow_log) {
        return $this->connection->merge($slow_log);        
    }

    /**
     * Delete
     */
    public function delete($slow_log){
         return $this->connection->delete($slow_log);
    }
}
?>