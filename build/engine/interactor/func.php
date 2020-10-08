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


    if (isset($_REQUEST['name'])) {

		$where = new FilterWhere();       
		$where->setCollum('func.name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['name'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['ret'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('func.ret');         
		 $where->setValue($_REQUEST['ret']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['dl'])) {

		$where = new FilterWhere();       
		$where->setCollum('func.dl');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['dl'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['type'])) {

		$where = new FilterWhere();       
		$where->setCollum('func.type');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['type'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $funcAdapter = new adapter\FuncAdapter($connection);
    $result = $funcAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['name'])) {
       $where = new FilterWhere();       
		$where->setCollum('func.name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['ret'])) {
         $where = new FilterWhere();       
		 $where->setCollum('func.ret');         
		 $where->setValue($_GET['ret']);
		 $list[]=$where;
    }

    if (isset($_GET['dl'])) {
       $where = new FilterWhere();       
		$where->setCollum('func.dl');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['dl'].'%');
		$list[]=$where;
    }
    if (isset($_GET['type'])) {
       $where = new FilterWhere();       
		$where->setCollum('func.type');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['type'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $funcAdapter = new adapter\FuncAdapter($connection);
    $result = $funcAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $func = new dao\Func();

    if (isset($_GET['name'])) {
        $func->setName($_GET['name']);
    }
    if (isset($_GET['ret'])) {
        $func->setRet($_GET['ret']);
    }

    if (isset($_GET['dl'])) {
        $func->setDl($_GET['dl']);
    }
    if (isset($_GET['type'])) {
        $func->setType($_GET['type']);
    }
    $connection = new connection\Connection();
    $funcAdapter = new adapter\FuncAdapter($connection);
    $result = $funcAdapter->delete($func);

    
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
 $func = new dao\Func();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['name'])) {
        $func->setName($post_vars['name']);
    }
    if (isset($post_vars['ret'])) {
        $func->setRet($post_vars['ret']);
    }

    if (isset($post_vars['dl'])) {
        $func->setDl($post_vars['dl']);
    }
    if (isset($post_vars['type'])) {
        $func->setType($post_vars['type']);
    }
    $connection = new connection\Connection();
    $funcAdapter = new adapter\FuncAdapter($connection);
    $result = $funcAdapter->create($func);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $func = new dao\Func();

    if (isset($_REQUEST['name'])) {
        $func->setName($_REQUEST['name']);
    }
    if (isset($_REQUEST['ret'])) {
        $func->setRet($_REQUEST['ret']);
    }

    if (isset($_REQUEST['dl'])) {
        $func->setDl($_REQUEST['dl']);
    }
    if (isset($_REQUEST['type'])) {
        $func->setType($_REQUEST['type']);
    }
    $connection = new connection\Connection();
    $funcAdapter = new adapter\FuncAdapter($connection);
    $result = $funcAdapter->create($func);
        
    return json_encode($result);
       
}

?>