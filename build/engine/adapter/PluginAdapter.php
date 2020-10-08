<?php
namespace engine\adapter;
use engine\dao\Plugin;
use engine\utils\FilterWhere;

class PluginAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listPlugin = $this->connection->getAll("plugin", $where, $orderColun, $order, $page, $sizePage);        
        $listPluginResult = Array(); 
    	
    	foreach ($listPlugin as $result){
            $plugin = new Plugin();            
         

            //NAME
            $plugin->setName($result['name']);

            //DL
            $plugin->setDl($result['dl']);
            $listPluginResult[] = $plugin;
        }

        return $listPluginResult;
    }

    /**
     * Create
     */
    public function create($plugin) {
        return $this->connection->merge($plugin);        
    }

    /**
     * Delete
     */
    public function delete($plugin){
         return $this->connection->delete($plugin);
    }
}
?>