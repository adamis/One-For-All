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
		$where->setCollum('notas_fiscais.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['anexo'])) {

		$where = new FilterWhere();       
		$where->setCollum('notas_fiscais.anexo');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['anexo'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('notas_fiscais.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('notas_fiscais.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['numero_nota_fiscal'])) {

		$where = new FilterWhere();       
		$where->setCollum('notas_fiscais.numero_nota_fiscal');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['numero_nota_fiscal'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['valor'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('notas_fiscais.valor');         
		 $where->setValue($_REQUEST['valor']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $notas_fiscaisDao = new dao\Notas_fiscaisDao($connection);
    $result = $notas_fiscaisDao->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('notas_fiscais.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['anexo'])) {
       $where = new FilterWhere();       
		$where->setCollum('notas_fiscais.anexo');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['anexo'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('notas_fiscais.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('notas_fiscais.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['numero_nota_fiscal'])) {
       $where = new FilterWhere();       
		$where->setCollum('notas_fiscais.numero_nota_fiscal');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['numero_nota_fiscal'].'%');
		$list[]=$where;
    }
    if (isset($_GET['valor'])) {
         $where = new FilterWhere();       
		 $where->setCollum('notas_fiscais.valor');         
		 $where->setValue($_GET['valor']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $notas_fiscaisDao = new dao\Notas_fiscaisDao($connection);
    $result = $notas_fiscaisDao->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $notas_fiscais = new model\Notas_fiscais();

    if (isset($_GET['id'])) {        
        $notas_fiscais->setId($_GET['id']);
    }

    if (isset($_GET['anexo'])) {
        $notas_fiscais->setAnexo($_GET['anexo']);
    }
    if (isset($_GET['date_create'])) {
        $notas_fiscais->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $notas_fiscais->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['numero_nota_fiscal'])) {
        $notas_fiscais->setNumero_nota_fiscal($_GET['numero_nota_fiscal']);
    }
    if (isset($_GET['valor'])) {
        $notas_fiscais->setValor($_GET['valor']);
    }

    $connection = new connection\Connection();
    $notas_fiscaisDao = new dao\Notas_fiscaisDao($connection);
    $result = $notas_fiscaisDao->delete($notas_fiscais);

    
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
 $notas_fiscais = new model\Notas_fiscais();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $notas_fiscais->setId($post_vars['id']);
    }

    if (isset($post_vars['anexo'])) {
        $notas_fiscais->setAnexo($post_vars['anexo']);
    }
    if (isset($post_vars['date_create'])) {
        $notas_fiscais->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $notas_fiscais->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['numero_nota_fiscal'])) {
        $notas_fiscais->setNumero_nota_fiscal($post_vars['numero_nota_fiscal']);
    }
    if (isset($post_vars['valor'])) {
        $notas_fiscais->setValor($post_vars['valor']);
    }

    $connection = new connection\Connection();
    $notas_fiscaisDao = new dao\Notas_fiscaisDao($connection);
    $result = $notas_fiscaisDao->create($notas_fiscais);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $notas_fiscais = new model\Notas_fiscais();

    if (isset($_REQUEST['id'])) {        
        $notas_fiscais->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['anexo'])) {
        $notas_fiscais->setAnexo($_REQUEST['anexo']);
    }
    if (isset($_REQUEST['date_create'])) {
        $notas_fiscais->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $notas_fiscais->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['numero_nota_fiscal'])) {
        $notas_fiscais->setNumero_nota_fiscal($_REQUEST['numero_nota_fiscal']);
    }
    if (isset($_REQUEST['valor'])) {
        $notas_fiscais->setValor($_REQUEST['valor']);
    }

    $connection = new connection\Connection();
    $notas_fiscaisDao = new dao\Notas_fiscaisDao($connection);
    $result = $notas_fiscaisDao->create($notas_fiscais);
        
    return json_encode($result);
       
}

?>