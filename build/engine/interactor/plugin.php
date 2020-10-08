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


    if (isset($_REQUEST['name'])) {

		$where = new FilterWhere();       
		$where->setCollum('plugin.name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['dl'])) {

		$where = new FilterWhere();       
		$where->setCollum('plugin.dl');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['dl'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $pluginAdapter = new adapter\PluginAdapter($connection);
    $result = $pluginAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['name'])) {
       $where = new FilterWhere();       
		$where->setCollum('plugin.name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['dl'])) {
       $where = new FilterWhere();       
		$where->setCollum('plugin.dl');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['dl'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $pluginAdapter = new adapter\PluginAdapter($connection);
    $result = $pluginAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $plugin = new dao\Plugin();

    if (isset($_GET['name'])) {
        $plugin->setName($_GET['name']);
    }
    if (isset($_GET['dl'])) {
        $plugin->setDl($_GET['dl']);
    }
    $connection = new connection\Connection();
    $pluginAdapter = new adapter\PluginAdapter($connection);
    $result = $pluginAdapter->delete($plugin);

    
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
 $plugin = new dao\Plugin();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['name'])) {
        $plugin->setName($post_vars['name']);
    }
    if (isset($post_vars['dl'])) {
        $plugin->setDl($post_vars['dl']);
    }
    $connection = new connection\Connection();
    $pluginAdapter = new adapter\PluginAdapter($connection);
    $result = $pluginAdapter->create($plugin);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $plugin = new dao\Plugin();

    if (isset($_REQUEST['name'])) {
        $plugin->setName($_REQUEST['name']);
    }
    if (isset($_REQUEST['dl'])) {
        $plugin->setDl($_REQUEST['dl']);
    }
    $connection = new connection\Connection();
    $pluginAdapter = new adapter\PluginAdapter($connection);
    $result = $pluginAdapter->create($plugin);
        
    return json_encode($result);
       
}

?>