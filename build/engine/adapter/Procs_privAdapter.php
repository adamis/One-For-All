<?php
namespace engine\adapter;
use engine\dao\Procs_priv;
use engine\utils\FilterWhere;

class Procs_privAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listProcs_priv = $this->connection->getAll("procs_priv", $where, $orderColun, $order, $page, $sizePage);        
        $listProcs_privResult = Array(); 
    	
    	foreach ($listProcs_priv as $result){
            $procs_priv = new Procs_priv();            
         

            //HOST
            $procs_priv->setHost($result['Host']);

            //DB
            $procs_priv->setDb($result['Db']);

            //USER
            $procs_priv->setUser($result['User']);

            //ROUTINE_NAME
            $procs_priv->setRoutine_name($result['Routine_name']);

            //ROUTINE_TYPE
            $procs_priv->setRoutine_type($result['Routine_type']);

            //GRANTOR
            $procs_priv->setGrantor($result['Grantor']);

            //PROC_PRIV
            $procs_priv->setProc_priv($result['Proc_priv']);

            //TIMESTAMP
            $procs_priv->setTimestamp($result['Timestamp']);
            $listProcs_privResult[] = $procs_priv;
        }

        return $listProcs_privResult;
    }

    /**
     * Create
     */
    public function create($procs_priv) {
        return $this->connection->merge($procs_priv);        
    }

    /**
     * Delete
     */
    public function delete($procs_priv){
         return $this->connection->delete($procs_priv);
    }
}
?>