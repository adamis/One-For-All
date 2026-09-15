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
		$where->setCollum('ad_servidores.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_servidores.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_servidores.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['hostname'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_servidores.hostname');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['hostname'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['last_seen'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_servidores.last_seen');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['last_seen'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['nome'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_servidores.nome');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['nome'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['status'])) {

		$where = new FilterWhere();       
		$where->setCollum('ad_servidores.status');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['status'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['fk_condominio_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('ad_servidores.fk_condominio_id');         
		 $where->setValue($_REQUEST['fk_condominio_id']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $ad_servidoresAdapter = new adapter\Ad_servidoresAdapter($connection);
    $result = $ad_servidoresAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('ad_servidores.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_servidores.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_servidores.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['hostname'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_servidores.hostname');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['hostname'].'%');
		$list[]=$where;
    }
    if (isset($_GET['last_seen'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_servidores.last_seen');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['last_seen'].'%');
		$list[]=$where;
    }
    if (isset($_GET['nome'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_servidores.nome');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['nome'].'%');
		$list[]=$where;
    }
    if (isset($_GET['status'])) {
       $where = new FilterWhere();       
		$where->setCollum('ad_servidores.status');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['status'].'%');
		$list[]=$where;
    }
    if (isset($_GET['fk_condominio_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('ad_servidores.fk_condominio_id');         
		 $where->setValue($_GET['fk_condominio_id']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $ad_servidoresAdapter = new adapter\Ad_servidoresAdapter($connection);
    $result = $ad_servidoresAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Delete
 */
function remove()
{
    $ad_servidores = new dao\Ad_servidores();

    if (isset($_GET['id'])) {        
        $ad_servidores->setId($_GET['id']);
    }

    if (isset($_GET['date_create'])) {
        $ad_servidores->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $ad_servidores->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['hostname'])) {
        $ad_servidores->setHostname($_GET['hostname']);
    }
    if (isset($_GET['last_seen'])) {
        $ad_servidores->setLast_seen($_GET['last_seen']);
    }
    if (isset($_GET['nome'])) {
        $ad_servidores->setNome($_GET['nome']);
    }
    if (isset($_GET['status'])) {
        $ad_servidores->setStatus($_GET['status']);
    }
    if (isset($_GET['fk_condominio_id'])) {
        $ad_servidores->setFk_condominio_id($_GET['fk_condominio_id']);
    }

    $connection = new connection\Connection();
    $ad_servidoresAdapter = new adapter\Ad_servidoresAdapter($connection);
    $result = $ad_servidoresAdapter->delete($ad_servidores);

    
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
 $ad_servidores = new dao\Ad_servidores();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $ad_servidores->setId($post_vars['id']);
    }

    if (isset($post_vars['date_create'])) {
        $ad_servidores->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $ad_servidores->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['hostname'])) {
        $ad_servidores->setHostname($post_vars['hostname']);
    }
    if (isset($post_vars['last_seen'])) {
        $ad_servidores->setLast_seen($post_vars['last_seen']);
    }
    if (isset($post_vars['nome'])) {
        $ad_servidores->setNome($post_vars['nome']);
    }
    if (isset($post_vars['status'])) {
        $ad_servidores->setStatus($post_vars['status']);
    }
    if (isset($post_vars['fk_condominio_id'])) {
        $ad_servidores->setFk_condominio_id($post_vars['fk_condominio_id']);
    }

    $connection = new connection\Connection();
    $ad_servidoresAdapter = new adapter\Ad_servidoresAdapter($connection);
    $result = $ad_servidoresAdapter->create($ad_servidores);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Insert
 */
function create()
{
    $ad_servidores = new dao\Ad_servidores();

    if (isset($_REQUEST['id'])) {        
        $ad_servidores->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['date_create'])) {
        $ad_servidores->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $ad_servidores->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['hostname'])) {
        $ad_servidores->setHostname($_REQUEST['hostname']);
    }
    if (isset($_REQUEST['last_seen'])) {
        $ad_servidores->setLast_seen($_REQUEST['last_seen']);
    }
    if (isset($_REQUEST['nome'])) {
        $ad_servidores->setNome($_REQUEST['nome']);
    }
    if (isset($_REQUEST['status'])) {
        $ad_servidores->setStatus($_REQUEST['status']);
    }
    if (isset($_REQUEST['fk_condominio_id'])) {
        $ad_servidores->setFk_condominio_id($_REQUEST['fk_condominio_id']);
    }

    $connection = new connection\Connection();
    $ad_servidoresAdapter = new adapter\Ad_servidoresAdapter($connection);
    $result = $ad_servidoresAdapter->create($ad_servidores);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);
       
}

?>