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
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['aprovado'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.aprovado');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['aprovado'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['nome'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.nome');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['nome'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['password'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.password');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['password'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['password_fist_access'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.password_fist_access');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['password_fist_access'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['root_user'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.root_user');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['root_user'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['token_ativacao'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('usuarios_backup_primeiro_acesso_20260709.token_ativacao');         
		 $where->setValue($_REQUEST['token_ativacao']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['token_send'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.token_send');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['token_send'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['usuario'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.usuario');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['usuario'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['fk_condominio_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('usuarios_backup_primeiro_acesso_20260709.fk_condominio_id');         
		 $where->setValue($_REQUEST['fk_condominio_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['fk_perfis_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('usuarios_backup_primeiro_acesso_20260709.fk_perfis_id');         
		 $where->setValue($_REQUEST['fk_perfis_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['roles'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.roles');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['roles'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['tema_preferencia'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.tema_preferencia');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['tema_preferencia'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $usuarios_backup_primeiro_acesso_20260709Adapter = new adapter\Usuarios_backup_primeiro_acesso_20260709Adapter($connection);
    $result = $usuarios_backup_primeiro_acesso_20260709Adapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['aprovado'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.aprovado');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['aprovado'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['nome'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.nome');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['nome'].'%');
		$list[]=$where;
    }
    if (isset($_GET['password'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.password');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['password'].'%');
		$list[]=$where;
    }
    if (isset($_GET['password_fist_access'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.password_fist_access');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['password_fist_access'].'%');
		$list[]=$where;
    }
    if (isset($_GET['root_user'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.root_user');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['root_user'].'%');
		$list[]=$where;
    }
    if (isset($_GET['token_ativacao'])) {
         $where = new FilterWhere();       
		 $where->setCollum('usuarios_backup_primeiro_acesso_20260709.token_ativacao');         
		 $where->setValue($_GET['token_ativacao']);
		 $list[]=$where;
    }

    if (isset($_GET['token_send'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.token_send');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['token_send'].'%');
		$list[]=$where;
    }
    if (isset($_GET['usuario'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.usuario');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['usuario'].'%');
		$list[]=$where;
    }
    if (isset($_GET['fk_condominio_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('usuarios_backup_primeiro_acesso_20260709.fk_condominio_id');         
		 $where->setValue($_GET['fk_condominio_id']);
		 $list[]=$where;
    }

    if (isset($_GET['fk_perfis_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('usuarios_backup_primeiro_acesso_20260709.fk_perfis_id');         
		 $where->setValue($_GET['fk_perfis_id']);
		 $list[]=$where;
    }

    if (isset($_GET['roles'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.roles');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['roles'].'%');
		$list[]=$where;
    }
    if (isset($_GET['tema_preferencia'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios_backup_primeiro_acesso_20260709.tema_preferencia');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['tema_preferencia'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $usuarios_backup_primeiro_acesso_20260709Adapter = new adapter\Usuarios_backup_primeiro_acesso_20260709Adapter($connection);
    $result = $usuarios_backup_primeiro_acesso_20260709Adapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Delete
 */
function remove()
{
    $usuarios_backup_primeiro_acesso_20260709 = new dao\Usuarios_backup_primeiro_acesso_20260709();

    if (isset($_GET['id'])) {        
        $usuarios_backup_primeiro_acesso_20260709->setId($_GET['id']);
    }

    if (isset($_GET['aprovado'])) {
        $usuarios_backup_primeiro_acesso_20260709->setAprovado($_GET['aprovado']);
    }
    if (isset($_GET['date_create'])) {
        $usuarios_backup_primeiro_acesso_20260709->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $usuarios_backup_primeiro_acesso_20260709->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['nome'])) {
        $usuarios_backup_primeiro_acesso_20260709->setNome($_GET['nome']);
    }
    if (isset($_GET['password'])) {
        $usuarios_backup_primeiro_acesso_20260709->setPassword($_GET['password']);
    }
    if (isset($_GET['password_fist_access'])) {
        $usuarios_backup_primeiro_acesso_20260709->setPassword_fist_access($_GET['password_fist_access']);
    }
    if (isset($_GET['root_user'])) {
        $usuarios_backup_primeiro_acesso_20260709->setRoot_user($_GET['root_user']);
    }
    if (isset($_GET['token_ativacao'])) {
        $usuarios_backup_primeiro_acesso_20260709->setToken_ativacao($_GET['token_ativacao']);
    }

    if (isset($_GET['token_send'])) {
        $usuarios_backup_primeiro_acesso_20260709->setToken_send($_GET['token_send']);
    }
    if (isset($_GET['usuario'])) {
        $usuarios_backup_primeiro_acesso_20260709->setUsuario($_GET['usuario']);
    }
    if (isset($_GET['fk_condominio_id'])) {
        $usuarios_backup_primeiro_acesso_20260709->setFk_condominio_id($_GET['fk_condominio_id']);
    }

    if (isset($_GET['fk_perfis_id'])) {
        $usuarios_backup_primeiro_acesso_20260709->setFk_perfis_id($_GET['fk_perfis_id']);
    }

    if (isset($_GET['roles'])) {
        $usuarios_backup_primeiro_acesso_20260709->setRoles($_GET['roles']);
    }
    if (isset($_GET['tema_preferencia'])) {
        $usuarios_backup_primeiro_acesso_20260709->setTema_preferencia($_GET['tema_preferencia']);
    }
    $connection = new connection\Connection();
    $usuarios_backup_primeiro_acesso_20260709Adapter = new adapter\Usuarios_backup_primeiro_acesso_20260709Adapter($connection);
    $result = $usuarios_backup_primeiro_acesso_20260709Adapter->delete($usuarios_backup_primeiro_acesso_20260709);

    
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
 $usuarios_backup_primeiro_acesso_20260709 = new dao\Usuarios_backup_primeiro_acesso_20260709();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $usuarios_backup_primeiro_acesso_20260709->setId($post_vars['id']);
    }

    if (isset($post_vars['aprovado'])) {
        $usuarios_backup_primeiro_acesso_20260709->setAprovado($post_vars['aprovado']);
    }
    if (isset($post_vars['date_create'])) {
        $usuarios_backup_primeiro_acesso_20260709->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $usuarios_backup_primeiro_acesso_20260709->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['nome'])) {
        $usuarios_backup_primeiro_acesso_20260709->setNome($post_vars['nome']);
    }
    if (isset($post_vars['password'])) {
        $usuarios_backup_primeiro_acesso_20260709->setPassword($post_vars['password']);
    }
    if (isset($post_vars['password_fist_access'])) {
        $usuarios_backup_primeiro_acesso_20260709->setPassword_fist_access($post_vars['password_fist_access']);
    }
    if (isset($post_vars['root_user'])) {
        $usuarios_backup_primeiro_acesso_20260709->setRoot_user($post_vars['root_user']);
    }
    if (isset($post_vars['token_ativacao'])) {
        $usuarios_backup_primeiro_acesso_20260709->setToken_ativacao($post_vars['token_ativacao']);
    }

    if (isset($post_vars['token_send'])) {
        $usuarios_backup_primeiro_acesso_20260709->setToken_send($post_vars['token_send']);
    }
    if (isset($post_vars['usuario'])) {
        $usuarios_backup_primeiro_acesso_20260709->setUsuario($post_vars['usuario']);
    }
    if (isset($post_vars['fk_condominio_id'])) {
        $usuarios_backup_primeiro_acesso_20260709->setFk_condominio_id($post_vars['fk_condominio_id']);
    }

    if (isset($post_vars['fk_perfis_id'])) {
        $usuarios_backup_primeiro_acesso_20260709->setFk_perfis_id($post_vars['fk_perfis_id']);
    }

    if (isset($post_vars['roles'])) {
        $usuarios_backup_primeiro_acesso_20260709->setRoles($post_vars['roles']);
    }
    if (isset($post_vars['tema_preferencia'])) {
        $usuarios_backup_primeiro_acesso_20260709->setTema_preferencia($post_vars['tema_preferencia']);
    }
    $connection = new connection\Connection();
    $usuarios_backup_primeiro_acesso_20260709Adapter = new adapter\Usuarios_backup_primeiro_acesso_20260709Adapter($connection);
    $result = $usuarios_backup_primeiro_acesso_20260709Adapter->create($usuarios_backup_primeiro_acesso_20260709);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Insert
 */
function create()
{
    $usuarios_backup_primeiro_acesso_20260709 = new dao\Usuarios_backup_primeiro_acesso_20260709();

    if (isset($_REQUEST['id'])) {        
        $usuarios_backup_primeiro_acesso_20260709->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['aprovado'])) {
        $usuarios_backup_primeiro_acesso_20260709->setAprovado($_REQUEST['aprovado']);
    }
    if (isset($_REQUEST['date_create'])) {
        $usuarios_backup_primeiro_acesso_20260709->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $usuarios_backup_primeiro_acesso_20260709->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['nome'])) {
        $usuarios_backup_primeiro_acesso_20260709->setNome($_REQUEST['nome']);
    }
    if (isset($_REQUEST['password'])) {
        $usuarios_backup_primeiro_acesso_20260709->setPassword($_REQUEST['password']);
    }
    if (isset($_REQUEST['password_fist_access'])) {
        $usuarios_backup_primeiro_acesso_20260709->setPassword_fist_access($_REQUEST['password_fist_access']);
    }
    if (isset($_REQUEST['root_user'])) {
        $usuarios_backup_primeiro_acesso_20260709->setRoot_user($_REQUEST['root_user']);
    }
    if (isset($_REQUEST['token_ativacao'])) {
        $usuarios_backup_primeiro_acesso_20260709->setToken_ativacao($_REQUEST['token_ativacao']);
    }

    if (isset($_REQUEST['token_send'])) {
        $usuarios_backup_primeiro_acesso_20260709->setToken_send($_REQUEST['token_send']);
    }
    if (isset($_REQUEST['usuario'])) {
        $usuarios_backup_primeiro_acesso_20260709->setUsuario($_REQUEST['usuario']);
    }
    if (isset($_REQUEST['fk_condominio_id'])) {
        $usuarios_backup_primeiro_acesso_20260709->setFk_condominio_id($_REQUEST['fk_condominio_id']);
    }

    if (isset($_REQUEST['fk_perfis_id'])) {
        $usuarios_backup_primeiro_acesso_20260709->setFk_perfis_id($_REQUEST['fk_perfis_id']);
    }

    if (isset($_REQUEST['roles'])) {
        $usuarios_backup_primeiro_acesso_20260709->setRoles($_REQUEST['roles']);
    }
    if (isset($_REQUEST['tema_preferencia'])) {
        $usuarios_backup_primeiro_acesso_20260709->setTema_preferencia($_REQUEST['tema_preferencia']);
    }
    $connection = new connection\Connection();
    $usuarios_backup_primeiro_acesso_20260709Adapter = new adapter\Usuarios_backup_primeiro_acesso_20260709Adapter($connection);
    $result = $usuarios_backup_primeiro_acesso_20260709Adapter->create($usuarios_backup_primeiro_acesso_20260709);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);
       
}

?>