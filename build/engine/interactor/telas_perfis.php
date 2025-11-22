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
		$where->setCollum('telas_perfis.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('telas_perfis.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('telas_perfis.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['fk_perfil_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('telas_perfis.fk_perfil_id');         
		 $where->setValue($_REQUEST['fk_perfil_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['fk_telas_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('telas_perfis.fk_telas_id');         
		 $where->setValue($_REQUEST['fk_telas_id']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $telas_perfisDao = new dao\Telas_perfisDao($connection);
    $result = $telas_perfisDao->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('telas_perfis.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('telas_perfis.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('telas_perfis.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['fk_perfil_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('telas_perfis.fk_perfil_id');         
		 $where->setValue($_GET['fk_perfil_id']);
		 $list[]=$where;
    }

    if (isset($_GET['fk_telas_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('telas_perfis.fk_telas_id');         
		 $where->setValue($_GET['fk_telas_id']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $telas_perfisDao = new dao\Telas_perfisDao($connection);
    $result = $telas_perfisDao->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $telas_perfis = new model\Telas_perfis();

    if (isset($_GET['id'])) {        
        $telas_perfis->setId($_GET['id']);
    }

    if (isset($_GET['date_create'])) {
        $telas_perfis->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $telas_perfis->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['fk_perfil_id'])) {
        $telas_perfis->setFk_perfil_id($_GET['fk_perfil_id']);
    }

    if (isset($_GET['fk_telas_id'])) {
        $telas_perfis->setFk_telas_id($_GET['fk_telas_id']);
    }

    $connection = new connection\Connection();
    $telas_perfisDao = new dao\Telas_perfisDao($connection);
    $result = $telas_perfisDao->delete($telas_perfis);

    
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
 $telas_perfis = new model\Telas_perfis();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $telas_perfis->setId($post_vars['id']);
    }

    if (isset($post_vars['date_create'])) {
        $telas_perfis->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $telas_perfis->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['fk_perfil_id'])) {
        $telas_perfis->setFk_perfil_id($post_vars['fk_perfil_id']);
    }

    if (isset($post_vars['fk_telas_id'])) {
        $telas_perfis->setFk_telas_id($post_vars['fk_telas_id']);
    }

    $connection = new connection\Connection();
    $telas_perfisDao = new dao\Telas_perfisDao($connection);
    $result = $telas_perfisDao->create($telas_perfis);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $telas_perfis = new model\Telas_perfis();

    if (isset($_REQUEST['id'])) {        
        $telas_perfis->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['date_create'])) {
        $telas_perfis->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $telas_perfis->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['fk_perfil_id'])) {
        $telas_perfis->setFk_perfil_id($_REQUEST['fk_perfil_id']);
    }

    if (isset($_REQUEST['fk_telas_id'])) {
        $telas_perfis->setFk_telas_id($_REQUEST['fk_telas_id']);
    }

    $connection = new connection\Connection();
    $telas_perfisDao = new dao\Telas_perfisDao($connection);
    $result = $telas_perfisDao->create($telas_perfis);
        
    return json_encode($result);
       
}

?>