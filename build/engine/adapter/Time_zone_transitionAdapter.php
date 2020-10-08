<?php
namespace engine\adapter;
use engine\dao\Time_zone_transition;
use engine\utils\FilterWhere;

class Time_zone_transitionAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listTime_zone_transition = $this->connection->getAll("time_zone_transition", $where, $orderColun, $order, $page, $sizePage);        
        $listTime_zone_transitionResult = Array(); 
    	
    	foreach ($listTime_zone_transition as $result){
            $time_zone_transition = new Time_zone_transition();            
         

            //TIME_ZONE_ID
            $time_zone_transition->setTime_zone_id($result['Time_zone_id']);

            //TRANSITION_TIME
            $time_zone_transition->setTransition_time($result['Transition_time']);

            //TRANSITION_TYPE_ID
            $time_zone_transition->setTransition_type_id($result['Transition_type_id']);
            $listTime_zone_transitionResult[] = $time_zone_transition;
        }

        return $listTime_zone_transitionResult;
    }

    /**
     * Create
     */
    public function create($time_zone_transition) {
        return $this->connection->merge($time_zone_transition);        
    }

    /**
     * Delete
     */
    public function delete($time_zone_transition){
         return $this->connection->delete($time_zone_transition);
    }
}
?>