<?php
namespace engine\dao;
use engine\model\Chamados_servicos;
use engine\utils\FilterWhere;

class Chamados_servicosDao {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listChamados_servicos = $this->connection->getAll("chamados_servicos", $where, $orderColun, $order, $page, $sizePage);        
        $listChamados_servicosResult = Array(); 
    	
    	foreach ($listChamados_servicos as $result){
            $chamados_servicos = new Chamados_servicos();            
         

            //ID
            $chamados_servicos->setId($result['id']);

            //DATE_CREATE
            $chamados_servicos->setDate_create($result['date_create']);

            //DATE_UPDATE
            $chamados_servicos->setDate_update($result['date_update']);
           if($result['fk_chamados_id'] != null){
                //FK_CHAMADOS_ID
                $chamadosDao = new ChamadosDao($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_chamados_id']);
                $list = Array($filter);                


                $resultChamados = $chamadosDao->getAll($list, "", "", 0, 0);
            	$chamados_servicos->setFk_chamados_id($resultChamados[0]);
                
           }

           if($result['fk_servicos_id'] != null){
                //FK_SERVICOS_ID
                $servicosDao = new ServicosDao($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_servicos_id']);
                $list = Array($filter);                


                $resultServicos = $servicosDao->getAll($list, "", "", 0, 0);
            	$chamados_servicos->setFk_servicos_id($resultServicos[0]);
                
           }

            $listChamados_servicosResult[] = $chamados_servicos;
        }

        return $listChamados_servicosResult;
    }

    /**
     * Create
     */
    public function create($chamados_servicos) {
        return $this->connection->merge($chamados_servicos);        
    }

    /**
     * Delete
     */
    public function delete($chamados_servicos){
         return $this->connection->delete($chamados_servicos);
    }
}
?>