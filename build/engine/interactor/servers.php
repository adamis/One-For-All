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


    if (isset($_REQUEST['server_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('servers.server_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['server_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['host'])) {

		$where = new FilterWhere();       
		$where->setCollum('servers.host');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['host'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['db'])) {

		$where = new FilterWhere();       
		$where->setCollum('servers.db');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['db'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['username'])) {

		$where = new FilterWhere();       
		$where->setCollum('servers.username');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['username'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['password'])) {

		$where = new FilterWhere();       
		$where->setCollum('servers.password');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['password'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['port'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('servers.port');         
		 $where->setValue($_REQUEST['port']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['socket'])) {

		$where = new FilterWhere();       
		$where->setCollum('servers.socket');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['socket'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['wrapper'])) {

		$where = new FilterWhere();       
		$where->setCollum('servers.wrapper');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['wrapper'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['owner'])) {

		$where = new FilterWhere();       
		$where->setCollum('servers.owner');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['owner'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $serversAdapter = new adapter\ServersAdapter($connection);
    $result = $serversAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

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


    if (isset($_GET['server_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('servers.server_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['server_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['host'])) {
       $where = new FilterWhere();       
		$where->setCollum('servers.host');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['host'].'%');
		$list[]=$where;
    }
    if (isset($_GET['db'])) {
       $where = new FilterWhere();       
		$where->setCollum('servers.db');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['db'].'%');
		$list[]=$where;
    }
    if (isset($_GET['username'])) {
       $where = new FilterWhere();       
		$where->setCollum('servers.username');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['username'].'%');
		$list[]=$where;
    }
    if (isset($_GET['password'])) {
       $where = new FilterWhere();       
		$where->setCollum('servers.password');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['password'].'%');
		$list[]=$where;
    }
    if (isset($_GET['port'])) {
         $where = new FilterWhere();       
		 $where->setCollum('servers.port');         
		 $where->setValue($_GET['port']);
		 $list[]=$where;
    }

    if (isset($_GET['socket'])) {
       $where = new FilterWhere();       
		$where->setCollum('servers.socket');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['socket'].'%');
		$list[]=$where;
    }
    if (isset($_GET['wrapper'])) {
       $where = new FilterWhere();       
		$where->setCollum('servers.wrapper');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['wrapper'].'%');
		$list[]=$where;
    }
    if (isset($_GET['owner'])) {
       $where = new FilterWhere();       
		$where->setCollum('servers.owner');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['owner'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $serversAdapter = new adapter\ServersAdapter($connection);
    $result = $serversAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $servers = new dao\Servers();

    if (isset($_GET['server_name'])) {
        $servers->setServer_name($_GET['server_name']);
    }
    if (isset($_GET['host'])) {
        $servers->setHost($_GET['host']);
    }
    if (isset($_GET['db'])) {
        $servers->setDb($_GET['db']);
    }
    if (isset($_GET['username'])) {
        $servers->setUsername($_GET['username']);
    }
    if (isset($_GET['password'])) {
        $servers->setPassword($_GET['password']);
    }
    if (isset($_GET['port'])) {
        $servers->setPort($_GET['port']);
    }

    if (isset($_GET['socket'])) {
        $servers->setSocket($_GET['socket']);
    }
    if (isset($_GET['wrapper'])) {
        $servers->setWrapper($_GET['wrapper']);
    }
    if (isset($_GET['owner'])) {
        $servers->setOwner($_GET['owner']);
    }
    $connection = new connection\Connection();
    $serversAdapter = new adapter\ServersAdapter($connection);
    $result = $serversAdapter->delete($servers);

    
	$response = new ResponseDelete();
	$response->setSize($result);
	if($result > 0){
		$response->setStatus(true);
	}else{
		$response->setStatus(false);
	}	

    return json_encode($response);

}

/**
 * Put
 */
function update()
{
 $servers = new dao\Servers();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['server_name'])) {
        $servers->setServer_name($post_vars['server_name']);
    }
    if (isset($post_vars['host'])) {
        $servers->setHost($post_vars['host']);
    }
    if (isset($post_vars['db'])) {
        $servers->setDb($post_vars['db']);
    }
    if (isset($post_vars['username'])) {
        $servers->setUsername($post_vars['username']);
    }
    if (isset($post_vars['password'])) {
        $servers->setPassword($post_vars['password']);
    }
    if (isset($post_vars['port'])) {
        $servers->setPort($post_vars['port']);
    }

    if (isset($post_vars['socket'])) {
        $servers->setSocket($post_vars['socket']);
    }
    if (isset($post_vars['wrapper'])) {
        $servers->setWrapper($post_vars['wrapper']);
    }
    if (isset($post_vars['owner'])) {
        $servers->setOwner($post_vars['owner']);
    }
    $connection = new connection\Connection();
    $serversAdapter = new adapter\ServersAdapter($connection);
    $result = $serversAdapter->create($servers);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $servers = new dao\Servers();

    if (isset($_REQUEST['server_name'])) {
        $servers->setServer_name($_REQUEST['server_name']);
    }
    if (isset($_REQUEST['host'])) {
        $servers->setHost($_REQUEST['host']);
    }
    if (isset($_REQUEST['db'])) {
        $servers->setDb($_REQUEST['db']);
    }
    if (isset($_REQUEST['username'])) {
        $servers->setUsername($_REQUEST['username']);
    }
    if (isset($_REQUEST['password'])) {
        $servers->setPassword($_REQUEST['password']);
    }
    if (isset($_REQUEST['port'])) {
        $servers->setPort($_REQUEST['port']);
    }

    if (isset($_REQUEST['socket'])) {
        $servers->setSocket($_REQUEST['socket']);
    }
    if (isset($_REQUEST['wrapper'])) {
        $servers->setWrapper($_REQUEST['wrapper']);
    }
    if (isset($_REQUEST['owner'])) {
        $servers->setOwner($_REQUEST['owner']);
    }
    $connection = new connection\Connection();
    $serversAdapter = new adapter\ServersAdapter($connection);
    $result = $serversAdapter->create($servers);
        
    return json_encode($result);
       
}

?>