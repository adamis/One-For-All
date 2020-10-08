<?php
namespace engine\adapter;
use engine\dao\Proc;
use engine\utils\FilterWhere;

class ProcAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listProc = $this->connection->getAll("proc", $where, $orderColun, $order, $page, $sizePage);        
        $listProcResult = Array(); 
    	
    	foreach ($listProc as $result){
            $proc = new Proc();            
         

            //DB
            $proc->setDb($result['db']);

            //NAME
            $proc->setName($result['name']);

            //TYPE
            $proc->setType($result['type']);

            //SPECIFIC_NAME
            $proc->setSpecific_name($result['specific_name']);

            //LANGUAGE
            $proc->setLanguage($result['language']);

            //SQL_DATA_ACCESS
            $proc->setSql_data_access($result['sql_data_access']);

            //IS_DETERMINISTIC
            $proc->setIs_deterministic($result['is_deterministic']);

            //SECURITY_TYPE
            $proc->setSecurity_type($result['security_type']);

            //PARAM_LIST
            $proc->setParam_list($result['param_list']);

            //RETURNS
            $proc->setReturns($result['returns']);

            //BODY
            $proc->setBody($result['body']);

            //DEFINER
            $proc->setDefiner($result['definer']);

            //CREATED
            $proc->setCreated($result['created']);

            //MODIFIED
            $proc->setModified($result['modified']);

            //SQL_MODE
            $proc->setSql_mode($result['sql_mode']);

            //COMMENT
            $proc->setComment($result['comment']);

            //CHARACTER_SET_CLIENT
            $proc->setCharacter_set_client($result['character_set_client']);

            //COLLATION_CONNECTION
            $proc->setCollation_connection($result['collation_connection']);

            //DB_COLLATION
            $proc->setDb_collation($result['db_collation']);

            //BODY_UTF8
            $proc->setBody_utf8($result['body_utf8']);

            //AGGREGATE
            $proc->setAggregate($result['aggregate']);
            $listProcResult[] = $proc;
        }

        return $listProcResult;
    }

    /**
     * Create
     */
    public function create($proc) {
        return $this->connection->merge($proc);        
    }

    /**
     * Delete
     */
    public function delete($proc){
         return $this->connection->delete($proc);
    }
}
?>