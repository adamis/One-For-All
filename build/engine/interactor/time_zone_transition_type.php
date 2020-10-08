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
		 $where->setCollum('time_zone_transition_type.time_zone_id');         
		 $where->setValue($_REQUEST['time_zone_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['transition_type_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('time_zone_transition_type.transition_type_id');         
		 $where->setValue($_REQUEST['transition_type_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['offset'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('time_zone_transition_type.offset');         
		 $where->setValue($_REQUEST['offset']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['is_dst'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('time_zone_transition_type.is_dst');         
		 $where->setValue($_REQUEST['is_dst']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['abbreviation'])) {

		$where = new FilterWhere();       
		$where->setCollum('time_zone_transition_type.abbreviation');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['abbreviation'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $time_zone_transition_typeAdapter = new adapter\Time_zone_transition_typeAdapter($connection);
    $result = $time_zone_transition_typeAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		 $where->setCollum('time_zone_transition_type.time_zone_id');         
		 $where->setValue($_GET['time_zone_id']);
		 $list[]=$where;
    }

    if (isset($_GET['transition_type_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('time_zone_transition_type.transition_type_id');         
		 $where->setValue($_GET['transition_type_id']);
		 $list[]=$where;
    }

    if (isset($_GET['offset'])) {
         $where = new FilterWhere();       
		 $where->setCollum('time_zone_transition_type.offset');         
		 $where->setValue($_GET['offset']);
		 $list[]=$where;
    }

    if (isset($_GET['is_dst'])) {
         $where = new FilterWhere();       
		 $where->setCollum('time_zone_transition_type.is_dst');         
		 $where->setValue($_GET['is_dst']);
		 $list[]=$where;
    }

    if (isset($_GET['abbreviation'])) {
       $where = new FilterWhere();       
		$where->setCollum('time_zone_transition_type.abbreviation');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['abbreviation'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $time_zone_transition_typeAdapter = new adapter\Time_zone_transition_typeAdapter($connection);
    $result = $time_zone_transition_typeAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $time_zone_transition_type = new dao\Time_zone_transition_type();

    if (isset($_GET['time_zone_id'])) {
        $time_zone_transition_type->setTime_zone_id($_GET['time_zone_id']);
    }

    if (isset($_GET['transition_type_id'])) {
        $time_zone_transition_type->setTransition_type_id($_GET['transition_type_id']);
    }

    if (isset($_GET['offset'])) {
        $time_zone_transition_type->setOffset($_GET['offset']);
    }

    if (isset($_GET['is_dst'])) {
        $time_zone_transition_type->setIs_DST($_GET['is_dst']);
    }

    if (isset($_GET['abbreviation'])) {
        $time_zone_transition_type->setAbbreviation($_GET['abbreviation']);
    }
    $connection = new connection\Connection();
    $time_zone_transition_typeAdapter = new adapter\Time_zone_transition_typeAdapter($connection);
    $result = $time_zone_transition_typeAdapter->delete($time_zone_transition_type);

    
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
 $time_zone_transition_type = new dao\Time_zone_transition_type();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['time_zone_id'])) {
        $time_zone_transition_type->setTime_zone_id($post_vars['time_zone_id']);
    }

    if (isset($post_vars['transition_type_id'])) {
        $time_zone_transition_type->setTransition_type_id($post_vars['transition_type_id']);
    }

    if (isset($post_vars['offset'])) {
        $time_zone_transition_type->setOffset($post_vars['offset']);
    }

    if (isset($post_vars['is_dst'])) {
        $time_zone_transition_type->setIs_DST($post_vars['is_dst']);
    }

    if (isset($post_vars['abbreviation'])) {
        $time_zone_transition_type->setAbbreviation($post_vars['abbreviation']);
    }
    $connection = new connection\Connection();
    $time_zone_transition_typeAdapter = new adapter\Time_zone_transition_typeAdapter($connection);
    $result = $time_zone_transition_typeAdapter->create($time_zone_transition_type);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $time_zone_transition_type = new dao\Time_zone_transition_type();

    if (isset($_REQUEST['time_zone_id'])) {
        $time_zone_transition_type->setTime_zone_id($_REQUEST['time_zone_id']);
    }

    if (isset($_REQUEST['transition_type_id'])) {
        $time_zone_transition_type->setTransition_type_id($_REQUEST['transition_type_id']);
    }

    if (isset($_REQUEST['offset'])) {
        $time_zone_transition_type->setOffset($_REQUEST['offset']);
    }

    if (isset($_REQUEST['is_dst'])) {
        $time_zone_transition_type->setIs_DST($_REQUEST['is_dst']);
    }

    if (isset($_REQUEST['abbreviation'])) {
        $time_zone_transition_type->setAbbreviation($_REQUEST['abbreviation']);
    }
    $connection = new connection\Connection();
    $time_zone_transition_typeAdapter = new adapter\Time_zone_transition_typeAdapter($connection);
    $result = $time_zone_transition_typeAdapter->create($time_zone_transition_type);
        
    return json_encode($result);
       
}

?>