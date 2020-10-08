<?php
namespace engine\adapter;
use engine\dao\Time_zone_leap_second;
use engine\utils\FilterWhere;

class Time_zone_leap_secondAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listTime_zone_leap_second = $this->connection->getAll("time_zone_leap_second", $where, $orderColun, $order, $page, $sizePage);        
        $listTime_zone_leap_secondResult = Array(); 
    	
    	foreach ($listTime_zone_leap_second as $result){
            $time_zone_leap_second = new Time_zone_leap_second();            
         

            //TRANSITION_TIME
            $time_zone_leap_second->setTransition_time($result['Transition_time']);

            //CORRECTION
            $time_zone_leap_second->setCorrection($result['Correction']);
            $listTime_zone_leap_secondResult[] = $time_zone_leap_second;
        }

        return $listTime_zone_leap_secondResult;
    }

    /**
     * Create
     */
    public function create($time_zone_leap_second) {
        return $this->connection->merge($time_zone_leap_second);        
    }

    /**
     * Delete
     */
    public function delete($time_zone_leap_second){
         return $this->connection->delete($time_zone_leap_second);
    }
}
?>