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


    if (isset($_REQUEST['db'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.db');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['db'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['name'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['body'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.body');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['body'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['definer'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.definer');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['definer'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['execute_at'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.execute_at');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['execute_at'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['interval_value'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('event.interval_value');         
		 $where->setValue($_REQUEST['interval_value']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['interval_field'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.interval_field');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['interval_field'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['created'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.created');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['created'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['modified'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.modified');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['modified'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['last_executed'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.last_executed');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['last_executed'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['starts'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.starts');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['starts'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['ends'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.ends');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['ends'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['status'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.status');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['status'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['on_completion'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.on_completion');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['on_completion'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['sql_mode'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.sql_mode');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['sql_mode'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['comment'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.comment');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['comment'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['originator'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('event.originator');         
		 $where->setValue($_REQUEST['originator']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['time_zone'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.time_zone');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['time_zone'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['character_set_client'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.character_set_client');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['character_set_client'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['collation_connection'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.collation_connection');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['collation_connection'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['db_collation'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.db_collation');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['db_collation'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['body_utf8'])) {

		$where = new FilterWhere();       
		$where->setCollum('event.body_utf8');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['body_utf8'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $eventAdapter = new adapter\EventAdapter($connection);
    $result = $eventAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['db'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.db');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['db'].'%');
		$list[]=$where;
    }
    if (isset($_GET['name'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['body'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.body');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['body'].'%');
		$list[]=$where;
    }
    if (isset($_GET['definer'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.definer');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['definer'].'%');
		$list[]=$where;
    }
    if (isset($_GET['execute_at'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.execute_at');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['execute_at'].'%');
		$list[]=$where;
    }
    if (isset($_GET['interval_value'])) {
         $where = new FilterWhere();       
		 $where->setCollum('event.interval_value');         
		 $where->setValue($_GET['interval_value']);
		 $list[]=$where;
    }

    if (isset($_GET['interval_field'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.interval_field');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['interval_field'].'%');
		$list[]=$where;
    }
    if (isset($_GET['created'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.created');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['created'].'%');
		$list[]=$where;
    }
    if (isset($_GET['modified'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.modified');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['modified'].'%');
		$list[]=$where;
    }
    if (isset($_GET['last_executed'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.last_executed');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['last_executed'].'%');
		$list[]=$where;
    }
    if (isset($_GET['starts'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.starts');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['starts'].'%');
		$list[]=$where;
    }
    if (isset($_GET['ends'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.ends');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['ends'].'%');
		$list[]=$where;
    }
    if (isset($_GET['status'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.status');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['status'].'%');
		$list[]=$where;
    }
    if (isset($_GET['on_completion'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.on_completion');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['on_completion'].'%');
		$list[]=$where;
    }
    if (isset($_GET['sql_mode'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.sql_mode');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['sql_mode'].'%');
		$list[]=$where;
    }
    if (isset($_GET['comment'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.comment');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['comment'].'%');
		$list[]=$where;
    }
    if (isset($_GET['originator'])) {
         $where = new FilterWhere();       
		 $where->setCollum('event.originator');         
		 $where->setValue($_GET['originator']);
		 $list[]=$where;
    }

    if (isset($_GET['time_zone'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.time_zone');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['time_zone'].'%');
		$list[]=$where;
    }
    if (isset($_GET['character_set_client'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.character_set_client');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['character_set_client'].'%');
		$list[]=$where;
    }
    if (isset($_GET['collation_connection'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.collation_connection');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['collation_connection'].'%');
		$list[]=$where;
    }
    if (isset($_GET['db_collation'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.db_collation');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['db_collation'].'%');
		$list[]=$where;
    }
    if (isset($_GET['body_utf8'])) {
       $where = new FilterWhere();       
		$where->setCollum('event.body_utf8');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['body_utf8'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $eventAdapter = new adapter\EventAdapter($connection);
    $result = $eventAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $event = new dao\Event();

    if (isset($_GET['db'])) {
        $event->setDb($_GET['db']);
    }
    if (isset($_GET['name'])) {
        $event->setName($_GET['name']);
    }
    if (isset($_GET['body'])) {
        $event->setBody($_GET['body']);
    }
    if (isset($_GET['definer'])) {
        $event->setDefiner($_GET['definer']);
    }
    if (isset($_GET['execute_at'])) {
        $event->setExecute_at($_GET['execute_at']);
    }
    if (isset($_GET['interval_value'])) {
        $event->setInterval_value($_GET['interval_value']);
    }

    if (isset($_GET['interval_field'])) {
        $event->setInterval_field($_GET['interval_field']);
    }
    if (isset($_GET['created'])) {
        $event->setCreated($_GET['created']);
    }
    if (isset($_GET['modified'])) {
        $event->setModified($_GET['modified']);
    }
    if (isset($_GET['last_executed'])) {
        $event->setLast_executed($_GET['last_executed']);
    }
    if (isset($_GET['starts'])) {
        $event->setStarts($_GET['starts']);
    }
    if (isset($_GET['ends'])) {
        $event->setEnds($_GET['ends']);
    }
    if (isset($_GET['status'])) {
        $event->setStatus($_GET['status']);
    }
    if (isset($_GET['on_completion'])) {
        $event->setOn_completion($_GET['on_completion']);
    }
    if (isset($_GET['sql_mode'])) {
        $event->setSql_mode($_GET['sql_mode']);
    }
    if (isset($_GET['comment'])) {
        $event->setComment($_GET['comment']);
    }
    if (isset($_GET['originator'])) {
        $event->setOriginator($_GET['originator']);
    }

    if (isset($_GET['time_zone'])) {
        $event->setTime_zone($_GET['time_zone']);
    }
    if (isset($_GET['character_set_client'])) {
        $event->setCharacter_set_client($_GET['character_set_client']);
    }
    if (isset($_GET['collation_connection'])) {
        $event->setCollation_connection($_GET['collation_connection']);
    }
    if (isset($_GET['db_collation'])) {
        $event->setDb_collation($_GET['db_collation']);
    }
    if (isset($_GET['body_utf8'])) {
        $event->setBody_utf8($_GET['body_utf8']);
    }
    $connection = new connection\Connection();
    $eventAdapter = new adapter\EventAdapter($connection);
    $result = $eventAdapter->delete($event);

    
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
 $event = new dao\Event();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['db'])) {
        $event->setDb($post_vars['db']);
    }
    if (isset($post_vars['name'])) {
        $event->setName($post_vars['name']);
    }
    if (isset($post_vars['body'])) {
        $event->setBody($post_vars['body']);
    }
    if (isset($post_vars['definer'])) {
        $event->setDefiner($post_vars['definer']);
    }
    if (isset($post_vars['execute_at'])) {
        $event->setExecute_at($post_vars['execute_at']);
    }
    if (isset($post_vars['interval_value'])) {
        $event->setInterval_value($post_vars['interval_value']);
    }

    if (isset($post_vars['interval_field'])) {
        $event->setInterval_field($post_vars['interval_field']);
    }
    if (isset($post_vars['created'])) {
        $event->setCreated($post_vars['created']);
    }
    if (isset($post_vars['modified'])) {
        $event->setModified($post_vars['modified']);
    }
    if (isset($post_vars['last_executed'])) {
        $event->setLast_executed($post_vars['last_executed']);
    }
    if (isset($post_vars['starts'])) {
        $event->setStarts($post_vars['starts']);
    }
    if (isset($post_vars['ends'])) {
        $event->setEnds($post_vars['ends']);
    }
    if (isset($post_vars['status'])) {
        $event->setStatus($post_vars['status']);
    }
    if (isset($post_vars['on_completion'])) {
        $event->setOn_completion($post_vars['on_completion']);
    }
    if (isset($post_vars['sql_mode'])) {
        $event->setSql_mode($post_vars['sql_mode']);
    }
    if (isset($post_vars['comment'])) {
        $event->setComment($post_vars['comment']);
    }
    if (isset($post_vars['originator'])) {
        $event->setOriginator($post_vars['originator']);
    }

    if (isset($post_vars['time_zone'])) {
        $event->setTime_zone($post_vars['time_zone']);
    }
    if (isset($post_vars['character_set_client'])) {
        $event->setCharacter_set_client($post_vars['character_set_client']);
    }
    if (isset($post_vars['collation_connection'])) {
        $event->setCollation_connection($post_vars['collation_connection']);
    }
    if (isset($post_vars['db_collation'])) {
        $event->setDb_collation($post_vars['db_collation']);
    }
    if (isset($post_vars['body_utf8'])) {
        $event->setBody_utf8($post_vars['body_utf8']);
    }
    $connection = new connection\Connection();
    $eventAdapter = new adapter\EventAdapter($connection);
    $result = $eventAdapter->create($event);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $event = new dao\Event();

    if (isset($_REQUEST['db'])) {
        $event->setDb($_REQUEST['db']);
    }
    if (isset($_REQUEST['name'])) {
        $event->setName($_REQUEST['name']);
    }
    if (isset($_REQUEST['body'])) {
        $event->setBody($_REQUEST['body']);
    }
    if (isset($_REQUEST['definer'])) {
        $event->setDefiner($_REQUEST['definer']);
    }
    if (isset($_REQUEST['execute_at'])) {
        $event->setExecute_at($_REQUEST['execute_at']);
    }
    if (isset($_REQUEST['interval_value'])) {
        $event->setInterval_value($_REQUEST['interval_value']);
    }

    if (isset($_REQUEST['interval_field'])) {
        $event->setInterval_field($_REQUEST['interval_field']);
    }
    if (isset($_REQUEST['created'])) {
        $event->setCreated($_REQUEST['created']);
    }
    if (isset($_REQUEST['modified'])) {
        $event->setModified($_REQUEST['modified']);
    }
    if (isset($_REQUEST['last_executed'])) {
        $event->setLast_executed($_REQUEST['last_executed']);
    }
    if (isset($_REQUEST['starts'])) {
        $event->setStarts($_REQUEST['starts']);
    }
    if (isset($_REQUEST['ends'])) {
        $event->setEnds($_REQUEST['ends']);
    }
    if (isset($_REQUEST['status'])) {
        $event->setStatus($_REQUEST['status']);
    }
    if (isset($_REQUEST['on_completion'])) {
        $event->setOn_completion($_REQUEST['on_completion']);
    }
    if (isset($_REQUEST['sql_mode'])) {
        $event->setSql_mode($_REQUEST['sql_mode']);
    }
    if (isset($_REQUEST['comment'])) {
        $event->setComment($_REQUEST['comment']);
    }
    if (isset($_REQUEST['originator'])) {
        $event->setOriginator($_REQUEST['originator']);
    }

    if (isset($_REQUEST['time_zone'])) {
        $event->setTime_zone($_REQUEST['time_zone']);
    }
    if (isset($_REQUEST['character_set_client'])) {
        $event->setCharacter_set_client($_REQUEST['character_set_client']);
    }
    if (isset($_REQUEST['collation_connection'])) {
        $event->setCollation_connection($_REQUEST['collation_connection']);
    }
    if (isset($_REQUEST['db_collation'])) {
        $event->setDb_collation($_REQUEST['db_collation']);
    }
    if (isset($_REQUEST['body_utf8'])) {
        $event->setBody_utf8($_REQUEST['body_utf8']);
    }
    $connection = new connection\Connection();
    $eventAdapter = new adapter\EventAdapter($connection);
    $result = $eventAdapter->create($event);
        
    return json_encode($result);
       
}

?>