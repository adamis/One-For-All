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

 
    if(isset($_REQUEST['transaction_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('transaction_registry.transaction_id');         
		 $where->setValue($_REQUEST['transaction_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['commit_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('transaction_registry.commit_id');         
		 $where->setValue($_REQUEST['commit_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['begin_timestamp'])) {

		$where = new FilterWhere();       
		$where->setCollum('transaction_registry.begin_timestamp');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['begin_timestamp'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['commit_timestamp'])) {

		$where = new FilterWhere();       
		$where->setCollum('transaction_registry.commit_timestamp');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['commit_timestamp'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['isolation_level'])) {

		$where = new FilterWhere();       
		$where->setCollum('transaction_registry.isolation_level');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['isolation_level'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $transaction_registryAdapter = new adapter\Transaction_registryAdapter($connection);
    $result = $transaction_registryAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['transaction_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('transaction_registry.transaction_id');         
		 $where->setValue($_GET['transaction_id']);
		 $list[]=$where;
    }

    if (isset($_GET['commit_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('transaction_registry.commit_id');         
		 $where->setValue($_GET['commit_id']);
		 $list[]=$where;
    }

    if (isset($_GET['begin_timestamp'])) {
       $where = new FilterWhere();       
		$where->setCollum('transaction_registry.begin_timestamp');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['begin_timestamp'].'%');
		$list[]=$where;
    }
    if (isset($_GET['commit_timestamp'])) {
       $where = new FilterWhere();       
		$where->setCollum('transaction_registry.commit_timestamp');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['commit_timestamp'].'%');
		$list[]=$where;
    }
    if (isset($_GET['isolation_level'])) {
       $where = new FilterWhere();       
		$where->setCollum('transaction_registry.isolation_level');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['isolation_level'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $transaction_registryAdapter = new adapter\Transaction_registryAdapter($connection);
    $result = $transaction_registryAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $transaction_registry = new dao\Transaction_registry();

    if (isset($_GET['transaction_id'])) {
        $transaction_registry->setTransaction_id($_GET['transaction_id']);
    }

    if (isset($_GET['commit_id'])) {
        $transaction_registry->setCommit_id($_GET['commit_id']);
    }

    if (isset($_GET['begin_timestamp'])) {
        $transaction_registry->setBegin_timestamp($_GET['begin_timestamp']);
    }
    if (isset($_GET['commit_timestamp'])) {
        $transaction_registry->setCommit_timestamp($_GET['commit_timestamp']);
    }
    if (isset($_GET['isolation_level'])) {
        $transaction_registry->setIsolation_level($_GET['isolation_level']);
    }
    $connection = new connection\Connection();
    $transaction_registryAdapter = new adapter\Transaction_registryAdapter($connection);
    $result = $transaction_registryAdapter->delete($transaction_registry);

    
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
 $transaction_registry = new dao\Transaction_registry();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['transaction_id'])) {
        $transaction_registry->setTransaction_id($post_vars['transaction_id']);
    }

    if (isset($post_vars['commit_id'])) {
        $transaction_registry->setCommit_id($post_vars['commit_id']);
    }

    if (isset($post_vars['begin_timestamp'])) {
        $transaction_registry->setBegin_timestamp($post_vars['begin_timestamp']);
    }
    if (isset($post_vars['commit_timestamp'])) {
        $transaction_registry->setCommit_timestamp($post_vars['commit_timestamp']);
    }
    if (isset($post_vars['isolation_level'])) {
        $transaction_registry->setIsolation_level($post_vars['isolation_level']);
    }
    $connection = new connection\Connection();
    $transaction_registryAdapter = new adapter\Transaction_registryAdapter($connection);
    $result = $transaction_registryAdapter->create($transaction_registry);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $transaction_registry = new dao\Transaction_registry();

    if (isset($_REQUEST['transaction_id'])) {
        $transaction_registry->setTransaction_id($_REQUEST['transaction_id']);
    }

    if (isset($_REQUEST['commit_id'])) {
        $transaction_registry->setCommit_id($_REQUEST['commit_id']);
    }

    if (isset($_REQUEST['begin_timestamp'])) {
        $transaction_registry->setBegin_timestamp($_REQUEST['begin_timestamp']);
    }
    if (isset($_REQUEST['commit_timestamp'])) {
        $transaction_registry->setCommit_timestamp($_REQUEST['commit_timestamp']);
    }
    if (isset($_REQUEST['isolation_level'])) {
        $transaction_registry->setIsolation_level($_REQUEST['isolation_level']);
    }
    $connection = new connection\Connection();
    $transaction_registryAdapter = new adapter\Transaction_registryAdapter($connection);
    $result = $transaction_registryAdapter->create($transaction_registry);
        
    return json_encode($result);
       
}

?>