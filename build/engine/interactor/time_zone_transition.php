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

 
    if(isset($_REQUEST['time_zone_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('time_zone_transition.time_zone_id');         
		 $where->setValue($_REQUEST['time_zone_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['transition_time'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('time_zone_transition.transition_time');         
		 $where->setValue($_REQUEST['transition_time']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['transition_type_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('time_zone_transition.transition_type_id');         
		 $where->setValue($_REQUEST['transition_type_id']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $time_zone_transitionAdapter = new adapter\Time_zone_transitionAdapter($connection);
    $result = $time_zone_transitionAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['time_zone_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('time_zone_transition.time_zone_id');         
		 $where->setValue($_GET['time_zone_id']);
		 $list[]=$where;
    }

    if (isset($_GET['transition_time'])) {
         $where = new FilterWhere();       
		 $where->setCollum('time_zone_transition.transition_time');         
		 $where->setValue($_GET['transition_time']);
		 $list[]=$where;
    }

    if (isset($_GET['transition_type_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('time_zone_transition.transition_type_id');         
		 $where->setValue($_GET['transition_type_id']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $time_zone_transitionAdapter = new adapter\Time_zone_transitionAdapter($connection);
    $result = $time_zone_transitionAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $time_zone_transition = new dao\Time_zone_transition();

    if (isset($_GET['time_zone_id'])) {
        $time_zone_transition->setTime_zone_id($_GET['time_zone_id']);
    }

    if (isset($_GET['transition_time'])) {
        $time_zone_transition->setTransition_time($_GET['transition_time']);
    }

    if (isset($_GET['transition_type_id'])) {
        $time_zone_transition->setTransition_type_id($_GET['transition_type_id']);
    }

    $connection = new connection\Connection();
    $time_zone_transitionAdapter = new adapter\Time_zone_transitionAdapter($connection);
    $result = $time_zone_transitionAdapter->delete($time_zone_transition);

    
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
 $time_zone_transition = new dao\Time_zone_transition();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['time_zone_id'])) {
        $time_zone_transition->setTime_zone_id($post_vars['time_zone_id']);
    }

    if (isset($post_vars['transition_time'])) {
        $time_zone_transition->setTransition_time($post_vars['transition_time']);
    }

    if (isset($post_vars['transition_type_id'])) {
        $time_zone_transition->setTransition_type_id($post_vars['transition_type_id']);
    }

    $connection = new connection\Connection();
    $time_zone_transitionAdapter = new adapter\Time_zone_transitionAdapter($connection);
    $result = $time_zone_transitionAdapter->create($time_zone_transition);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $time_zone_transition = new dao\Time_zone_transition();

    if (isset($_REQUEST['time_zone_id'])) {
        $time_zone_transition->setTime_zone_id($_REQUEST['time_zone_id']);
    }

    if (isset($_REQUEST['transition_time'])) {
        $time_zone_transition->setTransition_time($_REQUEST['transition_time']);
    }

    if (isset($_REQUEST['transition_type_id'])) {
        $time_zone_transition->setTransition_type_id($_REQUEST['transition_type_id']);
    }

    $connection = new connection\Connection();
    $time_zone_transitionAdapter = new adapter\Time_zone_transitionAdapter($connection);
    $result = $time_zone_transitionAdapter->create($time_zone_transition);
        
    return json_encode($result);
       
}

?>