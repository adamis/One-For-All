<?php
namespace engine\dao;
use engine\model\Telas_perfis;
use engine\utils\FilterWhere;

class Telas_perfisDao {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listTelas_perfis = $this->connection->getAll("telas_perfis", $where, $orderColun, $order, $page, $sizePage);        
        $listTelas_perfisResult = Array(); 
    	
    	foreach ($listTelas_perfis as $result){
            $telas_perfis = new Telas_perfis();            
         

            //ID
            $telas_perfis->setId($result['id']);

            //DATE_CREATE
            $telas_perfis->setDate_create($result['date_create']);

            //DATE_UPDATE
            $telas_perfis->setDate_update($result['date_update']);
           if($result['fk_perfil_id'] != null){
                //FK_PERFIL_ID
                $perfisDao = new PerfisDao($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_perfil_id']);
                $list = Array($filter);                


                $resultPerfis = $perfisDao->getAll($list, "", "", 0, 0);
            	$telas_perfis->setFk_perfil_id($resultPerfis[0]);
                
           }

           if($result['fk_telas_id'] != null){
                //FK_TELAS_ID
                $telasDao = new TelasDao($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_telas_id']);
                $list = Array($filter);                


                $resultTelas = $telasDao->getAll($list, "", "", 0, 0);
            	$telas_perfis->setFk_telas_id($resultTelas[0]);
                
           }

            $listTelas_perfisResult[] = $telas_perfis;
        }

        return $listTelas_perfisResult;
    }

    /**
     * Create
     */
    public function create($telas_perfis) {
        return $this->connection->merge($telas_perfis);        
    }

    /**
     * Delete
     */
    public function delete($telas_perfis){
         return $this->connection->delete($telas_perfis);
    }
}
?>