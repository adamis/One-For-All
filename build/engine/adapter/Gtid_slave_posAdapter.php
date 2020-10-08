<?php
namespace engine\adapter;
use engine\dao\Gtid_slave_pos;
use engine\utils\FilterWhere;

class Gtid_slave_posAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listGtid_slave_pos = $this->connection->getAll("gtid_slave_pos", $where, $orderColun, $order, $page, $sizePage);        
        $listGtid_slave_posResult = Array(); 
    	
    	foreach ($listGtid_slave_pos as $result){
            $gtid_slave_pos = new Gtid_slave_pos();            
         

            //DOMAIN_ID
            $gtid_slave_pos->setDomain_id($result['domain_id']);

            //SUB_ID
            $gtid_slave_pos->setSub_id($result['sub_id']);

            //SERVER_ID
            $gtid_slave_pos->setServer_id($result['server_id']);

            //SEQ_NO
            $gtid_slave_pos->setSeq_no($result['seq_no']);
            $listGtid_slave_posResult[] = $gtid_slave_pos;
        }

        return $listGtid_slave_posResult;
    }

    /**
     * Create
     */
    public function create($gtid_slave_pos) {
        return $this->connection->merge($gtid_slave_pos);        
    }

    /**
     * Delete
     */
    public function delete($gtid_slave_pos){
         return $this->connection->delete($gtid_slave_pos);
    }
}
?>