<?php
namespace engine\adapter;
use engine\dao\Help_relation;
use engine\utils\FilterWhere;

class Help_relationAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listHelp_relation = $this->connection->getAll("help_relation", $where, $orderColun, $order, $page, $sizePage);        
        $listHelp_relationResult = Array(); 
    	
    	foreach ($listHelp_relation as $result){
            $help_relation = new Help_relation();            
         

            //HELP_TOPIC_ID
            $help_relation->setHelp_topic_id($result['help_topic_id']);

            //HELP_KEYWORD_ID
            $help_relation->setHelp_keyword_id($result['help_keyword_id']);
            $listHelp_relationResult[] = $help_relation;
        }

        return $listHelp_relationResult;
    }

    /**
     * Create
     */
    public function create($help_relation) {
        return $this->connection->merge($help_relation);        
    }

    /**
     * Delete
     */
    public function delete($help_relation){
         return $this->connection->delete($help_relation);
    }
}
?>