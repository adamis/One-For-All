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


    if (isset($_REQUEST['id'])) {
		$where = new FilterWhere();
		$where->setCollum('configs.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['chave'])) {

		$where = new FilterWhere();       
		$where->setCollum('configs.chave');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['chave'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('configs.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('configs.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['valor'])) {

		$where = new FilterWhere();       
		$where->setCollum('configs.valor');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['valor'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $configsDao = new dao\ConfigsDao($connection);
    $result = $configsDao->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['id'])) {        
		$where = new FilterWhere();
		$where->setCollum('configs.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['chave'])) {
       $where = new FilterWhere();       
		$where->setCollum('configs.chave');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['chave'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('configs.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('configs.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['valor'])) {
       $where = new FilterWhere();       
		$where->setCollum('configs.valor');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['valor'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $configsDao = new dao\ConfigsDao($connection);
    $result = $configsDao->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $configs = new model\Configs();

    if (isset($_GET['id'])) {        
        $configs->setId($_GET['id']);
    }

    if (isset($_GET['chave'])) {
        $configs->setChave($_GET['chave']);
    }
    if (isset($_GET['date_create'])) {
        $configs->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $configs->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['valor'])) {
        $configs->setValor($_GET['valor']);
    }
    $connection = new connection\Connection();
    $configsDao = new dao\ConfigsDao($connection);
    $result = $configsDao->delete($configs);

    
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
 $configs = new model\Configs();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $configs->setId($post_vars['id']);
    }

    if (isset($post_vars['chave'])) {
        $configs->setChave($post_vars['chave']);
    }
    if (isset($post_vars['date_create'])) {
        $configs->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $configs->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['valor'])) {
        $configs->setValor($post_vars['valor']);
    }
    $connection = new connection\Connection();
    $configsDao = new dao\ConfigsDao($connection);
    $result = $configsDao->create($configs);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $configs = new model\Configs();

    if (isset($_REQUEST['id'])) {        
        $configs->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['chave'])) {
        $configs->setChave($_REQUEST['chave']);
    }
    if (isset($_REQUEST['date_create'])) {
        $configs->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $configs->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['valor'])) {
        $configs->setValor($_REQUEST['valor']);
    }
    $connection = new connection\Connection();
    $configsDao = new dao\ConfigsDao($connection);
    $result = $configsDao->create($configs);
        
    return json_encode($result);
       
}

?>