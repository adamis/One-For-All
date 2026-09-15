<?php
namespace engine\adapter;
use engine\dao\Ad_reset_config;
use engine\utils\FilterWhere;

class Ad_reset_configAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listAd_reset_config = $this->connection->getAll("ad_reset_config", $where, $orderColun, $order, $page, $sizePage);        
        $listAd_reset_configResult = Array(); 
    	
    	foreach ($listAd_reset_config as $result){
            $ad_reset_config = new Ad_reset_config();            
         

            //ID
            $ad_reset_config->setId($result['id']);

            //DATE_CREATE
            $ad_reset_config->setDate_create($result['date_create']);

            //DATE_UPDATE
            $ad_reset_config->setDate_update($result['date_update']);

            //SCRIPT_CONSULTA
            $ad_reset_config->setScript_consulta($result['script_consulta']);

            //SCRIPT_RESET
            $ad_reset_config->setScript_reset($result['script_reset']);

            //SHELL
            $ad_reset_config->setShell($result['shell']);

            //SCRIPT_AUTORIZACAO
            $ad_reset_config->setScript_autorizacao($result['script_autorizacao']);

            //SCRIPT_CRIAR_USUARIO
            $ad_reset_config->setScript_criar_usuario($result['script_criar_usuario']);

            //SCRIPT_LISTAR_OU
            $ad_reset_config->setScript_listar_ou($result['script_listar_ou']);
            $listAd_reset_configResult[] = $ad_reset_config;
        }

        return $listAd_reset_configResult;
    }

    /**
     * Create
     */
    public function create($ad_reset_config) {
        return $this->connection->merge($ad_reset_config);        
    }

    /**
     * Delete
     */
    public function delete($ad_reset_config){
         return $this->connection->delete($ad_reset_config);
    }
}
?>