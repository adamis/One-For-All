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


    if (isset($_REQUEST['db_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('index_stats.db_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['db_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['table_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('index_stats.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['table_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['index_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('index_stats.index_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['index_name'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['prefix_arity'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('index_stats.prefix_arity');         
		 $where->setValue($_REQUEST['prefix_arity']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['avg_frequency'])) {

		$where = new FilterWhere();       
		$where->setCollum('index_stats.avg_frequency');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['avg_frequency'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $index_statsAdapter = new adapter\Index_statsAdapter($connection);
    $result = $index_statsAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['db_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('index_stats.db_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['db_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['table_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('index_stats.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['table_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['index_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('index_stats.index_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['index_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['prefix_arity'])) {
         $where = new FilterWhere();       
		 $where->setCollum('index_stats.prefix_arity');         
		 $where->setValue($_GET['prefix_arity']);
		 $list[]=$where;
    }

    if (isset($_GET['avg_frequency'])) {
       $where = new FilterWhere();       
		$where->setCollum('index_stats.avg_frequency');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['avg_frequency'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $index_statsAdapter = new adapter\Index_statsAdapter($connection);
    $result = $index_statsAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $index_stats = new dao\Index_stats();

    if (isset($_GET['db_name'])) {
        $index_stats->setDb_name($_GET['db_name']);
    }
    if (isset($_GET['table_name'])) {
        $index_stats->setTable_name($_GET['table_name']);
    }
    if (isset($_GET['index_name'])) {
        $index_stats->setIndex_name($_GET['index_name']);
    }
    if (isset($_GET['prefix_arity'])) {
        $index_stats->setPrefix_arity($_GET['prefix_arity']);
    }

    if (isset($_GET['avg_frequency'])) {
        $index_stats->setAvg_frequency($_GET['avg_frequency']);
    }
    $connection = new connection\Connection();
    $index_statsAdapter = new adapter\Index_statsAdapter($connection);
    $result = $index_statsAdapter->delete($index_stats);

    
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
 $index_stats = new dao\Index_stats();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['db_name'])) {
        $index_stats->setDb_name($post_vars['db_name']);
    }
    if (isset($post_vars['table_name'])) {
        $index_stats->setTable_name($post_vars['table_name']);
    }
    if (isset($post_vars['index_name'])) {
        $index_stats->setIndex_name($post_vars['index_name']);
    }
    if (isset($post_vars['prefix_arity'])) {
        $index_stats->setPrefix_arity($post_vars['prefix_arity']);
    }

    if (isset($post_vars['avg_frequency'])) {
        $index_stats->setAvg_frequency($post_vars['avg_frequency']);
    }
    $connection = new connection\Connection();
    $index_statsAdapter = new adapter\Index_statsAdapter($connection);
    $result = $index_statsAdapter->create($index_stats);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $index_stats = new dao\Index_stats();

    if (isset($_REQUEST['db_name'])) {
        $index_stats->setDb_name($_REQUEST['db_name']);
    }
    if (isset($_REQUEST['table_name'])) {
        $index_stats->setTable_name($_REQUEST['table_name']);
    }
    if (isset($_REQUEST['index_name'])) {
        $index_stats->setIndex_name($_REQUEST['index_name']);
    }
    if (isset($_REQUEST['prefix_arity'])) {
        $index_stats->setPrefix_arity($_REQUEST['prefix_arity']);
    }

    if (isset($_REQUEST['avg_frequency'])) {
        $index_stats->setAvg_frequency($_REQUEST['avg_frequency']);
    }
    $connection = new connection\Connection();
    $index_statsAdapter = new adapter\Index_statsAdapter($connection);
    $result = $index_statsAdapter->create($index_stats);
        
    return json_encode($result);
       
}

?>