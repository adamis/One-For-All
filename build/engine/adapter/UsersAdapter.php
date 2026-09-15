<?php
namespace engine\adapter;
use engine\dao\Users;
use engine\utils\FilterWhere;

class UsersAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listUsers = $this->connection->getAll("users", $where, $orderColun, $order, $page, $sizePage);        
        $listUsersResult = Array(); 
    	
    	foreach ($listUsers as $result){
            $users = new Users();            
         

            //ID
            $users->setId($result['id']);

            //ENABLED
            $users->setEnabled($result['enabled']);

            //PASSWORD
            $users->setPassword($result['password']);

            //ROLES
            $users->setRoles($result['roles']);

            //USERNAME
            $users->setUsername($result['username']);
            $listUsersResult[] = $users;
        }

        return $listUsersResult;
    }

    /**
     * Create
     */
    public function create($users) {
        return $this->connection->merge($users);        
    }

    /**
     * Delete
     */
    public function delete($users){
         return $this->connection->delete($users);
    }
}
?>