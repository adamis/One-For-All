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
		$where->setCollum('global_priv.host');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['host'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['user'])) {

		$where = new FilterWhere();       
		$where->setCollum('global_priv.user');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['user'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('global_priv.priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['priv'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $global_privAdapter = new adapter\Global_privAdapter($connection);
    $result = $global_privAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('global_priv.host');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['host'].'%');
		$list[]=$where;
    }
    if (isset($_GET['user'])) {
       $where = new FilterWhere();       
		$where->setCollum('global_priv.user');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['user'].'%');
		$list[]=$where;
    }
    if (isset($_GET['priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('global_priv.priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['priv'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $global_privAdapter = new adapter\Global_privAdapter($connection);
    $result = $global_privAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $global_priv = new dao\Global_priv();

    if (isset($_GET['host'])) {
        $global_priv->setHost($_GET['host']);
    }
    if (isset($_GET['user'])) {
        $global_priv->setUser($_GET['user']);
    }
    if (isset($_GET['priv'])) {
        $global_priv->setPriv($_GET['priv']);
    }
    $connection = new connection\Connection();
    $global_privAdapter = new adapter\Global_privAdapter($connection);
    $result = $global_privAdapter->delete($global_priv);

    
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
 $global_priv = new dao\Global_priv();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['host'])) {
        $global_priv->setHost($post_vars['host']);
    }
    if (isset($post_vars['user'])) {
        $global_priv->setUser($post_vars['user']);
    }
    if (isset($post_vars['priv'])) {
        $global_priv->setPriv($post_vars['priv']);
    }
    $connection = new connection\Connection();
    $global_privAdapter = new adapter\Global_privAdapter($connection);
    $result = $global_privAdapter->create($global_priv);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $global_priv = new dao\Global_priv();

    if (isset($_REQUEST['host'])) {
        $global_priv->setHost($_REQUEST['host']);
    }
    if (isset($_REQUEST['user'])) {
        $global_priv->setUser($_REQUEST['user']);
    }
    if (isset($_REQUEST['priv'])) {
        $global_priv->setPriv($_REQUEST['priv']);
    }
    $connection = new connection\Connection();
    $global_privAdapter = new adapter\Global_privAdapter($connection);
    $result = $global_privAdapter->create($global_priv);
        
    return json_encode($result);
       
}

?>