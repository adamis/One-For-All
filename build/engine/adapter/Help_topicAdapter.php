<?php
namespace engine\adapter;
use engine\dao\Help_topic;
use engine\utils\FilterWhere;

class Help_topicAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listHelp_topic = $this->connection->getAll("help_topic", $where, $orderColun, $order, $page, $sizePage);        
        $listHelp_topicResult = Array(); 
    	
    	foreach ($listHelp_topic as $result){
            $help_topic = new Help_topic();            
         

            //HELP_TOPIC_ID
            $help_topic->setHelp_topic_id($result['help_topic_id']);

            //NAME
            $help_topic->setName($result['name']);

            //HELP_CATEGORY_ID
            $help_topic->setHelp_category_id($result['help_category_id']);

            //DESCRIPTION
            $help_topic->setDescription($result['description']);

            //EXAMPLE
            $help_topic->setExample($result['example']);

            //URL
            $help_topic->setUrl($result['url']);
            $listHelp_topicResult[] = $help_topic;
        }

        return $listHelp_topicResult;
    }

    /**
     * Create
     */
    public function create($help_topic) {
        return $this->connection->merge($help_topic);        
    }

    /**
     * Delete
     */
    public function delete($help_topic){
         return $this->connection->delete($help_topic);
    }
}
?>