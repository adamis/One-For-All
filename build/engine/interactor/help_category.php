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

 
    if(isset($_REQUEST['help_category_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('help_category.help_category_id');         
		 $where->setValue($_REQUEST['help_category_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['name'])) {

		$where = new FilterWhere();       
		$where->setCollum('help_category.name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['name'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['parent_category_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('help_category.parent_category_id');         
		 $where->setValue($_REQUEST['parent_category_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['url'])) {

		$where = new FilterWhere();       
		$where->setCollum('help_category.url');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['url'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $help_categoryAdapter = new adapter\Help_categoryAdapter($connection);
    $result = $help_categoryAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['help_category_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('help_category.help_category_id');         
		 $where->setValue($_GET['help_category_id']);
		 $list[]=$where;
    }

    if (isset($_GET['name'])) {
       $where = new FilterWhere();       
		$where->setCollum('help_category.name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['parent_category_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('help_category.parent_category_id');         
		 $where->setValue($_GET['parent_category_id']);
		 $list[]=$where;
    }

    if (isset($_GET['url'])) {
       $where = new FilterWhere();       
		$where->setCollum('help_category.url');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['url'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $help_categoryAdapter = new adapter\Help_categoryAdapter($connection);
    $result = $help_categoryAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $help_category = new dao\Help_category();

    if (isset($_GET['help_category_id'])) {
        $help_category->setHelp_category_id($_GET['help_category_id']);
    }

    if (isset($_GET['name'])) {
        $help_category->setName($_GET['name']);
    }
    if (isset($_GET['parent_category_id'])) {
        $help_category->setParent_category_id($_GET['parent_category_id']);
    }

    if (isset($_GET['url'])) {
        $help_category->setUrl($_GET['url']);
    }
    $connection = new connection\Connection();
    $help_categoryAdapter = new adapter\Help_categoryAdapter($connection);
    $result = $help_categoryAdapter->delete($help_category);

    
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
 $help_category = new dao\Help_category();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['help_category_id'])) {
        $help_category->setHelp_category_id($post_vars['help_category_id']);
    }

    if (isset($post_vars['name'])) {
        $help_category->setName($post_vars['name']);
    }
    if (isset($post_vars['parent_category_id'])) {
        $help_category->setParent_category_id($post_vars['parent_category_id']);
    }

    if (isset($post_vars['url'])) {
        $help_category->setUrl($post_vars['url']);
    }
    $connection = new connection\Connection();
    $help_categoryAdapter = new adapter\Help_categoryAdapter($connection);
    $result = $help_categoryAdapter->create($help_category);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $help_category = new dao\Help_category();

    if (isset($_REQUEST['help_category_id'])) {
        $help_category->setHelp_category_id($_REQUEST['help_category_id']);
    }

    if (isset($_REQUEST['name'])) {
        $help_category->setName($_REQUEST['name']);
    }
    if (isset($_REQUEST['parent_category_id'])) {
        $help_category->setParent_category_id($_REQUEST['parent_category_id']);
    }

    if (isset($_REQUEST['url'])) {
        $help_category->setUrl($_REQUEST['url']);
    }
    $connection = new connection\Connection();
    $help_categoryAdapter = new adapter\Help_categoryAdapter($connection);
    $result = $help_categoryAdapter->create($help_category);
        
    return json_encode($result);
       
}

?>