<?php
namespace engine\adapter;
use engine\dao\Index_stats;
use engine\utils\FilterWhere;

class Index_statsAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listIndex_stats = $this->connection->getAll("index_stats", $where, $orderColun, $order, $page, $sizePage);        
        $listIndex_statsResult = Array(); 
    	
    	foreach ($listIndex_stats as $result){
            $index_stats = new Index_stats();            
         

            //DB_NAME
            $index_stats->setDb_name($result['db_name']);

            //TABLE_NAME
            $index_stats->setTable_name($result['table_name']);

            //INDEX_NAME
            $index_stats->setIndex_name($result['index_name']);

            //PREFIX_ARITY
            $index_stats->setPrefix_arity($result['prefix_arity']);

            //AVG_FREQUENCY
            $index_stats->setAvg_frequency($result['avg_frequency']);
            $listIndex_statsResult[] = $index_stats;
        }

        return $listIndex_statsResult;
    }

    /**
     * Create
     */
    public function create($index_stats) {
        return $this->connection->merge($index_stats);        
    }

    /**
     * Delete
     */
    public function delete($index_stats){
         return $this->connection->delete($index_stats);
    }
}
?>