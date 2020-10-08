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


    if (isset($_REQUEST['host'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.host');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['host'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['db'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.db');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['db'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['user'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.user');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['user'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['select_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.select_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['select_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['insert_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.insert_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['insert_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['update_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.update_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['update_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['delete_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.delete_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['delete_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['create_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.create_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['create_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['drop_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.drop_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['drop_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['grant_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.grant_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['grant_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['references_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.references_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['references_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['index_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.index_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['index_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['alter_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.alter_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['alter_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['create_tmp_table_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.create_tmp_table_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['create_tmp_table_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['lock_tables_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.lock_tables_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['lock_tables_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['create_view_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.create_view_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['create_view_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['show_view_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.show_view_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['show_view_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['create_routine_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.create_routine_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['create_routine_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['alter_routine_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.alter_routine_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['alter_routine_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['execute_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.execute_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['execute_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['event_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.event_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['event_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['trigger_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.trigger_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['trigger_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['delete_history_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('db.delete_history_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['delete_history_priv'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $dbAdapter = new adapter\DbAdapter($connection);
    $result = $dbAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['host'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.host');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['host'].'%');
		$list[]=$where;
    }
    if (isset($_GET['db'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.db');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['db'].'%');
		$list[]=$where;
    }
    if (isset($_GET['user'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.user');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['user'].'%');
		$list[]=$where;
    }
    if (isset($_GET['select_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.select_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['select_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['insert_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.insert_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['insert_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['update_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.update_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['update_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['delete_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.delete_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['delete_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['create_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.create_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['create_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['drop_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.drop_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['drop_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['grant_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.grant_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['grant_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['references_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.references_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['references_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['index_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.index_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['index_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['alter_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.alter_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['alter_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['create_tmp_table_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.create_tmp_table_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['create_tmp_table_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['lock_tables_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.lock_tables_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['lock_tables_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['create_view_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.create_view_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['create_view_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['show_view_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.show_view_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['show_view_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['create_routine_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.create_routine_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['create_routine_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['alter_routine_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.alter_routine_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['alter_routine_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['execute_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.execute_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['execute_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['event_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.event_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['event_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['trigger_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.trigger_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['trigger_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['delete_history_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('db.delete_history_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['delete_history_priv'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $dbAdapter = new adapter\DbAdapter($connection);
    $result = $dbAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $db = new dao\Db();

    if (isset($_GET['host'])) {
        $db->setHost($_GET['host']);
    }
    if (isset($_GET['db'])) {
        $db->setDb($_GET['db']);
    }
    if (isset($_GET['user'])) {
        $db->setUser($_GET['user']);
    }
    if (isset($_GET['select_priv'])) {
        $db->setSelect_priv($_GET['select_priv']);
    }
    if (isset($_GET['insert_priv'])) {
        $db->setInsert_priv($_GET['insert_priv']);
    }
    if (isset($_GET['update_priv'])) {
        $db->setUpdate_priv($_GET['update_priv']);
    }
    if (isset($_GET['delete_priv'])) {
        $db->setDelete_priv($_GET['delete_priv']);
    }
    if (isset($_GET['create_priv'])) {
        $db->setCreate_priv($_GET['create_priv']);
    }
    if (isset($_GET['drop_priv'])) {
        $db->setDrop_priv($_GET['drop_priv']);
    }
    if (isset($_GET['grant_priv'])) {
        $db->setGrant_priv($_GET['grant_priv']);
    }
    if (isset($_GET['references_priv'])) {
        $db->setReferences_priv($_GET['references_priv']);
    }
    if (isset($_GET['index_priv'])) {
        $db->setIndex_priv($_GET['index_priv']);
    }
    if (isset($_GET['alter_priv'])) {
        $db->setAlter_priv($_GET['alter_priv']);
    }
    if (isset($_GET['create_tmp_table_priv'])) {
        $db->setCreate_tmp_table_priv($_GET['create_tmp_table_priv']);
    }
    if (isset($_GET['lock_tables_priv'])) {
        $db->setLock_tables_priv($_GET['lock_tables_priv']);
    }
    if (isset($_GET['create_view_priv'])) {
        $db->setCreate_view_priv($_GET['create_view_priv']);
    }
    if (isset($_GET['show_view_priv'])) {
        $db->setShow_view_priv($_GET['show_view_priv']);
    }
    if (isset($_GET['create_routine_priv'])) {
        $db->setCreate_routine_priv($_GET['create_routine_priv']);
    }
    if (isset($_GET['alter_routine_priv'])) {
        $db->setAlter_routine_priv($_GET['alter_routine_priv']);
    }
    if (isset($_GET['execute_priv'])) {
        $db->setExecute_priv($_GET['execute_priv']);
    }
    if (isset($_GET['event_priv'])) {
        $db->setEvent_priv($_GET['event_priv']);
    }
    if (isset($_GET['trigger_priv'])) {
        $db->setTrigger_priv($_GET['trigger_priv']);
    }
    if (isset($_GET['delete_history_priv'])) {
        $db->setDelete_history_priv($_GET['delete_history_priv']);
    }
    $connection = new connection\Connection();
    $dbAdapter = new adapter\DbAdapter($connection);
    $result = $dbAdapter->delete($db);

    
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
 $db = new dao\Db();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['host'])) {
        $db->setHost($post_vars['host']);
    }
    if (isset($post_vars['db'])) {
        $db->setDb($post_vars['db']);
    }
    if (isset($post_vars['user'])) {
        $db->setUser($post_vars['user']);
    }
    if (isset($post_vars['select_priv'])) {
        $db->setSelect_priv($post_vars['select_priv']);
    }
    if (isset($post_vars['insert_priv'])) {
        $db->setInsert_priv($post_vars['insert_priv']);
    }
    if (isset($post_vars['update_priv'])) {
        $db->setUpdate_priv($post_vars['update_priv']);
    }
    if (isset($post_vars['delete_priv'])) {
        $db->setDelete_priv($post_vars['delete_priv']);
    }
    if (isset($post_vars['create_priv'])) {
        $db->setCreate_priv($post_vars['create_priv']);
    }
    if (isset($post_vars['drop_priv'])) {
        $db->setDrop_priv($post_vars['drop_priv']);
    }
    if (isset($post_vars['grant_priv'])) {
        $db->setGrant_priv($post_vars['grant_priv']);
    }
    if (isset($post_vars['references_priv'])) {
        $db->setReferences_priv($post_vars['references_priv']);
    }
    if (isset($post_vars['index_priv'])) {
        $db->setIndex_priv($post_vars['index_priv']);
    }
    if (isset($post_vars['alter_priv'])) {
        $db->setAlter_priv($post_vars['alter_priv']);
    }
    if (isset($post_vars['create_tmp_table_priv'])) {
        $db->setCreate_tmp_table_priv($post_vars['create_tmp_table_priv']);
    }
    if (isset($post_vars['lock_tables_priv'])) {
        $db->setLock_tables_priv($post_vars['lock_tables_priv']);
    }
    if (isset($post_vars['create_view_priv'])) {
        $db->setCreate_view_priv($post_vars['create_view_priv']);
    }
    if (isset($post_vars['show_view_priv'])) {
        $db->setShow_view_priv($post_vars['show_view_priv']);
    }
    if (isset($post_vars['create_routine_priv'])) {
        $db->setCreate_routine_priv($post_vars['create_routine_priv']);
    }
    if (isset($post_vars['alter_routine_priv'])) {
        $db->setAlter_routine_priv($post_vars['alter_routine_priv']);
    }
    if (isset($post_vars['execute_priv'])) {
        $db->setExecute_priv($post_vars['execute_priv']);
    }
    if (isset($post_vars['event_priv'])) {
        $db->setEvent_priv($post_vars['event_priv']);
    }
    if (isset($post_vars['trigger_priv'])) {
        $db->setTrigger_priv($post_vars['trigger_priv']);
    }
    if (isset($post_vars['delete_history_priv'])) {
        $db->setDelete_history_priv($post_vars['delete_history_priv']);
    }
    $connection = new connection\Connection();
    $dbAdapter = new adapter\DbAdapter($connection);
    $result = $dbAdapter->create($db);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $db = new dao\Db();

    if (isset($_REQUEST['host'])) {
        $db->setHost($_REQUEST['host']);
    }
    if (isset($_REQUEST['db'])) {
        $db->setDb($_REQUEST['db']);
    }
    if (isset($_REQUEST['user'])) {
        $db->setUser($_REQUEST['user']);
    }
    if (isset($_REQUEST['select_priv'])) {
        $db->setSelect_priv($_REQUEST['select_priv']);
    }
    if (isset($_REQUEST['insert_priv'])) {
        $db->setInsert_priv($_REQUEST['insert_priv']);
    }
    if (isset($_REQUEST['update_priv'])) {
        $db->setUpdate_priv($_REQUEST['update_priv']);
    }
    if (isset($_REQUEST['delete_priv'])) {
        $db->setDelete_priv($_REQUEST['delete_priv']);
    }
    if (isset($_REQUEST['create_priv'])) {
        $db->setCreate_priv($_REQUEST['create_priv']);
    }
    if (isset($_REQUEST['drop_priv'])) {
        $db->setDrop_priv($_REQUEST['drop_priv']);
    }
    if (isset($_REQUEST['grant_priv'])) {
        $db->setGrant_priv($_REQUEST['grant_priv']);
    }
    if (isset($_REQUEST['references_priv'])) {
        $db->setReferences_priv($_REQUEST['references_priv']);
    }
    if (isset($_REQUEST['index_priv'])) {
        $db->setIndex_priv($_REQUEST['index_priv']);
    }
    if (isset($_REQUEST['alter_priv'])) {
        $db->setAlter_priv($_REQUEST['alter_priv']);
    }
    if (isset($_REQUEST['create_tmp_table_priv'])) {
        $db->setCreate_tmp_table_priv($_REQUEST['create_tmp_table_priv']);
    }
    if (isset($_REQUEST['lock_tables_priv'])) {
        $db->setLock_tables_priv($_REQUEST['lock_tables_priv']);
    }
    if (isset($_REQUEST['create_view_priv'])) {
        $db->setCreate_view_priv($_REQUEST['create_view_priv']);
    }
    if (isset($_REQUEST['show_view_priv'])) {
        $db->setShow_view_priv($_REQUEST['show_view_priv']);
    }
    if (isset($_REQUEST['create_routine_priv'])) {
        $db->setCreate_routine_priv($_REQUEST['create_routine_priv']);
    }
    if (isset($_REQUEST['alter_routine_priv'])) {
        $db->setAlter_routine_priv($_REQUEST['alter_routine_priv']);
    }
    if (isset($_REQUEST['execute_priv'])) {
        $db->setExecute_priv($_REQUEST['execute_priv']);
    }
    if (isset($_REQUEST['event_priv'])) {
        $db->setEvent_priv($_REQUEST['event_priv']);
    }
    if (isset($_REQUEST['trigger_priv'])) {
        $db->setTrigger_priv($_REQUEST['trigger_priv']);
    }
    if (isset($_REQUEST['delete_history_priv'])) {
        $db->setDelete_history_priv($_REQUEST['delete_history_priv']);
    }
    $connection = new connection\Connection();
    $dbAdapter = new adapter\DbAdapter($connection);
    $result = $dbAdapter->create($db);
        
    return json_encode($result);
       
}

?>