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


    if (isset($_REQUEST['db'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.db');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['db'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['name'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['type'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.type');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['type'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['specific_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.specific_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['specific_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['language'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.language');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['language'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['sql_data_access'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.sql_data_access');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['sql_data_access'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['is_deterministic'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.is_deterministic');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['is_deterministic'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['security_type'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.security_type');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['security_type'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['param_list'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.param_list');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['param_list'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['returns'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.returns');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['returns'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['body'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.body');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['body'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['definer'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.definer');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['definer'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['created'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.created');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['created'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['modified'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.modified');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['modified'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['sql_mode'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.sql_mode');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['sql_mode'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['comment'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.comment');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['comment'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['character_set_client'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.character_set_client');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['character_set_client'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['collation_connection'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.collation_connection');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['collation_connection'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['db_collation'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.db_collation');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['db_collation'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['body_utf8'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.body_utf8');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['body_utf8'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['aggregate'])) {

		$where = new FilterWhere();       
		$where->setCollum('proc.aggregate');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['aggregate'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $procAdapter = new adapter\ProcAdapter($connection);
    $result = $procAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['db'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.db');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['db'].'%');
		$list[]=$where;
    }
    if (isset($_GET['name'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['type'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.type');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['type'].'%');
		$list[]=$where;
    }
    if (isset($_GET['specific_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.specific_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['specific_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['language'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.language');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['language'].'%');
		$list[]=$where;
    }
    if (isset($_GET['sql_data_access'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.sql_data_access');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['sql_data_access'].'%');
		$list[]=$where;
    }
    if (isset($_GET['is_deterministic'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.is_deterministic');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['is_deterministic'].'%');
		$list[]=$where;
    }
    if (isset($_GET['security_type'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.security_type');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['security_type'].'%');
		$list[]=$where;
    }
    if (isset($_GET['param_list'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.param_list');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['param_list'].'%');
		$list[]=$where;
    }
    if (isset($_GET['returns'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.returns');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['returns'].'%');
		$list[]=$where;
    }
    if (isset($_GET['body'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.body');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['body'].'%');
		$list[]=$where;
    }
    if (isset($_GET['definer'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.definer');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['definer'].'%');
		$list[]=$where;
    }
    if (isset($_GET['created'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.created');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['created'].'%');
		$list[]=$where;
    }
    if (isset($_GET['modified'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.modified');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['modified'].'%');
		$list[]=$where;
    }
    if (isset($_GET['sql_mode'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.sql_mode');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['sql_mode'].'%');
		$list[]=$where;
    }
    if (isset($_GET['comment'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.comment');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['comment'].'%');
		$list[]=$where;
    }
    if (isset($_GET['character_set_client'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.character_set_client');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['character_set_client'].'%');
		$list[]=$where;
    }
    if (isset($_GET['collation_connection'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.collation_connection');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['collation_connection'].'%');
		$list[]=$where;
    }
    if (isset($_GET['db_collation'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.db_collation');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['db_collation'].'%');
		$list[]=$where;
    }
    if (isset($_GET['body_utf8'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.body_utf8');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['body_utf8'].'%');
		$list[]=$where;
    }
    if (isset($_GET['aggregate'])) {
       $where = new FilterWhere();       
		$where->setCollum('proc.aggregate');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['aggregate'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $procAdapter = new adapter\ProcAdapter($connection);
    $result = $procAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $proc = new dao\Proc();

    if (isset($_GET['db'])) {
        $proc->setDb($_GET['db']);
    }
    if (isset($_GET['name'])) {
        $proc->setName($_GET['name']);
    }
    if (isset($_GET['type'])) {
        $proc->setType($_GET['type']);
    }
    if (isset($_GET['specific_name'])) {
        $proc->setSpecific_name($_GET['specific_name']);
    }
    if (isset($_GET['language'])) {
        $proc->setLanguage($_GET['language']);
    }
    if (isset($_GET['sql_data_access'])) {
        $proc->setSql_data_access($_GET['sql_data_access']);
    }
    if (isset($_GET['is_deterministic'])) {
        $proc->setIs_deterministic($_GET['is_deterministic']);
    }
    if (isset($_GET['security_type'])) {
        $proc->setSecurity_type($_GET['security_type']);
    }
    if (isset($_GET['param_list'])) {
        $proc->setParam_list($_GET['param_list']);
    }
    if (isset($_GET['returns'])) {
        $proc->setReturns($_GET['returns']);
    }
    if (isset($_GET['body'])) {
        $proc->setBody($_GET['body']);
    }
    if (isset($_GET['definer'])) {
        $proc->setDefiner($_GET['definer']);
    }
    if (isset($_GET['created'])) {
        $proc->setCreated($_GET['created']);
    }
    if (isset($_GET['modified'])) {
        $proc->setModified($_GET['modified']);
    }
    if (isset($_GET['sql_mode'])) {
        $proc->setSql_mode($_GET['sql_mode']);
    }
    if (isset($_GET['comment'])) {
        $proc->setComment($_GET['comment']);
    }
    if (isset($_GET['character_set_client'])) {
        $proc->setCharacter_set_client($_GET['character_set_client']);
    }
    if (isset($_GET['collation_connection'])) {
        $proc->setCollation_connection($_GET['collation_connection']);
    }
    if (isset($_GET['db_collation'])) {
        $proc->setDb_collation($_GET['db_collation']);
    }
    if (isset($_GET['body_utf8'])) {
        $proc->setBody_utf8($_GET['body_utf8']);
    }
    if (isset($_GET['aggregate'])) {
        $proc->setAggregate($_GET['aggregate']);
    }
    $connection = new connection\Connection();
    $procAdapter = new adapter\ProcAdapter($connection);
    $result = $procAdapter->delete($proc);

    
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
 $proc = new dao\Proc();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['db'])) {
        $proc->setDb($post_vars['db']);
    }
    if (isset($post_vars['name'])) {
        $proc->setName($post_vars['name']);
    }
    if (isset($post_vars['type'])) {
        $proc->setType($post_vars['type']);
    }
    if (isset($post_vars['specific_name'])) {
        $proc->setSpecific_name($post_vars['specific_name']);
    }
    if (isset($post_vars['language'])) {
        $proc->setLanguage($post_vars['language']);
    }
    if (isset($post_vars['sql_data_access'])) {
        $proc->setSql_data_access($post_vars['sql_data_access']);
    }
    if (isset($post_vars['is_deterministic'])) {
        $proc->setIs_deterministic($post_vars['is_deterministic']);
    }
    if (isset($post_vars['security_type'])) {
        $proc->setSecurity_type($post_vars['security_type']);
    }
    if (isset($post_vars['param_list'])) {
        $proc->setParam_list($post_vars['param_list']);
    }
    if (isset($post_vars['returns'])) {
        $proc->setReturns($post_vars['returns']);
    }
    if (isset($post_vars['body'])) {
        $proc->setBody($post_vars['body']);
    }
    if (isset($post_vars['definer'])) {
        $proc->setDefiner($post_vars['definer']);
    }
    if (isset($post_vars['created'])) {
        $proc->setCreated($post_vars['created']);
    }
    if (isset($post_vars['modified'])) {
        $proc->setModified($post_vars['modified']);
    }
    if (isset($post_vars['sql_mode'])) {
        $proc->setSql_mode($post_vars['sql_mode']);
    }
    if (isset($post_vars['comment'])) {
        $proc->setComment($post_vars['comment']);
    }
    if (isset($post_vars['character_set_client'])) {
        $proc->setCharacter_set_client($post_vars['character_set_client']);
    }
    if (isset($post_vars['collation_connection'])) {
        $proc->setCollation_connection($post_vars['collation_connection']);
    }
    if (isset($post_vars['db_collation'])) {
        $proc->setDb_collation($post_vars['db_collation']);
    }
    if (isset($post_vars['body_utf8'])) {
        $proc->setBody_utf8($post_vars['body_utf8']);
    }
    if (isset($post_vars['aggregate'])) {
        $proc->setAggregate($post_vars['aggregate']);
    }
    $connection = new connection\Connection();
    $procAdapter = new adapter\ProcAdapter($connection);
    $result = $procAdapter->create($proc);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $proc = new dao\Proc();

    if (isset($_REQUEST['db'])) {
        $proc->setDb($_REQUEST['db']);
    }
    if (isset($_REQUEST['name'])) {
        $proc->setName($_REQUEST['name']);
    }
    if (isset($_REQUEST['type'])) {
        $proc->setType($_REQUEST['type']);
    }
    if (isset($_REQUEST['specific_name'])) {
        $proc->setSpecific_name($_REQUEST['specific_name']);
    }
    if (isset($_REQUEST['language'])) {
        $proc->setLanguage($_REQUEST['language']);
    }
    if (isset($_REQUEST['sql_data_access'])) {
        $proc->setSql_data_access($_REQUEST['sql_data_access']);
    }
    if (isset($_REQUEST['is_deterministic'])) {
        $proc->setIs_deterministic($_REQUEST['is_deterministic']);
    }
    if (isset($_REQUEST['security_type'])) {
        $proc->setSecurity_type($_REQUEST['security_type']);
    }
    if (isset($_REQUEST['param_list'])) {
        $proc->setParam_list($_REQUEST['param_list']);
    }
    if (isset($_REQUEST['returns'])) {
        $proc->setReturns($_REQUEST['returns']);
    }
    if (isset($_REQUEST['body'])) {
        $proc->setBody($_REQUEST['body']);
    }
    if (isset($_REQUEST['definer'])) {
        $proc->setDefiner($_REQUEST['definer']);
    }
    if (isset($_REQUEST['created'])) {
        $proc->setCreated($_REQUEST['created']);
    }
    if (isset($_REQUEST['modified'])) {
        $proc->setModified($_REQUEST['modified']);
    }
    if (isset($_REQUEST['sql_mode'])) {
        $proc->setSql_mode($_REQUEST['sql_mode']);
    }
    if (isset($_REQUEST['comment'])) {
        $proc->setComment($_REQUEST['comment']);
    }
    if (isset($_REQUEST['character_set_client'])) {
        $proc->setCharacter_set_client($_REQUEST['character_set_client']);
    }
    if (isset($_REQUEST['collation_connection'])) {
        $proc->setCollation_connection($_REQUEST['collation_connection']);
    }
    if (isset($_REQUEST['db_collation'])) {
        $proc->setDb_collation($_REQUEST['db_collation']);
    }
    if (isset($_REQUEST['body_utf8'])) {
        $proc->setBody_utf8($_REQUEST['body_utf8']);
    }
    if (isset($_REQUEST['aggregate'])) {
        $proc->setAggregate($_REQUEST['aggregate']);
    }
    $connection = new connection\Connection();
    $procAdapter = new adapter\ProcAdapter($connection);
    $result = $procAdapter->create($proc);
        
    return json_encode($result);
       
}

?>