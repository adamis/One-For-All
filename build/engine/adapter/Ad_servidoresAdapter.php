<?php
namespace engine\adapter;
use engine\dao\Ad_servidores;
use engine\utils\FilterWhere;

class Ad_servidoresAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listAd_servidores = $this->connection->getAll("ad_servidores", $where, $orderColun, $order, $page, $sizePage);        
        $listAd_servidoresResult = Array(); 
    	
    	foreach ($listAd_servidores as $result){
            $ad_servidores = new Ad_servidores();            
         

            //ID
            $ad_servidores->setId($result['id']);

            //DATE_CREATE
            $ad_servidores->setDate_create($result['date_create']);

            //DATE_UPDATE
            $ad_servidores->setDate_update($result['date_update']);

            //HOSTNAME
            $ad_servidores->setHostname($result['hostname']);

            //LAST_SEEN
            $ad_servidores->setLast_seen($result['last_seen']);

            //NOME
            $ad_servidores->setNome($result['nome']);

            //STATUS
            $ad_servidores->setStatus($result['status']);
           if($result['fk_condominio_id'] != null){
                //FK_CONDOMINIO_ID
                $condominiosAdapter = new CondominiosAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_condominio_id']);
                $list = Array($filter);                


                $resultCondominios = $condominiosAdapter->getAll($list, "", "", 0, 0);
            	$ad_servidores->setFk_condominio_id($resultCondominios[0]);
                
           }

            $listAd_servidoresResult[] = $ad_servidores;
        }

        return $listAd_servidoresResult;
    }

    /**
     * Create
     */
    public function create($ad_servidores) {
        return $this->connection->merge($ad_servidores);        
    }

    /**
     * Delete
     */
    public function delete($ad_servidores){
         return $this->connection->delete($ad_servidores);
    }
}
?>