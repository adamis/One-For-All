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
		$where->setCollum('mqtt_config.id');		
		$where->setValue($_REQUEST['id']);
        $list[]=$where;
    }

    if (isset($_REQUEST['client_id_prefix'])) {

		$where = new FilterWhere();       
		$where->setCollum('mqtt_config.client_id_prefix');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['client_id_prefix'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['command_timeout_seconds'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('mqtt_config.command_timeout_seconds');         
		 $where->setValue($_REQUEST['command_timeout_seconds']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['date_create'])) {

		$where = new FilterWhere();       
		$where->setCollum('mqtt_config.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_create'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['date_update'])) {

		$where = new FilterWhere();       
		$where->setCollum('mqtt_config.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['date_update'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['exec_topic_template'])) {

		$where = new FilterWhere();       
		$where->setCollum('mqtt_config.exec_topic_template');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['exec_topic_template'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['host'])) {

		$where = new FilterWhere();       
		$where->setCollum('mqtt_config.host');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['host'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['password'])) {

		$where = new FilterWhere();       
		$where->setCollum('mqtt_config.password');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['password'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['porta'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('mqtt_config.porta');         
		 $where->setValue($_REQUEST['porta']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['protocolo'])) {

		$where = new FilterWhere();       
		$where->setCollum('mqtt_config.protocolo');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['protocolo'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['result_topic_filter'])) {

		$where = new FilterWhere();       
		$where->setCollum('mqtt_config.result_topic_filter');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['result_topic_filter'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['server_topic'])) {

		$where = new FilterWhere();       
		$where->setCollum('mqtt_config.server_topic');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['server_topic'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['username'])) {

		$where = new FilterWhere();       
		$where->setCollum('mqtt_config.username');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['username'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $mqtt_configAdapter = new adapter\Mqtt_configAdapter($connection);
    $result = $mqtt_configAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('mqtt_config.id');
		$where->setValue($_GET['id']);
        $list[]=$where;
    }

    if (isset($_GET['client_id_prefix'])) {
       $where = new FilterWhere();       
		$where->setCollum('mqtt_config.client_id_prefix');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['client_id_prefix'].'%');
		$list[]=$where;
    }
    if (isset($_GET['command_timeout_seconds'])) {
         $where = new FilterWhere();       
		 $where->setCollum('mqtt_config.command_timeout_seconds');         
		 $where->setValue($_GET['command_timeout_seconds']);
		 $list[]=$where;
    }

    if (isset($_GET['date_create'])) {
       $where = new FilterWhere();       
		$where->setCollum('mqtt_config.date_create');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_create'].'%');
		$list[]=$where;
    }
    if (isset($_GET['date_update'])) {
       $where = new FilterWhere();       
		$where->setCollum('mqtt_config.date_update');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['date_update'].'%');
		$list[]=$where;
    }
    if (isset($_GET['exec_topic_template'])) {
       $where = new FilterWhere();       
		$where->setCollum('mqtt_config.exec_topic_template');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['exec_topic_template'].'%');
		$list[]=$where;
    }
    if (isset($_GET['host'])) {
       $where = new FilterWhere();       
		$where->setCollum('mqtt_config.host');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['host'].'%');
		$list[]=$where;
    }
    if (isset($_GET['password'])) {
       $where = new FilterWhere();       
		$where->setCollum('mqtt_config.password');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['password'].'%');
		$list[]=$where;
    }
    if (isset($_GET['porta'])) {
         $where = new FilterWhere();       
		 $where->setCollum('mqtt_config.porta');         
		 $where->setValue($_GET['porta']);
		 $list[]=$where;
    }

    if (isset($_GET['protocolo'])) {
       $where = new FilterWhere();       
		$where->setCollum('mqtt_config.protocolo');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['protocolo'].'%');
		$list[]=$where;
    }
    if (isset($_GET['result_topic_filter'])) {
       $where = new FilterWhere();       
		$where->setCollum('mqtt_config.result_topic_filter');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['result_topic_filter'].'%');
		$list[]=$where;
    }
    if (isset($_GET['server_topic'])) {
       $where = new FilterWhere();       
		$where->setCollum('mqtt_config.server_topic');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['server_topic'].'%');
		$list[]=$where;
    }
    if (isset($_GET['username'])) {
       $where = new FilterWhere();       
		$where->setCollum('mqtt_config.username');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['username'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $mqtt_configAdapter = new adapter\Mqtt_configAdapter($connection);
    $result = $mqtt_configAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Delete
 */
function remove()
{
    $mqtt_config = new dao\Mqtt_config();

    if (isset($_GET['id'])) {        
        $mqtt_config->setId($_GET['id']);
    }

    if (isset($_GET['client_id_prefix'])) {
        $mqtt_config->setClient_id_prefix($_GET['client_id_prefix']);
    }
    if (isset($_GET['command_timeout_seconds'])) {
        $mqtt_config->setCommand_timeout_seconds($_GET['command_timeout_seconds']);
    }

    if (isset($_GET['date_create'])) {
        $mqtt_config->setDate_create($_GET['date_create']);
    }
    if (isset($_GET['date_update'])) {
        $mqtt_config->setDate_update($_GET['date_update']);
    }
    if (isset($_GET['exec_topic_template'])) {
        $mqtt_config->setExec_topic_template($_GET['exec_topic_template']);
    }
    if (isset($_GET['host'])) {
        $mqtt_config->setHost($_GET['host']);
    }
    if (isset($_GET['password'])) {
        $mqtt_config->setPassword($_GET['password']);
    }
    if (isset($_GET['porta'])) {
        $mqtt_config->setPorta($_GET['porta']);
    }

    if (isset($_GET['protocolo'])) {
        $mqtt_config->setProtocolo($_GET['protocolo']);
    }
    if (isset($_GET['result_topic_filter'])) {
        $mqtt_config->setResult_topic_filter($_GET['result_topic_filter']);
    }
    if (isset($_GET['server_topic'])) {
        $mqtt_config->setServer_topic($_GET['server_topic']);
    }
    if (isset($_GET['username'])) {
        $mqtt_config->setUsername($_GET['username']);
    }
    $connection = new connection\Connection();
    $mqtt_configAdapter = new adapter\Mqtt_configAdapter($connection);
    $result = $mqtt_configAdapter->delete($mqtt_config);

    
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
 $mqtt_config = new dao\Mqtt_config();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['id'])) {        
        $mqtt_config->setId($post_vars['id']);
    }

    if (isset($post_vars['client_id_prefix'])) {
        $mqtt_config->setClient_id_prefix($post_vars['client_id_prefix']);
    }
    if (isset($post_vars['command_timeout_seconds'])) {
        $mqtt_config->setCommand_timeout_seconds($post_vars['command_timeout_seconds']);
    }

    if (isset($post_vars['date_create'])) {
        $mqtt_config->setDate_create($post_vars['date_create']);
    }
    if (isset($post_vars['date_update'])) {
        $mqtt_config->setDate_update($post_vars['date_update']);
    }
    if (isset($post_vars['exec_topic_template'])) {
        $mqtt_config->setExec_topic_template($post_vars['exec_topic_template']);
    }
    if (isset($post_vars['host'])) {
        $mqtt_config->setHost($post_vars['host']);
    }
    if (isset($post_vars['password'])) {
        $mqtt_config->setPassword($post_vars['password']);
    }
    if (isset($post_vars['porta'])) {
        $mqtt_config->setPorta($post_vars['porta']);
    }

    if (isset($post_vars['protocolo'])) {
        $mqtt_config->setProtocolo($post_vars['protocolo']);
    }
    if (isset($post_vars['result_topic_filter'])) {
        $mqtt_config->setResult_topic_filter($post_vars['result_topic_filter']);
    }
    if (isset($post_vars['server_topic'])) {
        $mqtt_config->setServer_topic($post_vars['server_topic']);
    }
    if (isset($post_vars['username'])) {
        $mqtt_config->setUsername($post_vars['username']);
    }
    $connection = new connection\Connection();
    $mqtt_configAdapter = new adapter\Mqtt_configAdapter($connection);
    $result = $mqtt_configAdapter->create($mqtt_config);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);

}

/**
 * Insert
 */
function create()
{
    $mqtt_config = new dao\Mqtt_config();

    if (isset($_REQUEST['id'])) {        
        $mqtt_config->setId($_REQUEST['id']);
    }

    if (isset($_REQUEST['client_id_prefix'])) {
        $mqtt_config->setClient_id_prefix($_REQUEST['client_id_prefix']);
    }
    if (isset($_REQUEST['command_timeout_seconds'])) {
        $mqtt_config->setCommand_timeout_seconds($_REQUEST['command_timeout_seconds']);
    }

    if (isset($_REQUEST['date_create'])) {
        $mqtt_config->setDate_create($_REQUEST['date_create']);
    }
    if (isset($_REQUEST['date_update'])) {
        $mqtt_config->setDate_update($_REQUEST['date_update']);
    }
    if (isset($_REQUEST['exec_topic_template'])) {
        $mqtt_config->setExec_topic_template($_REQUEST['exec_topic_template']);
    }
    if (isset($_REQUEST['host'])) {
        $mqtt_config->setHost($_REQUEST['host']);
    }
    if (isset($_REQUEST['password'])) {
        $mqtt_config->setPassword($_REQUEST['password']);
    }
    if (isset($_REQUEST['porta'])) {
        $mqtt_config->setPorta($_REQUEST['porta']);
    }

    if (isset($_REQUEST['protocolo'])) {
        $mqtt_config->setProtocolo($_REQUEST['protocolo']);
    }
    if (isset($_REQUEST['result_topic_filter'])) {
        $mqtt_config->setResult_topic_filter($_REQUEST['result_topic_filter']);
    }
    if (isset($_REQUEST['server_topic'])) {
        $mqtt_config->setServer_topic($_REQUEST['server_topic']);
    }
    if (isset($_REQUEST['username'])) {
        $mqtt_config->setUsername($_REQUEST['username']);
    }
    $connection = new connection\Connection();
    $mqtt_configAdapter = new adapter\Mqtt_configAdapter($connection);
    $result = $mqtt_configAdapter->create($mqtt_config);
        
    return json_encode($result, JSON_UNESCAPED_UNICODE);
       
}

?>