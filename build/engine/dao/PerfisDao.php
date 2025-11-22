<?php
namespace engine\dao;
use engine\model\Perfis;
use engine\utils\FilterWhere;

class PerfisDao {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listPerfis = $this->connection->getAll("perfis", $where, $orderColun, $order, $page, $sizePage);        
        $listPerfisResult = Array(); 
    	
    	foreach ($listPerfis as $result){
            $perfis = new Perfis();            
         

            //ID
            $perfis->setId($result['id']);

            //DATE_CREATE
            $perfis->setDate_create($result['date_create']);

            //DATE_UPDATE
            $perfis->setDate_update($result['date_update']);

            //NAME
            $perfis->setName($result['name']);
            $listPerfisResult[] = $perfis;
        }

        return $listPerfisResult;
    }

    /**
     * Create
     */
    public function create($perfis) {
        return $this->connection->merge($perfis);        
    }

    /**
     * Delete
     */
    public function delete($perfis){
         return $this->connection->delete($perfis);
    }
}
?>