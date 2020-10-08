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


    if (isset($_REQUEST['event_time'])) {

		$where = new FilterWhere();       
		$where->setCollum('general_log.event_time');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['event_time'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['user_host'])) {

		$where = new FilterWhere();       
		$where->setCollum('general_log.user_host');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['user_host'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['thread_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('general_log.thread_id');         
		 $where->setValue($_REQUEST['thread_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['server_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('general_log.server_id');         
		 $where->setValue($_REQUEST['server_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['command_type'])) {

		$where = new FilterWhere();       
		$where->setCollum('general_log.command_type');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['command_type'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['argument'])) {

		$where = new FilterWhere();       
		$where->setCollum('general_log.argument');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['argument'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $general_logAdapter = new adapter\General_logAdapter($connection);
    $result = $general_logAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['event_time'])) {
       $where = new FilterWhere();       
		$where->setCollum('general_log.event_time');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['event_time'].'%');
		$list[]=$where;
    }
    if (isset($_GET['user_host'])) {
       $where = new FilterWhere();       
		$where->setCollum('general_log.user_host');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['user_host'].'%');
		$list[]=$where;
    }
    if (isset($_GET['thread_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('general_log.thread_id');         
		 $where->setValue($_GET['thread_id']);
		 $list[]=$where;
    }

    if (isset($_GET['server_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('general_log.server_id');         
		 $where->setValue($_GET['server_id']);
		 $list[]=$where;
    }

    if (isset($_GET['command_type'])) {
       $where = new FilterWhere();       
		$where->setCollum('general_log.command_type');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['command_type'].'%');
		$list[]=$where;
    }
    if (isset($_GET['argument'])) {
       $where = new FilterWhere();       
		$where->setCollum('general_log.argument');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['argument'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $general_logAdapter = new adapter\General_logAdapter($connection);
    $result = $general_logAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $general_log = new dao\General_log();

    if (isset($_GET['event_time'])) {
        $general_log->setEvent_time($_GET['event_time']);
    }
    if (isset($_GET['user_host'])) {
        $general_log->setUser_host($_GET['user_host']);
    }
    if (isset($_GET['thread_id'])) {
        $general_log->setThread_id($_GET['thread_id']);
    }

    if (isset($_GET['server_id'])) {
        $general_log->setServer_id($_GET['server_id']);
    }

    if (isset($_GET['command_type'])) {
        $general_log->setCommand_type($_GET['command_type']);
    }
    if (isset($_GET['argument'])) {
        $general_log->setArgument($_GET['argument']);
    }
    $connection = new connection\Connection();
    $general_logAdapter = new adapter\General_logAdapter($connection);
    $result = $general_logAdapter->delete($general_log);

    
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
 $general_log = new dao\General_log();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['event_time'])) {
        $general_log->setEvent_time($post_vars['event_time']);
    }
    if (isset($post_vars['user_host'])) {
        $general_log->setUser_host($post_vars['user_host']);
    }
    if (isset($post_vars['thread_id'])) {
        $general_log->setThread_id($post_vars['thread_id']);
    }

    if (isset($post_vars['server_id'])) {
        $general_log->setServer_id($post_vars['server_id']);
    }

    if (isset($post_vars['command_type'])) {
        $general_log->setCommand_type($post_vars['command_type']);
    }
    if (isset($post_vars['argument'])) {
        $general_log->setArgument($post_vars['argument']);
    }
    $connection = new connection\Connection();
    $general_logAdapter = new adapter\General_logAdapter($connection);
    $result = $general_logAdapter->create($general_log);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $general_log = new dao\General_log();

    if (isset($_REQUEST['event_time'])) {
        $general_log->setEvent_time($_REQUEST['event_time']);
    }
    if (isset($_REQUEST['user_host'])) {
        $general_log->setUser_host($_REQUEST['user_host']);
    }
    if (isset($_REQUEST['thread_id'])) {
        $general_log->setThread_id($_REQUEST['thread_id']);
    }

    if (isset($_REQUEST['server_id'])) {
        $general_log->setServer_id($_REQUEST['server_id']);
    }

    if (isset($_REQUEST['command_type'])) {
        $general_log->setCommand_type($_REQUEST['command_type']);
    }
    if (isset($_REQUEST['argument'])) {
        $general_log->setArgument($_REQUEST['argument']);
    }
    $connection = new connection\Connection();
    $general_logAdapter = new adapter\General_logAdapter($connection);
    $result = $general_logAdapter->create($general_log);
        
    return json_encode($result);
       
}

?>