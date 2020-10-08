<?php
namespace engine\adapter;
use engine\dao\Tables_priv;
use engine\utils\FilterWhere;

class Tables_privAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listTables_priv = $this->connection->getAll("tables_priv", $where, $orderColun, $order, $page, $sizePage);        
        $listTables_privResult = Array(); 
    	
    	foreach ($listTables_priv as $result){
            $tables_priv = new Tables_priv();            
         

            //HOST
            $tables_priv->setHost($result['Host']);

            //DB
            $tables_priv->setDb($result['Db']);

            //USER
            $tables_priv->setUser($result['User']);

            //TABLE_NAME
            $tables_priv->setTable_name($result['Table_name']);

            //GRANTOR
            $tables_priv->setGrantor($result['Grantor']);

            //TIMESTAMP
            $tables_priv->setTimestamp($result['Timestamp']);

            //TABLE_PRIV
            $tables_priv->setTable_priv($result['Table_priv']);

            //COLUMN_PRIV
            $tables_priv->setColumn_priv($result['Column_priv']);
            $listTables_privResult[] = $tables_priv;
        }

        return $listTables_privResult;
    }

    /**
     * Create
     */
    public function create($tables_priv) {
        return $this->connection->merge($tables_priv);        
    }

    /**
     * Delete
     */
    public function delete($tables_priv){
         return $this->connection->delete($tables_priv);
    }
}
?>