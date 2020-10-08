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
		$where->setCollum('roles_mapping.host');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['host'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['user'])) {

		$where = new FilterWhere();       
		$where->setCollum('roles_mapping.user');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['user'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['role'])) {

		$where = new FilterWhere();       
		$where->setCollum('roles_mapping.role');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['role'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['admin_option'])) {

		$where = new FilterWhere();       
		$where->setCollum('roles_mapping.admin_option');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['admin_option'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $roles_mappingAdapter = new adapter\Roles_mappingAdapter($connection);
    $result = $roles_mappingAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('roles_mapping.host');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['host'].'%');
		$list[]=$where;
    }
    if (isset($_GET['user'])) {
       $where = new FilterWhere();       
		$where->setCollum('roles_mapping.user');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['user'].'%');
		$list[]=$where;
    }
    if (isset($_GET['role'])) {
       $where = new FilterWhere();       
		$where->setCollum('roles_mapping.role');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['role'].'%');
		$list[]=$where;
    }
    if (isset($_GET['admin_option'])) {
       $where = new FilterWhere();       
		$where->setCollum('roles_mapping.admin_option');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['admin_option'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $roles_mappingAdapter = new adapter\Roles_mappingAdapter($connection);
    $result = $roles_mappingAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $roles_mapping = new dao\Roles_mapping();

    if (isset($_GET['host'])) {
        $roles_mapping->setHost($_GET['host']);
    }
    if (isset($_GET['user'])) {
        $roles_mapping->setUser($_GET['user']);
    }
    if (isset($_GET['role'])) {
        $roles_mapping->setRole($_GET['role']);
    }
    if (isset($_GET['admin_option'])) {
        $roles_mapping->setAdmin_option($_GET['admin_option']);
    }
    $connection = new connection\Connection();
    $roles_mappingAdapter = new adapter\Roles_mappingAdapter($connection);
    $result = $roles_mappingAdapter->delete($roles_mapping);

    
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
 $roles_mapping = new dao\Roles_mapping();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['host'])) {
        $roles_mapping->setHost($post_vars['host']);
    }
    if (isset($post_vars['user'])) {
        $roles_mapping->setUser($post_vars['user']);
    }
    if (isset($post_vars['role'])) {
        $roles_mapping->setRole($post_vars['role']);
    }
    if (isset($post_vars['admin_option'])) {
        $roles_mapping->setAdmin_option($post_vars['admin_option']);
    }
    $connection = new connection\Connection();
    $roles_mappingAdapter = new adapter\Roles_mappingAdapter($connection);
    $result = $roles_mappingAdapter->create($roles_mapping);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $roles_mapping = new dao\Roles_mapping();

    if (isset($_REQUEST['host'])) {
        $roles_mapping->setHost($_REQUEST['host']);
    }
    if (isset($_REQUEST['user'])) {
        $roles_mapping->setUser($_REQUEST['user']);
    }
    if (isset($_REQUEST['role'])) {
        $roles_mapping->setRole($_REQUEST['role']);
    }
    if (isset($_REQUEST['admin_option'])) {
        $roles_mapping->setAdmin_option($_REQUEST['admin_option']);
    }
    $connection = new connection\Connection();
    $roles_mappingAdapter = new adapter\Roles_mappingAdapter($connection);
    $result = $roles_mappingAdapter->create($roles_mapping);
        
    return json_encode($result);
       
}

?>