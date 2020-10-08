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


    if (isset($_REQUEST['host'])) {

		$where = new FilterWhere();       
		$where->setCollum('columns_priv.host');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['host'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['db'])) {

		$where = new FilterWhere();       
		$where->setCollum('columns_priv.db');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['db'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['user'])) {

		$where = new FilterWhere();       
		$where->setCollum('columns_priv.user');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['user'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['table_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('columns_priv.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['table_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['column_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('columns_priv.column_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['column_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['timestamp'])) {

		$where = new FilterWhere();       
		$where->setCollum('columns_priv.timestamp');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['timestamp'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['column_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('columns_priv.column_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['column_priv'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $columns_privAdapter = new adapter\Columns_privAdapter($connection);
    $result = $columns_privAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['host'])) {
       $where = new FilterWhere();       
		$where->setCollum('columns_priv.host');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['host'].'%');
		$list[]=$where;
    }
    if (isset($_GET['db'])) {
       $where = new FilterWhere();       
		$where->setCollum('columns_priv.db');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['db'].'%');
		$list[]=$where;
    }
    if (isset($_GET['user'])) {
       $where = new FilterWhere();       
		$where->setCollum('columns_priv.user');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['user'].'%');
		$list[]=$where;
    }
    if (isset($_GET['table_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('columns_priv.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['table_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['column_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('columns_priv.column_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['column_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['timestamp'])) {
       $where = new FilterWhere();       
		$where->setCollum('columns_priv.timestamp');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['timestamp'].'%');
		$list[]=$where;
    }
    if (isset($_GET['column_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('columns_priv.column_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['column_priv'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $columns_privAdapter = new adapter\Columns_privAdapter($connection);
    $result = $columns_privAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $columns_priv = new dao\Columns_priv();

    if (isset($_GET['host'])) {
        $columns_priv->setHost($_GET['host']);
    }
    if (isset($_GET['db'])) {
        $columns_priv->setDb($_GET['db']);
    }
    if (isset($_GET['user'])) {
        $columns_priv->setUser($_GET['user']);
    }
    if (isset($_GET['table_name'])) {
        $columns_priv->setTable_name($_GET['table_name']);
    }
    if (isset($_GET['column_name'])) {
        $columns_priv->setColumn_name($_GET['column_name']);
    }
    if (isset($_GET['timestamp'])) {
        $columns_priv->setTimestamp($_GET['timestamp']);
    }
    if (isset($_GET['column_priv'])) {
        $columns_priv->setColumn_priv($_GET['column_priv']);
    }
    $connection = new connection\Connection();
    $columns_privAdapter = new adapter\Columns_privAdapter($connection);
    $result = $columns_privAdapter->delete($columns_priv);

    
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
 $columns_priv = new dao\Columns_priv();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['host'])) {
        $columns_priv->setHost($post_vars['host']);
    }
    if (isset($post_vars['db'])) {
        $columns_priv->setDb($post_vars['db']);
    }
    if (isset($post_vars['user'])) {
        $columns_priv->setUser($post_vars['user']);
    }
    if (isset($post_vars['table_name'])) {
        $columns_priv->setTable_name($post_vars['table_name']);
    }
    if (isset($post_vars['column_name'])) {
        $columns_priv->setColumn_name($post_vars['column_name']);
    }
    if (isset($post_vars['timestamp'])) {
        $columns_priv->setTimestamp($post_vars['timestamp']);
    }
    if (isset($post_vars['column_priv'])) {
        $columns_priv->setColumn_priv($post_vars['column_priv']);
    }
    $connection = new connection\Connection();
    $columns_privAdapter = new adapter\Columns_privAdapter($connection);
    $result = $columns_privAdapter->create($columns_priv);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $columns_priv = new dao\Columns_priv();

    if (isset($_REQUEST['host'])) {
        $columns_priv->setHost($_REQUEST['host']);
    }
    if (isset($_REQUEST['db'])) {
        $columns_priv->setDb($_REQUEST['db']);
    }
    if (isset($_REQUEST['user'])) {
        $columns_priv->setUser($_REQUEST['user']);
    }
    if (isset($_REQUEST['table_name'])) {
        $columns_priv->setTable_name($_REQUEST['table_name']);
    }
    if (isset($_REQUEST['column_name'])) {
        $columns_priv->setColumn_name($_REQUEST['column_name']);
    }
    if (isset($_REQUEST['timestamp'])) {
        $columns_priv->setTimestamp($_REQUEST['timestamp']);
    }
    if (isset($_REQUEST['column_priv'])) {
        $columns_priv->setColumn_priv($_REQUEST['column_priv']);
    }
    $connection = new connection\Connection();
    $columns_privAdapter = new adapter\Columns_privAdapter($connection);
    $result = $columns_privAdapter->create($columns_priv);
        
    return json_encode($result);
       
}

?>