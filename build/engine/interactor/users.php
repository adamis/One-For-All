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


    if (isset($_REQUEST['id'])) {
		$where = new FilterWhere();
		$where->setCollum('users.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['enabled'])) {

		$where = new FilterWhere();       
		$where->setCollum('users.enabled');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['enabled'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['password'])) {

		$where = new FilterWhere();       
		$where->setCollum('users.password');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['password'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['roles'])) {

		$where = new FilterWhere();       
		$where->setCollum('users.roles');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['roles'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['username'])) {

		$where = new FilterWhere();       
		$where->setCollum('users.username');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['username'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $usersAdapter = new adapter\UsersAdapter($connection);
    $result = $usersAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

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


    if (isset($_GET['id'])) {        
		$where = new FilterWhere();
		$where->setCollum('users.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['enabled'])) {
       $where = new FilterWhere();       
		$where->setCollum('users.enabled');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['enabled'].'%');
		$list[]=$where;
    }
    if (isset($_GET['password'])) {
       $where = new FilterWhere();       
		$where->setCollum('users.password');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['password'].'%');
		$list[]=$where;
    }
    if (isset($_GET['roles'])) {
       $where = new FilterWhere();       
		$where->setCollum('users.roles');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['roles'].'%');
		$list[]=$where;
    }
    if (isset($_GET['username'])) {
       $where = new FilterWhere();       
		$where->setCollum('users.username');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['username'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $usersAdapter = new adapter\UsersAdapter($connection);
    $result = $usersAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Delete
 */
function remove()
{
    $users = new dao\Users();

    if (isset($_GET['id'])) {        
        $users->setId($_GET['id']);
    }

    if (isset($_GET['enabled'])) {
        $users->setEnabled($_GET['enabled']);
    }
    if (isset($_GET['password'])) {
        $users->setPassword($_GET['password']);
    }
    if (isset($_GET['roles'])) {
        $users->setRoles($_GET['roles']);
    }
    if (isset($_GET['username'])) {
        $users->setUsername($_GET['username']);
    }
    $connection = new connection\Connection();
    $usersAdapter = new adapter\UsersAdapter($connection);
    $result = $usersAdapter->delete($users);

    
	$response = new ResponseDelete();
	$response->setSize($result);
	if($result > 0){
		$response->setStatus(true);
	}else{
		$response->setStatus(false);
	}	

    return json_encode($response, JSON_UNESCAPED_UNICODE);

}

/**
 * Put
 */
function update()
{
 $users = new dao\Users();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $users->setId($post_vars['id']);
    }

    if (isset($post_vars['enabled'])) {
        $users->setEnabled($post_vars['enabled']);
    }
    if (isset($post_vars['password'])) {
        $users->setPassword($post_vars['password']);
    }
    if (isset($post_vars['roles'])) {
        $users->setRoles($post_vars['roles']);
    }
    if (isset($post_vars['username'])) {
        $users->setUsername($post_vars['username']);
    }
    $connection = new connection\Connection();
    $usersAdapter = new adapter\UsersAdapter($connection);
    $result = $usersAdapter->create($users);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Insert
 */
function create()
{
    $users = new dao\Users();

    if (isset($_REQUEST['id'])) {        
        $users->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['enabled'])) {
        $users->setEnabled($_REQUEST['enabled']);
    }
    if (isset($_REQUEST['password'])) {
        $users->setPassword($_REQUEST['password']);
    }
    if (isset($_REQUEST['roles'])) {
        $users->setRoles($_REQUEST['roles']);
    }
    if (isset($_REQUEST['username'])) {
        $users->setUsername($_REQUEST['username']);
    }
    $connection = new connection\Connection();
    $usersAdapter = new adapter\UsersAdapter($connection);
    $result = $usersAdapter->create($users);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);
       
}

?>