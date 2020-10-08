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
		$where->setCollum('user.host');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['host'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['user'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.user');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['user'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['password'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.password');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['password'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['select_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.select_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['select_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['insert_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.insert_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['insert_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['update_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.update_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['update_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['delete_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.delete_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['delete_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['create_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.create_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['create_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['drop_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.drop_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['drop_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['reload_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.reload_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['reload_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['shutdown_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.shutdown_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['shutdown_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['process_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.process_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['process_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['file_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.file_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['file_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['grant_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.grant_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['grant_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['references_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.references_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['references_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['index_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.index_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['index_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['alter_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.alter_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['alter_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['show_db_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.show_db_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['show_db_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['super_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.super_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['super_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['create_tmp_table_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.create_tmp_table_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['create_tmp_table_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['lock_tables_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.lock_tables_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['lock_tables_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['execute_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.execute_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['execute_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['repl_slave_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.repl_slave_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['repl_slave_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['repl_client_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.repl_client_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['repl_client_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['create_view_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.create_view_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['create_view_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['show_view_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.show_view_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['show_view_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['create_routine_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.create_routine_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['create_routine_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['alter_routine_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.alter_routine_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['alter_routine_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['create_user_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.create_user_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['create_user_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['event_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.event_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['event_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['trigger_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.trigger_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['trigger_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['create_tablespace_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.create_tablespace_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['create_tablespace_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['delete_history_priv'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.delete_history_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['delete_history_priv'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['ssl_type'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.ssl_type');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['ssl_type'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['ssl_cipher'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.ssl_cipher');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['ssl_cipher'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['x509_issuer'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.x509_issuer');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['x509_issuer'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['x509_subject'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.x509_subject');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['x509_subject'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['max_questions'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('user.max_questions');         
		 $where->setValue($_REQUEST['max_questions']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['max_updates'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('user.max_updates');         
		 $where->setValue($_REQUEST['max_updates']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['max_connections'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('user.max_connections');         
		 $where->setValue($_REQUEST['max_connections']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['max_user_connections'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('user.max_user_connections');         
		 $where->setValue($_REQUEST['max_user_connections']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['plugin'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.plugin');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['plugin'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['authentication_string'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.authentication_string');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['authentication_string'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['password_expired'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.password_expired');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['password_expired'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['is_role'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.is_role');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['is_role'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['default_role'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.default_role');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['default_role'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['max_statement_time'])) {

		$where = new FilterWhere();       
		$where->setCollum('user.max_statement_time');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['max_statement_time'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $userAdapter = new adapter\UserAdapter($connection);
    $result = $userAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		$where->setCollum('user.host');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['host'].'%');
		$list[]=$where;
    }
    if (isset($_GET['user'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.user');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['user'].'%');
		$list[]=$where;
    }
    if (isset($_GET['password'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.password');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['password'].'%');
		$list[]=$where;
    }
    if (isset($_GET['select_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.select_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['select_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['insert_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.insert_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['insert_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['update_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.update_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['update_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['delete_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.delete_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['delete_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['create_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.create_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['create_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['drop_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.drop_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['drop_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['reload_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.reload_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['reload_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['shutdown_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.shutdown_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['shutdown_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['process_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.process_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['process_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['file_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.file_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['file_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['grant_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.grant_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['grant_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['references_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.references_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['references_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['index_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.index_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['index_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['alter_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.alter_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['alter_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['show_db_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.show_db_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['show_db_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['super_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.super_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['super_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['create_tmp_table_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.create_tmp_table_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['create_tmp_table_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['lock_tables_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.lock_tables_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['lock_tables_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['execute_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.execute_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['execute_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['repl_slave_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.repl_slave_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['repl_slave_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['repl_client_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.repl_client_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['repl_client_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['create_view_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.create_view_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['create_view_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['show_view_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.show_view_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['show_view_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['create_routine_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.create_routine_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['create_routine_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['alter_routine_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.alter_routine_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['alter_routine_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['create_user_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.create_user_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['create_user_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['event_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.event_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['event_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['trigger_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.trigger_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['trigger_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['create_tablespace_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.create_tablespace_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['create_tablespace_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['delete_history_priv'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.delete_history_priv');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['delete_history_priv'].'%');
		$list[]=$where;
    }
    if (isset($_GET['ssl_type'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.ssl_type');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['ssl_type'].'%');
		$list[]=$where;
    }
    if (isset($_GET['ssl_cipher'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.ssl_cipher');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['ssl_cipher'].'%');
		$list[]=$where;
    }
    if (isset($_GET['x509_issuer'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.x509_issuer');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['x509_issuer'].'%');
		$list[]=$where;
    }
    if (isset($_GET['x509_subject'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.x509_subject');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['x509_subject'].'%');
		$list[]=$where;
    }
    if (isset($_GET['max_questions'])) {
         $where = new FilterWhere();       
		 $where->setCollum('user.max_questions');         
		 $where->setValue($_GET['max_questions']);
		 $list[]=$where;
    }

    if (isset($_GET['max_updates'])) {
         $where = new FilterWhere();       
		 $where->setCollum('user.max_updates');         
		 $where->setValue($_GET['max_updates']);
		 $list[]=$where;
    }

    if (isset($_GET['max_connections'])) {
         $where = new FilterWhere();       
		 $where->setCollum('user.max_connections');         
		 $where->setValue($_GET['max_connections']);
		 $list[]=$where;
    }

    if (isset($_GET['max_user_connections'])) {
         $where = new FilterWhere();       
		 $where->setCollum('user.max_user_connections');         
		 $where->setValue($_GET['max_user_connections']);
		 $list[]=$where;
    }

    if (isset($_GET['plugin'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.plugin');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['plugin'].'%');
		$list[]=$where;
    }
    if (isset($_GET['authentication_string'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.authentication_string');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['authentication_string'].'%');
		$list[]=$where;
    }
    if (isset($_GET['password_expired'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.password_expired');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['password_expired'].'%');
		$list[]=$where;
    }
    if (isset($_GET['is_role'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.is_role');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['is_role'].'%');
		$list[]=$where;
    }
    if (isset($_GET['default_role'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.default_role');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['default_role'].'%');
		$list[]=$where;
    }
    if (isset($_GET['max_statement_time'])) {
       $where = new FilterWhere();       
		$where->setCollum('user.max_statement_time');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['max_statement_time'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $userAdapter = new adapter\UserAdapter($connection);
    $result = $userAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function remove()
{
    $user = new dao\User();

    if (isset($_GET['host'])) {
        $user->setHost($_GET['host']);
    }
    if (isset($_GET['user'])) {
        $user->setUser($_GET['user']);
    }
    if (isset($_GET['password'])) {
        $user->setPassword($_GET['password']);
    }
    if (isset($_GET['select_priv'])) {
        $user->setSelect_priv($_GET['select_priv']);
    }
    if (isset($_GET['insert_priv'])) {
        $user->setInsert_priv($_GET['insert_priv']);
    }
    if (isset($_GET['update_priv'])) {
        $user->setUpdate_priv($_GET['update_priv']);
    }
    if (isset($_GET['delete_priv'])) {
        $user->setDelete_priv($_GET['delete_priv']);
    }
    if (isset($_GET['create_priv'])) {
        $user->setCreate_priv($_GET['create_priv']);
    }
    if (isset($_GET['drop_priv'])) {
        $user->setDrop_priv($_GET['drop_priv']);
    }
    if (isset($_GET['reload_priv'])) {
        $user->setReload_priv($_GET['reload_priv']);
    }
    if (isset($_GET['shutdown_priv'])) {
        $user->setShutdown_priv($_GET['shutdown_priv']);
    }
    if (isset($_GET['process_priv'])) {
        $user->setProcess_priv($_GET['process_priv']);
    }
    if (isset($_GET['file_priv'])) {
        $user->setFile_priv($_GET['file_priv']);
    }
    if (isset($_GET['grant_priv'])) {
        $user->setGrant_priv($_GET['grant_priv']);
    }
    if (isset($_GET['references_priv'])) {
        $user->setReferences_priv($_GET['references_priv']);
    }
    if (isset($_GET['index_priv'])) {
        $user->setIndex_priv($_GET['index_priv']);
    }
    if (isset($_GET['alter_priv'])) {
        $user->setAlter_priv($_GET['alter_priv']);
    }
    if (isset($_GET['show_db_priv'])) {
        $user->setShow_db_priv($_GET['show_db_priv']);
    }
    if (isset($_GET['super_priv'])) {
        $user->setSuper_priv($_GET['super_priv']);
    }
    if (isset($_GET['create_tmp_table_priv'])) {
        $user->setCreate_tmp_table_priv($_GET['create_tmp_table_priv']);
    }
    if (isset($_GET['lock_tables_priv'])) {
        $user->setLock_tables_priv($_GET['lock_tables_priv']);
    }
    if (isset($_GET['execute_priv'])) {
        $user->setExecute_priv($_GET['execute_priv']);
    }
    if (isset($_GET['repl_slave_priv'])) {
        $user->setRepl_slave_priv($_GET['repl_slave_priv']);
    }
    if (isset($_GET['repl_client_priv'])) {
        $user->setRepl_client_priv($_GET['repl_client_priv']);
    }
    if (isset($_GET['create_view_priv'])) {
        $user->setCreate_view_priv($_GET['create_view_priv']);
    }
    if (isset($_GET['show_view_priv'])) {
        $user->setShow_view_priv($_GET['show_view_priv']);
    }
    if (isset($_GET['create_routine_priv'])) {
        $user->setCreate_routine_priv($_GET['create_routine_priv']);
    }
    if (isset($_GET['alter_routine_priv'])) {
        $user->setAlter_routine_priv($_GET['alter_routine_priv']);
    }
    if (isset($_GET['create_user_priv'])) {
        $user->setCreate_user_priv($_GET['create_user_priv']);
    }
    if (isset($_GET['event_priv'])) {
        $user->setEvent_priv($_GET['event_priv']);
    }
    if (isset($_GET['trigger_priv'])) {
        $user->setTrigger_priv($_GET['trigger_priv']);
    }
    if (isset($_GET['create_tablespace_priv'])) {
        $user->setCreate_tablespace_priv($_GET['create_tablespace_priv']);
    }
    if (isset($_GET['delete_history_priv'])) {
        $user->setDelete_history_priv($_GET['delete_history_priv']);
    }
    if (isset($_GET['ssl_type'])) {
        $user->setSsl_type($_GET['ssl_type']);
    }
    if (isset($_GET['ssl_cipher'])) {
        $user->setSsl_cipher($_GET['ssl_cipher']);
    }
    if (isset($_GET['x509_issuer'])) {
        $user->setX509_issuer($_GET['x509_issuer']);
    }
    if (isset($_GET['x509_subject'])) {
        $user->setX509_subject($_GET['x509_subject']);
    }
    if (isset($_GET['max_questions'])) {
        $user->setMax_questions($_GET['max_questions']);
    }

    if (isset($_GET['max_updates'])) {
        $user->setMax_updates($_GET['max_updates']);
    }

    if (isset($_GET['max_connections'])) {
        $user->setMax_connections($_GET['max_connections']);
    }

    if (isset($_GET['max_user_connections'])) {
        $user->setMax_user_connections($_GET['max_user_connections']);
    }

    if (isset($_GET['plugin'])) {
        $user->setPlugin($_GET['plugin']);
    }
    if (isset($_GET['authentication_string'])) {
        $user->setAuthentication_string($_GET['authentication_string']);
    }
    if (isset($_GET['password_expired'])) {
        $user->setPassword_expired($_GET['password_expired']);
    }
    if (isset($_GET['is_role'])) {
        $user->setIs_role($_GET['is_role']);
    }
    if (isset($_GET['default_role'])) {
        $user->setDefault_role($_GET['default_role']);
    }
    if (isset($_GET['max_statement_time'])) {
        $user->setMax_statement_time($_GET['max_statement_time']);
    }
    $connection = new connection\Connection();
    $userAdapter = new adapter\UserAdapter($connection);
    $result = $userAdapter->delete($user);

    
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
 $user = new dao\User();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['host'])) {
        $user->setHost($post_vars['host']);
    }
    if (isset($post_vars['user'])) {
        $user->setUser($post_vars['user']);
    }
    if (isset($post_vars['password'])) {
        $user->setPassword($post_vars['password']);
    }
    if (isset($post_vars['select_priv'])) {
        $user->setSelect_priv($post_vars['select_priv']);
    }
    if (isset($post_vars['insert_priv'])) {
        $user->setInsert_priv($post_vars['insert_priv']);
    }
    if (isset($post_vars['update_priv'])) {
        $user->setUpdate_priv($post_vars['update_priv']);
    }
    if (isset($post_vars['delete_priv'])) {
        $user->setDelete_priv($post_vars['delete_priv']);
    }
    if (isset($post_vars['create_priv'])) {
        $user->setCreate_priv($post_vars['create_priv']);
    }
    if (isset($post_vars['drop_priv'])) {
        $user->setDrop_priv($post_vars['drop_priv']);
    }
    if (isset($post_vars['reload_priv'])) {
        $user->setReload_priv($post_vars['reload_priv']);
    }
    if (isset($post_vars['shutdown_priv'])) {
        $user->setShutdown_priv($post_vars['shutdown_priv']);
    }
    if (isset($post_vars['process_priv'])) {
        $user->setProcess_priv($post_vars['process_priv']);
    }
    if (isset($post_vars['file_priv'])) {
        $user->setFile_priv($post_vars['file_priv']);
    }
    if (isset($post_vars['grant_priv'])) {
        $user->setGrant_priv($post_vars['grant_priv']);
    }
    if (isset($post_vars['references_priv'])) {
        $user->setReferences_priv($post_vars['references_priv']);
    }
    if (isset($post_vars['index_priv'])) {
        $user->setIndex_priv($post_vars['index_priv']);
    }
    if (isset($post_vars['alter_priv'])) {
        $user->setAlter_priv($post_vars['alter_priv']);
    }
    if (isset($post_vars['show_db_priv'])) {
        $user->setShow_db_priv($post_vars['show_db_priv']);
    }
    if (isset($post_vars['super_priv'])) {
        $user->setSuper_priv($post_vars['super_priv']);
    }
    if (isset($post_vars['create_tmp_table_priv'])) {
        $user->setCreate_tmp_table_priv($post_vars['create_tmp_table_priv']);
    }
    if (isset($post_vars['lock_tables_priv'])) {
        $user->setLock_tables_priv($post_vars['lock_tables_priv']);
    }
    if (isset($post_vars['execute_priv'])) {
        $user->setExecute_priv($post_vars['execute_priv']);
    }
    if (isset($post_vars['repl_slave_priv'])) {
        $user->setRepl_slave_priv($post_vars['repl_slave_priv']);
    }
    if (isset($post_vars['repl_client_priv'])) {
        $user->setRepl_client_priv($post_vars['repl_client_priv']);
    }
    if (isset($post_vars['create_view_priv'])) {
        $user->setCreate_view_priv($post_vars['create_view_priv']);
    }
    if (isset($post_vars['show_view_priv'])) {
        $user->setShow_view_priv($post_vars['show_view_priv']);
    }
    if (isset($post_vars['create_routine_priv'])) {
        $user->setCreate_routine_priv($post_vars['create_routine_priv']);
    }
    if (isset($post_vars['alter_routine_priv'])) {
        $user->setAlter_routine_priv($post_vars['alter_routine_priv']);
    }
    if (isset($post_vars['create_user_priv'])) {
        $user->setCreate_user_priv($post_vars['create_user_priv']);
    }
    if (isset($post_vars['event_priv'])) {
        $user->setEvent_priv($post_vars['event_priv']);
    }
    if (isset($post_vars['trigger_priv'])) {
        $user->setTrigger_priv($post_vars['trigger_priv']);
    }
    if (isset($post_vars['create_tablespace_priv'])) {
        $user->setCreate_tablespace_priv($post_vars['create_tablespace_priv']);
    }
    if (isset($post_vars['delete_history_priv'])) {
        $user->setDelete_history_priv($post_vars['delete_history_priv']);
    }
    if (isset($post_vars['ssl_type'])) {
        $user->setSsl_type($post_vars['ssl_type']);
    }
    if (isset($post_vars['ssl_cipher'])) {
        $user->setSsl_cipher($post_vars['ssl_cipher']);
    }
    if (isset($post_vars['x509_issuer'])) {
        $user->setX509_issuer($post_vars['x509_issuer']);
    }
    if (isset($post_vars['x509_subject'])) {
        $user->setX509_subject($post_vars['x509_subject']);
    }
    if (isset($post_vars['max_questions'])) {
        $user->setMax_questions($post_vars['max_questions']);
    }

    if (isset($post_vars['max_updates'])) {
        $user->setMax_updates($post_vars['max_updates']);
    }

    if (isset($post_vars['max_connections'])) {
        $user->setMax_connections($post_vars['max_connections']);
    }

    if (isset($post_vars['max_user_connections'])) {
        $user->setMax_user_connections($post_vars['max_user_connections']);
    }

    if (isset($post_vars['plugin'])) {
        $user->setPlugin($post_vars['plugin']);
    }
    if (isset($post_vars['authentication_string'])) {
        $user->setAuthentication_string($post_vars['authentication_string']);
    }
    if (isset($post_vars['password_expired'])) {
        $user->setPassword_expired($post_vars['password_expired']);
    }
    if (isset($post_vars['is_role'])) {
        $user->setIs_role($post_vars['is_role']);
    }
    if (isset($post_vars['default_role'])) {
        $user->setDefault_role($post_vars['default_role']);
    }
    if (isset($post_vars['max_statement_time'])) {
        $user->setMax_statement_time($post_vars['max_statement_time']);
    }
    $connection = new connection\Connection();
    $userAdapter = new adapter\UserAdapter($connection);
    $result = $userAdapter->create($user);
        
    return json_encode($result);

}

/**
 * Insert
 */
function create()
{
    $user = new dao\User();

    if (isset($_REQUEST['host'])) {
        $user->setHost($_REQUEST['host']);
    }
    if (isset($_REQUEST['user'])) {
        $user->setUser($_REQUEST['user']);
    }
    if (isset($_REQUEST['password'])) {
        $user->setPassword($_REQUEST['password']);
    }
    if (isset($_REQUEST['select_priv'])) {
        $user->setSelect_priv($_REQUEST['select_priv']);
    }
    if (isset($_REQUEST['insert_priv'])) {
        $user->setInsert_priv($_REQUEST['insert_priv']);
    }
    if (isset($_REQUEST['update_priv'])) {
        $user->setUpdate_priv($_REQUEST['update_priv']);
    }
    if (isset($_REQUEST['delete_priv'])) {
        $user->setDelete_priv($_REQUEST['delete_priv']);
    }
    if (isset($_REQUEST['create_priv'])) {
        $user->setCreate_priv($_REQUEST['create_priv']);
    }
    if (isset($_REQUEST['drop_priv'])) {
        $user->setDrop_priv($_REQUEST['drop_priv']);
    }
    if (isset($_REQUEST['reload_priv'])) {
        $user->setReload_priv($_REQUEST['reload_priv']);
    }
    if (isset($_REQUEST['shutdown_priv'])) {
        $user->setShutdown_priv($_REQUEST['shutdown_priv']);
    }
    if (isset($_REQUEST['process_priv'])) {
        $user->setProcess_priv($_REQUEST['process_priv']);
    }
    if (isset($_REQUEST['file_priv'])) {
        $user->setFile_priv($_REQUEST['file_priv']);
    }
    if (isset($_REQUEST['grant_priv'])) {
        $user->setGrant_priv($_REQUEST['grant_priv']);
    }
    if (isset($_REQUEST['references_priv'])) {
        $user->setReferences_priv($_REQUEST['references_priv']);
    }
    if (isset($_REQUEST['index_priv'])) {
        $user->setIndex_priv($_REQUEST['index_priv']);
    }
    if (isset($_REQUEST['alter_priv'])) {
        $user->setAlter_priv($_REQUEST['alter_priv']);
    }
    if (isset($_REQUEST['show_db_priv'])) {
        $user->setShow_db_priv($_REQUEST['show_db_priv']);
    }
    if (isset($_REQUEST['super_priv'])) {
        $user->setSuper_priv($_REQUEST['super_priv']);
    }
    if (isset($_REQUEST['create_tmp_table_priv'])) {
        $user->setCreate_tmp_table_priv($_REQUEST['create_tmp_table_priv']);
    }
    if (isset($_REQUEST['lock_tables_priv'])) {
        $user->setLock_tables_priv($_REQUEST['lock_tables_priv']);
    }
    if (isset($_REQUEST['execute_priv'])) {
        $user->setExecute_priv($_REQUEST['execute_priv']);
    }
    if (isset($_REQUEST['repl_slave_priv'])) {
        $user->setRepl_slave_priv($_REQUEST['repl_slave_priv']);
    }
    if (isset($_REQUEST['repl_client_priv'])) {
        $user->setRepl_client_priv($_REQUEST['repl_client_priv']);
    }
    if (isset($_REQUEST['create_view_priv'])) {
        $user->setCreate_view_priv($_REQUEST['create_view_priv']);
    }
    if (isset($_REQUEST['show_view_priv'])) {
        $user->setShow_view_priv($_REQUEST['show_view_priv']);
    }
    if (isset($_REQUEST['create_routine_priv'])) {
        $user->setCreate_routine_priv($_REQUEST['create_routine_priv']);
    }
    if (isset($_REQUEST['alter_routine_priv'])) {
        $user->setAlter_routine_priv($_REQUEST['alter_routine_priv']);
    }
    if (isset($_REQUEST['create_user_priv'])) {
        $user->setCreate_user_priv($_REQUEST['create_user_priv']);
    }
    if (isset($_REQUEST['event_priv'])) {
        $user->setEvent_priv($_REQUEST['event_priv']);
    }
    if (isset($_REQUEST['trigger_priv'])) {
        $user->setTrigger_priv($_REQUEST['trigger_priv']);
    }
    if (isset($_REQUEST['create_tablespace_priv'])) {
        $user->setCreate_tablespace_priv($_REQUEST['create_tablespace_priv']);
    }
    if (isset($_REQUEST['delete_history_priv'])) {
        $user->setDelete_history_priv($_REQUEST['delete_history_priv']);
    }
    if (isset($_REQUEST['ssl_type'])) {
        $user->setSsl_type($_REQUEST['ssl_type']);
    }
    if (isset($_REQUEST['ssl_cipher'])) {
        $user->setSsl_cipher($_REQUEST['ssl_cipher']);
    }
    if (isset($_REQUEST['x509_issuer'])) {
        $user->setX509_issuer($_REQUEST['x509_issuer']);
    }
    if (isset($_REQUEST['x509_subject'])) {
        $user->setX509_subject($_REQUEST['x509_subject']);
    }
    if (isset($_REQUEST['max_questions'])) {
        $user->setMax_questions($_REQUEST['max_questions']);
    }

    if (isset($_REQUEST['max_updates'])) {
        $user->setMax_updates($_REQUEST['max_updates']);
    }

    if (isset($_REQUEST['max_connections'])) {
        $user->setMax_connections($_REQUEST['max_connections']);
    }

    if (isset($_REQUEST['max_user_connections'])) {
        $user->setMax_user_connections($_REQUEST['max_user_connections']);
    }

    if (isset($_REQUEST['plugin'])) {
        $user->setPlugin($_REQUEST['plugin']);
    }
    if (isset($_REQUEST['authentication_string'])) {
        $user->setAuthentication_string($_REQUEST['authentication_string']);
    }
    if (isset($_REQUEST['password_expired'])) {
        $user->setPassword_expired($_REQUEST['password_expired']);
    }
    if (isset($_REQUEST['is_role'])) {
        $user->setIs_role($_REQUEST['is_role']);
    }
    if (isset($_REQUEST['default_role'])) {
        $user->setDefault_role($_REQUEST['default_role']);
    }
    if (isset($_REQUEST['max_statement_time'])) {
        $user->setMax_statement_time($_REQUEST['max_statement_time']);
    }
    $connection = new connection\Connection();
    $userAdapter = new adapter\UserAdapter($connection);
    $result = $userAdapter->create($user);
        
    return json_encode($result);
       
}

?>