<?php
namespace engine\dao;
use engine\model\Chamados;
use engine\utils\FilterWhere;

class ChamadosDao {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listChamados = $this->connection->getAll("chamados", $where, $orderColun, $order, $page, $sizePage);        
        $listChamadosResult = Array(); 
    	
    	foreach ($listChamados as $result){
            $chamados = new Chamados();            
         

            //ID
            $chamados->setId($result['id']);

            //DATE_CREATE
            $chamados->setDate_create($result['date_create']);

            //DATE_UPDATE
            $chamados->setDate_update($result['date_update']);

            //DESCRICAO
            $chamados->setDescricao($result['descricao']);

            //DIAGNOSTICO
            $chamados->setDiagnostico($result['diagnostico']);

            //EXECUCAO
            $chamados->setExecucao($result['execucao']);
           if($result['fk_condominio_id'] != null){
                //FK_CONDOMINIO_ID
                $condominiosDao = new CondominiosDao($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_condominio_id']);
                $list = Array($filter);                


                $resultCondominios = $condominiosDao->getAll($list, "", "", 0, 0);
            	$chamados->setFk_condominio_id($resultCondominios[0]);
                
           }

           if($result['fk_notas_fiscais_id'] != null){
                //FK_NOTAS_FISCAIS_ID
                $notas_fiscaisDao = new Notas_fiscaisDao($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_notas_fiscais_id']);
                $list = Array($filter);                


                $resultNotas_fiscais = $notas_fiscaisDao->getAll($list, "", "", 0, 0);
            	$chamados->setFk_notas_fiscais_id($resultNotas_fiscais[0]);
                
           }

           if($result['fk_status_id'] != null){
                //FK_STATUS_ID
                $status_chamadosDao = new Status_chamadosDao($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_status_id']);
                $list = Array($filter);                


                $resultStatus_chamados = $status_chamadosDao->getAll($list, "", "", 0, 0);
            	$chamados->setFk_status_id($resultStatus_chamados[0]);
                
           }

            $listChamadosResult[] = $chamados;
        }

        return $listChamadosResult;
    }

    /**
     * Create
     */
    public function create($chamados) {
        return $this->connection->merge($chamados);        
    }

    /**
     * Delete
     */
    public function delete($chamados){
         return $this->connection->delete($chamados);
    }
}
?>