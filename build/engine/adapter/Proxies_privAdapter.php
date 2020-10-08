<?php
namespace engine\adapter;
use engine\dao\Proxies_priv;
use engine\utils\FilterWhere;

class Proxies_privAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listProxies_priv = $this->connection->getAll("proxies_priv", $where, $orderColun, $order, $page, $sizePage);        
        $listProxies_privResult = Array(); 
    	
    	foreach ($listProxies_priv as $result){
            $proxies_priv = new Proxies_priv();            
         

            //HOST
            $proxies_priv->setHost($result['Host']);

            //USER
            $proxies_priv->setUser($result['User']);

            //PROXIED_HOST
            $proxies_priv->setProxied_host($result['Proxied_host']);

            //PROXIED_USER
            $proxies_priv->setProxied_user($result['Proxied_user']);

            //WITH_GRANT
            $proxies_priv->setWith_grant($result['With_grant']);

            //GRANTOR
            $proxies_priv->setGrantor($result['Grantor']);

            //TIMESTAMP
            $proxies_priv->setTimestamp($result['Timestamp']);
            $listProxies_privResult[] = $proxies_priv;
        }

        return $listProxies_privResult;
    }

    /**
     * Create
     */
    public function create($proxies_priv) {
        return $this->connection->merge($proxies_priv);        
    }

    /**
     * Delete
     */
    public function delete($proxies_priv){
         return $this->connection->delete($proxies_priv);
    }
}
?>