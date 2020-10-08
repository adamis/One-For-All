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
		$where->setCollum('innodb_table_stats.database_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['database_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['table_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('innodb_table_stats.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['table_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['last_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('innodb_table_stats.last_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['last_update'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['n_rows'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('innodb_table_stats.n_rows');         
		 $where->setValue($_REQUEST['n_rows']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['clustered_index_size'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('innodb_table_stats.clustered_index_size');         
		 $where->setValue($_REQUEST['clustered_index_size']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['sum_of_other_index_sizes'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('innodb_table_stats.sum_of_other_index_sizes');         
		 $where->setValue($_REQUEST['sum_of_other_index_sizes']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $innodb_table_statsAdapter = new adapter\Innodb_table_statsAdapter($connection);
    $result = $innodb_table_statsAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('innodb_table_stats.database_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['database_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['table_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('innodb_table_stats.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['table_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['last_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('innodb_table_stats.last_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['last_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['n_rows'])) {
         $where = new FilterWhere();       
		 $where->setCollum('innodb_table_stats.n_rows');         
		 $where->setValue($_GET['n_rows']);
		 $list[]=$where;
    }

    if (isset($_GET['clustered_index_size'])) {
         $where = new FilterWhere();       
		 $where->setCollum('innodb_table_stats.clustered_index_size');         
		 $where->setValue($_GET['clustered_index_size']);
		 $list[]=$where;
    }

    if (isset($_GET['sum_of_other_index_sizes'])) {
         $where = new FilterWhere();       
		 $where->setCollum('innodb_table_stats.sum_of_other_index_sizes');         
		 $where->setValue($_GET['sum_of_other_index_sizes']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $innodb_table_statsAdapter = new adapter\Innodb_table_statsAdapter($connection);
    $result = $innodb_table_statsAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $innodb_table_stats = new dao\Innodb_table_stats();

    if (isset($_GET['database_name'])) {
        $innodb_table_stats->setDatabase_name($_GET['database_name']);
    }
    if (isset($_GET['table_name'])) {
        $innodb_table_stats->setTable_name($_GET['table_name']);
    }
    if (isset($_GET['last_update'])) {
        $innodb_table_stats->setLast_update($_GET['last_update']);
    }
    if (isset($_GET['n_rows'])) {
        $innodb_table_stats->setN_rows($_GET['n_rows']);
    }

    if (isset($_GET['clustered_index_size'])) {
        $innodb_table_stats->setClustered_index_size($_GET['clustered_index_size']);
    }

    if (isset($_GET['sum_of_other_index_sizes'])) {
        $innodb_table_stats->setSum_of_other_index_sizes($_GET['sum_of_other_index_sizes']);
    }

    $connection = new connection\Connection();
    $innodb_table_statsAdapter = new adapter\Innodb_table_statsAdapter($connection);
    $result = $innodb_table_statsAdapter->delete($innodb_table_stats);

    
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
 $innodb_table_stats = new dao\Innodb_table_stats();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['database_name'])) {
        $innodb_table_stats->setDatabase_name($post_vars['database_name']);
    }
    if (isset($post_vars['table_name'])) {
        $innodb_table_stats->setTable_name($post_vars['table_name']);
    }
    if (isset($post_vars['last_update'])) {
        $innodb_table_stats->setLast_update($post_vars['last_update']);
    }
    if (isset($post_vars['n_rows'])) {
        $innodb_table_stats->setN_rows($post_vars['n_rows']);
    }

    if (isset($post_vars['clustered_index_size'])) {
        $innodb_table_stats->setClustered_index_size($post_vars['clustered_index_size']);
    }

    if (isset($post_vars['sum_of_other_index_sizes'])) {
        $innodb_table_stats->setSum_of_other_index_sizes($post_vars['sum_of_other_index_sizes']);
    }

    $connection = new connection\Connection();
    $innodb_table_statsAdapter = new adapter\Innodb_table_statsAdapter($connection);
    $result = $innodb_table_statsAdapter->create($innodb_table_stats);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $innodb_table_stats = new dao\Innodb_table_stats();

    if (isset($_REQUEST['database_name'])) {
        $innodb_table_stats->setDatabase_name($_REQUEST['database_name']);
    }
    if (isset($_REQUEST['table_name'])) {
        $innodb_table_stats->setTable_name($_REQUEST['table_name']);
    }
    if (isset($_REQUEST['last_update'])) {
        $innodb_table_stats->setLast_update($_REQUEST['last_update']);
    }
    if (isset($_REQUEST['n_rows'])) {
        $innodb_table_stats->setN_rows($_REQUEST['n_rows']);
    }

    if (isset($_REQUEST['clustered_index_size'])) {
        $innodb_table_stats->setClustered_index_size($_REQUEST['clustered_index_size']);
    }

    if (isset($_REQUEST['sum_of_other_index_sizes'])) {
        $innodb_table_stats->setSum_of_other_index_sizes($_REQUEST['sum_of_other_index_sizes']);
    }

    $connection = new connection\Connection();
    $innodb_table_statsAdapter = new adapter\Innodb_table_statsAdapter($connection);
    $result = $innodb_table_statsAdapter->create($innodb_table_stats);
        
    return json_encode($result);
       
}

?>