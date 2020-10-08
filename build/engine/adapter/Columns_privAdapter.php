<?php
namespace engine\adapter;
use engine\dao\Columns_priv;
use engine\utils\FilterWhere;

class Columns_privAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listColumns_priv = $this->connection->getAll("columns_priv", $where, $orderColun, $order, $page, $sizePage);        
        $listColumns_privResult = Array(); 
    	
    	foreach ($listColumns_priv as $result){
            $columns_priv = new Columns_priv();            
         

            //HOST
            $columns_priv->setHost($result['Host']);

            //DB
            $columns_priv->setDb($result['Db']);

            //USER
            $columns_priv->setUser($result['User']);

            //TABLE_NAME
            $columns_priv->setTable_name($result['Table_name']);

            //COLUMN_NAME
            $columns_priv->setColumn_name($result['Column_name']);

            //TIMESTAMP
            $columns_priv->setTimestamp($result['Timestamp']);

            //COLUMN_PRIV
            $columns_priv->setColumn_priv($result['Column_priv']);
            $listColumns_privResult[] = $columns_priv;
        }

        return $listColumns_privResult;
    }

    /**
     * Create
     */
    public function create($columns_priv) {
        return $this->connection->merge($columns_priv);        
    }

    /**
     * Delete
     */
    public function delete($columns_priv){
         return $this->connection->delete($columns_priv);
    }
}
?>