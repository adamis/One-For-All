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
		$where->setCollum('procs_priv.host');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['host'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['db'])) {

		$where = new FilterWhere();       
		$where->setCollum('procs_priv.db');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['db'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['user'])) {

		$where = new FilterWhere();       
		$where->setCollum('procs_priv.user');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['user'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['routine_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('procs_priv.routine_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['routine_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['routine_type'])) {

		$where = new FilterWhere();       
		$where->setCollum('procs_priv.routine_type');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['routine_type'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['grantor'])) {

		$where = new FilterWhere();       
		$where->setCollum('procs_priv.grantor');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['grantor'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['proc_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('procs_priv.proc_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['proc_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['timestamp'])) {

		$where = new FilterWhere();       
		$where->setCollum('procs_priv.timestamp');
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
    $procs_privAdapter = new adapter\Procs_privAdapter($connection);
    $result = $procs_privAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('procs_priv.host');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['host'].'%');
		$list[]=$where;
    }
    if (isset($_GET['db'])) {
       $where = new FilterWhere();       
		$where->setCollum('procs_priv.db');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['db'].'%');
		$list[]=$where;
    }
    if (isset($_GET['user'])) {
       $where = new FilterWhere();       
		$where->setCollum('procs_priv.user');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['user'].'%');
		$list[]=$where;
    }
    if (isset($_GET['routine_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('procs_priv.routine_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['routine_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['routine_type'])) {
       $where = new FilterWhere();       
		$where->setCollum('procs_priv.routine_type');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['routine_type'].'%');
		$list[]=$where;
    }
    if (isset($_GET['grantor'])) {
       $where = new FilterWhere();       
		$where->setCollum('procs_priv.grantor');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['grantor'].'%');
		$list[]=$where;
    }
    if (isset($_GET['proc_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('procs_priv.proc_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['proc_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['timestamp'])) {
       $where = new FilterWhere();       
		$where->setCollum('procs_priv.timestamp');
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
    $procs_privAdapter = new adapter\Procs_privAdapter($connection);
    $result = $procs_privAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $procs_priv = new dao\Procs_priv();

    if (isset($_GET['host'])) {
        $procs_priv->setHost($_GET['host']);
    }
    if (isset($_GET['db'])) {
        $procs_priv->setDb($_GET['db']);
    }
    if (isset($_GET['user'])) {
        $procs_priv->setUser($_GET['user']);
    }
    if (isset($_GET['routine_name'])) {
        $procs_priv->setRoutine_name($_GET['routine_name']);
    }
    if (isset($_GET['routine_type'])) {
        $procs_priv->setRoutine_type($_GET['routine_type']);
    }
    if (isset($_GET['grantor'])) {
        $procs_priv->setGrantor($_GET['grantor']);
    }
    if (isset($_GET['proc_priv'])) {
        $procs_priv->setProc_priv($_GET['proc_priv']);
    }
    if (isset($_GET['timestamp'])) {
        $procs_priv->setTimestamp($_GET['timestamp']);
    }
    $connection = new connection\Connection();
    $procs_privAdapter = new adapter\Procs_privAdapter($connection);
    $result = $procs_privAdapter->delete($procs_priv);

    
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
 $procs_priv = new dao\Procs_priv();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['host'])) {
        $procs_priv->setHost($post_vars['host']);
    }
    if (isset($post_vars['db'])) {
        $procs_priv->setDb($post_vars['db']);
    }
    if (isset($post_vars['user'])) {
        $procs_priv->setUser($post_vars['user']);
    }
    if (isset($post_vars['routine_name'])) {
        $procs_priv->setRoutine_name($post_vars['routine_name']);
    }
    if (isset($post_vars['routine_type'])) {
        $procs_priv->setRoutine_type($post_vars['routine_type']);
    }
    if (isset($post_vars['grantor'])) {
        $procs_priv->setGrantor($post_vars['grantor']);
    }
    if (isset($post_vars['proc_priv'])) {
        $procs_priv->setProc_priv($post_vars['proc_priv']);
    }
    if (isset($post_vars['timestamp'])) {
        $procs_priv->setTimestamp($post_vars['timestamp']);
    }
    $connection = new connection\Connection();
    $procs_privAdapter = new adapter\Procs_privAdapter($connection);
    $result = $procs_privAdapter->create($procs_priv);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $procs_priv = new dao\Procs_priv();

    if (isset($_REQUEST['host'])) {
        $procs_priv->setHost($_REQUEST['host']);
    }
    if (isset($_REQUEST['db'])) {
        $procs_priv->setDb($_REQUEST['db']);
    }
    if (isset($_REQUEST['user'])) {
        $procs_priv->setUser($_REQUEST['user']);
    }
    if (isset($_REQUEST['routine_name'])) {
        $procs_priv->setRoutine_name($_REQUEST['routine_name']);
    }
    if (isset($_REQUEST['routine_type'])) {
        $procs_priv->setRoutine_type($_REQUEST['routine_type']);
    }
    if (isset($_REQUEST['grantor'])) {
        $procs_priv->setGrantor($_REQUEST['grantor']);
    }
    if (isset($_REQUEST['proc_priv'])) {
        $procs_priv->setProc_priv($_REQUEST['proc_priv']);
    }
    if (isset($_REQUEST['timestamp'])) {
        $procs_priv->setTimestamp($_REQUEST['timestamp']);
    }
    $connection = new connection\Connection();
    $procs_privAdapter = new adapter\Procs_privAdapter($connection);
    $result = $procs_privAdapter->create($procs_priv);
        
    return json_encode($result);
       
}

?>