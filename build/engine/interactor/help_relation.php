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
		 $where->setCollum('help_relation.help_topic_id');         
		 $where->setValue($_REQUEST['help_topic_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['help_keyword_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('help_relation.help_keyword_id');         
		 $where->setValue($_REQUEST['help_keyword_id']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $help_relationAdapter = new adapter\Help_relationAdapter($connection);
    $result = $help_relationAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		 $where->setCollum('help_relation.help_topic_id');         
		 $where->setValue($_GET['help_topic_id']);
		 $list[]=$where;
    }

    if (isset($_GET['help_keyword_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('help_relation.help_keyword_id');         
		 $where->setValue($_GET['help_keyword_id']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $help_relationAdapter = new adapter\Help_relationAdapter($connection);
    $result = $help_relationAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $help_relation = new dao\Help_relation();

    if (isset($_GET['help_topic_id'])) {
        $help_relation->setHelp_topic_id($_GET['help_topic_id']);
    }

    if (isset($_GET['help_keyword_id'])) {
        $help_relation->setHelp_keyword_id($_GET['help_keyword_id']);
    }

    $connection = new connection\Connection();
    $help_relationAdapter = new adapter\Help_relationAdapter($connection);
    $result = $help_relationAdapter->delete($help_relation);

    
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
 $help_relation = new dao\Help_relation();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['help_topic_id'])) {
        $help_relation->setHelp_topic_id($post_vars['help_topic_id']);
    }

    if (isset($post_vars['help_keyword_id'])) {
        $help_relation->setHelp_keyword_id($post_vars['help_keyword_id']);
    }

    $connection = new connection\Connection();
    $help_relationAdapter = new adapter\Help_relationAdapter($connection);
    $result = $help_relationAdapter->create($help_relation);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $help_relation = new dao\Help_relation();

    if (isset($_REQUEST['help_topic_id'])) {
        $help_relation->setHelp_topic_id($_REQUEST['help_topic_id']);
    }

    if (isset($_REQUEST['help_keyword_id'])) {
        $help_relation->setHelp_keyword_id($_REQUEST['help_keyword_id']);
    }

    $connection = new connection\Connection();
    $help_relationAdapter = new adapter\Help_relationAdapter($connection);
    $result = $help_relationAdapter->create($help_relation);
        
    return json_encode($result);
       
}

?>