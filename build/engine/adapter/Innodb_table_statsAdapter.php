<?php
namespace engine\adapter;
use engine\dao\Innodb_table_stats;
use engine\utils\FilterWhere;

class Innodb_table_statsAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listInnodb_table_stats = $this->connection->getAll("innodb_table_stats", $where, $orderColun, $order, $page, $sizePage);        
        $listInnodb_table_statsResult = Array(); 
    	
    	foreach ($listInnodb_table_stats as $result){
            $innodb_table_stats = new Innodb_table_stats();            
         

            //DATABASE_NAME
            $innodb_table_stats->setDatabase_name($result['database_name']);

            //TABLE_NAME
            $innodb_table_stats->setTable_name($result['table_name']);

            //LAST_UPDATE
            $innodb_table_stats->setLast_update($result['last_update']);

            //N_ROWS
            $innodb_table_stats->setN_rows($result['n_rows']);

            //CLUSTERED_INDEX_SIZE
            $innodb_table_stats->setClustered_index_size($result['clustered_index_size']);

            //SUM_OF_OTHER_INDEX_SIZES
            $innodb_table_stats->setSum_of_other_index_sizes($result['sum_of_other_index_sizes']);
            $listInnodb_table_statsResult[] = $innodb_table_stats;
        }

        return $listInnodb_table_statsResult;
    }

    /**
     * Create
     */
    public function create($innodb_table_stats) {
        return $this->connection->merge($innodb_table_stats);        
    }

    /**
     * Delete
     */
    public function delete($innodb_table_stats){
         return $this->connection->delete($innodb_table_stats);
    }
}
?>