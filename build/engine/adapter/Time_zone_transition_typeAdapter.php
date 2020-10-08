<?php
namespace engine\adapter;
use engine\dao\Time_zone_transition_type;
use engine\utils\FilterWhere;

class Time_zone_transition_typeAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listTime_zone_transition_type = $this->connection->getAll("time_zone_transition_type", $where, $orderColun, $order, $page, $sizePage);        
        $listTime_zone_transition_typeResult = Array(); 
    	
    	foreach ($listTime_zone_transition_type as $result){
            $time_zone_transition_type = new Time_zone_transition_type();            
         

            //TIME_ZONE_ID
            $time_zone_transition_type->setTime_zone_id($result['Time_zone_id']);

            //TRANSITION_TYPE_ID
            $time_zone_transition_type->setTransition_type_id($result['Transition_type_id']);

            //OFFSET
            $time_zone_transition_type->setOffset($result['Offset']);

            //IS_DST
            $time_zone_transition_type->setIs_DST($result['Is_DST']);

            //ABBREVIATION
            $time_zone_transition_type->setAbbreviation($result['Abbreviation']);
            $listTime_zone_transition_typeResult[] = $time_zone_transition_type;
        }

        return $listTime_zone_transition_typeResult;
    }

    /**
     * Create
     */
    public function create($time_zone_transition_type) {
        return $this->connection->merge($time_zone_transition_type);        
    }

    /**
     * Delete
     */
    public function delete($time_zone_transition_type){
         return $this->connection->delete($time_zone_transition_type);
    }
}
?>