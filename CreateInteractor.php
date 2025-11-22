<?php

//-----------------------CREATE_INTERACTOR--------------------------------------

function createInteractor() {
    $tables = getAllTables();
    
    while ($table = $tables->fetch()) {
        
        $strHeader = "<?php    
";
        $strHeader = setUseInteractor($strHeader, 'engine\dao');
        $strHeader = setUseInteractor($strHeader, 'engine\connection');
        $strHeader = setUseInteractor($strHeader, 'engine\model');
        $strHeader = setUseInteractor($strHeader, 'engine\utils\FilterWhere');
        $strHeader = setUseInteractor($strHeader, 'engine\utils\ResponseDelete');
        
        $str ="";
        
        $str .= "
/**
 * FindAll
 */
function find()
{
    \$where = new FilterWhere();
	\$page = 0;
	\$pageSize = 0;
	\$list = Array(); 

";
    $coluns = getColum($table[0]);
                
    while ( $row = $coluns->fetch() ) {
        if(strtolower($row['Field']) == 'id'){
            $str .= "
    if (isset(\$_REQUEST['".strtolower("id")."'])) {
		\$where = new FilterWhere();
		\$where->setCollum('".$table[0].".id');		
		\$where->setValue(\$_REQUEST['".strtolower("id")."']);
        \$list[]=\$where;
    }
";
        }else if(strpos($row['Type'], 'int') !== false){
            $str .= " 
    if(isset(\$_REQUEST['".strtolower($row['Field'])."'])) {
 
		 \$where = new FilterWhere();       
		 \$where->setCollum('".strtolower($table[0].".".$row['Field'])."');         
		 \$where->setValue(\$_REQUEST['".strtolower($row['Field'])."']);
		 \$list[]=\$where;

    }
";
        }else{
            $str .= "
    if (isset(\$_REQUEST['".strtolower($row['Field'])."'])) {

		\$where = new FilterWhere();       
		\$where->setCollum('".strtolower($table[0].".".$row['Field'])."');
        \$where->setCondition('like');
		\$where->setValue('%'.\$_REQUEST['".strtolower($row['Field'])."'].'%');
		\$list[]=\$where;
        
    }";
            
        }
    }
    		$str .= "

 	if (isset(\$_REQUEST['page'])) {
    	\$page = \$_REQUEST['page'];
    }
    if (isset(\$_REQUEST['pageSize'])) {
    	\$pageSize = \$_REQUEST['pageSize'];
    }
"; 
    
            $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Dao = new dao\\".ucfirst($table[0])."Dao(\$connection);
    \$result = \$".strtolower($table[0])."Dao->getAll(\$list, \"\", \"\", \$page, \$pageSize);
        
    return json_encode(\$result);
";
    
                $str .= "
}
";
        $str .= "
/**
 * Get
 */
function findAll()
{
    \$where = new FilterWhere();
	\$page = 0;
	\$pageSize = 0;
	\$list = Array();

";
        $coluns = getColum($table[0]);
        
        while ( $row = $coluns->fetch() ) {
            if(strtolower($row['Field']) == 'id'){
                $str .= "
    if (isset(\$_GET['".strtolower("id")."'])) {        
		\$where = new FilterWhere();
		\$where->setCollum('".$table[0].".id');
		\$where->setValue(\$_GET['".strtolower("id")."']);
        \$list[]=\$where;
    }
";
            }else if(strpos($row['Type'], 'int') !== false){
                $str .= "
    if (isset(\$_GET['".strtolower($row['Field'])."'])) {
         \$where = new FilterWhere();       
		 \$where->setCollum('".strtolower($table[0].".".$row['Field'])."');         
		 \$where->setValue(\$_GET['".strtolower($row['Field'])."']);
		 \$list[]=\$where;
    }
";
            }else{
                $str .= "
    if (isset(\$_GET['".strtolower($row['Field'])."'])) {
       \$where = new FilterWhere();       
		\$where->setCollum('".strtolower($table[0].".".$row['Field'])."');
        \$where->setCondition('like');
		\$where->setValue('%'.\$_GET['".strtolower($row['Field'])."'].'%');
		\$list[]=\$where;
    }";
                
            }
        }
        
        $str .= "
        		
 	if (isset(\$_REQUEST['page'])) {
    	\$page = \$_REQUEST['page'];
    }
    if (isset(\$_REQUEST['pageSize'])) {
    	\$pageSize = \$_REQUEST['pageSize'];
    }
"; 
        
        $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Dao = new dao\\".ucfirst($table[0])."Dao(\$connection);
    \$result = \$".strtolower($table[0])."Dao->getAll(\$list, \"\", \"\", \$page, \$pageSize);
        
    return json_encode(\$result);
";
        $str .= "
}
"; 

        $str .= "
/**
 * Delete
 */
function remove()
{
    \$".strtolower($table[0])." = new model\\".ucfirst($table[0])."();
";
    $coluns = getColum($table[0]);
                
    while ( $row = $coluns->fetch() ) {
        if(strtolower($row['Field']) == 'id'){
            $str .= "
    if (isset(\$_GET['".strtolower("id")."'])) {        
        \$".strtolower($table[0])."->setId(\$_GET['".strtolower("id")."']);
    }
";
        }else if(strpos($row['Type'], 'int') !== false){
            $str .= "
    if (isset(\$_GET['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$_GET['".strtolower($row['Field'])."']);
    }
";
        }else{
            $str .= "
    if (isset(\$_GET['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$_GET['".strtolower($row['Field'])."']);
    }";
            
        }
    }
    
   
    
    
    $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Dao = new dao\\".ucfirst($table[0])."Dao(\$connection);
    \$result = \$".strtolower($table[0])."Dao->delete(\$".strtolower($table[0]).");

    ";    
	$str .= "
	\$response = new ResponseDelete();
	\$response->setSize(\$result);
	if(\$result > 0){
		\$response->setStatus(true);
	}else{
		\$response->setStatus(false);
	}	
";
	$str .= "
    return json_encode(\$response);
";
    
    $str .= "
}
";
        $str .="
/**
 * Put
 */
function update()
{
 \$".strtolower($table[0])." = new model\\".ucfirst($table[0])."();
";
    $str .="
	\$post_vars = getParametersPUT();
	\$listKey = array(\"id\");	
	
	if(!validPut(\$listKey,\$post_vars)){
		http_response_code(400);
		return; 
	}";
    
    $coluns = getColum($table[0]);
                
    while ( $row = $coluns->fetch() ) {
        if(strtolower($row['Field']) == 'id'){
            $str .= "
    if (isset(\$post_vars['".strtolower("id")."'])) {        
        \$".strtolower($table[0])."->setId(\$post_vars['".strtolower("id")."']);
    }
";
        }else if(strpos($row['Type'], 'int') !== false){
            $str .= "
    if (isset(\$post_vars['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$post_vars['".strtolower($row['Field'])."']);
    }
";
        }else{
            $str .= "
    if (isset(\$post_vars['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$post_vars['".strtolower($row['Field'])."']);
    }";
            
        }
    }
    $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Dao = new dao\\".ucfirst($table[0])."Dao(\$connection);
    \$result = \$".strtolower($table[0])."Dao->create(\$".strtolower($table[0]).");
        
    return json_encode(\$result);
";
    
    $str .="
}
";
        
        $str .="
/**
 * Insert
 */
function create()
{
    \$".strtolower($table[0])." = new model\\".ucfirst($table[0])."();
";
    $coluns = getColum($table[0]);
                
    while ( $row = $coluns->fetch() ) {
        if(strtolower($row['Field']) == 'id'){
            $str .= "
    if (isset(\$_REQUEST['".strtolower("id")."'])) {        
        \$".strtolower($table[0])."->setId(\$_REQUEST['".strtolower("id")."']);
    }
";
        }else if(strpos($row['Type'], 'int') !== false){
            $str .= "
    if (isset(\$_REQUEST['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$_REQUEST['".strtolower($row['Field'])."']);
    }
";
        }else{
            $str .= "
    if (isset(\$_REQUEST['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$_REQUEST['".strtolower($row['Field'])."']);
    }";
            
        }
    }
    $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Dao = new dao\\".ucfirst($table[0])."Dao(\$connection);
    \$result = \$".strtolower($table[0])."Dao->create(\$".strtolower($table[0]).");
        
    return json_encode(\$result);
";
    
    $str .="       
}
";
        
        $str .= "
?>";
        gravar("engine/interactor/".strtolower($table[0]).".php", $strHeader.$str);
    }
}


function setUseInteractor($strHeader,$table) {
    
    if (strpos($strHeader, ucfirst($table)) !== false) {        
        $strHeader = $strHeader;
    }else{        
        $strHeader .= 'use '.$table.';
';
    }
    
    return $strHeader;
}

//-----------------------CREATE_INTERACTOR--------------------------------------

?>