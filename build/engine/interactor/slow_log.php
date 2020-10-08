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


    if (isset($_REQUEST['start_time'])) {

		$where = new FilterWhere();       
		$where->setCollum('slow_log.start_time');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['start_time'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['user_host'])) {

		$where = new FilterWhere();       
		$where->setCollum('slow_log.user_host');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['user_host'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['query_time'])) {

		$where = new FilterWhere();       
		$where->setCollum('slow_log.query_time');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['query_time'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['lock_time'])) {

		$where = new FilterWhere();       
		$where->setCollum('slow_log.lock_time');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['lock_time'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['rows_sent'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('slow_log.rows_sent');         
		 $where->setValue($_REQUEST['rows_sent']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['rows_examined'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('slow_log.rows_examined');         
		 $where->setValue($_REQUEST['rows_examined']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['db'])) {

		$where = new FilterWhere();       
		$where->setCollum('slow_log.db');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['db'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['last_insert_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('slow_log.last_insert_id');         
		 $where->setValue($_REQUEST['last_insert_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['insert_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('slow_log.insert_id');         
		 $where->setValue($_REQUEST['insert_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['server_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('slow_log.server_id');         
		 $where->setValue($_REQUEST['server_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['sql_text'])) {

		$where = new FilterWhere();       
		$where->setCollum('slow_log.sql_text');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['sql_text'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['thread_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('slow_log.thread_id');         
		 $where->setValue($_REQUEST['thread_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['rows_affected'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('slow_log.rows_affected');         
		 $where->setValue($_REQUEST['rows_affected']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $slow_logAdapter = new adapter\Slow_logAdapter($connection);
    $result = $slow_logAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['start_time'])) {
       $where = new FilterWhere();       
		$where->setCollum('slow_log.start_time');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['start_time'].'%');
		$list[]=$where;
    }
    if (isset($_GET['user_host'])) {
       $where = new FilterWhere();       
		$where->setCollum('slow_log.user_host');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['user_host'].'%');
		$list[]=$where;
    }
    if (isset($_GET['query_time'])) {
       $where = new FilterWhere();       
		$where->setCollum('slow_log.query_time');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['query_time'].'%');
		$list[]=$where;
    }
    if (isset($_GET['lock_time'])) {
       $where = new FilterWhere();       
		$where->setCollum('slow_log.lock_time');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['lock_time'].'%');
		$list[]=$where;
    }
    if (isset($_GET['rows_sent'])) {
         $where = new FilterWhere();       
		 $where->setCollum('slow_log.rows_sent');         
		 $where->setValue($_GET['rows_sent']);
		 $list[]=$where;
    }

    if (isset($_GET['rows_examined'])) {
         $where = new FilterWhere();       
		 $where->setCollum('slow_log.rows_examined');         
		 $where->setValue($_GET['rows_examined']);
		 $list[]=$where;
    }

    if (isset($_GET['db'])) {
       $where = new FilterWhere();       
		$where->setCollum('slow_log.db');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['db'].'%');
		$list[]=$where;
    }
    if (isset($_GET['last_insert_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('slow_log.last_insert_id');         
		 $where->setValue($_GET['last_insert_id']);
		 $list[]=$where;
    }

    if (isset($_GET['insert_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('slow_log.insert_id');         
		 $where->setValue($_GET['insert_id']);
		 $list[]=$where;
    }

    if (isset($_GET['server_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('slow_log.server_id');         
		 $where->setValue($_GET['server_id']);
		 $list[]=$where;
    }

    if (isset($_GET['sql_text'])) {
       $where = new FilterWhere();       
		$where->setCollum('slow_log.sql_text');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['sql_text'].'%');
		$list[]=$where;
    }
    if (isset($_GET['thread_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('slow_log.thread_id');         
		 $where->setValue($_GET['thread_id']);
		 $list[]=$where;
    }

    if (isset($_GET['rows_affected'])) {
         $where = new FilterWhere();       
		 $where->setCollum('slow_log.rows_affected');         
		 $where->setValue($_GET['rows_affected']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $slow_logAdapter = new adapter\Slow_logAdapter($connection);
    $result = $slow_logAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $slow_log = new dao\Slow_log();

    if (isset($_GET['start_time'])) {
        $slow_log->setStart_time($_GET['start_time']);
    }
    if (isset($_GET['user_host'])) {
        $slow_log->setUser_host($_GET['user_host']);
    }
    if (isset($_GET['query_time'])) {
        $slow_log->setQuery_time($_GET['query_time']);
    }
    if (isset($_GET['lock_time'])) {
        $slow_log->setLock_time($_GET['lock_time']);
    }
    if (isset($_GET['rows_sent'])) {
        $slow_log->setRows_sent($_GET['rows_sent']);
    }

    if (isset($_GET['rows_examined'])) {
        $slow_log->setRows_examined($_GET['rows_examined']);
    }

    if (isset($_GET['db'])) {
        $slow_log->setDb($_GET['db']);
    }
    if (isset($_GET['last_insert_id'])) {
        $slow_log->setLast_insert_id($_GET['last_insert_id']);
    }

    if (isset($_GET['insert_id'])) {
        $slow_log->setInsert_id($_GET['insert_id']);
    }

    if (isset($_GET['server_id'])) {
        $slow_log->setServer_id($_GET['server_id']);
    }

    if (isset($_GET['sql_text'])) {
        $slow_log->setSql_text($_GET['sql_text']);
    }
    if (isset($_GET['thread_id'])) {
        $slow_log->setThread_id($_GET['thread_id']);
    }

    if (isset($_GET['rows_affected'])) {
        $slow_log->setRows_affected($_GET['rows_affected']);
    }

    $connection = new connection\Connection();
    $slow_logAdapter = new adapter\Slow_logAdapter($connection);
    $result = $slow_logAdapter->delete($slow_log);

    
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
 $slow_log = new dao\Slow_log();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['start_time'])) {
        $slow_log->setStart_time($post_vars['start_time']);
    }
    if (isset($post_vars['user_host'])) {
        $slow_log->setUser_host($post_vars['user_host']);
    }
    if (isset($post_vars['query_time'])) {
        $slow_log->setQuery_time($post_vars['query_time']);
    }
    if (isset($post_vars['lock_time'])) {
        $slow_log->setLock_time($post_vars['lock_time']);
    }
    if (isset($post_vars['rows_sent'])) {
        $slow_log->setRows_sent($post_vars['rows_sent']);
    }

    if (isset($post_vars['rows_examined'])) {
        $slow_log->setRows_examined($post_vars['rows_examined']);
    }

    if (isset($post_vars['db'])) {
        $slow_log->setDb($post_vars['db']);
    }
    if (isset($post_vars['last_insert_id'])) {
        $slow_log->setLast_insert_id($post_vars['last_insert_id']);
    }

    if (isset($post_vars['insert_id'])) {
        $slow_log->setInsert_id($post_vars['insert_id']);
    }

    if (isset($post_vars['server_id'])) {
        $slow_log->setServer_id($post_vars['server_id']);
    }

    if (isset($post_vars['sql_text'])) {
        $slow_log->setSql_text($post_vars['sql_text']);
    }
    if (isset($post_vars['thread_id'])) {
        $slow_log->setThread_id($post_vars['thread_id']);
    }

    if (isset($post_vars['rows_affected'])) {
        $slow_log->setRows_affected($post_vars['rows_affected']);
    }

    $connection = new connection\Connection();
    $slow_logAdapter = new adapter\Slow_logAdapter($connection);
    $result = $slow_logAdapter->create($slow_log);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $slow_log = new dao\Slow_log();

    if (isset($_REQUEST['start_time'])) {
        $slow_log->setStart_time($_REQUEST['start_time']);
    }
    if (isset($_REQUEST['user_host'])) {
        $slow_log->setUser_host($_REQUEST['user_host']);
    }
    if (isset($_REQUEST['query_time'])) {
        $slow_log->setQuery_time($_REQUEST['query_time']);
    }
    if (isset($_REQUEST['lock_time'])) {
        $slow_log->setLock_time($_REQUEST['lock_time']);
    }
    if (isset($_REQUEST['rows_sent'])) {
        $slow_log->setRows_sent($_REQUEST['rows_sent']);
    }

    if (isset($_REQUEST['rows_examined'])) {
        $slow_log->setRows_examined($_REQUEST['rows_examined']);
    }

    if (isset($_REQUEST['db'])) {
        $slow_log->setDb($_REQUEST['db']);
    }
    if (isset($_REQUEST['last_insert_id'])) {
        $slow_log->setLast_insert_id($_REQUEST['last_insert_id']);
    }

    if (isset($_REQUEST['insert_id'])) {
        $slow_log->setInsert_id($_REQUEST['insert_id']);
    }

    if (isset($_REQUEST['server_id'])) {
        $slow_log->setServer_id($_REQUEST['server_id']);
    }

    if (isset($_REQUEST['sql_text'])) {
        $slow_log->setSql_text($_REQUEST['sql_text']);
    }
    if (isset($_REQUEST['thread_id'])) {
        $slow_log->setThread_id($_REQUEST['thread_id']);
    }

    if (isset($_REQUEST['rows_affected'])) {
        $slow_log->setRows_affected($_REQUEST['rows_affected']);
    }

    $connection = new connection\Connection();
    $slow_logAdapter = new adapter\Slow_logAdapter($connection);
    $result = $slow_logAdapter->create($slow_log);
        
    return json_encode($result);
       
}

?>