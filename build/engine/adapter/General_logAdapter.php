<?php
namespace engine\adapter;
use engine\dao\General_log;
use engine\utils\FilterWhere;

class General_logAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listGeneral_log = $this->connection->getAll("general_log", $where, $orderColun, $order, $page, $sizePage);        
        $listGeneral_logResult = Array(); 
    	
    	foreach ($listGeneral_log as $result){
            $general_log = new General_log();            
         

            //EVENT_TIME
            $general_log->setEvent_time($result['event_time']);

            //USER_HOST
            $general_log->setUser_host($result['user_host']);

            //THREAD_ID
            $general_log->setThread_id($result['thread_id']);

            //SERVER_ID
            $general_log->setServer_id($result['server_id']);

            //COMMAND_TYPE
            $general_log->setCommand_type($result['command_type']);

            //ARGUMENT
            $general_log->setArgument($result['argument']);
            $listGeneral_logResult[] = $general_log;
        }

        return $listGeneral_logResult;
    }

    /**
     * Create
     */
    public function create($general_log) {
        return $this->connection->merge($general_log);        
    }

    /**
     * Delete
     */
    public function delete($general_log){
         return $this->connection->delete($general_log);
    }
}
?>