<?php
namespace engine\adapter;
use engine\dao\Innodb_index_stats;
use engine\utils\FilterWhere;

class Innodb_index_statsAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listInnodb_index_stats = $this->connection->getAll("innodb_index_stats", $where, $orderColun, $order, $page, $sizePage);        
        $listInnodb_index_statsResult = Array(); 
    	
    	foreach ($listInnodb_index_stats as $result){
            $innodb_index_stats = new Innodb_index_stats();            
         

            //DATABASE_NAME
            $innodb_index_stats->setDatabase_name($result['database_name']);

            //TABLE_NAME
            $innodb_index_stats->setTable_name($result['table_name']);

            //INDEX_NAME
            $innodb_index_stats->setIndex_name($result['index_name']);

            //LAST_UPDATE
            $innodb_index_stats->setLast_update($result['last_update']);

            //STAT_NAME
            $innodb_index_stats->setStat_name($result['stat_name']);

            //STAT_VALUE
            $innodb_index_stats->setStat_value($result['stat_value']);

            //SAMPLE_SIZE
            $innodb_index_stats->setSample_size($result['sample_size']);

            //STAT_DESCRIPTION
            $innodb_index_stats->setStat_description($result['stat_description']);
            $listInnodb_index_statsResult[] = $innodb_index_stats;
        }

        return $listInnodb_index_statsResult;
    }

    /**
     * Create
     */
    public function create($innodb_index_stats) {
        return $this->connection->merge($innodb_index_stats);        
    }

    /**
     * Delete
     */
    public function delete($innodb_index_stats){
         return $this->connection->delete($innodb_index_stats);
    }
}
?>