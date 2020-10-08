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
		$where->setCollum('table_stats.db_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['db_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['table_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('table_stats.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['table_name'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['cardinality'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('table_stats.cardinality');         
		 $where->setValue($_REQUEST['cardinality']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $table_statsAdapter = new adapter\Table_statsAdapter($connection);
    $result = $table_statsAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('table_stats.db_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['db_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['table_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('table_stats.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['table_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['cardinality'])) {
         $where = new FilterWhere();       
		 $where->setCollum('table_stats.cardinality');         
		 $where->setValue($_GET['cardinality']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $table_statsAdapter = new adapter\Table_statsAdapter($connection);
    $result = $table_statsAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $table_stats = new dao\Table_stats();

    if (isset($_GET['db_name'])) {
        $table_stats->setDb_name($_GET['db_name']);
    }
    if (isset($_GET['table_name'])) {
        $table_stats->setTable_name($_GET['table_name']);
    }
    if (isset($_GET['cardinality'])) {
        $table_stats->setCardinality($_GET['cardinality']);
    }

    $connection = new connection\Connection();
    $table_statsAdapter = new adapter\Table_statsAdapter($connection);
    $result = $table_statsAdapter->delete($table_stats);

    
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
 $table_stats = new dao\Table_stats();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['db_name'])) {
        $table_stats->setDb_name($post_vars['db_name']);
    }
    if (isset($post_vars['table_name'])) {
        $table_stats->setTable_name($post_vars['table_name']);
    }
    if (isset($post_vars['cardinality'])) {
        $table_stats->setCardinality($post_vars['cardinality']);
    }

    $connection = new connection\Connection();
    $table_statsAdapter = new adapter\Table_statsAdapter($connection);
    $result = $table_statsAdapter->create($table_stats);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $table_stats = new dao\Table_stats();

    if (isset($_REQUEST['db_name'])) {
        $table_stats->setDb_name($_REQUEST['db_name']);
    }
    if (isset($_REQUEST['table_name'])) {
        $table_stats->setTable_name($_REQUEST['table_name']);
    }
    if (isset($_REQUEST['cardinality'])) {
        $table_stats->setCardinality($_REQUEST['cardinality']);
    }

    $connection = new connection\Connection();
    $table_statsAdapter = new adapter\Table_statsAdapter($connection);
    $result = $table_statsAdapter->create($table_stats);
        
    return json_encode($result);
       
}

?>