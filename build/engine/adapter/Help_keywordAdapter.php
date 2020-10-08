<?php
namespace engine\adapter;
use engine\dao\Help_keyword;
use engine\utils\FilterWhere;

class Help_keywordAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listHelp_keyword = $this->connection->getAll("help_keyword", $where, $orderColun, $order, $page, $sizePage);        
        $listHelp_keywordResult = Array(); 
    	
    	foreach ($listHelp_keyword as $result){
            $help_keyword = new Help_keyword();            
         

            //HELP_KEYWORD_ID
            $help_keyword->setHelp_keyword_id($result['help_keyword_id']);

            //NAME
            $help_keyword->setName($result['name']);
            $listHelp_keywordResult[] = $help_keyword;
        }

        return $listHelp_keywordResult;
    }

    /**
     * Create
     */
    public function create($help_keyword) {
        return $this->connection->merge($help_keyword);        
    }

    /**
     * Delete
     */
    public function delete($help_keyword){
         return $this->connection->delete($help_keyword);
    }
}
?>