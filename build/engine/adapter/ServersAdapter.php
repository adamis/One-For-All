<?php
namespace engine\adapter;
use engine\dao\Servers;
use engine\utils\FilterWhere;

class ServersAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listServers = $this->connection->getAll("servers", $where, $orderColun, $order, $page, $sizePage);        
        $listServersResult = Array(); 
    	
    	foreach ($listServers as $result){
            $servers = new Servers();            
         

            //SERVER_NAME
            $servers->setServer_name($result['Server_name']);

            //HOST
            $servers->setHost($result['Host']);

            //DB
            $servers->setDb($result['Db']);

            //USERNAME
            $servers->setUsername($result['Username']);

            //PASSWORD
            $servers->setPassword($result['Password']);

            //PORT
            $servers->setPort($result['Port']);

            //SOCKET
            $servers->setSocket($result['Socket']);

            //WRAPPER
            $servers->setWrapper($result['Wrapper']);

            //OWNER
            $servers->setOwner($result['Owner']);
            $listServersResult[] = $servers;
        }

        return $listServersResult;
    }

    /**
     * Create
     */
    public function create($servers) {
        return $this->connection->merge($servers);        
    }

    /**
     * Delete
     */
    public function delete($servers){
         return $this->connection->delete($servers);
    }
}
?>