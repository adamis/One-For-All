<?php
namespace engine\adapter;
use engine\dao\Time_zone_name;
use engine\utils\FilterWhere;

class Time_zone_nameAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listTime_zone_name = $this->connection->getAll("time_zone_name", $where, $orderColun, $order, $page, $sizePage);        
        $listTime_zone_nameResult = Array(); 
    	
    	foreach ($listTime_zone_name as $result){
            $time_zone_name = new Time_zone_name();            
         

            //NAME
            $time_zone_name->setName($result['Name']);

            //TIME_ZONE_ID
            $time_zone_name->setTime_zone_id($result['Time_zone_id']);
            $listTime_zone_nameResult[] = $time_zone_name;
        }

        return $listTime_zone_nameResult;
    }

    /**
     * Create
     */
    public function create($time_zone_name) {
        return $this->connection->merge($time_zone_name);        
    }

    /**
     * Delete
     */
    public function delete($time_zone_name){
         return $this->connection->delete($time_zone_name);
    }
}
?>