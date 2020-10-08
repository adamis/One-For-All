<?php
namespace engine\adapter;
use engine\dao\Event;
use engine\utils\FilterWhere;

class EventAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listEvent = $this->connection->getAll("event", $where, $orderColun, $order, $page, $sizePage);        
        $listEventResult = Array(); 
    	
    	foreach ($listEvent as $result){
            $event = new Event();            
         

            //DB
            $event->setDb($result['db']);

            //NAME
            $event->setName($result['name']);

            //BODY
            $event->setBody($result['body']);

            //DEFINER
            $event->setDefiner($result['definer']);

            //EXECUTE_AT
            $event->setExecute_at($result['execute_at']);

            //INTERVAL_VALUE
            $event->setInterval_value($result['interval_value']);

            //INTERVAL_FIELD
            $event->setInterval_field($result['interval_field']);

            //CREATED
            $event->setCreated($result['created']);

            //MODIFIED
            $event->setModified($result['modified']);

            //LAST_EXECUTED
            $event->setLast_executed($result['last_executed']);

            //STARTS
            $event->setStarts($result['starts']);

            //ENDS
            $event->setEnds($result['ends']);

            //STATUS
            $event->setStatus($result['status']);

            //ON_COMPLETION
            $event->setOn_completion($result['on_completion']);

            //SQL_MODE
            $event->setSql_mode($result['sql_mode']);

            //COMMENT
            $event->setComment($result['comment']);

            //ORIGINATOR
            $event->setOriginator($result['originator']);

            //TIME_ZONE
            $event->setTime_zone($result['time_zone']);

            //CHARACTER_SET_CLIENT
            $event->setCharacter_set_client($result['character_set_client']);

            //COLLATION_CONNECTION
            $event->setCollation_connection($result['collation_connection']);

            //DB_COLLATION
            $event->setDb_collation($result['db_collation']);

            //BODY_UTF8
            $event->setBody_utf8($result['body_utf8']);
            $listEventResult[] = $event;
        }

        return $listEventResult;
    }

    /**
     * Create
     */
    public function create($event) {
        return $this->connection->merge($event);        
    }

    /**
     * Delete
     */
    public function delete($event){
         return $this->connection->delete($event);
    }
}
?>