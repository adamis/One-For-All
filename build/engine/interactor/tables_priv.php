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
		$where->setCollum('tables_priv.host');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['host'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['db'])) {

		$where = new FilterWhere();       
		$where->setCollum('tables_priv.db');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['db'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['user'])) {

		$where = new FilterWhere();       
		$where->setCollum('tables_priv.user');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['user'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['table_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('tables_priv.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['table_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['grantor'])) {

		$where = new FilterWhere();       
		$where->setCollum('tables_priv.grantor');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['grantor'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['timestamp'])) {

		$where = new FilterWhere();       
		$where->setCollum('tables_priv.timestamp');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['timestamp'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['table_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('tables_priv.table_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['table_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['column_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('tables_priv.column_priv');
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
    $tables_privAdapter = new adapter\Tables_privAdapter($connection);
    $result = $tables_privAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('tables_priv.host');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['host'].'%');
		$list[]=$where;
    }
    if (isset($_GET['db'])) {
       $where = new FilterWhere();       
		$where->setCollum('tables_priv.db');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['db'].'%');
		$list[]=$where;
    }
    if (isset($_GET['user'])) {
       $where = new FilterWhere();       
		$where->setCollum('tables_priv.user');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['user'].'%');
		$list[]=$where;
    }
    if (isset($_GET['table_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('tables_priv.table_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['table_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['grantor'])) {
       $where = new FilterWhere();       
		$where->setCollum('tables_priv.grantor');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['grantor'].'%');
		$list[]=$where;
    }
    if (isset($_GET['timestamp'])) {
       $where = new FilterWhere();       
		$where->setCollum('tables_priv.timestamp');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['timestamp'].'%');
		$list[]=$where;
    }
    if (isset($_GET['table_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('tables_priv.table_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['table_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['column_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('tables_priv.column_priv');
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
    $tables_privAdapter = new adapter\Tables_privAdapter($connection);
    $result = $tables_privAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $tables_priv = new dao\Tables_priv();

    if (isset($_GET['host'])) {
        $tables_priv->setHost($_GET['host']);
    }
    if (isset($_GET['db'])) {
        $tables_priv->setDb($_GET['db']);
    }
    if (isset($_GET['user'])) {
        $tables_priv->setUser($_GET['user']);
    }
    if (isset($_GET['table_name'])) {
        $tables_priv->setTable_name($_GET['table_name']);
    }
    if (isset($_GET['grantor'])) {
        $tables_priv->setGrantor($_GET['grantor']);
    }
    if (isset($_GET['timestamp'])) {
        $tables_priv->setTimestamp($_GET['timestamp']);
    }
    if (isset($_GET['table_priv'])) {
        $tables_priv->setTable_priv($_GET['table_priv']);
    }
    if (isset($_GET['column_priv'])) {
        $tables_priv->setColumn_priv($_GET['column_priv']);
    }
    $connection = new connection\Connection();
    $tables_privAdapter = new adapter\Tables_privAdapter($connection);
    $result = $tables_privAdapter->delete($tables_priv);

    
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
 $tables_priv = new dao\Tables_priv();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['host'])) {
        $tables_priv->setHost($post_vars['host']);
    }
    if (isset($post_vars['db'])) {
        $tables_priv->setDb($post_vars['db']);
    }
    if (isset($post_vars['user'])) {
        $tables_priv->setUser($post_vars['user']);
    }
    if (isset($post_vars['table_name'])) {
        $tables_priv->setTable_name($post_vars['table_name']);
    }
    if (isset($post_vars['grantor'])) {
        $tables_priv->setGrantor($post_vars['grantor']);
    }
    if (isset($post_vars['timestamp'])) {
        $tables_priv->setTimestamp($post_vars['timestamp']);
    }
    if (isset($post_vars['table_priv'])) {
        $tables_priv->setTable_priv($post_vars['table_priv']);
    }
    if (isset($post_vars['column_priv'])) {
        $tables_priv->setColumn_priv($post_vars['column_priv']);
    }
    $connection = new connection\Connection();
    $tables_privAdapter = new adapter\Tables_privAdapter($connection);
    $result = $tables_privAdapter->create($tables_priv);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $tables_priv = new dao\Tables_priv();

    if (isset($_REQUEST['host'])) {
        $tables_priv->setHost($_REQUEST['host']);
    }
    if (isset($_REQUEST['db'])) {
        $tables_priv->setDb($_REQUEST['db']);
    }
    if (isset($_REQUEST['user'])) {
        $tables_priv->setUser($_REQUEST['user']);
    }
    if (isset($_REQUEST['table_name'])) {
        $tables_priv->setTable_name($_REQUEST['table_name']);
    }
    if (isset($_REQUEST['grantor'])) {
        $tables_priv->setGrantor($_REQUEST['grantor']);
    }
    if (isset($_REQUEST['timestamp'])) {
        $tables_priv->setTimestamp($_REQUEST['timestamp']);
    }
    if (isset($_REQUEST['table_priv'])) {
        $tables_priv->setTable_priv($_REQUEST['table_priv']);
    }
    if (isset($_REQUEST['column_priv'])) {
        $tables_priv->setColumn_priv($_REQUEST['column_priv']);
    }
    $connection = new connection\Connection();
    $tables_privAdapter = new adapter\Tables_privAdapter($connection);
    $result = $tables_privAdapter->create($tables_priv);
        
    return json_encode($result);
       
}

?>