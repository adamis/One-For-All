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
		$where->setCollum('perfis.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('perfis.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('perfis.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['name'])) {

		$where = new FilterWhere();       
		$where->setCollum('perfis.name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['name'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $perfisAdapter = new adapter\PerfisAdapter($connection);
    $result = $perfisAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('perfis.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('perfis.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('perfis.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['name'])) {
       $where = new FilterWhere();       
		$where->setCollum('perfis.name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['name'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $perfisAdapter = new adapter\PerfisAdapter($connection);
    $result = $perfisAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Delete
 */
function remove()
{
    $perfis = new dao\Perfis();

    if (isset($_GET['id'])) {        
        $perfis->setId($_GET['id']);
    }

    if (isset($_GET['date_create'])) {
        $perfis->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $perfis->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['name'])) {
        $perfis->setName($_GET['name']);
    }
    $connection = new connection\Connection();
    $perfisAdapter = new adapter\PerfisAdapter($connection);
    $result = $perfisAdapter->delete($perfis);

    
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
 $perfis = new dao\Perfis();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $perfis->setId($post_vars['id']);
    }

    if (isset($post_vars['date_create'])) {
        $perfis->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $perfis->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['name'])) {
        $perfis->setName($post_vars['name']);
    }
    $connection = new connection\Connection();
    $perfisAdapter = new adapter\PerfisAdapter($connection);
    $result = $perfisAdapter->create($perfis);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Insert
 */
function create()
{
    $perfis = new dao\Perfis();

    if (isset($_REQUEST['id'])) {        
        $perfis->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['date_create'])) {
        $perfis->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $perfis->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['name'])) {
        $perfis->setName($_REQUEST['name']);
    }
    $connection = new connection\Connection();
    $perfisAdapter = new adapter\PerfisAdapter($connection);
    $result = $perfisAdapter->create($perfis);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);
       
}

?>