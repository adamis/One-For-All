<?php
namespace engine\dao;
use engine\model\Servicos;
use engine\utils\FilterWhere;

class ServicosDao {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listServicos = $this->connection->getAll("servicos", $where, $orderColun, $order, $page, $sizePage);        
        $listServicosResult = Array(); 
    	
    	foreach ($listServicos as $result){
            $servicos = new Servicos();            
         

            //ID
            $servicos->setId($result['id']);

            //DATE_CREATE
            $servicos->setDate_create($result['date_create']);

            //DATE_UPDATE
            $servicos->setDate_update($result['date_update']);

            //DESCRICAO
            $servicos->setDescricao($result['descricao']);

            //NAME
            $servicos->setName($result['name']);

            //VALOR
            $servicos->setValor($result['valor']);
           if($result['fk_condominio_id'] != null){
                //FK_CONDOMINIO_ID
                $condominiosDao = new CondominiosDao($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_condominio_id']);
                $list = Array($filter);                


                $resultCondominios = $condominiosDao->getAll($list, "", "", 0, 0);
            	$servicos->setFk_condominio_id($resultCondominios[0]);
                
           }

            $listServicosResult[] = $servicos;
        }

        return $listServicosResult;
    }

    /**
     * Create
     */
    public function create($servicos) {
        return $this->connection->merge($servicos);        
    }

    /**
     * Delete
     */
    public function delete($servicos){
         return $this->connection->delete($servicos);
    }
}
?>