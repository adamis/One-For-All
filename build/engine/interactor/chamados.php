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

    if (isset($_REQUEST['anexos'])) {

		$where = new FilterWhere();       
		$where->setCollum('chamados.anexos');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['anexos'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['como_reproduzir'])) {

		$where = new FilterWhere();       
		$where->setCollum('chamados.como_reproduzir');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['como_reproduzir'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['prioridade'])) {

		$where = new FilterWhere();       
		$where->setCollum('chamados.prioridade');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['prioridade'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['fk_usuario_criador_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('chamados.fk_usuario_criador_id');         
		 $where->setValue($_REQUEST['fk_usuario_criador_id']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $chamadosAdapter = new adapter\ChamadosAdapter($connection);
    $result = $chamadosAdapter->getAll($list, "", "", $page, $pageSize);
        
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

    if (isset($_GET['anexos'])) {
       $where = new FilterWhere();       
		$where->setCollum('chamados.anexos');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['anexos'].'%');
		$list[]=$where;
    }
    if (isset($_GET['como_reproduzir'])) {
       $where = new FilterWhere();       
		$where->setCollum('chamados.como_reproduzir');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['como_reproduzir'].'%');
		$list[]=$where;
    }
    if (isset($_GET['prioridade'])) {
       $where = new FilterWhere();       
		$where->setCollum('chamados.prioridade');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['prioridade'].'%');
		$list[]=$where;
    }
    if (isset($_GET['fk_usuario_criador_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('chamados.fk_usuario_criador_id');         
		 $where->setValue($_GET['fk_usuario_criador_id']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $chamadosAdapter = new adapter\ChamadosAdapter($connection);
    $result = $chamadosAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Delete
 */
function remove()
{
    $chamados = new dao\Chamados();

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

    if (isset($_GET['anexos'])) {
        $chamados->setAnexos($_GET['anexos']);
    }
    if (isset($_GET['como_reproduzir'])) {
        $chamados->setComo_reproduzir($_GET['como_reproduzir']);
    }
    if (isset($_GET['prioridade'])) {
        $chamados->setPrioridade($_GET['prioridade']);
    }
    if (isset($_GET['fk_usuario_criador_id'])) {
        $chamados->setFk_usuario_criador_id($_GET['fk_usuario_criador_id']);
    }

    $connection = new connection\Connection();
    $chamadosAdapter = new adapter\ChamadosAdapter($connection);
    $result = $chamadosAdapter->delete($chamados);

    
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
 $chamados = new dao\Chamados();

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

    if (isset($post_vars['anexos'])) {
        $chamados->setAnexos($post_vars['anexos']);
    }
    if (isset($post_vars['como_reproduzir'])) {
        $chamados->setComo_reproduzir($post_vars['como_reproduzir']);
    }
    if (isset($post_vars['prioridade'])) {
        $chamados->setPrioridade($post_vars['prioridade']);
    }
    if (isset($post_vars['fk_usuario_criador_id'])) {
        $chamados->setFk_usuario_criador_id($post_vars['fk_usuario_criador_id']);
    }

    $connection = new connection\Connection();
    $chamadosAdapter = new adapter\ChamadosAdapter($connection);
    $result = $chamadosAdapter->create($chamados);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Insert
 */
function create()
{
    $chamados = new dao\Chamados();

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

    if (isset($_REQUEST['anexos'])) {
        $chamados->setAnexos($_REQUEST['anexos']);
    }
    if (isset($_REQUEST['como_reproduzir'])) {
        $chamados->setComo_reproduzir($_REQUEST['como_reproduzir']);
    }
    if (isset($_REQUEST['prioridade'])) {
        $chamados->setPrioridade($_REQUEST['prioridade']);
    }
    if (isset($_REQUEST['fk_usuario_criador_id'])) {
        $chamados->setFk_usuario_criador_id($_REQUEST['fk_usuario_criador_id']);
    }

    $connection = new connection\Connection();
    $chamadosAdapter = new adapter\ChamadosAdapter($connection);
    $result = $chamadosAdapter->create($chamados);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);
       
}

?>