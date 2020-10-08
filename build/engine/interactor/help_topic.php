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

 
    if(isset($_REQUEST['help_topic_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('help_topic.help_topic_id');         
		 $where->setValue($_REQUEST['help_topic_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['name'])) {

		$where = new FilterWhere();       
		$where->setCollum('help_topic.name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['name'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['help_category_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('help_topic.help_category_id');         
		 $where->setValue($_REQUEST['help_category_id']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['description'])) {

		$where = new FilterWhere();       
		$where->setCollum('help_topic.description');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['description'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['example'])) {

		$where = new FilterWhere();       
		$where->setCollum('help_topic.example');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['example'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['url'])) {

		$where = new FilterWhere();       
		$where->setCollum('help_topic.url');
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
    $help_topicAdapter = new adapter\Help_topicAdapter($connection);
    $result = $help_topicAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['help_topic_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('help_topic.help_topic_id');         
		 $where->setValue($_GET['help_topic_id']);
		 $list[]=$where;
    }

    if (isset($_GET['name'])) {
       $where = new FilterWhere();       
		$where->setCollum('help_topic.name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['help_category_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('help_topic.help_category_id');         
		 $where->setValue($_GET['help_category_id']);
		 $list[]=$where;
    }

    if (isset($_GET['description'])) {
       $where = new FilterWhere();       
		$where->setCollum('help_topic.description');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['description'].'%');
		$list[]=$where;
    }
    if (isset($_GET['example'])) {
       $where = new FilterWhere();       
		$where->setCollum('help_topic.example');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['example'].'%');
		$list[]=$where;
    }
    if (isset($_GET['url'])) {
       $where = new FilterWhere();       
		$where->setCollum('help_topic.url');
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
    $help_topicAdapter = new adapter\Help_topicAdapter($connection);
    $result = $help_topicAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $help_topic = new dao\Help_topic();

    if (isset($_GET['help_topic_id'])) {
        $help_topic->setHelp_topic_id($_GET['help_topic_id']);
    }

    if (isset($_GET['name'])) {
        $help_topic->setName($_GET['name']);
    }
    if (isset($_GET['help_category_id'])) {
        $help_topic->setHelp_category_id($_GET['help_category_id']);
    }

    if (isset($_GET['description'])) {
        $help_topic->setDescription($_GET['description']);
    }
    if (isset($_GET['example'])) {
        $help_topic->setExample($_GET['example']);
    }
    if (isset($_GET['url'])) {
        $help_topic->setUrl($_GET['url']);
    }
    $connection = new connection\Connection();
    $help_topicAdapter = new adapter\Help_topicAdapter($connection);
    $result = $help_topicAdapter->delete($help_topic);

    
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
 $help_topic = new dao\Help_topic();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['help_topic_id'])) {
        $help_topic->setHelp_topic_id($post_vars['help_topic_id']);
    }

    if (isset($post_vars['name'])) {
        $help_topic->setName($post_vars['name']);
    }
    if (isset($post_vars['help_category_id'])) {
        $help_topic->setHelp_category_id($post_vars['help_category_id']);
    }

    if (isset($post_vars['description'])) {
        $help_topic->setDescription($post_vars['description']);
    }
    if (isset($post_vars['example'])) {
        $help_topic->setExample($post_vars['example']);
    }
    if (isset($post_vars['url'])) {
        $help_topic->setUrl($post_vars['url']);
    }
    $connection = new connection\Connection();
    $help_topicAdapter = new adapter\Help_topicAdapter($connection);
    $result = $help_topicAdapter->create($help_topic);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $help_topic = new dao\Help_topic();

    if (isset($_REQUEST['help_topic_id'])) {
        $help_topic->setHelp_topic_id($_REQUEST['help_topic_id']);
    }

    if (isset($_REQUEST['name'])) {
        $help_topic->setName($_REQUEST['name']);
    }
    if (isset($_REQUEST['help_category_id'])) {
        $help_topic->setHelp_category_id($_REQUEST['help_category_id']);
    }

    if (isset($_REQUEST['description'])) {
        $help_topic->setDescription($_REQUEST['description']);
    }
    if (isset($_REQUEST['example'])) {
        $help_topic->setExample($_REQUEST['example']);
    }
    if (isset($_REQUEST['url'])) {
        $help_topic->setUrl($_REQUEST['url']);
    }
    $connection = new connection\Connection();
    $help_topicAdapter = new adapter\Help_topicAdapter($connection);
    $result = $help_topicAdapter->create($help_topic);
        
    return json_encode($result);
       
}

?>