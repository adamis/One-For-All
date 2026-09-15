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
		$where->setCollum('ad_reset_config.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_config.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_config.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['script_consulta'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_config.script_consulta');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['script_consulta'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['script_reset'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_config.script_reset');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['script_reset'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['shell'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_config.shell');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['shell'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['script_autorizacao'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_config.script_autorizacao');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['script_autorizacao'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['script_criar_usuario'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_config.script_criar_usuario');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['script_criar_usuario'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['script_listar_ou'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_reset_config.script_listar_ou');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['script_listar_ou'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $ad_reset_configAdapter = new adapter\Ad_reset_configAdapter($connection);
    $result = $ad_reset_configAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('ad_reset_config.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_config.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_config.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['script_consulta'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_config.script_consulta');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['script_consulta'].'%');
		$list[]=$where;
    }
    if (isset($_GET['script_reset'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_config.script_reset');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['script_reset'].'%');
		$list[]=$where;
    }
    if (isset($_GET['shell'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_config.shell');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['shell'].'%');
		$list[]=$where;
    }
    if (isset($_GET['script_autorizacao'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_config.script_autorizacao');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['script_autorizacao'].'%');
		$list[]=$where;
    }
    if (isset($_GET['script_criar_usuario'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_config.script_criar_usuario');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['script_criar_usuario'].'%');
		$list[]=$where;
    }
    if (isset($_GET['script_listar_ou'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_reset_config.script_listar_ou');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['script_listar_ou'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $ad_reset_configAdapter = new adapter\Ad_reset_configAdapter($connection);
    $result = $ad_reset_configAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Delete
 */
function remove()
{
    $ad_reset_config = new dao\Ad_reset_config();

    if (isset($_GET['id'])) {        
        $ad_reset_config->setId($_GET['id']);
    }

    if (isset($_GET['date_create'])) {
        $ad_reset_config->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $ad_reset_config->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['script_consulta'])) {
        $ad_reset_config->setScript_consulta($_GET['script_consulta']);
    }
    if (isset($_GET['script_reset'])) {
        $ad_reset_config->setScript_reset($_GET['script_reset']);
    }
    if (isset($_GET['shell'])) {
        $ad_reset_config->setShell($_GET['shell']);
    }
    if (isset($_GET['script_autorizacao'])) {
        $ad_reset_config->setScript_autorizacao($_GET['script_autorizacao']);
    }
    if (isset($_GET['script_criar_usuario'])) {
        $ad_reset_config->setScript_criar_usuario($_GET['script_criar_usuario']);
    }
    if (isset($_GET['script_listar_ou'])) {
        $ad_reset_config->setScript_listar_ou($_GET['script_listar_ou']);
    }
    $connection = new connection\Connection();
    $ad_reset_configAdapter = new adapter\Ad_reset_configAdapter($connection);
    $result = $ad_reset_configAdapter->delete($ad_reset_config);

    
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
 $ad_reset_config = new dao\Ad_reset_config();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $ad_reset_config->setId($post_vars['id']);
    }

    if (isset($post_vars['date_create'])) {
        $ad_reset_config->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $ad_reset_config->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['script_consulta'])) {
        $ad_reset_config->setScript_consulta($post_vars['script_consulta']);
    }
    if (isset($post_vars['script_reset'])) {
        $ad_reset_config->setScript_reset($post_vars['script_reset']);
    }
    if (isset($post_vars['shell'])) {
        $ad_reset_config->setShell($post_vars['shell']);
    }
    if (isset($post_vars['script_autorizacao'])) {
        $ad_reset_config->setScript_autorizacao($post_vars['script_autorizacao']);
    }
    if (isset($post_vars['script_criar_usuario'])) {
        $ad_reset_config->setScript_criar_usuario($post_vars['script_criar_usuario']);
    }
    if (isset($post_vars['script_listar_ou'])) {
        $ad_reset_config->setScript_listar_ou($post_vars['script_listar_ou']);
    }
    $connection = new connection\Connection();
    $ad_reset_configAdapter = new adapter\Ad_reset_configAdapter($connection);
    $result = $ad_reset_configAdapter->create($ad_reset_config);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Insert
 */
function create()
{
    $ad_reset_config = new dao\Ad_reset_config();

    if (isset($_REQUEST['id'])) {        
        $ad_reset_config->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['date_create'])) {
        $ad_reset_config->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $ad_reset_config->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['script_consulta'])) {
        $ad_reset_config->setScript_consulta($_REQUEST['script_consulta']);
    }
    if (isset($_REQUEST['script_reset'])) {
        $ad_reset_config->setScript_reset($_REQUEST['script_reset']);
    }
    if (isset($_REQUEST['shell'])) {
        $ad_reset_config->setShell($_REQUEST['shell']);
    }
    if (isset($_REQUEST['script_autorizacao'])) {
        $ad_reset_config->setScript_autorizacao($_REQUEST['script_autorizacao']);
    }
    if (isset($_REQUEST['script_criar_usuario'])) {
        $ad_reset_config->setScript_criar_usuario($_REQUEST['script_criar_usuario']);
    }
    if (isset($_REQUEST['script_listar_ou'])) {
        $ad_reset_config->setScript_listar_ou($_REQUEST['script_listar_ou']);
    }
    $connection = new connection\Connection();
    $ad_reset_configAdapter = new adapter\Ad_reset_configAdapter($connection);
    $result = $ad_reset_configAdapter->create($ad_reset_config);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);
       
}

?>