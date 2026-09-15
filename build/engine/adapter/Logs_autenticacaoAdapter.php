<?php
namespace engine\adapter;
use engine\dao\Logs_autenticacao;
use engine\utils\FilterWhere;

class Logs_autenticacaoAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listLogs_autenticacao = $this->connection->getAll("logs_autenticacao", $where, $orderColun, $order, $page, $sizePage);        
        $listLogs_autenticacaoResult = Array(); 
    	
    	foreach ($listLogs_autenticacao as $result){
            $logs_autenticacao = new Logs_autenticacao();            
         

            //ID
            $logs_autenticacao->setId($result['id']);

            //DATA_HORA
            $logs_autenticacao->setData_hora($result['data_hora']);

            //IP_ADDRESS
            $logs_autenticacao->setIp_address($result['ip_address']);

            //USER_AGENT
            $logs_autenticacao->setUser_agent($result['user_agent']);

            //USUARIO
            $logs_autenticacao->setUsuario($result['usuario']);
            $listLogs_autenticacaoResult[] = $logs_autenticacao;
        }

        return $listLogs_autenticacaoResult;
    }

    /**
     * Create
     */
    public function create($logs_autenticacao) {
        return $this->connection->merge($logs_autenticacao);        
    }

    /**
     * Delete
     */
    public function delete($logs_autenticacao){
         return $this->connection->delete($logs_autenticacao);
    }
}
?>