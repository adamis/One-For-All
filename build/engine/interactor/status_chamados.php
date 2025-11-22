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
		$where->setCollum('status_chamados.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('status_chamados.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('status_chamados.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['descricao'])) {

		$where = new FilterWhere();       
		$where->setCollum('status_chamados.descricao');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['descricao'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $status_chamadosDao = new dao\Status_chamadosDao($connection);
    $result = $status_chamadosDao->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('status_chamados.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('status_chamados.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('status_chamados.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['descricao'])) {
       $where = new FilterWhere();       
		$where->setCollum('status_chamados.descricao');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['descricao'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $status_chamadosDao = new dao\Status_chamadosDao($connection);
    $result = $status_chamadosDao->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $status_chamados = new model\Status_chamados();

    if (isset($_GET['id'])) {        
        $status_chamados->setId($_GET['id']);
    }

    if (isset($_GET['date_create'])) {
        $status_chamados->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $status_chamados->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['descricao'])) {
        $status_chamados->setDescricao($_GET['descricao']);
    }
    $connection = new connection\Connection();
    $status_chamadosDao = new dao\Status_chamadosDao($connection);
    $result = $status_chamadosDao->delete($status_chamados);

    
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
 $status_chamados = new model\Status_chamados();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $status_chamados->setId($post_vars['id']);
    }

    if (isset($post_vars['date_create'])) {
        $status_chamados->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $status_chamados->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['descricao'])) {
        $status_chamados->setDescricao($post_vars['descricao']);
    }
    $connection = new connection\Connection();
    $status_chamadosDao = new dao\Status_chamadosDao($connection);
    $result = $status_chamadosDao->create($status_chamados);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $status_chamados = new model\Status_chamados();

    if (isset($_REQUEST['id'])) {        
        $status_chamados->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['date_create'])) {
        $status_chamados->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $status_chamados->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['descricao'])) {
        $status_chamados->setDescricao($_REQUEST['descricao']);
    }
    $connection = new connection\Connection();
    $status_chamadosDao = new dao\Status_chamadosDao($connection);
    $result = $status_chamadosDao->create($status_chamados);
        
    return json_encode($result);
       
}

?>