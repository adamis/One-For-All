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

 
    if(isset($_REQUEST['transition_time'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('time_zone_leap_second.transition_time');         
		 $where->setValue($_REQUEST['transition_time']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['correction'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('time_zone_leap_second.correction');         
		 $where->setValue($_REQUEST['correction']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $time_zone_leap_secondAdapter = new adapter\Time_zone_leap_secondAdapter($connection);
    $result = $time_zone_leap_secondAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['transition_time'])) {
         $where = new FilterWhere();       
		 $where->setCollum('time_zone_leap_second.transition_time');         
		 $where->setValue($_GET['transition_time']);
		 $list[]=$where;
    }

    if (isset($_GET['correction'])) {
         $where = new FilterWhere();       
		 $where->setCollum('time_zone_leap_second.correction');         
		 $where->setValue($_GET['correction']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $time_zone_leap_secondAdapter = new adapter\Time_zone_leap_secondAdapter($connection);
    $result = $time_zone_leap_secondAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $time_zone_leap_second = new dao\Time_zone_leap_second();

    if (isset($_GET['transition_time'])) {
        $time_zone_leap_second->setTransition_time($_GET['transition_time']);
    }

    if (isset($_GET['correction'])) {
        $time_zone_leap_second->setCorrection($_GET['correction']);
    }

    $connection = new connection\Connection();
    $time_zone_leap_secondAdapter = new adapter\Time_zone_leap_secondAdapter($connection);
    $result = $time_zone_leap_secondAdapter->delete($time_zone_leap_second);

    
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
 $time_zone_leap_second = new dao\Time_zone_leap_second();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['transition_time'])) {
        $time_zone_leap_second->setTransition_time($post_vars['transition_time']);
    }

    if (isset($post_vars['correction'])) {
        $time_zone_leap_second->setCorrection($post_vars['correction']);
    }

    $connection = new connection\Connection();
    $time_zone_leap_secondAdapter = new adapter\Time_zone_leap_secondAdapter($connection);
    $result = $time_zone_leap_secondAdapter->create($time_zone_leap_second);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $time_zone_leap_second = new dao\Time_zone_leap_second();

    if (isset($_REQUEST['transition_time'])) {
        $time_zone_leap_second->setTransition_time($_REQUEST['transition_time']);
    }

    if (isset($_REQUEST['correction'])) {
        $time_zone_leap_second->setCorrection($_REQUEST['correction']);
    }

    $connection = new connection\Connection();
    $time_zone_leap_secondAdapter = new adapter\Time_zone_leap_secondAdapter($connection);
    $result = $time_zone_leap_secondAdapter->create($time_zone_leap_second);
        
    return json_encode($result);
       
}

?>