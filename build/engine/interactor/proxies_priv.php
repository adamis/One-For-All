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
		$where->setCollum('proxies_priv.host');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['host'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['user'])) {

		$where = new FilterWhere();       
		$where->setCollum('proxies_priv.user');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['user'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['proxied_host'])) {

		$where = new FilterWhere();       
		$where->setCollum('proxies_priv.proxied_host');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['proxied_host'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['proxied_user'])) {

		$where = new FilterWhere();       
		$where->setCollum('proxies_priv.proxied_user');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['proxied_user'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['with_grant'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('proxies_priv.with_grant');         
		 $where->setValue($_REQUEST['with_grant']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['grantor'])) {

		$where = new FilterWhere();       
		$where->setCollum('proxies_priv.grantor');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['grantor'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['timestamp'])) {

		$where = new FilterWhere();       
		$where->setCollum('proxies_priv.timestamp');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['timestamp'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $proxies_privAdapter = new adapter\Proxies_privAdapter($connection);
    $result = $proxies_privAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('proxies_priv.host');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['host'].'%');
		$list[]=$where;
    }
    if (isset($_GET['user'])) {
       $where = new FilterWhere();       
		$where->setCollum('proxies_priv.user');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['user'].'%');
		$list[]=$where;
    }
    if (isset($_GET['proxied_host'])) {
       $where = new FilterWhere();       
		$where->setCollum('proxies_priv.proxied_host');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['proxied_host'].'%');
		$list[]=$where;
    }
    if (isset($_GET['proxied_user'])) {
       $where = new FilterWhere();       
		$where->setCollum('proxies_priv.proxied_user');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['proxied_user'].'%');
		$list[]=$where;
    }
    if (isset($_GET['with_grant'])) {
         $where = new FilterWhere();       
		 $where->setCollum('proxies_priv.with_grant');         
		 $where->setValue($_GET['with_grant']);
		 $list[]=$where;
    }

    if (isset($_GET['grantor'])) {
       $where = new FilterWhere();       
		$where->setCollum('proxies_priv.grantor');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['grantor'].'%');
		$list[]=$where;
    }
    if (isset($_GET['timestamp'])) {
       $where = new FilterWhere();       
		$where->setCollum('proxies_priv.timestamp');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['timestamp'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $proxies_privAdapter = new adapter\Proxies_privAdapter($connection);
    $result = $proxies_privAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $proxies_priv = new dao\Proxies_priv();

    if (isset($_GET['host'])) {
        $proxies_priv->setHost($_GET['host']);
    }
    if (isset($_GET['user'])) {
        $proxies_priv->setUser($_GET['user']);
    }
    if (isset($_GET['proxied_host'])) {
        $proxies_priv->setProxied_host($_GET['proxied_host']);
    }
    if (isset($_GET['proxied_user'])) {
        $proxies_priv->setProxied_user($_GET['proxied_user']);
    }
    if (isset($_GET['with_grant'])) {
        $proxies_priv->setWith_grant($_GET['with_grant']);
    }

    if (isset($_GET['grantor'])) {
        $proxies_priv->setGrantor($_GET['grantor']);
    }
    if (isset($_GET['timestamp'])) {
        $proxies_priv->setTimestamp($_GET['timestamp']);
    }
    $connection = new connection\Connection();
    $proxies_privAdapter = new adapter\Proxies_privAdapter($connection);
    $result = $proxies_privAdapter->delete($proxies_priv);

    
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
 $proxies_priv = new dao\Proxies_priv();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['host'])) {
        $proxies_priv->setHost($post_vars['host']);
    }
    if (isset($post_vars['user'])) {
        $proxies_priv->setUser($post_vars['user']);
    }
    if (isset($post_vars['proxied_host'])) {
        $proxies_priv->setProxied_host($post_vars['proxied_host']);
    }
    if (isset($post_vars['proxied_user'])) {
        $proxies_priv->setProxied_user($post_vars['proxied_user']);
    }
    if (isset($post_vars['with_grant'])) {
        $proxies_priv->setWith_grant($post_vars['with_grant']);
    }

    if (isset($post_vars['grantor'])) {
        $proxies_priv->setGrantor($post_vars['grantor']);
    }
    if (isset($post_vars['timestamp'])) {
        $proxies_priv->setTimestamp($post_vars['timestamp']);
    }
    $connection = new connection\Connection();
    $proxies_privAdapter = new adapter\Proxies_privAdapter($connection);
    $result = $proxies_privAdapter->create($proxies_priv);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $proxies_priv = new dao\Proxies_priv();

    if (isset($_REQUEST['host'])) {
        $proxies_priv->setHost($_REQUEST['host']);
    }
    if (isset($_REQUEST['user'])) {
        $proxies_priv->setUser($_REQUEST['user']);
    }
    if (isset($_REQUEST['proxied_host'])) {
        $proxies_priv->setProxied_host($_REQUEST['proxied_host']);
    }
    if (isset($_REQUEST['proxied_user'])) {
        $proxies_priv->setProxied_user($_REQUEST['proxied_user']);
    }
    if (isset($_REQUEST['with_grant'])) {
        $proxies_priv->setWith_grant($_REQUEST['with_grant']);
    }

    if (isset($_REQUEST['grantor'])) {
        $proxies_priv->setGrantor($_REQUEST['grantor']);
    }
    if (isset($_REQUEST['timestamp'])) {
        $proxies_priv->setTimestamp($_REQUEST['timestamp']);
    }
    $connection = new connection\Connection();
    $proxies_privAdapter = new adapter\Proxies_privAdapter($connection);
    $result = $proxies_privAdapter->create($proxies_priv);
        
    return json_encode($result);
       
}

?>