<?php
//-----------------------CREATE_ADAPTER--------------------------------------

function createAdapters() {
    $tables = getAllTables();
    
    while ($table = $tables->fetch()) {
        
        $strHeader = "<?php
namespace engine\adapter;
";
        $strHeader = setUseAdapter($strHeader,"engine\dao\\".ucfirst($table[0]));
        $strHeader = setUseAdapter($strHeader,"engine\utils\FilterWhere");
        
        $str = "
class ".ucfirst($table[0])."Adapter {
			
    private \$connection;
    	
    public function __construct(\$connection) {
    	\$this->connection = \$connection;
    }
    
    /**
     * GetAll
     */
    public function getAll(\$where, \$orderColun, \$order, \$page, \$sizePage){
    	\$list".ucfirst($table[0])." = \$this->connection->getAll(\"".$table[0]."\", \$where, \$orderColun, \$order, \$page, \$sizePage);        
        \$list".ucfirst($table[0])."Result = Array(); 
    	
    	foreach (\$list".ucfirst($table[0])." as \$result){
            \$".$table[0]." = new ".ucfirst($table[0])."();            
         ";
           
            $coluns = getColum($table[0]);
                
            while ( $row = $coluns->fetch() ) {
                $control = true;
                
                $field = $row ['Field'];                
                
                $fks    = getFk($table[0]);
                
                while ( $fk = $fks->fetch() ) {
                    
                    if($field == $fk['coluna']){
                        $control = false;                        
                    }
                    
                }
                
                if($control){//CAMPO NORMAL
                    $str .= "

            //".strtoupper($row ['Field'])."
            \$".$table[0]."->set".ucfirst($row ['Field'])."(\$result['".$row ['Field']."']);"; //CAMPO NORMAL
                
                }else{//FK
                
                    $fkTable = getFkTable($table[0],$row ['Field']);
                    $tab = $fkTable->fetch();
                    
                    $str .= "
           if(\$result['".$row ['Field']."'] != null){
                //".strtoupper($row ['Field'])."
                \$".$tab['tabela_referencia']."Adapter = new ".ucfirst($tab['tabela_referencia'])."Adapter(\$this->connection);
				\$filter = new FilterWhere();
                \$filter->setCollum('".$tab["coluna_referencia"]."');
                \$filter->setValue(\$result['".$row ['Field']."']);
                \$list = Array(\$filter);                


                \$result".ucfirst($tab['tabela_referencia'])." = \$".$tab['tabela_referencia']."Adapter->getAll(\$list, \"\", \"\", 0, 0);
            	\$".$table[0]."->set".ucfirst($row ['Field'])."(\$result".ucfirst($tab['tabela_referencia'])."[0]);
                
           }
";
                    
                }
            }
            
            $str .= "
            \$list".ucfirst($table[0])."Result[] = \$".$table[0].";";
            
            $str .= "
        }
";
            $str .= "
        return \$list".ucfirst($table[0])."Result;";
            
            $str .= "
    }";
            $str .= "

    /**
     * Create
     */
    public function create(\$".$table[0].") {
        return \$this->connection->merge(\$".$table[0].");        
    }";
            
            $str .="

    /**
     * Delete
     */
    public function delete(\$".$table[0]."){
         return \$this->connection->delete(\$".$table[0].");
    }";
            
         $str .= "
}
?>";
        
        gravar("engine/adapter/".ucfirst($table[0])."Adapter.php", $strHeader.$str);
    }
}

function setUseAdapter($strHeader,$table) {
	
	if (strpos($strHeader, ucfirst($table)) !== false) {
		$strHeader = $strHeader;
	}else{
		$strHeader .= 'use '.$table.';
';
	}
	
	return $strHeader;
}




//-----------------------CREATE_ADAPTER--------------------------------------
?>