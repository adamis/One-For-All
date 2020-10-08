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
		 $where->setCollum('time_zone.time_zone_id');         
		 $where->setValue($_REQUEST['time_zone_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['use_leap_seconds'])) {

		$where = new FilterWhere();       
		$where->setCollum('time_zone.use_leap_seconds');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['use_leap_seconds'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $time_zoneAdapter = new adapter\Time_zoneAdapter($connection);
    $result = $time_zoneAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		 $where->setCollum('time_zone.time_zone_id');         
		 $where->setValue($_GET['time_zone_id']);
		 $list[]=$where;
    }

    if (isset($_GET['use_leap_seconds'])) {
       $where = new FilterWhere();       
		$where->setCollum('time_zone.use_leap_seconds');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['use_leap_seconds'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $time_zoneAdapter = new adapter\Time_zoneAdapter($connection);
    $result = $time_zoneAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $time_zone = new dao\Time_zone();

    if (isset($_GET['time_zone_id'])) {
        $time_zone->setTime_zone_id($_GET['time_zone_id']);
    }

    if (isset($_GET['use_leap_seconds'])) {
        $time_zone->setUse_leap_seconds($_GET['use_leap_seconds']);
    }
    $connection = new connection\Connection();
    $time_zoneAdapter = new adapter\Time_zoneAdapter($connection);
    $result = $time_zoneAdapter->delete($time_zone);

    
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
 $time_zone = new dao\Time_zone();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['time_zone_id'])) {
        $time_zone->setTime_zone_id($post_vars['time_zone_id']);
    }

    if (isset($post_vars['use_leap_seconds'])) {
        $time_zone->setUse_leap_seconds($post_vars['use_leap_seconds']);
    }
    $connection = new connection\Connection();
    $time_zoneAdapter = new adapter\Time_zoneAdapter($connection);
    $result = $time_zoneAdapter->create($time_zone);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $time_zone = new dao\Time_zone();

    if (isset($_REQUEST['time_zone_id'])) {
        $time_zone->setTime_zone_id($_REQUEST['time_zone_id']);
    }

    if (isset($_REQUEST['use_leap_seconds'])) {
        $time_zone->setUse_leap_seconds($_REQUEST['use_leap_seconds']);
    }
    $connection = new connection\Connection();
    $time_zoneAdapter = new adapter\Time_zoneAdapter($connection);
    $result = $time_zoneAdapter->create($time_zone);
        
    return json_encode($result);
       
}

?>