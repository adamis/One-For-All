<?php
namespace engine\adapter;
use engine\dao\Chamados;
use engine\utils\FilterWhere;

class ChamadosAdapter {
			
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
                $condominiosAdapter = new CondominiosAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_condominio_id']);
                $list = Array($filter);                


                $resultCondominios = $condominiosAdapter->getAll($list, "", "", 0, 0);
            	$chamados->setFk_condominio_id($resultCondominios[0]);
                
           }

           if($result['fk_notas_fiscais_id'] != null){
                //FK_NOTAS_FISCAIS_ID
                $notas_fiscaisAdapter = new Notas_fiscaisAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_notas_fiscais_id']);
                $list = Array($filter);                


                $resultNotas_fiscais = $notas_fiscaisAdapter->getAll($list, "", "", 0, 0);
            	$chamados->setFk_notas_fiscais_id($resultNotas_fiscais[0]);
                
           }

           if($result['fk_status_id'] != null){
                //FK_STATUS_ID
                $status_chamadosAdapter = new Status_chamadosAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_status_id']);
                $list = Array($filter);                


                $resultStatus_chamados = $status_chamadosAdapter->getAll($list, "", "", 0, 0);
            	$chamados->setFk_status_id($resultStatus_chamados[0]);
                
           }


            //ANEXOS
            $chamados->setAnexos($result['anexos']);

            //COMO_REPRODUZIR
            $chamados->setComo_reproduzir($result['como_reproduzir']);

            //PRIORIDADE
            $chamados->setPrioridade($result['prioridade']);
           if($result['fk_usuario_criador_id'] != null){
                //FK_USUARIO_CRIADOR_ID
                $usuariosAdapter = new UsuariosAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_usuario_criador_id']);
                $list = Array($filter);                


                $resultUsuarios = $usuariosAdapter->getAll($list, "", "", 0, 0);
            	$chamados->setFk_usuario_criador_id($resultUsuarios[0]);
                
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