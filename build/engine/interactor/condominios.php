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
		$where->setCollum('condominios.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['bairro'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.bairro');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['bairro'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['celular'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.celular');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['celular'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['cep'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.cep');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['cep'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['cidade'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.cidade');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['cidade'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['cnpj'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.cnpj');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['cnpj'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['complemento'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.complemento');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['complemento'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['email'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.email');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['email'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['estado'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.estado');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['estado'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['inscricao_municipal'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.inscricao_municipal');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['inscricao_municipal'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['logradouro'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.logradouro');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['logradouro'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['numero'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('condominios.numero');         
		 $where->setValue($_REQUEST['numero']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['razao_social'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.razao_social');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['razao_social'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['telefone'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.telefone');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['telefone'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['tipo_logradouro'])) {

		$where = new FilterWhere();       
		$where->setCollum('condominios.tipo_logradouro');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['tipo_logradouro'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $condominiosDao = new dao\CondominiosDao($connection);
    $result = $condominiosDao->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('condominios.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['bairro'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.bairro');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['bairro'].'%');
		$list[]=$where;
    }
    if (isset($_GET['celular'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.celular');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['celular'].'%');
		$list[]=$where;
    }
    if (isset($_GET['cep'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.cep');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['cep'].'%');
		$list[]=$where;
    }
    if (isset($_GET['cidade'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.cidade');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['cidade'].'%');
		$list[]=$where;
    }
    if (isset($_GET['cnpj'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.cnpj');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['cnpj'].'%');
		$list[]=$where;
    }
    if (isset($_GET['complemento'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.complemento');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['complemento'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['email'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.email');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['email'].'%');
		$list[]=$where;
    }
    if (isset($_GET['estado'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.estado');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['estado'].'%');
		$list[]=$where;
    }
    if (isset($_GET['inscricao_municipal'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.inscricao_municipal');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['inscricao_municipal'].'%');
		$list[]=$where;
    }
    if (isset($_GET['logradouro'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.logradouro');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['logradouro'].'%');
		$list[]=$where;
    }
    if (isset($_GET['numero'])) {
         $where = new FilterWhere();       
		 $where->setCollum('condominios.numero');         
		 $where->setValue($_GET['numero']);
		 $list[]=$where;
    }

    if (isset($_GET['razao_social'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.razao_social');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['razao_social'].'%');
		$list[]=$where;
    }
    if (isset($_GET['telefone'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.telefone');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['telefone'].'%');
		$list[]=$where;
    }
    if (isset($_GET['tipo_logradouro'])) {
       $where = new FilterWhere();       
		$where->setCollum('condominios.tipo_logradouro');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['tipo_logradouro'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $condominiosDao = new dao\CondominiosDao($connection);
    $result = $condominiosDao->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $condominios = new model\Condominios();

    if (isset($_GET['id'])) {        
        $condominios->setId($_GET['id']);
    }

    if (isset($_GET['bairro'])) {
        $condominios->setBairro($_GET['bairro']);
    }
    if (isset($_GET['celular'])) {
        $condominios->setCelular($_GET['celular']);
    }
    if (isset($_GET['cep'])) {
        $condominios->setCep($_GET['cep']);
    }
    if (isset($_GET['cidade'])) {
        $condominios->setCidade($_GET['cidade']);
    }
    if (isset($_GET['cnpj'])) {
        $condominios->setCnpj($_GET['cnpj']);
    }
    if (isset($_GET['complemento'])) {
        $condominios->setComplemento($_GET['complemento']);
    }
    if (isset($_GET['date_create'])) {
        $condominios->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $condominios->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['email'])) {
        $condominios->setEmail($_GET['email']);
    }
    if (isset($_GET['estado'])) {
        $condominios->setEstado($_GET['estado']);
    }
    if (isset($_GET['inscricao_municipal'])) {
        $condominios->setInscricao_municipal($_GET['inscricao_municipal']);
    }
    if (isset($_GET['logradouro'])) {
        $condominios->setLogradouro($_GET['logradouro']);
    }
    if (isset($_GET['numero'])) {
        $condominios->setNumero($_GET['numero']);
    }

    if (isset($_GET['razao_social'])) {
        $condominios->setRazao_social($_GET['razao_social']);
    }
    if (isset($_GET['telefone'])) {
        $condominios->setTelefone($_GET['telefone']);
    }
    if (isset($_GET['tipo_logradouro'])) {
        $condominios->setTipo_logradouro($_GET['tipo_logradouro']);
    }
    $connection = new connection\Connection();
    $condominiosDao = new dao\CondominiosDao($connection);
    $result = $condominiosDao->delete($condominios);

    
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
 $condominios = new model\Condominios();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $condominios->setId($post_vars['id']);
    }

    if (isset($post_vars['bairro'])) {
        $condominios->setBairro($post_vars['bairro']);
    }
    if (isset($post_vars['celular'])) {
        $condominios->setCelular($post_vars['celular']);
    }
    if (isset($post_vars['cep'])) {
        $condominios->setCep($post_vars['cep']);
    }
    if (isset($post_vars['cidade'])) {
        $condominios->setCidade($post_vars['cidade']);
    }
    if (isset($post_vars['cnpj'])) {
        $condominios->setCnpj($post_vars['cnpj']);
    }
    if (isset($post_vars['complemento'])) {
        $condominios->setComplemento($post_vars['complemento']);
    }
    if (isset($post_vars['date_create'])) {
        $condominios->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $condominios->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['email'])) {
        $condominios->setEmail($post_vars['email']);
    }
    if (isset($post_vars['estado'])) {
        $condominios->setEstado($post_vars['estado']);
    }
    if (isset($post_vars['inscricao_municipal'])) {
        $condominios->setInscricao_municipal($post_vars['inscricao_municipal']);
    }
    if (isset($post_vars['logradouro'])) {
        $condominios->setLogradouro($post_vars['logradouro']);
    }
    if (isset($post_vars['numero'])) {
        $condominios->setNumero($post_vars['numero']);
    }

    if (isset($post_vars['razao_social'])) {
        $condominios->setRazao_social($post_vars['razao_social']);
    }
    if (isset($post_vars['telefone'])) {
        $condominios->setTelefone($post_vars['telefone']);
    }
    if (isset($post_vars['tipo_logradouro'])) {
        $condominios->setTipo_logradouro($post_vars['tipo_logradouro']);
    }
    $connection = new connection\Connection();
    $condominiosDao = new dao\CondominiosDao($connection);
    $result = $condominiosDao->create($condominios);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $condominios = new model\Condominios();

    if (isset($_REQUEST['id'])) {        
        $condominios->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['bairro'])) {
        $condominios->setBairro($_REQUEST['bairro']);
    }
    if (isset($_REQUEST['celular'])) {
        $condominios->setCelular($_REQUEST['celular']);
    }
    if (isset($_REQUEST['cep'])) {
        $condominios->setCep($_REQUEST['cep']);
    }
    if (isset($_REQUEST['cidade'])) {
        $condominios->setCidade($_REQUEST['cidade']);
    }
    if (isset($_REQUEST['cnpj'])) {
        $condominios->setCnpj($_REQUEST['cnpj']);
    }
    if (isset($_REQUEST['complemento'])) {
        $condominios->setComplemento($_REQUEST['complemento']);
    }
    if (isset($_REQUEST['date_create'])) {
        $condominios->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $condominios->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['email'])) {
        $condominios->setEmail($_REQUEST['email']);
    }
    if (isset($_REQUEST['estado'])) {
        $condominios->setEstado($_REQUEST['estado']);
    }
    if (isset($_REQUEST['inscricao_municipal'])) {
        $condominios->setInscricao_municipal($_REQUEST['inscricao_municipal']);
    }
    if (isset($_REQUEST['logradouro'])) {
        $condominios->setLogradouro($_REQUEST['logradouro']);
    }
    if (isset($_REQUEST['numero'])) {
        $condominios->setNumero($_REQUEST['numero']);
    }

    if (isset($_REQUEST['razao_social'])) {
        $condominios->setRazao_social($_REQUEST['razao_social']);
    }
    if (isset($_REQUEST['telefone'])) {
        $condominios->setTelefone($_REQUEST['telefone']);
    }
    if (isset($_REQUEST['tipo_logradouro'])) {
        $condominios->setTipo_logradouro($_REQUEST['tipo_logradouro']);
    }
    $connection = new connection\Connection();
    $condominiosDao = new dao\CondominiosDao($connection);
    $result = $condominiosDao->create($condominios);
        
    return json_encode($result);
       
}

?>