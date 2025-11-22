<?php
namespace engine\dao;
use engine\model\Refresh_tokens;
use engine\utils\FilterWhere;

class Refresh_tokensDao {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listRefresh_tokens = $this->connection->getAll("refresh_tokens", $where, $orderColun, $order, $page, $sizePage);        
        $listRefresh_tokensResult = Array(); 
    	
    	foreach ($listRefresh_tokens as $result){
            $refresh_tokens = new Refresh_tokens();            
         

            //TOKEN
            $refresh_tokens->setToken($result['token']);

            //CREATED_AT
            $refresh_tokens->setCreated_at($result['created_at']);

            //EXPIRES_AT
            $refresh_tokens->setExpires_at($result['expires_at']);

            //REVOKED
            $refresh_tokens->setRevoked($result['revoked']);

            //USERNAME
            $refresh_tokens->setUsername($result['username']);
            $listRefresh_tokensResult[] = $refresh_tokens;
        }

        return $listRefresh_tokensResult;
    }

    /**
     * Create
     */
    public function create($refresh_tokens) {
        return $this->connection->merge($refresh_tokens);        
    }

    /**
     * Delete
     */
    public function delete($refresh_tokens){
         return $this->connection->delete($refresh_tokens);
    }
}
?>