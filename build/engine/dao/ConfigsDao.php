<?php
namespace engine\dao;
use engine\model\Configs;
use engine\utils\FilterWhere;

class ConfigsDao {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listConfigs = $this->connection->getAll("configs", $where, $orderColun, $order, $page, $sizePage);        
        $listConfigsResult = Array(); 
    	
    	foreach ($listConfigs as $result){
            $configs = new Configs();            
         

            //ID
            $configs->setId($result['id']);

            //CHAVE
            $configs->setChave($result['chave']);

            //DATE_CREATE
            $configs->setDate_create($result['date_create']);

            //DATE_UPDATE
            $configs->setDate_update($result['date_update']);

            //VALOR
            $configs->setValor($result['valor']);
            $listConfigsResult[] = $configs;
        }

        return $listConfigsResult;
    }

    /**
     * Create
     */
    public function create($configs) {
        return $this->connection->merge($configs);        
    }

    /**
     * Delete
     */
    public function delete($configs){
         return $this->connection->delete($configs);
    }
}
?>