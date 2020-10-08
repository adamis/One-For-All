<?php
namespace engine\adapter;
use engine\dao\Table_stats;
use engine\utils\FilterWhere;

class Table_statsAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listTable_stats = $this->connection->getAll("table_stats", $where, $orderColun, $order, $page, $sizePage);        
        $listTable_statsResult = Array(); 
    	
    	foreach ($listTable_stats as $result){
            $table_stats = new Table_stats();            
         

            //DB_NAME
            $table_stats->setDb_name($result['db_name']);

            //TABLE_NAME
            $table_stats->setTable_name($result['table_name']);

            //CARDINALITY
            $table_stats->setCardinality($result['cardinality']);
            $listTable_statsResult[] = $table_stats;
        }

        return $listTable_statsResult;
    }

    /**
     * Create
     */
    public function create($table_stats) {
        return $this->connection->merge($table_stats);        
    }

    /**
     * Delete
     */
    public function delete($table_stats){
         return $this->connection->delete($table_stats);
    }
}
?>