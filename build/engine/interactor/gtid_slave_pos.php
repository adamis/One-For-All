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

 
    if(isset($_REQUEST['domain_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('gtid_slave_pos.domain_id');         
		 $where->setValue($_REQUEST['domain_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['sub_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('gtid_slave_pos.sub_id');         
		 $where->setValue($_REQUEST['sub_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['server_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('gtid_slave_pos.server_id');         
		 $where->setValue($_REQUEST['server_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['seq_no'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('gtid_slave_pos.seq_no');         
		 $where->setValue($_REQUEST['seq_no']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $gtid_slave_posAdapter = new adapter\Gtid_slave_posAdapter($connection);
    $result = $gtid_slave_posAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['domain_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('gtid_slave_pos.domain_id');         
		 $where->setValue($_GET['domain_id']);
		 $list[]=$where;
    }

    if (isset($_GET['sub_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('gtid_slave_pos.sub_id');         
		 $where->setValue($_GET['sub_id']);
		 $list[]=$where;
    }

    if (isset($_GET['server_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('gtid_slave_pos.server_id');         
		 $where->setValue($_GET['server_id']);
		 $list[]=$where;
    }

    if (isset($_GET['seq_no'])) {
         $where = new FilterWhere();       
		 $where->setCollum('gtid_slave_pos.seq_no');         
		 $where->setValue($_GET['seq_no']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $gtid_slave_posAdapter = new adapter\Gtid_slave_posAdapter($connection);
    $result = $gtid_slave_posAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $gtid_slave_pos = new dao\Gtid_slave_pos();

    if (isset($_GET['domain_id'])) {
        $gtid_slave_pos->setDomain_id($_GET['domain_id']);
    }

    if (isset($_GET['sub_id'])) {
        $gtid_slave_pos->setSub_id($_GET['sub_id']);
    }

    if (isset($_GET['server_id'])) {
        $gtid_slave_pos->setServer_id($_GET['server_id']);
    }

    if (isset($_GET['seq_no'])) {
        $gtid_slave_pos->setSeq_no($_GET['seq_no']);
    }

    $connection = new connection\Connection();
    $gtid_slave_posAdapter = new adapter\Gtid_slave_posAdapter($connection);
    $result = $gtid_slave_posAdapter->delete($gtid_slave_pos);

    
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
 $gtid_slave_pos = new dao\Gtid_slave_pos();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['domain_id'])) {
        $gtid_slave_pos->setDomain_id($post_vars['domain_id']);
    }

    if (isset($post_vars['sub_id'])) {
        $gtid_slave_pos->setSub_id($post_vars['sub_id']);
    }

    if (isset($post_vars['server_id'])) {
        $gtid_slave_pos->setServer_id($post_vars['server_id']);
    }

    if (isset($post_vars['seq_no'])) {
        $gtid_slave_pos->setSeq_no($post_vars['seq_no']);
    }

    $connection = new connection\Connection();
    $gtid_slave_posAdapter = new adapter\Gtid_slave_posAdapter($connection);
    $result = $gtid_slave_posAdapter->create($gtid_slave_pos);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $gtid_slave_pos = new dao\Gtid_slave_pos();

    if (isset($_REQUEST['domain_id'])) {
        $gtid_slave_pos->setDomain_id($_REQUEST['domain_id']);
    }

    if (isset($_REQUEST['sub_id'])) {
        $gtid_slave_pos->setSub_id($_REQUEST['sub_id']);
    }

    if (isset($_REQUEST['server_id'])) {
        $gtid_slave_pos->setServer_id($_REQUEST['server_id']);
    }

    if (isset($_REQUEST['seq_no'])) {
        $gtid_slave_pos->setSeq_no($_REQUEST['seq_no']);
    }

    $connection = new connection\Connection();
    $gtid_slave_posAdapter = new adapter\Gtid_slave_posAdapter($connection);
    $result = $gtid_slave_posAdapter->create($gtid_slave_pos);
        
    return json_encode($result);
       
}

?>