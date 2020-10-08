<?php
namespace engine\adapter;
use engine\dao\Column_stats;
use engine\utils\FilterWhere;

class Column_statsAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listColumn_stats = $this->connection->getAll("column_stats", $where, $orderColun, $order, $page, $sizePage);        
        $listColumn_statsResult = Array(); 
    	
    	foreach ($listColumn_stats as $result){
            $column_stats = new Column_stats();            
         

            //DB_NAME
            $column_stats->setDb_name($result['db_name']);

            //TABLE_NAME
            $column_stats->setTable_name($result['table_name']);

            //COLUMN_NAME
            $column_stats->setColumn_name($result['column_name']);

            //MIN_VALUE
            $column_stats->setMin_value($result['min_value']);

            //MAX_VALUE
            $column_stats->setMax_value($result['max_value']);

            //NULLS_RATIO
            $column_stats->setNulls_ratio($result['nulls_ratio']);

            //AVG_LENGTH
            $column_stats->setAvg_length($result['avg_length']);

            //AVG_FREQUENCY
            $column_stats->setAvg_frequency($result['avg_frequency']);

            //HIST_SIZE
            $column_stats->setHist_size($result['hist_size']);

            //HIST_TYPE
            $column_stats->setHist_type($result['hist_type']);

            //HISTOGRAM
            $column_stats->setHistogram($result['histogram']);
            $listColumn_statsResult[] = $column_stats;
        }

        return $listColumn_statsResult;
    }

    /**
     * Create
     */
    public function create($column_stats) {
        return $this->connection->merge($column_stats);        
    }

    /**
     * Delete
     */
    public function delete($column_stats){
         return $this->connection->delete($column_stats);
    }
}
?>