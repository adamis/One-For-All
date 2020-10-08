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


    if (isset($_REQUEST['name'])) {

		$where = new FilterWhere();       
		$where->setCollum('time_zone_name.name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['name'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['time_zone_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('time_zone_name.time_zone_id');         
		 $where->setValue($_REQUEST['time_zone_id']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $time_zone_nameAdapter = new adapter\Time_zone_nameAdapter($connection);
    $result = $time_zone_nameAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['name'])) {
       $where = new FilterWhere();       
		$where->setCollum('time_zone_name.name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['time_zone_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('time_zone_name.time_zone_id');         
		 $where->setValue($_GET['time_zone_id']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $time_zone_nameAdapter = new adapter\Time_zone_nameAdapter($connection);
    $result = $time_zone_nameAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $time_zone_name = new dao\Time_zone_name();

    if (isset($_GET['name'])) {
        $time_zone_name->setName($_GET['name']);
    }
    if (isset($_GET['time_zone_id'])) {
        $time_zone_name->setTime_zone_id($_GET['time_zone_id']);
    }

    $connection = new connection\Connection();
    $time_zone_nameAdapter = new adapter\Time_zone_nameAdapter($connection);
    $result = $time_zone_nameAdapter->delete($time_zone_name);

    
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
 $time_zone_name = new dao\Time_zone_name();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['name'])) {
        $time_zone_name->setName($post_vars['name']);
    }
    if (isset($post_vars['time_zone_id'])) {
        $time_zone_name->setTime_zone_id($post_vars['time_zone_id']);
    }

    $connection = new connection\Connection();
    $time_zone_nameAdapter = new adapter\Time_zone_nameAdapter($connection);
    $result = $time_zone_nameAdapter->create($time_zone_name);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $time_zone_name = new dao\Time_zone_name();

    if (isset($_REQUEST['name'])) {
        $time_zone_name->setName($_REQUEST['name']);
    }
    if (isset($_REQUEST['time_zone_id'])) {
        $time_zone_name->setTime_zone_id($_REQUEST['time_zone_id']);
    }

    $connection = new connection\Connection();
    $time_zone_nameAdapter = new adapter\Time_zone_nameAdapter($connection);
    $result = $time_zone_nameAdapter->create($time_zone_name);
        
    return json_encode($result);
       
}

?>