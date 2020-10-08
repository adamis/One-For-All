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

 
    if(isset($_REQUEST['help_keyword_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('help_keyword.help_keyword_id');         
		 $where->setValue($_REQUEST['help_keyword_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['name'])) {

		$where = new FilterWhere();       
		$where->setCollum('help_keyword.name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['name'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $help_keywordAdapter = new adapter\Help_keywordAdapter($connection);
    $result = $help_keywordAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['help_keyword_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('help_keyword.help_keyword_id');         
		 $where->setValue($_GET['help_keyword_id']);
		 $list[]=$where;
    }

    if (isset($_GET['name'])) {
       $where = new FilterWhere();       
		$where->setCollum('help_keyword.name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['name'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $help_keywordAdapter = new adapter\Help_keywordAdapter($connection);
    $result = $help_keywordAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $help_keyword = new dao\Help_keyword();

    if (isset($_GET['help_keyword_id'])) {
        $help_keyword->setHelp_keyword_id($_GET['help_keyword_id']);
    }

    if (isset($_GET['name'])) {
        $help_keyword->setName($_GET['name']);
    }
    $connection = new connection\Connection();
    $help_keywordAdapter = new adapter\Help_keywordAdapter($connection);
    $result = $help_keywordAdapter->delete($help_keyword);

    
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
 $help_keyword = new dao\Help_keyword();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['help_keyword_id'])) {
        $help_keyword->setHelp_keyword_id($post_vars['help_keyword_id']);
    }

    if (isset($post_vars['name'])) {
        $help_keyword->setName($post_vars['name']);
    }
    $connection = new connection\Connection();
    $help_keywordAdapter = new adapter\Help_keywordAdapter($connection);
    $result = $help_keywordAdapter->create($help_keyword);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $help_keyword = new dao\Help_keyword();

    if (isset($_REQUEST['help_keyword_id'])) {
        $help_keyword->setHelp_keyword_id($_REQUEST['help_keyword_id']);
    }

    if (isset($_REQUEST['name'])) {
        $help_keyword->setName($_REQUEST['name']);
    }
    $connection = new connection\Connection();
    $help_keywordAdapter = new adapter\Help_keywordAdapter($connection);
    $result = $help_keywordAdapter->create($help_keyword);
        
    return json_encode($result);
       
}

?>