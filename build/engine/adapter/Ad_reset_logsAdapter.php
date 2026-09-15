<?php
namespace engine\adapter;
use engine\dao\Ad_reset_logs;
use engine\utils\FilterWhere;

class Ad_reset_logsAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listAd_reset_logs = $this->connection->getAll("ad_reset_logs", $where, $orderColun, $order, $page, $sizePage);        
        $listAd_reset_logsResult = Array(); 
    	
    	foreach ($listAd_reset_logs as $result){
            $ad_reset_logs = new Ad_reset_logs();            
         

            //ID
            $ad_reset_logs->setId($result['id']);

            //AD_HOSTNAME
            $ad_reset_logs->setAd_hostname($result['ad_hostname']);

            //FK_CONDOMINIO_ID
            $ad_reset_logs->setFk_condominio_id($result['fk_condominio_id']);

            //CONDOMINIO_NOME
            $ad_reset_logs->setCondominio_nome($result['condominio_nome']);

            //DATE_CREATE
            $ad_reset_logs->setDate_create($result['date_create']);

            //RESULTADO
            $ad_reset_logs->setResultado($result['resultado']);

            //SUCESSO
            $ad_reset_logs->setSucesso($result['sucesso']);

            //USUARIO_AD
            $ad_reset_logs->setUsuario_ad($result['usuario_ad']);

            //USUARIO_AUTORIZADOR_AD
            $ad_reset_logs->setUsuario_autorizador_ad($result['usuario_autorizador_ad']);

            //USUARIO_LOGADO
            $ad_reset_logs->setUsuario_logado($result['usuario_logado']);

            //FK_USUARIO_LOGADO_ID
            $ad_reset_logs->setFk_usuario_logado_id($result['fk_usuario_logado_id']);

            //USUARIO_LOGADO_NOME
            $ad_reset_logs->setUsuario_logado_nome($result['usuario_logado_nome']);
            $listAd_reset_logsResult[] = $ad_reset_logs;
        }

        return $listAd_reset_logsResult;
    }

    /**
     * Create
     */
    public function create($ad_reset_logs) {
        return $this->connection->merge($ad_reset_logs);        
    }

    /**
     * Delete
     */
    public function delete($ad_reset_logs){
         return $this->connection->delete($ad_reset_logs);
    }
}
?>