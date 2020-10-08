<?php
namespace engine\adapter;
use engine\dao\Func;
use engine\utils\FilterWhere;

class FuncAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listFunc = $this->connection->getAll("func", $where, $orderColun, $order, $page, $sizePage);        
        $listFuncResult = Array(); 
    	
    	foreach ($listFunc as $result){
            $func = new Func();            
         

            //NAME
            $func->setName($result['name']);

            //RET
            $func->setRet($result['ret']);

            //DL
            $func->setDl($result['dl']);

            //TYPE
            $func->setType($result['type']);
            $listFuncResult[] = $func;
        }

        return $listFuncResult;
    }

    /**
     * Create
     */
    public function create($func) {
        return $this->connection->merge($func);        
    }

    /**
     * Delete
     */
    public function delete($func){
         return $this->connection->delete($func);
    }
}
?>