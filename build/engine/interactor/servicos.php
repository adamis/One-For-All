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
		$where->setCollum('servicos.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('servicos.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('servicos.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['descricao'])) {

		$where = new FilterWhere();       
		$where->setCollum('servicos.descricao');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['descricao'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['name'])) {

		$where = new FilterWhere();       
		$where->setCollum('servicos.name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['valor'])) {

		$where = new FilterWhere();       
		$where->setCollum('servicos.valor');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['valor'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['fk_condominio_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('servicos.fk_condominio_id');         
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
    $servicosDao = new dao\ServicosDao($connection);
    $result = $servicosDao->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('servicos.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('servicos.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('servicos.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['descricao'])) {
       $where = new FilterWhere();       
		$where->setCollum('servicos.descricao');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['descricao'].'%');
		$list[]=$where;
    }
    if (isset($_GET['name'])) {
       $where = new FilterWhere();       
		$where->setCollum('servicos.name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['valor'])) {
       $where = new FilterWhere();       
		$where->setCollum('servicos.valor');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['valor'].'%');
		$list[]=$where;
    }
    if (isset($_GET['fk_condominio_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('servicos.fk_condominio_id');         
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
    $servicosDao = new dao\ServicosDao($connection);
    $result = $servicosDao->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $servicos = new model\Servicos();

    if (isset($_GET['id'])) {        
        $servicos->setId($_GET['id']);
    }

    if (isset($_GET['date_create'])) {
        $servicos->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $servicos->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['descricao'])) {
        $servicos->setDescricao($_GET['descricao']);
    }
    if (isset($_GET['name'])) {
        $servicos->setName($_GET['name']);
    }
    if (isset($_GET['valor'])) {
        $servicos->setValor($_GET['valor']);
    }
    if (isset($_GET['fk_condominio_id'])) {
        $servicos->setFk_condominio_id($_GET['fk_condominio_id']);
    }

    $connection = new connection\Connection();
    $servicosDao = new dao\ServicosDao($connection);
    $result = $servicosDao->delete($servicos);

    
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
 $servicos = new model\Servicos();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $servicos->setId($post_vars['id']);
    }

    if (isset($post_vars['date_create'])) {
        $servicos->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $servicos->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['descricao'])) {
        $servicos->setDescricao($post_vars['descricao']);
    }
    if (isset($post_vars['name'])) {
        $servicos->setName($post_vars['name']);
    }
    if (isset($post_vars['valor'])) {
        $servicos->setValor($post_vars['valor']);
    }
    if (isset($post_vars['fk_condominio_id'])) {
        $servicos->setFk_condominio_id($post_vars['fk_condominio_id']);
    }

    $connection = new connection\Connection();
    $servicosDao = new dao\ServicosDao($connection);
    $result = $servicosDao->create($servicos);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $servicos = new model\Servicos();

    if (isset($_REQUEST['id'])) {        
        $servicos->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['date_create'])) {
        $servicos->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $servicos->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['descricao'])) {
        $servicos->setDescricao($_REQUEST['descricao']);
    }
    if (isset($_REQUEST['name'])) {
        $servicos->setName($_REQUEST['name']);
    }
    if (isset($_REQUEST['valor'])) {
        $servicos->setValor($_REQUEST['valor']);
    }
    if (isset($_REQUEST['fk_condominio_id'])) {
        $servicos->setFk_condominio_id($_REQUEST['fk_condominio_id']);
    }

    $connection = new connection\Connection();
    $servicosDao = new dao\ServicosDao($connection);
    $result = $servicosDao->create($servicos);
        
    return json_encode($result);
       
}

?>