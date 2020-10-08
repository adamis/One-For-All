<?php
namespace engine\adapter;
use engine\dao\Transaction_registry;
use engine\utils\FilterWhere;

class Transaction_registryAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listTransaction_registry = $this->connection->getAll("transaction_registry", $where, $orderColun, $order, $page, $sizePage);        
        $listTransaction_registryResult = Array(); 
    	
    	foreach ($listTransaction_registry as $result){
            $transaction_registry = new Transaction_registry();            
         

            //TRANSACTION_ID
            $transaction_registry->setTransaction_id($result['transaction_id']);

            //COMMIT_ID
            $transaction_registry->setCommit_id($result['commit_id']);

            //BEGIN_TIMESTAMP
            $transaction_registry->setBegin_timestamp($result['begin_timestamp']);

            //COMMIT_TIMESTAMP
            $transaction_registry->setCommit_timestamp($result['commit_timestamp']);

            //ISOLATION_LEVEL
            $transaction_registry->setIsolation_level($result['isolation_level']);
            $listTransaction_registryResult[] = $transaction_registry;
        }

        return $listTransaction_registryResult;
    }

    /**
     * Create
     */
    public function create($transaction_registry) {
        return $this->connection->merge($transaction_registry);        
    }

    /**
     * Delete
     */
    public function delete($transaction_registry){
         return $this->connection->delete($transaction_registry);
    }
}
?>