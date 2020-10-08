<?php
namespace engine\adapter;
use engine\dao\Roles_mapping;
use engine\utils\FilterWhere;

class Roles_mappingAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listRoles_mapping = $this->connection->getAll("roles_mapping", $where, $orderColun, $order, $page, $sizePage);        
        $listRoles_mappingResult = Array(); 
    	
    	foreach ($listRoles_mapping as $result){
            $roles_mapping = new Roles_mapping();            
         

            //HOST
            $roles_mapping->setHost($result['Host']);

            //USER
            $roles_mapping->setUser($result['User']);

            //ROLE
            $roles_mapping->setRole($result['Role']);

            //ADMIN_OPTION
            $roles_mapping->setAdmin_option($result['Admin_option']);
            $listRoles_mappingResult[] = $roles_mapping;
        }

        return $listRoles_mappingResult;
    }

    /**
     * Create
     */
    public function create($roles_mapping) {
        return $this->connection->merge($roles_mapping);        
    }

    /**
     * Delete
     */
    public function delete($roles_mapping){
         return $this->connection->delete($roles_mapping);
    }
}
?>