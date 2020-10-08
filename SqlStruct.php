<?php
//-----------------------SQL_STRUCT--------------------------------------

function getConection() {
    
	if(MAPPING_DATABASE == "TESTE"){
    	$pdo_ = new PDO ( 'mysql:dbname=' . BANCO_T . ';host=' . IP_T, USUARIO_T, SENHA_T);
    }else{
    	$pdo_ = new PDO ( 'mysql:dbname=' . BANCO . ';host=' . IP, USUARIO, SENHA );
    }
    
    $pdo_->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
    return $pdo_;
}

function getAllTables() {
    
    $pdo_ = getConection();
    $query = ' SHOW TABLES ';
    $sth = $pdo_->prepare($query);
    $sth->execute();
    
    return $sth;
}

function showColum($table) {
    
    $pdo_ = getConection();
    $query = 'SHOW COLUMNS FROM ' . (MAPPING_DATABASE =="TESTE"?BANCO_T:BANCO). '.' . $table;
    $sth = $pdo_->prepare( $query );
    $sth->execute ();
    
    return $sth;
}

function getFk($table) {
    $pdo_ = getConection();
    $query = 'select
				table_name as \'tabela\',
    			column_name as \'coluna\',
				referenced_table_name as \'tabela_referencia\' ,
    			referenced_column_name as \'coluna_referencia\'
			  from
    			information_schema.key_column_usage
			  where	TABLE_NAME = \'' . $table . '\'
			  AND 	referenced_table_name is not null';
        
    $sth = $pdo_->prepare( $query );
    $sth->execute();
    
    return $sth;
}

function getFkTable($table,$fk) {
    $pdo_ = getConection();
    $query = '
    SELECT
        table_name AS tabela,
        column_name AS coluna,
        referenced_table_name AS tabela_referencia,
        referenced_column_name AS coluna_referencia
    FROM
        information_schema.key_column_usage
    WHERE
        TABLE_NAME = \''.$table.'\'
    AND referenced_table_name IS NOT NULL
    AND column_name = \''.$fk.'\'';
    
    $sth = $pdo_->prepare( $query );
    $sth->execute();
    
    return $sth;
}

function getPrimaryKeys($table) {
    $pdo_ = getConection();
    $sql = 'SHOW KEYS FROM '. (MAPPING_DATABASE =="TESTE"?BANCO_T:BANCO). '.' . $table.'  WHERE Key_name = \'PRIMARY\'';  
    $sth = $pdo_->prepare( $sql );
    $sth->execute();
    
    return $sth;
}

function getColum($table) {
    
    $pdo_ = getConection();
    $query = 'SHOW COLUMNS FROM ' . (MAPPING_DATABASE =="TESTE"?BANCO_T:BANCO). '.' . $table;
    $sth = $pdo_->prepare( $query );
    $sth->execute();
    
    return $sth;    
}
//-----------------------SQL_STRUCT--------------------------------------
?>