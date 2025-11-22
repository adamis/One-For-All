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
		$where->setCollum('chamados_servicos.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('chamados_servicos.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('chamados_servicos.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['fk_chamados_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('chamados_servicos.fk_chamados_id');         
		 $where->setValue($_REQUEST['fk_chamados_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['fk_servicos_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('chamados_servicos.fk_servicos_id');         
		 $where->setValue($_REQUEST['fk_servicos_id']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $chamados_servicosDao = new dao\Chamados_servicosDao($connection);
    $result = $chamados_servicosDao->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('chamados_servicos.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('chamados_servicos.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('chamados_servicos.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['fk_chamados_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('chamados_servicos.fk_chamados_id');         
		 $where->setValue($_GET['fk_chamados_id']);
		 $list[]=$where;
    }

    if (isset($_GET['fk_servicos_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('chamados_servicos.fk_servicos_id');         
		 $where->setValue($_GET['fk_servicos_id']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $chamados_servicosDao = new dao\Chamados_servicosDao($connection);
    $result = $chamados_servicosDao->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $chamados_servicos = new model\Chamados_servicos();

    if (isset($_GET['id'])) {        
        $chamados_servicos->setId($_GET['id']);
    }

    if (isset($_GET['date_create'])) {
        $chamados_servicos->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $chamados_servicos->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['fk_chamados_id'])) {
        $chamados_servicos->setFk_chamados_id($_GET['fk_chamados_id']);
    }

    if (isset($_GET['fk_servicos_id'])) {
        $chamados_servicos->setFk_servicos_id($_GET['fk_servicos_id']);
    }

    $connection = new connection\Connection();
    $chamados_servicosDao = new dao\Chamados_servicosDao($connection);
    $result = $chamados_servicosDao->delete($chamados_servicos);

    
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
 $chamados_servicos = new model\Chamados_servicos();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $chamados_servicos->setId($post_vars['id']);
    }

    if (isset($post_vars['date_create'])) {
        $chamados_servicos->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $chamados_servicos->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['fk_chamados_id'])) {
        $chamados_servicos->setFk_chamados_id($post_vars['fk_chamados_id']);
    }

    if (isset($post_vars['fk_servicos_id'])) {
        $chamados_servicos->setFk_servicos_id($post_vars['fk_servicos_id']);
    }

    $connection = new connection\Connection();
    $chamados_servicosDao = new dao\Chamados_servicosDao($connection);
    $result = $chamados_servicosDao->create($chamados_servicos);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $chamados_servicos = new model\Chamados_servicos();

    if (isset($_REQUEST['id'])) {        
        $chamados_servicos->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['date_create'])) {
        $chamados_servicos->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $chamados_servicos->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['fk_chamados_id'])) {
        $chamados_servicos->setFk_chamados_id($_REQUEST['fk_chamados_id']);
    }

    if (isset($_REQUEST['fk_servicos_id'])) {
        $chamados_servicos->setFk_servicos_id($_REQUEST['fk_servicos_id']);
    }

    $connection = new connection\Connection();
    $chamados_servicosDao = new dao\Chamados_servicosDao($connection);
    $result = $chamados_servicosDao->create($chamados_servicos);
        
    return json_encode($result);
       
}

?>