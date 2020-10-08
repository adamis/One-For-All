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
		$where->setCollum('column_stats.db_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['db_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['table_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('column_stats.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['table_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['column_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('column_stats.column_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['column_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['min_value'])) {

		$where = new FilterWhere();       
		$where->setCollum('column_stats.min_value');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['min_value'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['max_value'])) {

		$where = new FilterWhere();       
		$where->setCollum('column_stats.max_value');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['max_value'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['nulls_ratio'])) {

		$where = new FilterWhere();       
		$where->setCollum('column_stats.nulls_ratio');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['nulls_ratio'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['avg_length'])) {

		$where = new FilterWhere();       
		$where->setCollum('column_stats.avg_length');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['avg_length'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['avg_frequency'])) {

		$where = new FilterWhere();       
		$where->setCollum('column_stats.avg_frequency');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['avg_frequency'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['hist_size'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('column_stats.hist_size');         
		 $where->setValue($_REQUEST['hist_size']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['hist_type'])) {

		$where = new FilterWhere();       
		$where->setCollum('column_stats.hist_type');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['hist_type'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['histogram'])) {

		$where = new FilterWhere();       
		$where->setCollum('column_stats.histogram');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['histogram'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $column_statsAdapter = new adapter\Column_statsAdapter($connection);
    $result = $column_statsAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('column_stats.db_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['db_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['table_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('column_stats.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['table_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['column_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('column_stats.column_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['column_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['min_value'])) {
       $where = new FilterWhere();       
		$where->setCollum('column_stats.min_value');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['min_value'].'%');
		$list[]=$where;
    }
    if (isset($_GET['max_value'])) {
       $where = new FilterWhere();       
		$where->setCollum('column_stats.max_value');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['max_value'].'%');
		$list[]=$where;
    }
    if (isset($_GET['nulls_ratio'])) {
       $where = new FilterWhere();       
		$where->setCollum('column_stats.nulls_ratio');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['nulls_ratio'].'%');
		$list[]=$where;
    }
    if (isset($_GET['avg_length'])) {
       $where = new FilterWhere();       
		$where->setCollum('column_stats.avg_length');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['avg_length'].'%');
		$list[]=$where;
    }
    if (isset($_GET['avg_frequency'])) {
       $where = new FilterWhere();       
		$where->setCollum('column_stats.avg_frequency');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['avg_frequency'].'%');
		$list[]=$where;
    }
    if (isset($_GET['hist_size'])) {
         $where = new FilterWhere();       
		 $where->setCollum('column_stats.hist_size');         
		 $where->setValue($_GET['hist_size']);
		 $list[]=$where;
    }

    if (isset($_GET['hist_type'])) {
       $where = new FilterWhere();       
		$where->setCollum('column_stats.hist_type');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['hist_type'].'%');
		$list[]=$where;
    }
    if (isset($_GET['histogram'])) {
       $where = new FilterWhere();       
		$where->setCollum('column_stats.histogram');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['histogram'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $column_statsAdapter = new adapter\Column_statsAdapter($connection);
    $result = $column_statsAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $column_stats = new dao\Column_stats();

    if (isset($_GET['db_name'])) {
        $column_stats->setDb_name($_GET['db_name']);
    }
    if (isset($_GET['table_name'])) {
        $column_stats->setTable_name($_GET['table_name']);
    }
    if (isset($_GET['column_name'])) {
        $column_stats->setColumn_name($_GET['column_name']);
    }
    if (isset($_GET['min_value'])) {
        $column_stats->setMin_value($_GET['min_value']);
    }
    if (isset($_GET['max_value'])) {
        $column_stats->setMax_value($_GET['max_value']);
    }
    if (isset($_GET['nulls_ratio'])) {
        $column_stats->setNulls_ratio($_GET['nulls_ratio']);
    }
    if (isset($_GET['avg_length'])) {
        $column_stats->setAvg_length($_GET['avg_length']);
    }
    if (isset($_GET['avg_frequency'])) {
        $column_stats->setAvg_frequency($_GET['avg_frequency']);
    }
    if (isset($_GET['hist_size'])) {
        $column_stats->setHist_size($_GET['hist_size']);
    }

    if (isset($_GET['hist_type'])) {
        $column_stats->setHist_type($_GET['hist_type']);
    }
    if (isset($_GET['histogram'])) {
        $column_stats->setHistogram($_GET['histogram']);
    }
    $connection = new connection\Connection();
    $column_statsAdapter = new adapter\Column_statsAdapter($connection);
    $result = $column_statsAdapter->delete($column_stats);

    
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
 $column_stats = new dao\Column_stats();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['db_name'])) {
        $column_stats->setDb_name($post_vars['db_name']);
    }
    if (isset($post_vars['table_name'])) {
        $column_stats->setTable_name($post_vars['table_name']);
    }
    if (isset($post_vars['column_name'])) {
        $column_stats->setColumn_name($post_vars['column_name']);
    }
    if (isset($post_vars['min_value'])) {
        $column_stats->setMin_value($post_vars['min_value']);
    }
    if (isset($post_vars['max_value'])) {
        $column_stats->setMax_value($post_vars['max_value']);
    }
    if (isset($post_vars['nulls_ratio'])) {
        $column_stats->setNulls_ratio($post_vars['nulls_ratio']);
    }
    if (isset($post_vars['avg_length'])) {
        $column_stats->setAvg_length($post_vars['avg_length']);
    }
    if (isset($post_vars['avg_frequency'])) {
        $column_stats->setAvg_frequency($post_vars['avg_frequency']);
    }
    if (isset($post_vars['hist_size'])) {
        $column_stats->setHist_size($post_vars['hist_size']);
    }

    if (isset($post_vars['hist_type'])) {
        $column_stats->setHist_type($post_vars['hist_type']);
    }
    if (isset($post_vars['histogram'])) {
        $column_stats->setHistogram($post_vars['histogram']);
    }
    $connection = new connection\Connection();
    $column_statsAdapter = new adapter\Column_statsAdapter($connection);
    $result = $column_statsAdapter->create($column_stats);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $column_stats = new dao\Column_stats();

    if (isset($_REQUEST['db_name'])) {
        $column_stats->setDb_name($_REQUEST['db_name']);
    }
    if (isset($_REQUEST['table_name'])) {
        $column_stats->setTable_name($_REQUEST['table_name']);
    }
    if (isset($_REQUEST['column_name'])) {
        $column_stats->setColumn_name($_REQUEST['column_name']);
    }
    if (isset($_REQUEST['min_value'])) {
        $column_stats->setMin_value($_REQUEST['min_value']);
    }
    if (isset($_REQUEST['max_value'])) {
        $column_stats->setMax_value($_REQUEST['max_value']);
    }
    if (isset($_REQUEST['nulls_ratio'])) {
        $column_stats->setNulls_ratio($_REQUEST['nulls_ratio']);
    }
    if (isset($_REQUEST['avg_length'])) {
        $column_stats->setAvg_length($_REQUEST['avg_length']);
    }
    if (isset($_REQUEST['avg_frequency'])) {
        $column_stats->setAvg_frequency($_REQUEST['avg_frequency']);
    }
    if (isset($_REQUEST['hist_size'])) {
        $column_stats->setHist_size($_REQUEST['hist_size']);
    }

    if (isset($_REQUEST['hist_type'])) {
        $column_stats->setHist_type($_REQUEST['hist_type']);
    }
    if (isset($_REQUEST['histogram'])) {
        $column_stats->setHistogram($_REQUEST['histogram']);
    }
    $connection = new connection\Connection();
    $column_statsAdapter = new adapter\Column_statsAdapter($connection);
    $result = $column_statsAdapter->create($column_stats);
        
    return json_encode($result);
       
}

?>