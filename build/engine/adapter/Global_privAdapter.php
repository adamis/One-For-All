<?php
namespace engine\adapter;
use engine\dao\Global_priv;
use engine\utils\FilterWhere;

class Global_privAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listGlobal_priv = $this->connection->getAll("global_priv", $where, $orderColun, $order, $page, $sizePage);        
        $listGlobal_privResult = Array(); 
    	
    	foreach ($listGlobal_priv as $result){
            $global_priv = new Global_priv();            
         

            //HOST
            $global_priv->setHost($result['Host']);

            //USER
            $global_priv->setUser($result['User']);

            //PRIV
            $global_priv->setPriv($result['Priv']);
            $listGlobal_privResult[] = $global_priv;
        }

        return $listGlobal_privResult;
    }

    /**
     * Create
     */
    public function create($global_priv) {
        return $this->connection->merge($global_priv);        
    }

    /**
     * Delete
     */
    public function delete($global_priv){
         return $this->connection->delete($global_priv);
    }
}
?>