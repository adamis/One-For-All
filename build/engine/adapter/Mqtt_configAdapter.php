<?php
namespace engine\adapter;
use engine\dao\Mqtt_config;
use engine\utils\FilterWhere;

class Mqtt_configAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listMqtt_config = $this->connection->getAll("mqtt_config", $where, $orderColun, $order, $page, $sizePage);        
        $listMqtt_configResult = Array(); 
    	
    	foreach ($listMqtt_config as $result){
            $mqtt_config = new Mqtt_config();            
         

            //ID
            $mqtt_config->setId($result['id']);

            //CLIENT_ID_PREFIX
            $mqtt_config->setClient_id_prefix($result['client_id_prefix']);

            //COMMAND_TIMEOUT_SECONDS
            $mqtt_config->setCommand_timeout_seconds($result['command_timeout_seconds']);

            //DATE_CREATE
            $mqtt_config->setDate_create($result['date_create']);

            //DATE_UPDATE
            $mqtt_config->setDate_update($result['date_update']);

            //EXEC_TOPIC_TEMPLATE
            $mqtt_config->setExec_topic_template($result['exec_topic_template']);

            //HOST
            $mqtt_config->setHost($result['host']);

            //PASSWORD
            $mqtt_config->setPassword($result['password']);

            //PORTA
            $mqtt_config->setPorta($result['porta']);

            //PROTOCOLO
            $mqtt_config->setProtocolo($result['protocolo']);

            //RESULT_TOPIC_FILTER
            $mqtt_config->setResult_topic_filter($result['result_topic_filter']);

            //SERVER_TOPIC
            $mqtt_config->setServer_topic($result['server_topic']);

            //USERNAME
            $mqtt_config->setUsername($result['username']);
            $listMqtt_configResult[] = $mqtt_config;
        }

        return $listMqtt_configResult;
    }

    /**
     * Create
     */
    public function create($mqtt_config) {
        return $this->connection->merge($mqtt_config);        
    }

    /**
     * Delete
     */
    public function delete($mqtt_config){
         return $this->connection->delete($mqtt_config);
    }
}
?>