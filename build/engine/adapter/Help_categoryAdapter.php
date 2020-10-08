<?php
namespace engine\adapter;
use engine\dao\Help_category;
use engine\utils\FilterWhere;

class Help_categoryAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listHelp_category = $this->connection->getAll("help_category", $where, $orderColun, $order, $page, $sizePage);        
        $listHelp_categoryResult = Array(); 
    	
    	foreach ($listHelp_category as $result){
            $help_category = new Help_category();            
         

            //HELP_CATEGORY_ID
            $help_category->setHelp_category_id($result['help_category_id']);

            //NAME
            $help_category->setName($result['name']);

            //PARENT_CATEGORY_ID
            $help_category->setParent_category_id($result['parent_category_id']);

            //URL
            $help_category->setUrl($result['url']);
            $listHelp_categoryResult[] = $help_category;
        }

        return $listHelp_categoryResult;
    }

    /**
     * Create
     */
    public function create($help_category) {
        return $this->connection->merge($help_category);        
    }

    /**
     * Delete
     */
    public function delete($help_category){
         return $this->connection->delete($help_category);
    }
}
?>