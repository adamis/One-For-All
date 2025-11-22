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
		$where->setCollum('usuarios.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['aprovado'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios.aprovado');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['aprovado'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['nome'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios.nome');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['nome'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['password'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios.password');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['password'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['password_fist_access'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios.password_fist_access');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['password_fist_access'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['root_user'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios.root_user');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['root_user'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['token_ativacao'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('usuarios.token_ativacao');         
		 $where->setValue($_REQUEST['token_ativacao']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['token_send'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios.token_send');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['token_send'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['usuario'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios.usuario');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['usuario'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['fk_condominio_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('usuarios.fk_condominio_id');         
		 $where->setValue($_REQUEST['fk_condominio_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['fk_perfis_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('usuarios.fk_perfis_id');         
		 $where->setValue($_REQUEST['fk_perfis_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['roles'])) {

		$where = new FilterWhere();       
		$where->setCollum('usuarios.roles');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['roles'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $usuariosDao = new dao\UsuariosDao($connection);
    $result = $usuariosDao->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('usuarios.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['aprovado'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios.aprovado');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['aprovado'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['nome'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios.nome');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['nome'].'%');
		$list[]=$where;
    }
    if (isset($_GET['password'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios.password');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['password'].'%');
		$list[]=$where;
    }
    if (isset($_GET['password_fist_access'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios.password_fist_access');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['password_fist_access'].'%');
		$list[]=$where;
    }
    if (isset($_GET['root_user'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios.root_user');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['root_user'].'%');
		$list[]=$where;
    }
    if (isset($_GET['token_ativacao'])) {
         $where = new FilterWhere();       
		 $where->setCollum('usuarios.token_ativacao');         
		 $where->setValue($_GET['token_ativacao']);
		 $list[]=$where;
    }

    if (isset($_GET['token_send'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios.token_send');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['token_send'].'%');
		$list[]=$where;
    }
    if (isset($_GET['usuario'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios.usuario');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['usuario'].'%');
		$list[]=$where;
    }
    if (isset($_GET['fk_condominio_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('usuarios.fk_condominio_id');         
		 $where->setValue($_GET['fk_condominio_id']);
		 $list[]=$where;
    }

    if (isset($_GET['fk_perfis_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('usuarios.fk_perfis_id');         
		 $where->setValue($_GET['fk_perfis_id']);
		 $list[]=$where;
    }

    if (isset($_GET['roles'])) {
       $where = new FilterWhere();       
		$where->setCollum('usuarios.roles');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['roles'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $usuariosDao = new dao\UsuariosDao($connection);
    $result = $usuariosDao->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $usuarios = new model\Usuarios();

    if (isset($_GET['id'])) {        
        $usuarios->setId($_GET['id']);
    }

    if (isset($_GET['aprovado'])) {
        $usuarios->setAprovado($_GET['aprovado']);
    }
    if (isset($_GET['date_create'])) {
        $usuarios->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $usuarios->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['nome'])) {
        $usuarios->setNome($_GET['nome']);
    }
    if (isset($_GET['password'])) {
        $usuarios->setPassword($_GET['password']);
    }
    if (isset($_GET['password_fist_access'])) {
        $usuarios->setPassword_fist_access($_GET['password_fist_access']);
    }
    if (isset($_GET['root_user'])) {
        $usuarios->setRoot_user($_GET['root_user']);
    }
    if (isset($_GET['token_ativacao'])) {
        $usuarios->setToken_ativacao($_GET['token_ativacao']);
    }

    if (isset($_GET['token_send'])) {
        $usuarios->setToken_send($_GET['token_send']);
    }
    if (isset($_GET['usuario'])) {
        $usuarios->setUsuario($_GET['usuario']);
    }
    if (isset($_GET['fk_condominio_id'])) {
        $usuarios->setFk_condominio_id($_GET['fk_condominio_id']);
    }

    if (isset($_GET['fk_perfis_id'])) {
        $usuarios->setFk_perfis_id($_GET['fk_perfis_id']);
    }

    if (isset($_GET['roles'])) {
        $usuarios->setRoles($_GET['roles']);
    }
    $connection = new connection\Connection();
    $usuariosDao = new dao\UsuariosDao($connection);
    $result = $usuariosDao->delete($usuarios);

    
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
 $usuarios = new model\Usuarios();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $usuarios->setId($post_vars['id']);
    }

    if (isset($post_vars['aprovado'])) {
        $usuarios->setAprovado($post_vars['aprovado']);
    }
    if (isset($post_vars['date_create'])) {
        $usuarios->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $usuarios->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['nome'])) {
        $usuarios->setNome($post_vars['nome']);
    }
    if (isset($post_vars['password'])) {
        $usuarios->setPassword($post_vars['password']);
    }
    if (isset($post_vars['password_fist_access'])) {
        $usuarios->setPassword_fist_access($post_vars['password_fist_access']);
    }
    if (isset($post_vars['root_user'])) {
        $usuarios->setRoot_user($post_vars['root_user']);
    }
    if (isset($post_vars['token_ativacao'])) {
        $usuarios->setToken_ativacao($post_vars['token_ativacao']);
    }

    if (isset($post_vars['token_send'])) {
        $usuarios->setToken_send($post_vars['token_send']);
    }
    if (isset($post_vars['usuario'])) {
        $usuarios->setUsuario($post_vars['usuario']);
    }
    if (isset($post_vars['fk_condominio_id'])) {
        $usuarios->setFk_condominio_id($post_vars['fk_condominio_id']);
    }

    if (isset($post_vars['fk_perfis_id'])) {
        $usuarios->setFk_perfis_id($post_vars['fk_perfis_id']);
    }

    if (isset($post_vars['roles'])) {
        $usuarios->setRoles($post_vars['roles']);
    }
    $connection = new connection\Connection();
    $usuariosDao = new dao\UsuariosDao($connection);
    $result = $usuariosDao->create($usuarios);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $usuarios = new model\Usuarios();

    if (isset($_REQUEST['id'])) {        
        $usuarios->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['aprovado'])) {
        $usuarios->setAprovado($_REQUEST['aprovado']);
    }
    if (isset($_REQUEST['date_create'])) {
        $usuarios->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $usuarios->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['nome'])) {
        $usuarios->setNome($_REQUEST['nome']);
    }
    if (isset($_REQUEST['password'])) {
        $usuarios->setPassword($_REQUEST['password']);
    }
    if (isset($_REQUEST['password_fist_access'])) {
        $usuarios->setPassword_fist_access($_REQUEST['password_fist_access']);
    }
    if (isset($_REQUEST['root_user'])) {
        $usuarios->setRoot_user($_REQUEST['root_user']);
    }
    if (isset($_REQUEST['token_ativacao'])) {
        $usuarios->setToken_ativacao($_REQUEST['token_ativacao']);
    }

    if (isset($_REQUEST['token_send'])) {
        $usuarios->setToken_send($_REQUEST['token_send']);
    }
    if (isset($_REQUEST['usuario'])) {
        $usuarios->setUsuario($_REQUEST['usuario']);
    }
    if (isset($_REQUEST['fk_condominio_id'])) {
        $usuarios->setFk_condominio_id($_REQUEST['fk_condominio_id']);
    }

    if (isset($_REQUEST['fk_perfis_id'])) {
        $usuarios->setFk_perfis_id($_REQUEST['fk_perfis_id']);
    }

    if (isset($_REQUEST['roles'])) {
        $usuarios->setRoles($_REQUEST['roles']);
    }
    $connection = new connection\Connection();
    $usuariosDao = new dao\UsuariosDao($connection);
    $result = $usuariosDao->create($usuarios);
        
    return json_encode($result);
       
}

?>