<?php
namespace engine\dao;
use engine\model\Status_chamados;
use engine\utils\FilterWhere;

class Status_chamadosDao {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listStatus_chamados = $this->connection->getAll("status_chamados", $where, $orderColun, $order, $page, $sizePage);        
        $listStatus_chamadosResult = Array(); 
    	
    	foreach ($listStatus_chamados as $result){
            $status_chamados = new Status_chamados();            
         

            //ID
            $status_chamados->setId($result['id']);

            //DATE_CREATE
            $status_chamados->setDate_create($result['date_create']);

            //DATE_UPDATE
            $status_chamados->setDate_update($result['date_update']);

            //DESCRICAO
            $status_chamados->setDescricao($result['descricao']);
            $listStatus_chamadosResult[] = $status_chamados;
        }

        return $listStatus_chamadosResult;
    }

    /**
     * Create
     */
    public function create($status_chamados) {
        return $this->connection->merge($status_chamados);        
    }

    /**
     * Delete
     */
    public function delete($status_chamados){
         return $this->connection->delete($status_chamados);
    }
}
?>