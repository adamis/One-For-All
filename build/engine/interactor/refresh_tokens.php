<?php    
use engine\dao;
use engine\connection;
use engine\model;
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


    if (isset($_REQUEST['token'])) {

		$where = new FilterWhere();       
		$where->setCollum('refresh_tokens.token');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['token'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['created_at'])) {

		$where = new FilterWhere();       
		$where->setCollum('refresh_tokens.created_at');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['created_at'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['expires_at'])) {

		$where = new FilterWhere();       
		$where->setCollum('refresh_tokens.expires_at');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['expires_at'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['revoked'])) {

		$where = new FilterWhere();       
		$where->setCollum('refresh_tokens.revoked');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['revoked'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['username'])) {

		$where = new FilterWhere();       
		$where->setCollum('refresh_tokens.username');
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
    $refresh_tokensDao = new dao\Refresh_tokensDao($connection);
    $result = $refresh_tokensDao->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['token'])) {
       $where = new FilterWhere();       
		$where->setCollum('refresh_tokens.token');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['token'].'%');
		$list[]=$where;
    }
    if (isset($_GET['created_at'])) {
       $where = new FilterWhere();       
		$where->setCollum('refresh_tokens.created_at');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['created_at'].'%');
		$list[]=$where;
    }
    if (isset($_GET['expires_at'])) {
       $where = new FilterWhere();       
		$where->setCollum('refresh_tokens.expires_at');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['expires_at'].'%');
		$list[]=$where;
    }
    if (isset($_GET['revoked'])) {
       $where = new FilterWhere();       
		$where->setCollum('refresh_tokens.revoked');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['revoked'].'%');
		$list[]=$where;
    }
    if (isset($_GET['username'])) {
       $where = new FilterWhere();       
		$where->setCollum('refresh_tokens.username');
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
    $refresh_tokensDao = new dao\Refresh_tokensDao($connection);
    $result = $refresh_tokensDao->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $refresh_tokens = new model\Refresh_tokens();

    if (isset($_GET['token'])) {
        $refresh_tokens->setToken($_GET['token']);
    }
    if (isset($_GET['created_at'])) {
        $refresh_tokens->setCreated_at($_GET['created_at']);
    }
    if (isset($_GET['expires_at'])) {
        $refresh_tokens->setExpires_at($_GET['expires_at']);
    }
    if (isset($_GET['revoked'])) {
        $refresh_tokens->setRevoked($_GET['revoked']);
    }
    if (isset($_GET['username'])) {
        $refresh_tokens->setUsername($_GET['username']);
    }
    $connection = new connection\Connection();
    $refresh_tokensDao = new dao\Refresh_tokensDao($connection);
    $result = $refresh_tokensDao->delete($refresh_tokens);

    
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
 $refresh_tokens = new model\Refresh_tokens();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['token'])) {
        $refresh_tokens->setToken($post_vars['token']);
    }
    if (isset($post_vars['created_at'])) {
        $refresh_tokens->setCreated_at($post_vars['created_at']);
    }
    if (isset($post_vars['expires_at'])) {
        $refresh_tokens->setExpires_at($post_vars['expires_at']);
    }
    if (isset($post_vars['revoked'])) {
        $refresh_tokens->setRevoked($post_vars['revoked']);
    }
    if (isset($post_vars['username'])) {
        $refresh_tokens->setUsername($post_vars['username']);
    }
    $connection = new connection\Connection();
    $refresh_tokensDao = new dao\Refresh_tokensDao($connection);
    $result = $refresh_tokensDao->create($refresh_tokens);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $refresh_tokens = new model\Refresh_tokens();

    if (isset($_REQUEST['token'])) {
        $refresh_tokens->setToken($_REQUEST['token']);
    }
    if (isset($_REQUEST['created_at'])) {
        $refresh_tokens->setCreated_at($_REQUEST['created_at']);
    }
    if (isset($_REQUEST['expires_at'])) {
        $refresh_tokens->setExpires_at($_REQUEST['expires_at']);
    }
    if (isset($_REQUEST['revoked'])) {
        $refresh_tokens->setRevoked($_REQUEST['revoked']);
    }
    if (isset($_REQUEST['username'])) {
        $refresh_tokens->setUsername($_REQUEST['username']);
    }
    $connection = new connection\Connection();
    $refresh_tokensDao = new dao\Refresh_tokensDao($connection);
    $result = $refresh_tokensDao->create($refresh_tokens);
        
    return json_encode($result);
       
}

?>