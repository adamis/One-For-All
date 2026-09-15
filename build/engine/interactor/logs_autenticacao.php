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
		$where->setCollum('logs_autenticacao.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['data_hora'])) {

		$where = new FilterWhere();       
		$where->setCollum('logs_autenticacao.data_hora');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['data_hora'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['ip_address'])) {

		$where = new FilterWhere();       
		$where->setCollum('logs_autenticacao.ip_address');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['ip_address'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['user_agent'])) {

		$where = new FilterWhere();       
		$where->setCollum('logs_autenticacao.user_agent');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['user_agent'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['usuario'])) {

		$where = new FilterWhere();       
		$where->setCollum('logs_autenticacao.usuario');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['usuario'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $logs_autenticacaoAdapter = new adapter\Logs_autenticacaoAdapter($connection);
    $result = $logs_autenticacaoAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('logs_autenticacao.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['data_hora'])) {
       $where = new FilterWhere();       
		$where->setCollum('logs_autenticacao.data_hora');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['data_hora'].'%');
		$list[]=$where;
    }
    if (isset($_GET['ip_address'])) {
       $where = new FilterWhere();       
		$where->setCollum('logs_autenticacao.ip_address');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['ip_address'].'%');
		$list[]=$where;
    }
    if (isset($_GET['user_agent'])) {
       $where = new FilterWhere();       
		$where->setCollum('logs_autenticacao.user_agent');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['user_agent'].'%');
		$list[]=$where;
    }
    if (isset($_GET['usuario'])) {
       $where = new FilterWhere();       
		$where->setCollum('logs_autenticacao.usuario');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['usuario'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $logs_autenticacaoAdapter = new adapter\Logs_autenticacaoAdapter($connection);
    $result = $logs_autenticacaoAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Delete
 */
function remove()
{
    $logs_autenticacao = new dao\Logs_autenticacao();

    if (isset($_GET['id'])) {        
        $logs_autenticacao->setId($_GET['id']);
    }

    if (isset($_GET['data_hora'])) {
        $logs_autenticacao->setData_hora($_GET['data_hora']);
    }
    if (isset($_GET['ip_address'])) {
        $logs_autenticacao->setIp_address($_GET['ip_address']);
    }
    if (isset($_GET['user_agent'])) {
        $logs_autenticacao->setUser_agent($_GET['user_agent']);
    }
    if (isset($_GET['usuario'])) {
        $logs_autenticacao->setUsuario($_GET['usuario']);
    }
    $connection = new connection\Connection();
    $logs_autenticacaoAdapter = new adapter\Logs_autenticacaoAdapter($connection);
    $result = $logs_autenticacaoAdapter->delete($logs_autenticacao);

    
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
 $logs_autenticacao = new dao\Logs_autenticacao();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $logs_autenticacao->setId($post_vars['id']);
    }

    if (isset($post_vars['data_hora'])) {
        $logs_autenticacao->setData_hora($post_vars['data_hora']);
    }
    if (isset($post_vars['ip_address'])) {
        $logs_autenticacao->setIp_address($post_vars['ip_address']);
    }
    if (isset($post_vars['user_agent'])) {
        $logs_autenticacao->setUser_agent($post_vars['user_agent']);
    }
    if (isset($post_vars['usuario'])) {
        $logs_autenticacao->setUsuario($post_vars['usuario']);
    }
    $connection = new connection\Connection();
    $logs_autenticacaoAdapter = new adapter\Logs_autenticacaoAdapter($connection);
    $result = $logs_autenticacaoAdapter->create($logs_autenticacao);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Insert
 */
function create()
{
    $logs_autenticacao = new dao\Logs_autenticacao();

    if (isset($_REQUEST['id'])) {        
        $logs_autenticacao->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['data_hora'])) {
        $logs_autenticacao->setData_hora($_REQUEST['data_hora']);
    }
    if (isset($_REQUEST['ip_address'])) {
        $logs_autenticacao->setIp_address($_REQUEST['ip_address']);
    }
    if (isset($_REQUEST['user_agent'])) {
        $logs_autenticacao->setUser_agent($_REQUEST['user_agent']);
    }
    if (isset($_REQUEST['usuario'])) {
        $logs_autenticacao->setUsuario($_REQUEST['usuario']);
    }
    $connection = new connection\Connection();
    $logs_autenticacaoAdapter = new adapter\Logs_autenticacaoAdapter($connection);
    $result = $logs_autenticacaoAdapter->create($logs_autenticacao);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);
       
}

?>