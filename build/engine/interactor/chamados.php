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
		$where->setCollum('chamados.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('chamados.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('chamados.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['descricao'])) {

		$where = new FilterWhere();       
		$where->setCollum('chamados.descricao');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['descricao'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['diagnostico'])) {

		$where = new FilterWhere();       
		$where->setCollum('chamados.diagnostico');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['diagnostico'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['execucao'])) {

		$where = new FilterWhere();       
		$where->setCollum('chamados.execucao');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['execucao'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['fk_condominio_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('chamados.fk_condominio_id');         
		 $where->setValue($_REQUEST['fk_condominio_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['fk_notas_fiscais_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('chamados.fk_notas_fiscais_id');         
		 $where->setValue($_REQUEST['fk_notas_fiscais_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['fk_status_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('chamados.fk_status_id');         
		 $where->setValue($_REQUEST['fk_status_id']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $chamadosDao = new dao\ChamadosDao($connection);
    $result = $chamadosDao->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('chamados.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('chamados.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('chamados.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['descricao'])) {
       $where = new FilterWhere();       
		$where->setCollum('chamados.descricao');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['descricao'].'%');
		$list[]=$where;
    }
    if (isset($_GET['diagnostico'])) {
       $where = new FilterWhere();       
		$where->setCollum('chamados.diagnostico');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['diagnostico'].'%');
		$list[]=$where;
    }
    if (isset($_GET['execucao'])) {
       $where = new FilterWhere();       
		$where->setCollum('chamados.execucao');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['execucao'].'%');
		$list[]=$where;
    }
    if (isset($_GET['fk_condominio_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('chamados.fk_condominio_id');         
		 $where->setValue($_GET['fk_condominio_id']);
		 $list[]=$where;
    }

    if (isset($_GET['fk_notas_fiscais_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('chamados.fk_notas_fiscais_id');         
		 $where->setValue($_GET['fk_notas_fiscais_id']);
		 $list[]=$where;
    }

    if (isset($_GET['fk_status_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('chamados.fk_status_id');         
		 $where->setValue($_GET['fk_status_id']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $chamadosDao = new dao\ChamadosDao($connection);
    $result = $chamadosDao->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $chamados = new model\Chamados();

    if (isset($_GET['id'])) {        
        $chamados->setId($_GET['id']);
    }

    if (isset($_GET['date_create'])) {
        $chamados->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $chamados->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['descricao'])) {
        $chamados->setDescricao($_GET['descricao']);
    }
    if (isset($_GET['diagnostico'])) {
        $chamados->setDiagnostico($_GET['diagnostico']);
    }
    if (isset($_GET['execucao'])) {
        $chamados->setExecucao($_GET['execucao']);
    }
    if (isset($_GET['fk_condominio_id'])) {
        $chamados->setFk_condominio_id($_GET['fk_condominio_id']);
    }

    if (isset($_GET['fk_notas_fiscais_id'])) {
        $chamados->setFk_notas_fiscais_id($_GET['fk_notas_fiscais_id']);
    }

    if (isset($_GET['fk_status_id'])) {
        $chamados->setFk_status_id($_GET['fk_status_id']);
    }

    $connection = new connection\Connection();
    $chamadosDao = new dao\ChamadosDao($connection);
    $result = $chamadosDao->delete($chamados);

    
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
 $chamados = new model\Chamados();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $chamados->setId($post_vars['id']);
    }

    if (isset($post_vars['date_create'])) {
        $chamados->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $chamados->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['descricao'])) {
        $chamados->setDescricao($post_vars['descricao']);
    }
    if (isset($post_vars['diagnostico'])) {
        $chamados->setDiagnostico($post_vars['diagnostico']);
    }
    if (isset($post_vars['execucao'])) {
        $chamados->setExecucao($post_vars['execucao']);
    }
    if (isset($post_vars['fk_condominio_id'])) {
        $chamados->setFk_condominio_id($post_vars['fk_condominio_id']);
    }

    if (isset($post_vars['fk_notas_fiscais_id'])) {
        $chamados->setFk_notas_fiscais_id($post_vars['fk_notas_fiscais_id']);
    }

    if (isset($post_vars['fk_status_id'])) {
        $chamados->setFk_status_id($post_vars['fk_status_id']);
    }

    $connection = new connection\Connection();
    $chamadosDao = new dao\ChamadosDao($connection);
    $result = $chamadosDao->create($chamados);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $chamados = new model\Chamados();

    if (isset($_REQUEST['id'])) {        
        $chamados->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['date_create'])) {
        $chamados->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $chamados->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['descricao'])) {
        $chamados->setDescricao($_REQUEST['descricao']);
    }
    if (isset($_REQUEST['diagnostico'])) {
        $chamados->setDiagnostico($_REQUEST['diagnostico']);
    }
    if (isset($_REQUEST['execucao'])) {
        $chamados->setExecucao($_REQUEST['execucao']);
    }
    if (isset($_REQUEST['fk_condominio_id'])) {
        $chamados->setFk_condominio_id($_REQUEST['fk_condominio_id']);
    }

    if (isset($_REQUEST['fk_notas_fiscais_id'])) {
        $chamados->setFk_notas_fiscais_id($_REQUEST['fk_notas_fiscais_id']);
    }

    if (isset($_REQUEST['fk_status_id'])) {
        $chamados->setFk_status_id($_REQUEST['fk_status_id']);
    }

    $connection = new connection\Connection();
    $chamadosDao = new dao\ChamadosDao($connection);
    $result = $chamadosDao->create($chamados);
        
    return json_encode($result);
       
}

?>