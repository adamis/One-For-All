<?php
namespace engine\dao;
use engine\model\Telas;
use engine\utils\FilterWhere;

class TelasDao {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listTelas = $this->connection->getAll("telas", $where, $orderColun, $order, $page, $sizePage);        
        $listTelasResult = Array(); 
    	
    	foreach ($listTelas as $result){
            $telas = new Telas();            
         

            //ID
            $telas->setId($result['id']);

            //LABEL
            $telas->setLabel($result['label']);

            //ICON
            $telas->setIcon($result['icon']);

            //ROUTER_LINK
            $telas->setRouter_link($result['router_link']);
           if($result['fk_menu_id'] != null){
                //FK_MENU_ID
                $telasDao = new TelasDao($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_menu_id']);
                $list = Array($filter);                


                $resultTelas = $telasDao->getAll($list, "", "", 0, 0);
            	$telas->setFk_menu_id($resultTelas[0]);
                
           }


            //DATE_CREATE
            $telas->setDate_create($result['date_create']);

            //DATE_UPDATE
            $telas->setDate_update($result['date_update']);
            $listTelasResult[] = $telas;
        }

        return $listTelasResult;
    }

    /**
     * Create
     */
    public function create($telas) {
        return $this->connection->merge($telas);        
    }

    /**
     * Delete
     */
    public function delete($telas){
         return $this->connection->delete($telas);
    }
}
?>