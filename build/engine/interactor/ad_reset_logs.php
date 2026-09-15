<?php    
use engine\adapter;
use engine\connection;
use engine\dao;
use engine\utils\FilterWhere;
use engine\utils\ResponseDelete;

/**
 * FindAll
 */
function find()
{
    $where = new FilterWhere();
	$page = 0;
	$pageSize = 0;
	$list = Array(); 


    if (isset($_REQUEST['id'])) {
		$where = new FilterWhere();
		$where->setCollum('ad_reset_logs.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['ad_hostname'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.ad_hostname');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['ad_hostname'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['fk_condominio_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('ad_reset_logs.fk_condominio_id');         
		 $where->setValue($_REQUEST['fk_condominio_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['condominio_nome'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.condominio_nome');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['condominio_nome'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['resultado'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.resultado');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['resultado'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['sucesso'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.sucesso');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['sucesso'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['usuario_ad'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.usuario_ad');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['usuario_ad'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['usuario_autorizador_ad'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.usuario_autorizador_ad');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['usuario_autorizador_ad'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['usuario_logado'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.usuario_logado');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['usuario_logado'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['fk_usuario_logado_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('ad_reset_logs.fk_usuario_logado_id');         
		 $where->setValue($_REQUEST['fk_usuario_logado_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['usuario_logado_nome'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.usuario_logado_nome');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['usuario_logado_nome'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $ad_reset_logsAdapter = new adapter\Ad_reset_logsAdapter($connection);
    $result = $ad_reset_logsAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Get
 */
function findAll()
{
    $where = new FilterWhere();
	$page = 0;
	$pageSize = 0;
	$list = Array();


    if (isset($_GET['id'])) {        
		$where = new FilterWhere();
		$where->setCollum('ad_reset_logs.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['ad_hostname'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.ad_hostname');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['ad_hostname'].'%');
		$list[]=$where;
    }
    if (isset($_GET['fk_condominio_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('ad_reset_logs.fk_condominio_id');         
		 $where->setValue($_GET['fk_condominio_id']);
		 $list[]=$where;
    }

    if (isset($_GET['condominio_nome'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.condominio_nome');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['condominio_nome'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['resultado'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.resultado');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['resultado'].'%');
		$list[]=$where;
    }
    if (isset($_GET['sucesso'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.sucesso');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['sucesso'].'%');
		$list[]=$where;
    }
    if (isset($_GET['usuario_ad'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.usuario_ad');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['usuario_ad'].'%');
		$list[]=$where;
    }
    if (isset($_GET['usuario_autorizador_ad'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.usuario_autorizador_ad');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['usuario_autorizador_ad'].'%');
		$list[]=$where;
    }
    if (isset($_GET['usuario_logado'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.usuario_logado');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['usuario_logado'].'%');
		$list[]=$where;
    }
    if (isset($_GET['fk_usuario_logado_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('ad_reset_logs.fk_usuario_logado_id');         
		 $where->setValue($_GET['fk_usuario_logado_id']);
		 $list[]=$where;
    }

    if (isset($_GET['usuario_logado_nome'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_logs.usuario_logado_nome');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['usuario_logado_nome'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $ad_reset_logsAdapter = new adapter\Ad_reset_logsAdapter($connection);
    $result = $ad_reset_logsAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Delete
 */
function remove()
{
    $ad_reset_logs = new dao\Ad_reset_logs();

    if (isset($_GET['id'])) {        
        $ad_reset_logs->setId($_GET['id']);
    }

    if (isset($_GET['ad_hostname'])) {
        $ad_reset_logs->setAd_hostname($_GET['ad_hostname']);
    }
    if (isset($_GET['fk_condominio_id'])) {
        $ad_reset_logs->setFk_condominio_id($_GET['fk_condominio_id']);
    }

    if (isset($_GET['condominio_nome'])) {
        $ad_reset_logs->setCondominio_nome($_GET['condominio_nome']);
    }
    if (isset($_GET['date_create'])) {
        $ad_reset_logs->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['resultado'])) {
        $ad_reset_logs->setResultado($_GET['resultado']);
    }
    if (isset($_GET['sucesso'])) {
        $ad_reset_logs->setSucesso($_GET['sucesso']);
    }
    if (isset($_GET['usuario_ad'])) {
        $ad_reset_logs->setUsuario_ad($_GET['usuario_ad']);
    }
    if (isset($_GET['usuario_autorizador_ad'])) {
        $ad_reset_logs->setUsuario_autorizador_ad($_GET['usuario_autorizador_ad']);
    }
    if (isset($_GET['usuario_logado'])) {
        $ad_reset_logs->setUsuario_logado($_GET['usuario_logado']);
    }
    if (isset($_GET['fk_usuario_logado_id'])) {
        $ad_reset_logs->setFk_usuario_logado_id($_GET['fk_usuario_logado_id']);
    }

    if (isset($_GET['usuario_logado_nome'])) {
        $ad_reset_logs->setUsuario_logado_nome($_GET['usuario_logado_nome']);
    }
    $connection = new connection\Connection();
    $ad_reset_logsAdapter = new adapter\Ad_reset_logsAdapter($connection);
    $result = $ad_reset_logsAdapter->delete($ad_reset_logs);

    
	$response = new ResponseDelete();
	$response->setSize($result);
	if($result > 0){
		$response->setStatus(true);
	}else{
		$response->setStatus(false);
	}	

    return json_encode($response, JSON_UNESCAPED_UNICODE);

}

/**
 * Put
 */
function update()
{
 $ad_reset_logs = new dao\Ad_reset_logs();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $ad_reset_logs->setId($post_vars['id']);
    }

    if (isset($post_vars['ad_hostname'])) {
        $ad_reset_logs->setAd_hostname($post_vars['ad_hostname']);
    }
    if (isset($post_vars['fk_condominio_id'])) {
        $ad_reset_logs->setFk_condominio_id($post_vars['fk_condominio_id']);
    }

    if (isset($post_vars['condominio_nome'])) {
        $ad_reset_logs->setCondominio_nome($post_vars['condominio_nome']);
    }
    if (isset($post_vars['date_create'])) {
        $ad_reset_logs->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['resultado'])) {
        $ad_reset_logs->setResultado($post_vars['resultado']);
    }
    if (isset($post_vars['sucesso'])) {
        $ad_reset_logs->setSucesso($post_vars['sucesso']);
    }
    if (isset($post_vars['usuario_ad'])) {
        $ad_reset_logs->setUsuario_ad($post_vars['usuario_ad']);
    }
    if (isset($post_vars['usuario_autorizador_ad'])) {
        $ad_reset_logs->setUsuario_autorizador_ad($post_vars['usuario_autorizador_ad']);
    }
    if (isset($post_vars['usuario_logado'])) {
        $ad_reset_logs->setUsuario_logado($post_vars['usuario_logado']);
    }
    if (isset($post_vars['fk_usuario_logado_id'])) {
        $ad_reset_logs->setFk_usuario_logado_id($post_vars['fk_usuario_logado_id']);
    }

    if (isset($post_vars['usuario_logado_nome'])) {
        $ad_reset_logs->setUsuario_logado_nome($post_vars['usuario_logado_nome']);
    }
    $connection = new connection\Connection();
    $ad_reset_logsAdapter = new adapter\Ad_reset_logsAdapter($connection);
    $result = $ad_reset_logsAdapter->create($ad_reset_logs);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Insert
 */
function create()
{
    $ad_reset_logs = new dao\Ad_reset_logs();

    if (isset($_REQUEST['id'])) {        
        $ad_reset_logs->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['ad_hostname'])) {
        $ad_reset_logs->setAd_hostname($_REQUEST['ad_hostname']);
    }
    if (isset($_REQUEST['fk_condominio_id'])) {
        $ad_reset_logs->setFk_condominio_id($_REQUEST['fk_condominio_id']);
    }

    if (isset($_REQUEST['condominio_nome'])) {
        $ad_reset_logs->setCondominio_nome($_REQUEST['condominio_nome']);
    }
    if (isset($_REQUEST['date_create'])) {
        $ad_reset_logs->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['resultado'])) {
        $ad_reset_logs->setResultado($_REQUEST['resultado']);
    }
    if (isset($_REQUEST['sucesso'])) {
        $ad_reset_logs->setSucesso($_REQUEST['sucesso']);
    }
    if (isset($_REQUEST['usuario_ad'])) {
        $ad_reset_logs->setUsuario_ad($_REQUEST['usuario_ad']);
    }
    if (isset($_REQUEST['usuario_autorizador_ad'])) {
        $ad_reset_logs->setUsuario_autorizador_ad($_REQUEST['usuario_autorizador_ad']);
    }
    if (isset($_REQUEST['usuario_logado'])) {
        $ad_reset_logs->setUsuario_logado($_REQUEST['usuario_logado']);
    }
    if (isset($_REQUEST['fk_usuario_logado_id'])) {
        $ad_reset_logs->setFk_usuario_logado_id($_REQUEST['fk_usuario_logado_id']);
    }

    if (isset($_REQUEST['usuario_logado_nome'])) {
        $ad_reset_logs->setUsuario_logado_nome($_REQUEST['usuario_logado_nome']);
    }
    $connection = new connection\Connection();
    $ad_reset_logsAdapter = new adapter\Ad_reset_logsAdapter($connection);
    $result = $ad_reset_logsAdapter->create($ad_reset_logs);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);
       
}

?>