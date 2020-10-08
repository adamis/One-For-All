<?php
namespace engine\adapter;
use engine\dao\Time_zone;
use engine\utils\FilterWhere;

class Time_zoneAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listTime_zone = $this->connection->getAll("time_zone", $where, $orderColun, $order, $page, $sizePage);        
        $listTime_zoneResult = Array(); 
    	
    	foreach ($listTime_zone as $result){
            $time_zone = new Time_zone();            
         

            //TIME_ZONE_ID
            $time_zone->setTime_zone_id($result['Time_zone_id']);

            //USE_LEAP_SECONDS
            $time_zone->setUse_leap_seconds($result['Use_leap_seconds']);
            $listTime_zoneResult[] = $time_zone;
        }

        return $listTime_zoneResult;
    }

    /**
     * Create
     */
    public function create($time_zone) {
        return $this->connection->merge($time_zone);        
    }

    /**
     * Delete
     */
    public function delete($time_zone){
         return $this->connection->delete($time_zone);
    }
}
?>