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
		$where->setCollum('telas.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['label'])) {

		$where = new FilterWhere();       
		$where->setCollum('telas.label');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['label'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['icon'])) {

		$where = new FilterWhere();       
		$where->setCollum('telas.icon');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['icon'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['router_link'])) {

		$where = new FilterWhere();       
		$where->setCollum('telas.router_link');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['router_link'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['fk_menu_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('telas.fk_menu_id');         
		 $where->setValue($_REQUEST['fk_menu_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('telas.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('telas.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $telasDao = new dao\TelasDao($connection);
    $result = $telasDao->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('telas.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['label'])) {
       $where = new FilterWhere();       
		$where->setCollum('telas.label');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['label'].'%');
		$list[]=$where;
    }
    if (isset($_GET['icon'])) {
       $where = new FilterWhere();       
		$where->setCollum('telas.icon');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['icon'].'%');
		$list[]=$where;
    }
    if (isset($_GET['router_link'])) {
       $where = new FilterWhere();       
		$where->setCollum('telas.router_link');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['router_link'].'%');
		$list[]=$where;
    }
    if (isset($_GET['fk_menu_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('telas.fk_menu_id');         
		 $where->setValue($_GET['fk_menu_id']);
		 $list[]=$where;
    }

    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('telas.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('telas.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $telasDao = new dao\TelasDao($connection);
    $result = $telasDao->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $telas = new model\Telas();

    if (isset($_GET['id'])) {        
        $telas->setId($_GET['id']);
    }

    if (isset($_GET['label'])) {
        $telas->setLabel($_GET['label']);
    }
    if (isset($_GET['icon'])) {
        $telas->setIcon($_GET['icon']);
    }
    if (isset($_GET['router_link'])) {
        $telas->setRouter_link($_GET['router_link']);
    }
    if (isset($_GET['fk_menu_id'])) {
        $telas->setFk_menu_id($_GET['fk_menu_id']);
    }

    if (isset($_GET['date_create'])) {
        $telas->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $telas->setDate_update($_GET['date_update']);
    }
    $connection = new connection\Connection();
    $telasDao = new dao\TelasDao($connection);
    $result = $telasDao->delete($telas);

    
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
 $telas = new model\Telas();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $telas->setId($post_vars['id']);
    }

    if (isset($post_vars['label'])) {
        $telas->setLabel($post_vars['label']);
    }
    if (isset($post_vars['icon'])) {
        $telas->setIcon($post_vars['icon']);
    }
    if (isset($post_vars['router_link'])) {
        $telas->setRouter_link($post_vars['router_link']);
    }
    if (isset($post_vars['fk_menu_id'])) {
        $telas->setFk_menu_id($post_vars['fk_menu_id']);
    }

    if (isset($post_vars['date_create'])) {
        $telas->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $telas->setDate_update($post_vars['date_update']);
    }
    $connection = new connection\Connection();
    $telasDao = new dao\TelasDao($connection);
    $result = $telasDao->create($telas);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $telas = new model\Telas();

    if (isset($_REQUEST['id'])) {        
        $telas->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['label'])) {
        $telas->setLabel($_REQUEST['label']);
    }
    if (isset($_REQUEST['icon'])) {
        $telas->setIcon($_REQUEST['icon']);
    }
    if (isset($_REQUEST['router_link'])) {
        $telas->setRouter_link($_REQUEST['router_link']);
    }
    if (isset($_REQUEST['fk_menu_id'])) {
        $telas->setFk_menu_id($_REQUEST['fk_menu_id']);
    }

    if (isset($_REQUEST['date_create'])) {
        $telas->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $telas->setDate_update($_REQUEST['date_update']);
    }
    $connection = new connection\Connection();
    $telasDao = new dao\TelasDao($connection);
    $result = $telasDao->create($telas);
        
    return json_encode($result);
       
}

?>