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
		$where->setCollum('dados_adamis_cnpj.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['bairro'])) {

		$where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.bairro');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['bairro'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['cep'])) {

		$where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.cep');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['cep'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['cidade'])) {

		$where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.cidade');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['cidade'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['cnpj'])) {

		$where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.cnpj');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['cnpj'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['logradouro'])) {

		$where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.logradouro');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['logradouro'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['nome'])) {

		$where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.nome');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['nome'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['numero'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('dados_adamis_cnpj.numero');         
		 $where->setValue($_REQUEST['numero']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['tecnico'])) {

		$where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.tecnico');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['tecnico'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['url_fig'])) {

		$where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.url_fig');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['url_fig'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['tipo_logradouro'])) {

		$where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.tipo_logradouro');
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
    $dados_adamis_cnpjDao = new dao\Dados_adamis_cnpjDao($connection);
    $result = $dados_adamis_cnpjDao->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('dados_adamis_cnpj.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['bairro'])) {
       $where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.bairro');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['bairro'].'%');
		$list[]=$where;
    }
    if (isset($_GET['cep'])) {
       $where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.cep');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['cep'].'%');
		$list[]=$where;
    }
    if (isset($_GET['cidade'])) {
       $where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.cidade');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['cidade'].'%');
		$list[]=$where;
    }
    if (isset($_GET['cnpj'])) {
       $where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.cnpj');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['cnpj'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['logradouro'])) {
       $where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.logradouro');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['logradouro'].'%');
		$list[]=$where;
    }
    if (isset($_GET['nome'])) {
       $where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.nome');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['nome'].'%');
		$list[]=$where;
    }
    if (isset($_GET['numero'])) {
         $where = new FilterWhere();       
		 $where->setCollum('dados_adamis_cnpj.numero');         
		 $where->setValue($_GET['numero']);
		 $list[]=$where;
    }

    if (isset($_GET['tecnico'])) {
       $where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.tecnico');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['tecnico'].'%');
		$list[]=$where;
    }
    if (isset($_GET['url_fig'])) {
       $where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.url_fig');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['url_fig'].'%');
		$list[]=$where;
    }
    if (isset($_GET['tipo_logradouro'])) {
       $where = new FilterWhere();       
		$where->setCollum('dados_adamis_cnpj.tipo_logradouro');
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
    $dados_adamis_cnpjDao = new dao\Dados_adamis_cnpjDao($connection);
    $result = $dados_adamis_cnpjDao->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $dados_adamis_cnpj = new model\Dados_adamis_cnpj();

    if (isset($_GET['id'])) {        
        $dados_adamis_cnpj->setId($_GET['id']);
    }

    if (isset($_GET['bairro'])) {
        $dados_adamis_cnpj->setBairro($_GET['bairro']);
    }
    if (isset($_GET['cep'])) {
        $dados_adamis_cnpj->setCep($_GET['cep']);
    }
    if (isset($_GET['cidade'])) {
        $dados_adamis_cnpj->setCidade($_GET['cidade']);
    }
    if (isset($_GET['cnpj'])) {
        $dados_adamis_cnpj->setCnpj($_GET['cnpj']);
    }
    if (isset($_GET['date_create'])) {
        $dados_adamis_cnpj->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $dados_adamis_cnpj->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['logradouro'])) {
        $dados_adamis_cnpj->setLogradouro($_GET['logradouro']);
    }
    if (isset($_GET['nome'])) {
        $dados_adamis_cnpj->setNome($_GET['nome']);
    }
    if (isset($_GET['numero'])) {
        $dados_adamis_cnpj->setNumero($_GET['numero']);
    }

    if (isset($_GET['tecnico'])) {
        $dados_adamis_cnpj->setTecnico($_GET['tecnico']);
    }
    if (isset($_GET['url_fig'])) {
        $dados_adamis_cnpj->setUrl_fig($_GET['url_fig']);
    }
    if (isset($_GET['tipo_logradouro'])) {
        $dados_adamis_cnpj->setTipo_logradouro($_GET['tipo_logradouro']);
    }
    $connection = new connection\Connection();
    $dados_adamis_cnpjDao = new dao\Dados_adamis_cnpjDao($connection);
    $result = $dados_adamis_cnpjDao->delete($dados_adamis_cnpj);

    
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
 $dados_adamis_cnpj = new model\Dados_adamis_cnpj();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $dados_adamis_cnpj->setId($post_vars['id']);
    }

    if (isset($post_vars['bairro'])) {
        $dados_adamis_cnpj->setBairro($post_vars['bairro']);
    }
    if (isset($post_vars['cep'])) {
        $dados_adamis_cnpj->setCep($post_vars['cep']);
    }
    if (isset($post_vars['cidade'])) {
        $dados_adamis_cnpj->setCidade($post_vars['cidade']);
    }
    if (isset($post_vars['cnpj'])) {
        $dados_adamis_cnpj->setCnpj($post_vars['cnpj']);
    }
    if (isset($post_vars['date_create'])) {
        $dados_adamis_cnpj->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $dados_adamis_cnpj->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['logradouro'])) {
        $dados_adamis_cnpj->setLogradouro($post_vars['logradouro']);
    }
    if (isset($post_vars['nome'])) {
        $dados_adamis_cnpj->setNome($post_vars['nome']);
    }
    if (isset($post_vars['numero'])) {
        $dados_adamis_cnpj->setNumero($post_vars['numero']);
    }

    if (isset($post_vars['tecnico'])) {
        $dados_adamis_cnpj->setTecnico($post_vars['tecnico']);
    }
    if (isset($post_vars['url_fig'])) {
        $dados_adamis_cnpj->setUrl_fig($post_vars['url_fig']);
    }
    if (isset($post_vars['tipo_logradouro'])) {
        $dados_adamis_cnpj->setTipo_logradouro($post_vars['tipo_logradouro']);
    }
    $connection = new connection\Connection();
    $dados_adamis_cnpjDao = new dao\Dados_adamis_cnpjDao($connection);
    $result = $dados_adamis_cnpjDao->create($dados_adamis_cnpj);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $dados_adamis_cnpj = new model\Dados_adamis_cnpj();

    if (isset($_REQUEST['id'])) {        
        $dados_adamis_cnpj->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['bairro'])) {
        $dados_adamis_cnpj->setBairro($_REQUEST['bairro']);
    }
    if (isset($_REQUEST['cep'])) {
        $dados_adamis_cnpj->setCep($_REQUEST['cep']);
    }
    if (isset($_REQUEST['cidade'])) {
        $dados_adamis_cnpj->setCidade($_REQUEST['cidade']);
    }
    if (isset($_REQUEST['cnpj'])) {
        $dados_adamis_cnpj->setCnpj($_REQUEST['cnpj']);
    }
    if (isset($_REQUEST['date_create'])) {
        $dados_adamis_cnpj->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $dados_adamis_cnpj->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['logradouro'])) {
        $dados_adamis_cnpj->setLogradouro($_REQUEST['logradouro']);
    }
    if (isset($_REQUEST['nome'])) {
        $dados_adamis_cnpj->setNome($_REQUEST['nome']);
    }
    if (isset($_REQUEST['numero'])) {
        $dados_adamis_cnpj->setNumero($_REQUEST['numero']);
    }

    if (isset($_REQUEST['tecnico'])) {
        $dados_adamis_cnpj->setTecnico($_REQUEST['tecnico']);
    }
    if (isset($_REQUEST['url_fig'])) {
        $dados_adamis_cnpj->setUrl_fig($_REQUEST['url_fig']);
    }
    if (isset($_REQUEST['tipo_logradouro'])) {
        $dados_adamis_cnpj->setTipo_logradouro($_REQUEST['tipo_logradouro']);
    }
    $connection = new connection\Connection();
    $dados_adamis_cnpjDao = new dao\Dados_adamis_cnpjDao($connection);
    $result = $dados_adamis_cnpjDao->create($dados_adamis_cnpj);
        
    return json_encode($result);
       
}

?>