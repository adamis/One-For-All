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


    if (isset($_REQUEST['database_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('innodb_index_stats.database_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['database_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['table_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('innodb_index_stats.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['table_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['index_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('innodb_index_stats.index_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['index_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['last_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('innodb_index_stats.last_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['last_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['stat_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('innodb_index_stats.stat_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['stat_name'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['stat_value'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('innodb_index_stats.stat_value');         
		 $where->setValue($_REQUEST['stat_value']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['sample_size'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('innodb_index_stats.sample_size');         
		 $where->setValue($_REQUEST['sample_size']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['stat_description'])) {

		$where = new FilterWhere();       
		$where->setCollum('innodb_index_stats.stat_description');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['stat_description'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $innodb_index_statsAdapter = new adapter\Innodb_index_statsAdapter($connection);
    $result = $innodb_index_statsAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['database_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('innodb_index_stats.database_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['database_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['table_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('innodb_index_stats.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['table_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['index_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('innodb_index_stats.index_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['index_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['last_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('innodb_index_stats.last_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['last_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['stat_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('innodb_index_stats.stat_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['stat_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['stat_value'])) {
         $where = new FilterWhere();       
		 $where->setCollum('innodb_index_stats.stat_value');         
		 $where->setValue($_GET['stat_value']);
		 $list[]=$where;
    }

    if (isset($_GET['sample_size'])) {
         $where = new FilterWhere();       
		 $where->setCollum('innodb_index_stats.sample_size');         
		 $where->setValue($_GET['sample_size']);
		 $list[]=$where;
    }

    if (isset($_GET['stat_description'])) {
       $where = new FilterWhere();       
		$where->setCollum('innodb_index_stats.stat_description');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['stat_description'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $innodb_index_statsAdapter = new adapter\Innodb_index_statsAdapter($connection);
    $result = $innodb_index_statsAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $innodb_index_stats = new dao\Innodb_index_stats();

    if (isset($_GET['database_name'])) {
        $innodb_index_stats->setDatabase_name($_GET['database_name']);
    }
    if (isset($_GET['table_name'])) {
        $innodb_index_stats->setTable_name($_GET['table_name']);
    }
    if (isset($_GET['index_name'])) {
        $innodb_index_stats->setIndex_name($_GET['index_name']);
    }
    if (isset($_GET['last_update'])) {
        $innodb_index_stats->setLast_update($_GET['last_update']);
    }
    if (isset($_GET['stat_name'])) {
        $innodb_index_stats->setStat_name($_GET['stat_name']);
    }
    if (isset($_GET['stat_value'])) {
        $innodb_index_stats->setStat_value($_GET['stat_value']);
    }

    if (isset($_GET['sample_size'])) {
        $innodb_index_stats->setSample_size($_GET['sample_size']);
    }

    if (isset($_GET['stat_description'])) {
        $innodb_index_stats->setStat_description($_GET['stat_description']);
    }
    $connection = new connection\Connection();
    $innodb_index_statsAdapter = new adapter\Innodb_index_statsAdapter($connection);
    $result = $innodb_index_statsAdapter->delete($innodb_index_stats);

    
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
 $innodb_index_stats = new dao\Innodb_index_stats();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['database_name'])) {
        $innodb_index_stats->setDatabase_name($post_vars['database_name']);
    }
    if (isset($post_vars['table_name'])) {
        $innodb_index_stats->setTable_name($post_vars['table_name']);
    }
    if (isset($post_vars['index_name'])) {
        $innodb_index_stats->setIndex_name($post_vars['index_name']);
    }
    if (isset($post_vars['last_update'])) {
        $innodb_index_stats->setLast_update($post_vars['last_update']);
    }
    if (isset($post_vars['stat_name'])) {
        $innodb_index_stats->setStat_name($post_vars['stat_name']);
    }
    if (isset($post_vars['stat_value'])) {
        $innodb_index_stats->setStat_value($post_vars['stat_value']);
    }

    if (isset($post_vars['sample_size'])) {
        $innodb_index_stats->setSample_size($post_vars['sample_size']);
    }

    if (isset($post_vars['stat_description'])) {
        $innodb_index_stats->setStat_description($post_vars['stat_description']);
    }
    $connection = new connection\Connection();
    $innodb_index_statsAdapter = new adapter\Innodb_index_statsAdapter($connection);
    $result = $innodb_index_statsAdapter->create($innodb_index_stats);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $innodb_index_stats = new dao\Innodb_index_stats();

    if (isset($_REQUEST['database_name'])) {
        $innodb_index_stats->setDatabase_name($_REQUEST['database_name']);
    }
    if (isset($_REQUEST['table_name'])) {
        $innodb_index_stats->setTable_name($_REQUEST['table_name']);
    }
    if (isset($_REQUEST['index_name'])) {
        $innodb_index_stats->setIndex_name($_REQUEST['index_name']);
    }
    if (isset($_REQUEST['last_update'])) {
        $innodb_index_stats->setLast_update($_REQUEST['last_update']);
    }
    if (isset($_REQUEST['stat_name'])) {
        $innodb_index_stats->setStat_name($_REQUEST['stat_name']);
    }
    if (isset($_REQUEST['stat_value'])) {
        $innodb_index_stats->setStat_value($_REQUEST['stat_value']);
    }

    if (isset($_REQUEST['sample_size'])) {
        $innodb_index_stats->setSample_size($_REQUEST['sample_size']);
    }

    if (isset($_REQUEST['stat_description'])) {
        $innodb_index_stats->setStat_description($_REQUEST['stat_description']);
    }
    $connection = new connection\Connection();
    $innodb_index_statsAdapter = new adapter\Innodb_index_statsAdapter($connection);
    $result = $innodb_index_statsAdapter->create($innodb_index_stats);
        
    return json_encode($result);
       
}

?>