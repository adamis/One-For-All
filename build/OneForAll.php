<?php
//--------------------------------DEFINES--------------------------------------
//ALTERE PARA GERAR SEU BACK-END

// NOME DA PASTA DO PROJETO
define ( "PROJECT",    "One-For-All/build" ); //ALTERE PARA O NOME DO PROJETO

// DADOS DE BANCO (OFFICIAL)
//define ( "BANCO"  , "oneforall" ); //ALTERE PARA O NOME DO SEU BANCO
//define ( "IP"     , "localhost"   ); //ALTERE O IP DO SEU SERVIDOR
//define ( "USUARIO", "root"        ); //ALTERE O USUARIO DO SEU SERVIDOR
//define ( "SENHA"  , ""            ); //ALTERE A SENHA DO SEU SERVIDOR

// DADOS DE BANCO (TESTE)
//define ( "BANCO_T"  , "oneforall" ); //ALTERE PARA O NOME DO SEU BANCO
//define ( "IP_T"     , "localhost"   ); //ALTERE O IP DO SEU SERVIDOR
//define ( "USUARIO_T", "root"        ); //ALTERE O USUARIO DO SEU SERVIDOR
//define ( "SENHA_T"  , ""            ); //ALTERE A SENHA DO SEU SERVIDOR

// DADOS DE BANCO (OFFICIAL)
define ( "BANCO"  , "oseasy-dev" ); //ALTERE PARA O NOME DO SEU BANCO
define ( "IP"     , "192.168.0.223"   ); //ALTERE O IP DO SEU SERVIDOR
define ( "USUARIO", "admin"        ); //ALTERE O USUARIO DO SEU SERVIDOR
define ( "SENHA"  , "Adamis1234@"            ); //ALTERE A SENHA DO SEU SERVIDOR

// DADOS DE BANCO (TESTE)
define ( "BANCO_T"  , "oseasy-dev" ); //ALTERE PARA O NOME DO SEU BANCO
define ( "IP_T"     , "192.168.0.223"   ); //ALTERE O IP DO SEU SERVIDOR
define ( "USUARIO_T", "admin"        ); //ALTERE O USUARIO DO SEU SERVIDOR
define ( "SENHA_T"  , "Adamis1234@"            ); //ALTERE A SENHA DO SEU SERVIDOR


define ( "MAPPING_DATABASE"  , "TESTE");

//-----------------------------------------------------------------------------------

// PASTAS DO PROJETO
define ( "FOLDER", 	   "engine" 			    );
define ( "DAO",        FOLDER . "/dao/" 	    );
define ( "CONNECTION", FOLDER . "/connection/" 	);
define ( "INTERACTOR", FOLDER . "/interactor/" 	);
define ( "MODEL", 	   FOLDER . "/model/" 		);
define ( "LIBS", 	   FOLDER . "/lib/" 		);
define ( "UTILS", 	   FOLDER . "/utils/" 		);
date_default_timezone_set ( "America/Sao_Paulo" );

//-----------------------DEFINES--------------------------------------
//-----------------------CREATE_FOLDER--------------------------------------
// Criando Folders
if (! file_exists ( FOLDER )) {
    mkdir ( FOLDER, 0777 );
}
if (! file_exists ( DAO )) {
    mkdir ( DAO, 0777 );
}
if (! file_exists ( CONNECTION )) {
    mkdir ( CONNECTION, 0777 );
}
if (! file_exists ( INTERACTOR )) {
    mkdir ( INTERACTOR, 0777 );
}
if (! file_exists ( MODEL )) {
    mkdir ( MODEL, 0777 );
}
if (! file_exists ( LIBS )) {
    mkdir ( LIBS, 0777 );
}
if (! file_exists ( UTILS )) {
    mkdir ( UTILS, 0777 );
}
//-----------------------CREATE_FOLDER-------------------------------------
// -----------------------CALLS--------------------------------------

if(!file_exists("index.php") && !file_exists("script.js")){
	
	callJs();
	callIndex();
	header("Location: index.php");
	
}else if (!isset ( $_GET ["method"] )) {
	echo "OK,Criando Barramento de Informações,barramento";
	
} else {
	
	if ($_GET ["method"] == "barramento") {		
		try {
			getBarramento();
			echo "OK,Criando Autoload,Autoload";
		} catch (Exception $e) {
			echo $e.",Criando Autoload,Autoload";
		}
		
	}
	
	if ($_GET ["method"] == "Autoload") {
		try {
			getAutoload ();
			echo "OK,Criando Configurações de Host,host";
		} catch (Exception $e) {
			echo $e.",Criando Configurações de Host,host";
		}
		
	}
	
	if ($_GET ["method"] == "host") {
		try {
			getHost ();
			echo "OK,Criando estrutra de resposta,response";
		} catch (Exception $e) {
			echo $e.",Criando estrutra de resposta,response";
		}
	}
	
	if ($_GET ["method"] == "response") {
		try {		
			getResponse ();
			echo "OK,Criando biblioteca ChromePHP,chromePhp";
		} catch (Exception $e) {
			echo $e.",Criando biblioteca ChromePHP,chromePhp";
		}
	}
	
	if ($_GET ["method"] == "chromePhp") {
		try {
			getChromePhp();
			echo "OK,Criando Filtros para Where,filterWhere";
		} catch (Exception $e) {
			echo $e.",Criando Filtros para Where,filterWhere";
		}
	}
	
	if ($_GET ["method"] == "filterWhere") {
		try {
			getFilterWhere();
			echo "OK,Criando arquivos de conexão,connection";
		} catch (Exception $e) {
			echo $e.",Criando arquivos de conexão,connection";
		}
	}
	
	if ($_GET ["method"] == "connection") {
		try {		
			getConnection();
			echo "OK,Criando arquivo de composição,composer";
		} catch (Exception $e) {
			echo $e.",Criando arquivo de composição,composer";
		}
	}
	
	if ($_GET ["method"] == "composer") {
		try {
			getComposer ();
			echo "OK,Criando Arquivo de Diretivas de Acesso,htacess";
		} catch (Exception $e) {
			echo $e.",Criando Arquivo de Diretivas de Acesso,htacess";
		}
		
	}
		
	if ($_GET ["method"] == "htacess") {
		try {			
			getHtAccess ();
			echo "OK,Criando Rotas,acls";		
		} catch (Exception $e) {
			echo $e.",Criando Rotas,acls";
		}
	}
	
	if ($_GET ["method"] == "acls") {
		try {		
			getAcls();
			echo "OK,Criando arquivos de Base,router";		
		} catch (Exception $e) {
			echo $e."Criando arquivos de Base,router";
		}
	}
	
	if ($_GET ["method"] == "router") {
		try {		
			getRouter ();
			echo "OK,Criando arquivos de Base,base";		
		} catch (Exception $e) {
			echo $e."Criando arquivos de Base,base";
		}
	}

	if ($_GET ["method"] == "base") {
		try {
			getBase ();
			echo "OK,Criando Models,createModel";
		} catch (Exception $e) {
			echo $e.",Criando Models,createModel";
		}
	}
	
	if ($_GET ["method"] == "createModel") {
		try {
			createModel ();
			echo "OK,Criando DAOs,createDao";
		} catch (Exception $e) {
			echo $e.",Criando DAOs,createDao";
		}
	}
	
	if ($_GET ["method"] == "createDao") {
		try {
			createDaos ();
			echo "OK,Criando Interactors,createInteractor";
		} catch (Exception $e) {
			echo $e.",Criando Interactors,createInteractor";
		}
	}
	
	if ($_GET ["method"] == "createInteractor") {
		try {
			createInteractor ();
			echo "OK,Finalizando Processamento,Fim";
		} catch (Exception $e) {
			echo $e.",Finalizando Processamento,Fim";
		}	
		unlink("script.js");
		unlink("index.php");
	}
	
	if ($_GET ["method"] == "Fim") {		
			echo "OK,Finalizado,stop";			
	}
	
	
}

// -----------------------CALLS------------------------------------- 

function callJs() {
	$str = "
window.onload = loading;

var cont = 0;

var urlHost;

function loading(){
	var temp = document.getElementById('urlLocal').innerHTML;
	urlHost = temp+\"OneForAll.php\";	
	service(urlHost,\"\");
}

function initRequest() {
	if (window.XMLHttpRequest) {
		if (navigator.userAgent.indexOf(\"MSIE\") != -1)
			isIE = true;

		return new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		isIE = true;

		try {   	
			return new ActiveXObject(\"Microsoft.XMLHTTP\");	
		} catch(e) {
			try {
				return new ActiveXObject(\"Msxml2.XMLHTTP\");
			} catch(e) { }
		}
	}
}

/**
 * Request for a service.
 *
 * @param {String} url

 */
function service(url,param) {	
	var request = initRequest();
	request.open(\"GET\", url+param, true);
	request.setRequestHeader(\"Content-Type\", 
	\"application/x-www-form-urlencoded; charset=UTF-8\");
	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {

			var respText = request.responseText;			
			var res = respText.split(\",\");
			
			var status = res[0];
			var txt    = res[1];
			var method = res[2];

			if(cont>0){
				var anterior = document.getElementById(cont-1);
				anterior.innerHTML = '<p class=\"accept\">&#10003</p>';
			}
			var table = document.getElementById(\"tableMain\");
			table.innerHTML = table.innerHTML+'<tr><td>'+txt+'</td><td id=\"'+cont+'\"><div class=\"loader\" ></div></td></tr>';

			if (method == 'Fim') {
				
				var anterior = document.getElementById(cont);
				anterior.innerHTML = '<p class=\"accept\">&#10003</p>';
				
				var response = document.getElementById(\"tableMain\");
				response.innerHTML = table.innerHTML+'<tr><td>Finalizado</td><td><p class=\"accept\">&#10003</p></td></tr>';			
				response.innerHTML = table.innerHTML+'<tr><td>Acessar Barramento</td><td><a href=\"barramento.php\">AQUI</a></td></tr>';

				setTimeout(function () {					
					window.open('barramento.php', '_blank');
				}, 2000); //will call the function after 2 secs.

			} else {
				if(status == 'OK'){
					service(urlHost+\"?method=\",method);
				}else{
					var error = document.getElementById('error');
					error.innerHTML = ''+status;
				}
			} 

			cont++;
		}
	};
	request.send();
}";
	
	gravar("script.js", $str);
	
}

function callIndex() {
	$str = "
<?php

echo '<html lang=\"pt-br\">';

echo '<head>';
echo '<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">';
echo '<meta http-equiv=\"content-language\" content=\"pt-br\">';
echo '<meta name=\"title\" content=\"OneForAll\">';

echo '<style>
		 td{
			padding-left:32px;
		 }
		.loader {
		  border: 4px solid #f3f3f3;
		  border-radius: 50%;
		  border-top: 4px solid #3498db;
		  width: 20px;
		  height: 20px;
		  -webkit-animation: spin 2s linear infinite; /* Safari */
		  animation: spin 2s linear infinite;
		}
		
		/* Safari */
		@-webkit-keyframes spin {
		  0% { -webkit-transform: rotate(0deg); }
		  100% { -webkit-transform: rotate(360deg); }
		}
		
		@keyframes spin {
		  0% { transform: rotate(0deg); }
		  100% { transform: rotate(360deg); }
		}
		.accept{
			color: green;    
	    	font-size: 24px;
	    	font-weight: bold;
		}
	
		.nameOne{
			text-align:center; 
			font-weight: bold; 
			font-size: 30px;
    		vertical-align: middle;
		}
		
		p{
			margin:0;
		}
		.copiart{
			text-align:center; 
			font-weight: bold;
		}
		</style>';

echo '<script charset=\"UTF-8\" src=\"script.js\"></script>';

echo '</head>';

echo '<body>';

/* \$project = \$_SERVER ['HTTP_HOST'] .\"/\". explode('/', \$_SERVER['REQUEST_URI'])[1].\"/\"; */

\$project = str_replace('index.php','',\$_SERVER['HTTP_HOST'].\$_SERVER['REQUEST_URI']);
//echo \$project;

echo '<div id=\"urlLocal\" style=\"display:none;\">http://' . \$project . '</div>';
echo '<p class=\"nameOne\"><img src=\"https://adamis.com.br/oru_maito.png\" height=64 >OneForAll Framework</p>';

echo '<p class=\"copiart\">Build 1.0 22/11/2025 15:42:21</p>';
echo '<br>';
echo '<table id=\"tableMain\"></table>';
echo '<p id=\"redir\"></p>';
echo '<p class=\"copiart\">Adamis © 2018 OneForAll</p>';
echo '<div id=\"error\"></div>';

echo '</body>';

echo '</html>';
?>";
	
	gravar("index.php", $str);
}
//-----------------------CREATE_DAO--------------------------------------

function createDaos() {
    $tables = getAllTables();
    
    while ($tableRow = $tables->fetch()) {
        // Compatibilidade PHP 8: extrair nome da tabela
        $table = [is_array($tableRow) ? array_values($tableRow)[0] : $tableRow];
        
        $strHeader = "<?php
namespace engine\dao;
";
        $strHeader = setUseDao($strHeader,"engine\model\\".ucfirst($table[0]));
        $strHeader = setUseDao($strHeader,"engine\utils\FilterWhere");
        
        $str = "
class ".ucfirst($table[0])."Dao {
			
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
                \$".$tab['tabela_referencia']."Dao = new ".ucfirst($tab['tabela_referencia'])."Dao(\$this->connection);
				\$filter = new FilterWhere();
                \$filter->setCollum('".$tab["coluna_referencia"]."');
                \$filter->setValue(\$result['".$row ['Field']."']);
                \$list = Array(\$filter);                


                \$result".ucfirst($tab['tabela_referencia'])." = \$".$tab['tabela_referencia']."Dao->getAll(\$list, \"\", \"\", 0, 0);
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
        
        gravar("engine/dao/".ucfirst($table[0])."Dao.php", $strHeader.$str);
    }
}

function setUseDao($strHeader,$table) {
	
	if (strpos($strHeader, ucfirst($table)) !== false) {
		$strHeader = $strHeader;
	}else{
		$strHeader .= 'use '.$table.';
';
	}
	
	return $strHeader;
}




//-----------------------CREATE_DAO-------------------------------------

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
//-----------------------CREATE_MODELS--------------------------------------
function createModel()
{
    $tables = getAllTables();

    while ($tableRow = $tables->fetch()) {
        // Compatibilidade PHP 8: extrair nome da tabela
        $table = [is_array($tableRow) ? array_values($tableRow)[0] : $tableRow];

        $str = "<?php
    namespace engine\model;
   		
    class " . ucfirst($table[0]) . " implements \JsonSerializable {
";

        $str .= montaColunasModel($table[0]);
        $str .= montaPrimarys($table[0]);
        $str .= getSerializer($table[0]);
        $str .= montaGetSetModel($table[0]);
        $str .= '
	}
?>';
        gravar("engine/model/".ucfirst($table[0]).".php", $str);
    }
}

function montaColunasModel($table) {
    $sth = getColum($table);
    
    $arrayColl = '';    
    while ( $row = $sth->fetch() ) {
        $arrayColl .= '
		private $' . $row ['Field'] . ';';
    }
    
    return $arrayColl;
}

function montaPrimarys($table) {
    
    $sth = getPrimaryKeys( $table );
    $cont = 1;
    
    $construct = '
';
    $construct .= '
		public function getKeys() {';
    $construct .= '
			return [';
    
    $size = $sth->rowCount();
    
    while ( $row = $sth->fetch() ) {        
        $construct .= "
				'" . $row ['Column_name'] . '\' =>$this->get' . ucfirst ( $row ['Column_name'] ) . "()";
        
        if ($cont < $size) {
            $construct .= ",";
        }
        
        $cont ++;
    }
    
    $construct .= '
			];';
    $construct .= "
		}";
    return $construct;
}

function getSerializer($table) {
    $sth = getColum( $table );
    $cont = 1;
    
    $construct = '
';
    $construct .= '
		public function jsonSerialize() {';
    $construct .= '
			return [';
    
    $size = $sth->rowCount ();
    
    while ( $row = $sth->fetch () ) {
        
        $construct .= "
				'" . $row ['Field'] . '\' =>$this->get' . ucfirst ( $row ['Field'] ) . "()";
        
        if ($cont < $size) {
            $construct .= ",";
        }
        
        $cont ++;
    }

    
    $construct .= '
			];';
    $construct .= "
		}";
    return $construct;
}

function montaGetSetModel($table) {
    $colunas = getColum($table);
    
    $StringGetSet = '
			';
    
    while ( $row = $colunas->fetch () ) {
        
        $StringGetSet .= '
		//' . strtoupper ( $row ['Field'] );
        
        $StringGetSet .= '
		function get' . ucfirst ( $row ['Field'] ) . '() {
			' . 'return $this->' . $row ['Field'] . ';
		}';
        $StringGetSet .= '
		function set' . ucfirst ( $row ['Field'] ) . '($' . $row ['Field'] . ') {
			' . 'return $this->' . $row ['Field'] . ' = $' . $row ['Field'] . ';
		}';
        
        $StringGetSet .= '
		';
    }
    
    return $StringGetSet;
}
//-----------------------CREATE_MODELS------------------------------------
//-----------------------RESOURCES--------------------------------------

function getAutoload()
{
    $str = "<?php
        spl_autoload_register(function (\$class) {
            require __DIR__ . \"/\" . str_replace(\"\\\\\", \"/\", \$class) . \".php\";
        });
?>";

    gravar("Autoload.php", $str);
}

function getBarramento()
{
    $str = 
'<?php
    include_once \'Autoload.php\';
    use engine\Acl;
?>
<!doctype html>
<html lang="pt-br">
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Barramento</h5>  
                <p class="card-text">
                    Todas as suas apis serão listadas aqui!
                    <br>
                    <span style="font-size: 10px; font-weight: bold;">Build 1.0 22/11/2025 15:42:21</span>
                </p>                 
            </div>
        </div>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <style>       

            /*the container must be positioned relative:*/
            .custom-select {
            position: relative;
            font-family: Arial;
            }

            .custom-select select {
            display: none; /*hide original SELECT element:*/
            }

            .select-selected {
            background-color: DodgerBlue;
            }

            /*style the arrow inside the select element:*/
            .select-selected:after {
            position: absolute;
            content: "";
            top: 14px;
            right: 10px;
            width: 0;
            height: 0;
            border: 6px solid transparent;
            border-color: #fff transparent transparent transparent;
            }

            /*point the arrow upwards when the select box is open (active):*/
            .select-selected.select-arrow-active:after {
            border-color: transparent transparent #fff transparent;
            top: 7px;
            }

            /*style the items (options), including the selected item:*/
            .select-items div,.select-selected {
            color: #ffffff;
            padding: 8px 16px;
            border: 1px solid transparent;
            border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
            cursor: pointer;
            user-select: none;
            }

            /*style items (options):*/
            .select-items {
            position: absolute;
            background-color: DodgerBlue;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 99;
            }

            /*hide the items when the select box is closed:*/
            .select-hide {
            display: none;
            }

            .select-items div:hover, .same-as-selected {
            background-color: rgba(0, 0, 0, 0.1);
            }

            pre {
                background-color: ghostwhite;
                border: 1px solid silver;
                padding: 10px 20px;
                margin: 20px; 
            }
            .json-key {
                color: brown;
            }
            .json-value {
                color: navy;
            }
            .json-string {
                color: olive;
            }


            table {
                margin-bottom: 0px !important;   
                border-spacing: 0 !important;   
            }

            .titles{
                background-color: #212529;
                color:white;                
            }

            .coluna1{
                background-color: #f5f5f5;                
                color:gray;                
            }
            .coluna2{
                background-color: #ffffff;                
                color:gray;   
                text-decoration: none;           
            }
            .formstyle {
                background-color: #ffffff;                
                padding: 10px;
                float:left; 
                border:solid 1px #bdbdbd; 
                border-radius:4px;
            }
            .shadow { 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 8px 16px 0 rgba(0, 0, 0, 0.16); 
            }
            .btnColapse {
                margin: 10px 0;
            }
            .btnDefault {
                margin-top: 10px;
                margin-bottom: 10px;
            }


        </style>


<?php

    $acls = new Acl();
    $permission =  $acls->getAcls();
    
    $tempName = "";
    $script = "";

    $arrTemp = Array();
    $cont = 0;
    $host = str_replace(\'barramento.php\',\'\',$_SERVER[\'HTTP_HOST\'].$_SERVER[\'REQUEST_URI\']);
    $host = str_replace(\'barramento\',\'\',$host).\'api/\';

    foreach($permission as $item) { //foreach element in $arr        
        if($tempName != $item[2]){            
            $tempName = $item[2];            
            $arrTemp[$cont]= \'http://\'.$host.$item[2];
            $cont++;
        }
    }
    
    $cont = 0;

    foreach ($arrTemp as $temp) {
        echo \'<div  class="table-responsive" style="padding:20px 20px; float:left;">\';
            echo \'<div class="table-responsive shadow" style="background-color: #212529; float:left; border:solid 1px #bdbdbd; border-radius:4px;">\';
                echo \'<table class="table" >\';

                    echo \'<tr>\';
                        echo \'<td  colspan="10" class="titles">\';
                            echo $temp;
                        echo \'</td>\';    
                    echo \'</tr>\';
            
                    $th = \'\';
                    $th .= \'<th scope="col">\';
                        $th .= \'Type:\';
                    $th .= \'</th>\';

                    $td = \'\';
                    $td .= \'<td scope="row">\';
                        $td .= \'Função:\';
                    $td .=  \'</td>\';    

                    foreach ($permission as $key) {
                        if((\'http://\'.$host.$key[2]) == $temp){                

                                $th .= \'<th scope="col">\';
                                    $th .= \'\'.$key[0];
                                $th .= \'</th>\';

                                $td .= \'<td >\';
                                    $td .=  "<a title=\'http://".$host.$key[2].\'/\'.$key[1]."\' target=\'_blank\' href=\'http://".$host.$key[2].\'/\'.$key[1]."\'>".$key[1]."</a>";
                                $td .=  \'</td>\';    

                        }            
                    }

                   
                    echo \'<tr class="coluna1">\';
                        echo strtoupper($th);
                    echo \'</tr>\';
                    
                    echo \'<tr class="coluna2">\';
                        echo $td;
                    echo \'</tr>\';        

                echo \'</table>\';                
            echo \'</div>\';

?>
            <a id="toggleBtn<?=$cont?>" class="btn btn-primary btnColapse" data-toggle="collapse" href="#collapseForm<?=$cont?>" role="button" aria-expanded="false" aria-controls="collapseForm<?=$cont?>">
                Testar(+)
            </a>            


            <div id="collapseForm<?=$cont?>" class="collapse table-responsive shadow formstyle">
                    
                    <form id="gz-form<?=$cont?>">

                        <div class="form-group">
                                                        
                            <label for="exampleInputEmail1">Função:</label>                            
                            <select>
<?php
                            foreach ($permission as $key) {
                                if((\'http://\'.$host.$key[2]) == $temp){                
                                    echo \'<option value="\'.$key[0].\':\'.$key[1].\'" >\'.$key[1].\'</option>\';
                                }            
                            }
?>                            
                            </select>
                            <small id="emailHelp" class="form-text text-muted">Selecione a função que deseja testar!</small>    

                        </div>
                        

                        <div id="add<?=$cont?>">
                            <div id="group0" class="form-group">
                                
                                <div class="form-row">
                                    
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Chave">
                                    </div>

                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Valor">
                                    </div>
                                    
                                    <div onclick="deleteParam(\'0\')" class="btn btn-outline-danger" style="margin-right:10px;">Remover</div>
                                    
                                </div>

                            </div>
                        </div>
                            
                        <div class="form-group btnDefault">
                            <div onclick="addParam(<?=$cont?>)" class="btn btn-success">Adicionar</div>
<?php
                            foreach ($permission as $key) {
                                if((\'http://\'.$host.$key[2]) == $temp){
                                 echo \'<div onclick="exec(\\\'\'.$host.$key[2].\'/\\\',\'.$cont.\')" class="btn btn-primary">Executar</div>\';
                                 break;
                                }
                            }
?>                            
                        </div>                        
                        
                    </form>

                    <form id="formTextArea<?=$cont?>">
                        <div class="form-group">
                            <label for="formControlTextArea<?=$cont?>">Result:</label>
                            <label id="label<?=$cont?>" for="formControlTextArea<?=$cont?>">-</label>                            
                            <pre style="height:180px; overflow:auto;"><code id="formControlTextArea<?=$cont?>" rows="10"></code></pre>                            
                        </div>
                    </form>
            </div>

        </div>

 <?php   
    $script .= \'
        $(\\\'#collapseForm\'.$cont.\'\\\').on(\\\'show.bs.collapse\\\', function () {        
            document.getElementById(\\\'toggleBtn\'.$cont.\'\\\').innerHTML=\\\'Testar(-)\\\';
        });

        $(\\\'#collapseForm\'.$cont.\'\\\').on(\\\'hidden.bs.collapse\\\', function () {        
            document.getElementById(\\\'toggleBtn\'.$cont.\'\\\').innerHTML=\\\'Testar(+)\\\';
        });
                
\';

        $cont++;
    }
?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
    <script src="https://wtag.com.br/res/js/jsmin-1.0.0.js"></script>

    <script type="text/javascript">
        <?php echo $script; ?>

        //-------------- FUNÇÕES AUXILIARES --------------------------
        function gI(id) { return document.getElementById(id); }
        function gL(obj) { return obj.length; }
        function gY(obj) { return obj.type; }
        function gC(obj) { return obj.className; }
        function gV(obj) { return obj.value; }
        function gH(obj) { return obj.innerHTML; }
        //-------------- FIM FUNÇÕES AUXILIARES --------------------------

        //-------------- PRETTY --------------------------
        if (!library)
        var library = {};

        library.json = {
        replacer: function(match, pIndent, pKey, pVal, pEnd) {
            var key = \'<span class=json-key>\';
            var val = \'<span class=json-value>\';
            var str = \'<span class=json-string>\';
            var r = pIndent || \'\';
            if (pKey)
                r = r + key + pKey.replace(/[": ]/g, \'\') + \'</span>: \';
            if (pVal)
                r = r + (pVal[0] == \'"\' ? str : val) + pVal + \'</span>\';
            return r + (pEnd || \'\');
            },
        prettyPrint: function(obj) {
            var jsonLine = /^( *)("[\w]+": )?("[^"]*"|[\w.+-]*)?([,[{])?$/mg;
            return JSON.stringify(obj, null, 3)
                .replace(/&/g, \'&amp;\').replace(/\\\"/g, \'&quot;\')
                .replace(/</g, \'&lt;\').replace(/>/g, \'&gt;\')
                .replace(jsonLine, library.json.replacer);
            }
        };
        //-------------- FIM PRETTY --------------------------


        var contControl = new Array();

        function addParam(id) {
            console.log(contControl);
            contControl[id] = (contControl[id] == null)?1:contControl[id]; 
            
            var div = document.getElementById(\'add\'+id);
            //div.innerHTML= div.innerHTML+
            $("#add"+id).append(
            \'<div id="group\'+contControl[id]+\'" class="form-group"> \'+
                \'<div class="form-row"> \'+
                    
                    \'<div class="col"> \'+
                        \'<input type="text" class="form-control" placeholder="Chave"> \'+
                    \'</div> \'+

                    \'<div class="col"> \'+
                        \'<input type="text" class="form-control" placeholder="Valor"> \'+                        
                    \'</div> \'+
                    
                    \'<div onclick="deleteParam(\'+contControl[id]+\')" class="btn btn-outline-danger">Remover</div>\'+
                    
                \'</div> \'+
            \'</div>\');

            contControl[id] = contControl[id]+1;
        }

        function deleteParam(groupId) {
            var node = document.getElementById(\'group\'+groupId);
            if (node.parentNode) {
                node.parentNode.removeChild(node);
            }
        }

        function exec(url,idForm) {
            var type;
            var funcName;
            var params ="";
                        
            var result = getForm(idForm).split(\'<gz>\');

            for (let index = 0; index < result.length;index++) {
                if(index == 0){
                    var func = result[index].split(\':\');
                    type = func[0];
                    funcName = func[1];

                }else{

                    if(index%2 == 1){                        
                        params += result[index];                         
                    }else{                        
                        params += "="+result[index]; 
                        
                        if(index+1 != result.length){
                            params += "&";
                        }
                    }
                    
                }                
            }           
            //alert(params);

            if(type == \'GET\'){
                request(type,"http://"+url+funcName +"?"+ params, null, \'resultconsole\',idForm);            
            }else{
                request(type,"http://"+url+funcName, params, \'resultconsole\',idForm);            
            }
            

        }

        function resultconsole(msg,status,idForm){
            //alert(status+": "+msg+" - "+idForm);
            
            var div = document.getElementById(\'label\'+idForm);
            div.innerHTML = status;
            
            var textArea = document.getElementById(\'formControlTextArea\'+idForm);
            //textArea.html(library.json.prettyPrint(msg));
            //var jsonPretty = JSON.stringify(JSON.parse(msg),null,2); 
            if(status == 200){
                textArea.innerHTML = library.json.prettyPrint(JSON.parse(msg));
            }else{
                textArea.innerHTML = msg;
            }
            
        }

        function request(method, url, object, callback,idForm) {
            var request = new XMLHttpRequest();
            request.open(method, url, true);			
            request.setRequestHeader("Accept-Language", "pt-BR");
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
            request.onreadystatechange = function() {
                if (request.readyState == 4 && (request.status == 200 || request.status == 300)) {
                    
                        if (callback != null) {                            
                            eval(callback + "(\'" + request.responseText + "\',\'"+request.status+"\',\'"+idForm+"\')");
                        }
                    
                } else if (request.readyState == 4 && request.status == 400) {
                    try {                                            
                        eval(callback + "(\'" + request.responseText + "\',\'"+request.status+"\',\'"+idForm+"\')");
                    } catch (error) {
                        console.log(error);
                        eval(callback + "(\'{\"erro\":\""+error+"\"}\',\'"+request.status+"\',\'"+idForm+"\')");
                    }
                } else if (request.readyState == 4 && request.status == 500) {
                    if (callback != null) {
                        eval(callback + "(\'Internal Server Error\',\'"+request.status+"\',\'"+idForm+"\')");
                    } else {
                        alert("500 Internal Server Error");
                    }
                } else if (request.readyState == 4 && (request.status == 404 || request.status == 501)) {
                    if (callback != null) {
                        eval(callback + "(\'Not Implemented\',\'"+request.status+"\',\'"+idForm+"\')");
                    } else {
                        alert("501 Not Implemented");
                    }
                } else if (request.readyState == 4 && request.status == 502) {
                    if (callback != null) {
                        eval(callback + "(\'Bad Gateway\',\'"+request.status+"\',\'"+idForm+"\')");
                    } else {
                        alert("502 Bad Gateway");
                    }
                } else if (request.readyState == 4 && (request.status == 0 || request.status == 503)) {
                    if (callback != null) {
                        eval(callback + "(\'Service Unavailable\',\'"+request.status+"\',\'"+idForm+"\')");
                    } else {
                        alert("503 Service Unavailable");
                    }
                } else if (request.readyState == 4 && request.status == 504) {
                    if (callback != null) {                        
                        eval(callback + "(\'Gateway Timeout\',\'"+request.status+"\',\'"+idForm+"\')");
                    } else {
                        alert("504 Gateway Timeout");
                    }
                } else if (request.readyState == 4 && request.status == 505) {
                    if (callback != null) {
                        eval(callback + "(\'HTTP Version Not Supported\',\'"+request.status+"\',\'"+idForm+"\')");
                    } else {
                        alert("505 HTTP Version Not Supported");
                    }
                }
            };
            var data = "";
            if (method == "POST" || method == "PUT") {
                data = object;//"request=" + JSON.stringify(object);
            }
            request.send(data);
        }

        function getForm(idForm) {
            var one = true;
            var option = true;
            var get = "";
            var repeat = false;

            if (gI("gz-form"+idForm) != undefined) {
                var fields = gI("gz-form"+idForm);
                
                for (var i = 0; i < gL(fields); i++) {
                    if (gY(fields.elements[i]) != "submit") {
                        if (i == 0 || repeat) {
                            repeat = false;

                            if (gY(fields.elements[i]) == "checkbox") 
                                get = fields.elements[i].checked;
                            else {
                                if (gC(fields.elements[i]).indexOf("gz-option") > 0) {
                                    var options = fields.elements[i].options;
                                    
                                    for (var j = 0; j < options.length; j++) {
                                        option = false;
                                        
                                        if (j == 0)
                                            get = options[j].value;
                                        else
                                            get += "<,>" + options[j].value;
                                    }
                                } else {
                                    if (gY(fields.elements[i]) == "textarea") {
                                        /*
                                        * @see nicEdit.js
                                        */	
                                        var textStyle = document.getElementsByClassName("nicEdit-main");
                                        
                                        if (gH(textStyle[0]) != undefined)
                                            get = gH(textStyle[0]);			
                                        else {
                                            var normalized_enters = gV(fields.elements[i]).replace(/\r|\n/g, "\r\n");
                                            var text_with_br = normalized_enters.replace(/\r\n/g, "<br />");
                                            
                                            get = (gL(gV(fields.elements[i])) == 0) ? 
                                                    "null" : text_with_br;
                                        }
                                    } else {
                                        if (gC(fields.elements[i]).includes("gz-datalist-") > 0) {
                                            var datalist = gC(fields.elements[i]).split("gz-datalist-")[1];
                                            for (var j = 0; j < gI(datalist.split("-to-")[0]).options.length; j++) {
                                                if (gI(datalist.split("-to-")[0]).options[j].value == 
                                                        document.getElementsByName(datalist.split("-to-")[1])[0].value) {
                                                    get = gI(datalist.split("-to-")[0]).options[j].getAttribute("data-id");
                                                    j = gI(datalist.split("-to-")[0]).options.length;
                                                }
                                            }
                                        } else if (gY(fields.elements[i]) == "file")
                                            repeat = true;
                                        else			
                                            get = (gL(gV(fields.elements[i])) == 0) ? 
                                                    "null" : gV(fields.elements[i]);
                                    }
                                }
                            }
                        } else {
                            if (gY(fields.elements[i]) == "checkbox") 
                                get += "<gz>" + fields.elements[i].checked;
                            else {
                                if (gC(fields.elements[i]).indexOf("gz-option") > 0) {
                                    var options = fields.elements[i].options;
                                    
                                    for (var j = 0; j < options.length; j++) {
                                        if (option)
                                            get += options[j].value;
                                        else
                                            get += "<,>" + options[j].value;
                                    }
                                } else {	
                                    if (gY(fields.elements[i]) == "textarea") {
                                        /*
                                        * @see nicEdit.js
                                        */
                                        var textStyle = document.getElementsByClassName("nicEdit-main");

                                        if (gH(textStyle[0]) != undefined)
                                            get += "<gz>" + gH(textStyle[0]);				
                                        else {
                                            var normalized_enters = gV(fields.elements[i]).replace(/\r|\n/g, "\r\n");
                                            var text_with_br = normalized_enters.replace(/\r\n/g, "<br />");
                                            
                                            get += "<gz>" + 
                                                    ((gL(gV(fields.elements[i])) == 0) 
                                                    ? "null" : text_with_br);
                                        }
                                    } else {
                                        if (gC(fields.elements[i]).includes("gz-datalist-") > 0) {
                                            var datalist = gC(fields.elements[i]).split("gz-datalist-")[1];
                                            for (var j = 0; j < gI(datalist.split("-to-")[0]).options.length; j++) {
                                                if (gI(datalist.split("-to-")[0]).options[j].value == 
                                                        document.getElementsByName(datalist.split("-to-")[1])[0].value) {
                                                    if (get != "") {
                                                        get += "<gz>" + gI(datalist.split("-to-")[0]).options[j].getAttribute("data-id");
                                                    } else {	
                                                        get += gI(datalist.split("-to-")[0]).options[j].getAttribute("data-id");
                                                    }
                                                    j = gI(datalist.split("-to-")[0]).options.length;
                                                }
                                            }
                                        } else if (gY(fields.elements[i]) != "file") {
                                            if (get != "") {
                                                one = false;
                                                
                                                get += "<gz>" + 
                                                        ((gL(gV(fields.elements[i])) == 0) 
                                                        ? "null" : gV(fields.elements[i]));
                                            } else {
                                                one = true;
                                                
                                                get += ((gL(gV(fields.elements[i])) == 0) 
                                                        ? "null" : gV(fields.elements[i]));	
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            if (one)
                get += "<gz>";
                
            return get;
        }
    </script>

</html>';

    gravar("barramento.php", $str);
}

function getHost() {
    $str = "<?php
namespace engine;

class Hosts{
    
    private \$oficial   = false;   
    private \$showDebug = false; 
    private \$banco   = \"\";
    private \$ip      = \"\";
    private \$usuario = \"\";
    private \$senha   = \"\";
    private \$folder  = \"\";
    
    
    function __construct() {
        if(\$this->oficial){
            \$this->banco   = \"".BANCO."\";
            \$this->ip      = \"".IP."\";
            \$this->usuario = \"".USUARIO."\";
            \$this->senha   = \"".SENHA."\";
        }else{
            \$this->banco   = \"".BANCO_T."\";
            \$this->ip      = \"".IP_T."\";
            \$this->usuario = \"".USUARIO_T."\";
            \$this->senha   = \"".SENHA_T."\";
        }
    }
    
    
    function getBanco()
    {
        return \$this->banco;
        
    }

    function getIp()
    { 
        return \$this->ip;
        
    }
    
    function getUsuario()
    {
        return \$this->usuario;
        
    }

    function getSenha()
    {
        return \$this->senha;
    }

    function getShowDebug()
    {
        return \$this->showDebug;
    }
}
?>";
    
    gravar(FOLDER."/Hosts.php", $str);
}

function getConnection() {
    $str = 
"<?php
namespace engine\connection;
        
use engine;
use engine\utils\FilterWhere;
use engine\lib\ChromePhp;
        
class Connection{
        
    private \$pdo_ = null;
    private \$bancoName;
    private \$showcaseSQL;
        
        
    function __construct()
    {
        \$this->pdo_ = \$this->getConnect();
    }
        
    /**
     * Metodo SQL de INSERT
     *
     * @param \$object =
     *            Objeto de dados contendo colunas e valores
     * @return \$object
     */
    private function insert(\$object)
    {
        \$id = null;
        
        \$pieces = explode('\\\', get_class(\$object));
        \$nameTable = \$pieces[sizeof(\$pieces) - 1];
        //TO LOWER
        \$nameTable = strtolower(\$nameTable);
        
        \$campos = '';
        \$valores = '';
        \$sql = '';
        
        
        \$json = json_decode(json_encode(\$object), true);
        \$jsonKeys = array_keys(\$json);
        \$jsonData = array_values(\$json);
        
        \$virgula = '';
        \$aspas = '';
        
        for (\$i = 0; \$i < sizeof(\$jsonKeys); \$i ++) {
            if (\$i > 0) {
                \$virgula = ',';
            } else {
                \$virgula = '';
            }
        
            \$campos .= (\$virgula . \$jsonKeys[\$i]);
        
            if (strcasecmp('string', gettype(\$jsonData[\$i])) == 0) {
                \$aspas = '\\'';
            } else {
                \$aspas = '';
            }
        
            if (\$jsonData[\$i] == null) {
                \$valores .= (\$virgula . 'null');
            } else {
                \$valores .= (\$virgula . \$aspas . \$jsonData[\$i] . \$aspas);
            }
        }
        
        // Concatena todas as variaveis e finaliza a instrucao
        \$sql .= 'INSERT INTO `' . \$this->bancoName . '`.`' . \$nameTable . '` (' . \$campos . ')VALUES(' . \$valores . ')';
        
        \$this->showCase(\$sql);
        
        
        \$this->beginConnection();
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();
        \$id = \$this->pdo_->lastInsertId();
        \$this->commitConection();
        
        
        return \$id;
    }
        
    /**
     * Mï¿½todo SQL de UPDATE
     *
     * @param \$object =
     *            Objeto de dados contendo colunas e valores
     * @return OBJECT
     */
    private function update(\$object)
    {
        \$pieces = explode('\\\', get_class(\$object));
        \$nameTable = \$pieces[sizeof(\$pieces) - 1];
        
        
        //TO LOWER
        \$nameTable = strtolower(\$nameTable);
        
        \$set = '';
        \$sql = '';
        
        
        \$json = json_decode(json_encode(\$object), true);
        \$jsonKeys = array_keys(\$json);
        \$jsonData = array_values(\$json);
        
        \$virgula = '';
        \$aspas = '';
        \$where = '';
        \$id = null;
        
        for (\$i = 0; \$i < sizeof(\$jsonKeys); \$i ++) {
            if (\$i > 0) {
                \$virgula = ',';
            } else {
                \$virgula = '';
            }
        
            \$dados = '';
            if (\$jsonData[\$i] == null) {
                \$dados = 'null';
            } else {
                \$dados = \$jsonData[\$i];
            }
        
            if (strcasecmp('string', gettype(\$jsonData[\$i])) == 0) {
                \$aspas = '\\'';
            } else {
                \$aspas = '';
            }
        
            if (strcasecmp('id', \$jsonKeys[\$i]) == 0) {
                \$where = 'id=' . \$jsonData[\$i];
                \$id = \$jsonData[\$i];
            }
        
            \$set .= (\$virgula . \$jsonKeys[\$i] . '=' . \$aspas . \$dados . \$aspas);
        }
        
        // Concatena todas as variaveis e finaliza a instrucao
        \$sql .= ' UPDATE `' . \$this->bancoName . '`.`' . \$nameTable . '`';
        \$sql .= ' SET ' . \$set;
        \$sql .= ' WHERE ' . \$where;
        
        \$this->showCase(\$sql);
        
        \$this->beginConnection();
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();
        \$resultAfected = \$sth->rowCount();
        \$this->commitConection();
        
        return \$id;
    }
        
    /**
     * Metodo SQL de DELETE
     *
     * @param \$object =
     *            Objeto de dados contendo colunas e valores
     * @return \$object
     */
    function delete(\$object)
    {
        \$pieces = explode(DIRECTORY_SEPARATOR, get_class(\$object));
        \$nameTable = \$pieces[sizeof(\$pieces) - 1];
        
        \$sql = '';
        \$where = '';
        
        \$tempjson = json_encode(\$object);
        \$json = json_decode(\$tempjson, true);
        
        \$jsonKeys = array_keys(\$json);
        \$jsonData = array_values(\$json);
        
        \$resultSize = 0;
        
        for (\$i = 0; \$i < sizeof(\$jsonKeys); \$i ++) {
            if (strcasecmp('id', \$jsonKeys[\$i]) == 0) {
                \$where = 'id=' . \$jsonData[\$i];
                \$resultSize = \$jsonData[\$i];
            }
        }
        
        // Concatena todas as variaveis e finaliza a instrucao
        \$sql .= ' DELETE FROM `' . \$this->bancoName . '`.`' . \$nameTable . '`';
        \$sql .= ' WHERE ' . \$where;
        
        \$this->showCase(\$sql);
        
        \$this->beginConnection();
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();  
        \$resultSize= \$sth->rowCount();
        \$this->commitConection();
        
        return \$resultSize;
    }
        
    /**
     * Persist Object Informations
     *
     * @param
     *            \$object
     */
    function persist(\$object)
    {
        return \$this->insert(\$object);
    }
        
    function merge(\$object)
    {
    	\$listWhere = Array();
    	\$pieces = \"\";
    	\$nameTable = \"\";
    	\$tempjson = \"\";
    	\$json = \"\";
    	\$jsonData = \"\";
    	\$list = null;
    	\$id = 0;
    	
        \$pieces = explode('\\\', get_class(\$object));
        
        \$nameTable = \$pieces[sizeof(\$pieces) - 1];
        //TO LOWER
        \$nameTable = strtolower(\$nameTable);
        
        \$tempjson = json_encode(\$object);
        
        \$json = json_decode(\$tempjson, true);
        
        \$jsonData = array_values(\$json);
        
        \$list = \$object->getKeys();
        
        
        if (\$list != null) {
        
            // //PRIMARY KEYS
            \$listKeys = array_keys(\$list);
        
            // //WHERE            
            
            \$anding = '';
        
            for (\$i = 0; \$i < sizeof(\$listKeys); \$i ++) {
        
                if(\$jsonData[\$i] != null){
                	\$where = new FilterWhere();
                	\$where->setCollum(\$listKeys[\$i]);
                	\$where->setValue(\$jsonData[\$i]);
                	\$listWhere[] = \$where;
                }
        
            }        
            
            if(sizeof(\$listWhere)>0){
        
                \$orderColun = '';
        
                \$result = \$this->getAll(\$nameTable, \$listWhere, \$orderColun, true, 0, 0);
                
                if (sizeof(\$result) > 0) {
        
                	\$id = \$this->update(\$object);
                } else {
        
                	\$id = \$this->insert(\$object);
                }
            }else{
            	\$id = \$this->insert(\$object);
            }
        } else {
        	\$id = \$this->insert(\$object);
        }        
        
        return \$this->getAll(\$nameTable, \$listWhere, \$orderColun, true, 0, 0);
                
    }
        
    /**
     * /**
     * Método SQL de SELECT
     *
     * @param String \$table
     * @param FilterWhere \$where
     * @param String \$orderColun
     * @param boolean \$order
     *            == (true -> 'ASC' or false-> 'DESC')
     * @return array object
     */
    function getAll(\$table, \$where, \$orderColun, \$order = true, \$page, \$sizePage)
    {   
        \$table = strtolower(\$table);
        \$lista = \$this->showColum(\$table);
        
        
        \$coluns = '';
        \$virgula = '';
        \$cont = 0;
        
        while (\$row = \$lista->fetch()) {
        
            if (\$cont == 0) {
                \$virgula = '';
            } else {
                \$virgula = ',';
            }
        
            \$coluns .= \$virgula . \$row['Field'];
            \$cont ++;
        }
        
        \$sql = ' SELECT ' . \$coluns;
        \$sql .= ' FROM `' . \$this->bancoName . '`.`' . \$table . '`';
        
        //var_dump(\$where);
        
        \$params = Array();
        
		if (sizeof(\$where)>0) {
			
			\$sql .= ' WHERE ';
			
			for (\$i = 0; \$i < sizeof(\$where); \$i++) {
			
				if(\$i > 0){
					\$sql .= ' AND ';
				}
				
				\$sql .= \$where[\$i]->getCollum().\" \".\$where[\$i]->getCondition().\" :param\".\$i;
				
				\$params[] = \$where[\$i]->getValue();
				
				\$cont++;			
			}            
        }
        
        if (strlen(\$orderColun)>0) {
            \$sql .= ' ORDER BY ' . \$orderColun;
        }

        
        if ((strlen(\$orderColun)>0)) {
            if (\$order) {
                \$sql .= ' ASC ';
            } else if (! \$order) {
                \$sql .= ' DESC ';
            }
        }
        
        if (!(strcasecmp(null, \$page) == 0) && \$sizePage > 0) {
        	if(\$page > 0){
            	\$sql .= ' LIMIT ' . (\$page - 1) * \$sizePage . ',' . \$sizePage;
        	}else{
        		\$sql .= ' LIMIT ' . 0 * \$sizePage . ',' . \$sizePage;
        	}
        }
        
        \$this->showCase(\$sql);
        
        \$this->beginConnection();
       
        \$sth = \$this->pdo_->prepare(\$sql);
        
        for (\$i = 0; \$i < sizeof(\$params); \$i++) {
        	if(gettype(\$params[\$i]) == \"string\"){
        		\$sth->bindValue(\":param\".\$i, \$params[\$i],\PDO::PARAM_STR);
        	}else{
        		\$sth->bindValue(\":param\".\$i, \$params[\$i],\PDO::PARAM_INT);
        	}        	
        }
       
        \$sth->execute();
        
        
        \$this->commitConection();
        
        \$array = Array();
        
        while (\$foren = \$sth->fetch(\PDO::FETCH_ASSOC)) {
            \$array[] = \$foren;
        }
        return \$array;
    }
        
    function execSelect(\$sql){
        \$this->beginConnection();       
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();                
        \$this->commitConection();

        \$array = Array();
        
        while (\$foren = \$sth->fetch(\PDO::FETCH_ASSOC)) {
            \$array[] = \$foren;
        }
        
        return \$array;
    }

    // -------------------------------------------UTILS-----------------------------------------------
        
    /**
     * Return PDO Connection
     *
     * @return /PDO
     */
    private function getConnect()
    {
        \$host = new engine\Hosts();
        \$this->bancoName   = \$host->getBanco();
        \$this->showcaseSQL = \$host->getShowDebug();
        
        \$dsn = 'mysql:dbname=' . \$host->getBanco() . ';host=' . \$host->getIp().';charset=utf8';
        
        \$options = [
            \PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for 'real' prepared statements
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            \PDO::ATTR_PERSISTENT => true
        ];
        
        try{
        \$this->pdo_ = new \PDO(\$dsn
            ,  \$host->getUsuario()
            ,  \$host->getSenha()
            ,  \$options
            );
        
        }catch (\Exception \$e){
            error_log(\$e->getMessage());
            exit('Algo estranho aconteceu ao conectar com o Banco de Dados!'); //something a user can understand
        }
        return \$this->pdo_;
    }
        
    /**
     * Begin Connection
     */
    private function beginConnection()
    {
        \$this->pdo_->beginTransaction();
    }
        
    /**
     * Commit Conection
     */
    private function commitConection()
    {
        \$this->pdo_->commit();
    }
        
    /**
     * Show Coluns
     *
     * @param
     *            \$table
     * @return /PDOStatement
     */
    private function showColum(\$table)
    {
        
        \$sql = 'SHOW COLUMNS FROM `' . \$this->bancoName . '`.`' . strtolower(\$table) . '`';
        
        \$this->beginConnection();
        
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();
        
        \$this->commitConection();
        
        return \$sth;
    }
        
    private function showPrimaryKey(\$table)
    {
        \$sql = 'SHOW KEYS FROM `' . \$this->bancoName . '`.`' . \$table . '`  WHERE Key_name = \'PRIMARY\'';
        
        \$this->beginConnection();
        
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();
        
        \$this->commitConection();
        
        return \$sth;
    }
        
    private function showCase(\$values){
        if(\$this->showcaseSQL){

            if (\$this->showcaseSQL) {

                ChromePHP::warn(\$values);
    
            }
        	        	
        }		
    }
    // -------------------------------------------UTILS FIM-----------------------------------------------
}
?>";
    
    gravar(CONNECTION."Connection.php", $str);
}

function getComposer() {
    $str= "{}";
    gravar("composer.json", $str);
}

function getBase() {
    $str= "<?php

use engine\Hosts;

define('METHOD', \$_SERVER['REQUEST_METHOD']);
define('URI', \$_SERVER['REQUEST_URI']);
define('TIME_FLOAT', \$_SERVER['REQUEST_TIME_FLOAT']);

define('BARRA', DIRECTORY_SEPARATOR);
date_default_timezone_set ( \"America/Sao_Paulo\" );


/*
 * Allow from any origin.
 */
if (isset(\$_SERVER[\"HTTP_ORIGIN\"])) {
    header(\"Access-Control-Allow-Origin: \" . \$_SERVER[\"HTTP_ORIGIN\"]);
    header(\"Access-Control-Allow-Credentials: true\");
    header(\"Access-Control-Max-Age: 86400\"); // cache for 1 day    
}

/*
 * Access-Control headers are received during OPTIONS requests.
 */
if (\$_SERVER[\"REQUEST_METHOD\"] == \"OPTIONS\") {
	
    if (isset(\$_SERVER[\"HTTP_ACCESS_CONTROL_REQUEST_METHOD\"]))
        header(\"Access-Control-Allow-Methods: GET, POST, OPTIONS\");

    if (isset(\$_SERVER[\"HTTP_ACCESS_CONTROL_REQUEST_HEADERS\"]))
        header(\"Access-Control-Allow-Headers: \" . \$_SERVER[\"HTTP_ACCESS_CONTROL_REQUEST_HEADERS\"]);

    exit(0);
}


if(METHOD == \"PUT\"){
	function validPut(\$listkeys,\$listValues){
		
		\$valid = false;
		\$control = array();
		
		for (\$i = 0; \$i < sizeof(\$listkeys); \$i++) {
			
			if(\$_GET[\$listkeys[\$i]] == \$listValues[\$listkeys[\$i]]){
				\$valid = true;
			}
			
		}
		
		return \$valid;
	}
	
	function getParametersPUT(){
		parse_str(file_get_contents(\"php://input\"),\$post_vars);
		return \$post_vars;
	}
}

?>";
    gravar(INTERACTOR."base.php", $str);
}

function getHtAccess() {
	$str = "Options -Indexes

RewriteEngine On
RewriteBase /".PROJECT."/

RewriteRule ^api/(\w+)/(\w+)/?$ engine/Router.php?class=$1&method=$2&param=api [NC,L,QSA]

RewriteRule ^web/(\w+)/(\w+)/?$ engine/Router.php?class=$1&method=$2&param=web [NC,L]

RewriteRule ^barramento/?$ barramento.php [NC,L]";
    
gravar(".htaccess", $str);
}

function getAcls() {
    $str = '<?php

namespace engine;

class Acl {

    function getAcls()
    {
		$permission = Array();
		
        ';

        $tables = getAllTables();
	
        while ($table = $tables->fetch()) {
            $str .= "
            
            //".strtoupper($table[0])."            
            \$permission = \$this->setRouter(\"".strtolower($table[0])."\",\"GET\"   ,\"findAll\"    ,\$permission);            
            \$permission = \$this->setRouter(\"".strtolower($table[0])."\",\"DELETE\",\"remove\" ,\$permission);
            \$permission = \$this->setRouter(\"".strtolower($table[0])."\",\"PUT\"   ,\"update\"    ,\$permission);
            \$permission = \$this->setRouter(\"".strtolower($table[0])."\",\"POST\"  ,\"create\" ,\$permission);
            ";
        }

 $str .= '
        return $permission;
	}
	
	function setRouter($url,$type,$method,$permission) {	

		$len = count($permission);
		
		$permission[$len][0] = $type;
		$permission[$len][1] = $method;
		$permission[$len][2] = $url;		

		return $permission;
	}
}  
?>';
 
    gravar(FOLDER."/Acl.php", $str);
}


function getRouter() {
	$str="<?php
	use engine\Hosts;
    use engine\Acl;

	include_once 'interactor/base.php';
	include_once '../Autoload.php';
	
	if(\$_GET[\"param\"] == 'api'){
		
		\$Hosts = new Hosts();
				
		header(\"Content-type: application/json; charset=UTF-8\");		
		
		if(file_exists(\"interactor/\".\$_GET[\"class\"].'.php')){
			include_once \"interactor/\".\$_GET[\"class\"].'.php';
		}
	}

	//--------------------------------------------------------------------------
	
	
    
    \$acls = new Acl();
	\$permission =  \$acls->getAcls();
		
	run(\$permission);
	
	
	//--------------------------------------------------------------------------
	
	function setRouter(\$url,\$type,\$method,\$permission) {	

		\$len = count(\$permission);
		
		\$permission[\$len][0] = \$type;
		\$permission[\$len][1] = \$method;
		\$permission[\$len][2] = \$url;		

		return \$permission;
	}
	
	function run(\$permission){
			
		ob_start();
		
		\$acess  = false;
		
		for (\$i = 0; \$i < count(\$permission); \$i++) {
			
			if(METHOD == (\$permission[\$i][0])){ 
		      if(\$_GET[\"method\"] == \$permission[\$i][1]){
				if(\$_GET[\"class\"] == \$permission[\$i][2]){				
				
					try {
						echo call_user_func(\$permission[\$i][1]);	
					} catch (\Throwable \$th) {
						http_response_code(400);
						echo \$th;
					}
					\$acess = true;

				}
			  }
			}
		}
		if(\$acess){
			return \$this_string = ob_get_contents();
		}else{
            http_response_code(401);
			echo \"ACESSO NEGADO!\";
			return \$this_string = ob_get_contents();
		}
		ob_end_clean();
	}
?>";
	gravar(FOLDER."/Router.php", $str);
}

function getResponse() {
	$str = "<?php
namespace engine\utils;

class ResponseDelete implements \JsonSerializable
{

    private \$status;
    private \$size;

    
    public function jsonSerialize()
    {
        return ['status' => \$this->getStatus(),
            'size' => \$this->getSize()        		
        ];
    }

    // STATUS
    function getStatus()
    {
        return \$this->status;
    }

    function setStatus(\$status)
    {
    	return \$this->status= \$status;
    }

    // SIZE
    function getSize()
    {
        return \$this->size;
    }

    function setSize(\$size)
    {
    	return \$this->size= \$size;
    }

}
?>";
	gravar(UTILS."ResponseDelete.php", $str);
	
}


function getChromePhp() {
    $str = "<?php
namespace engine\lib;

class ChromePhp
{
    /**
     * @var string
     */
    const VERSION = '4.1.0';

    /**
     * @var string
     */
    const HEADER_NAME = 'X-ChromeLogger-Data';

    /**
     * @var string
     */
    const BACKTRACE_LEVEL = 'backtrace_level';

    /**
     * @var string
     */
    const LOG = 'log';

    /**
     * @var string
     */
    const WARN = 'warn';

    /**
     * @var string
     */
    const ERROR = 'error';

    /**
     * @var string
     */
    const GROUP = 'group';

    /**
     * @var string
     */
    const INFO = 'info';

    /**
     * @var string
     */
    const GROUP_END = 'groupEnd';

    /**
     * @var string
     */
    const GROUP_COLLAPSED = 'groupCollapsed';

    /**
     * @var string
     */
    const TABLE = 'table';

    /**
     * @var string
     */
    protected \$_php_version;

    /**
     * @var int
     */
    protected \$_timestamp;

    /**
     * @var array
     */
    protected \$_json = array(
        'version' => self::VERSION,
        'columns' => array('log', 'backtrace', 'type'),
        'rows' => array()
    );

    /**
     * @var array
     */
    protected \$_backtraces = array();

    /**
     * @var bool
     */
    protected \$_error_triggered = false;

    /**
     * @var array
     */
    protected \$_settings = array(
        self::BACKTRACE_LEVEL => 1
    );

    /**
     * @var ChromePhp
     */
    protected static \$_instance;

    /**
     * Prevent recursion when working with objects referring to each other
     *
     * @var array
     */
    protected \$_processed = array();

    /**
     * constructor
     */
    private function __construct()
    {
        \$this->_php_version = phpversion();
        \$this->_timestamp = \$this->_php_version >= 5.1 ? \$_SERVER['REQUEST_TIME'] : time();
        \$this->_json['request_uri'] = \$_SERVER['REQUEST_URI'];
    }

    /**
     * gets instance of this class
     *
     * @return ChromePhp
     */
    public static function getInstance()
    {
        if (self::\$_instance === null) {
            self::\$_instance = new self();
        }
        return self::\$_instance;
    }

    /**
     * logs a variable to the console
     *
     * @param mixed \$data,... unlimited OPTIONAL number of additional logs [...]
     * @return void
     */
    public static function log()
    {
        \$args = func_get_args();
        return self::_log('', \$args);
    }

    /**
     * logs a warning to the console
     *
     * @param mixed \$data,... unlimited OPTIONAL number of additional logs [...]
     * @return void
     */
    public static function warn()
    {
        \$args = func_get_args();
        return self::_log(self::WARN, \$args);
    }

    /**
     * logs an error to the console
     *
     * @param mixed \$data,... unlimited OPTIONAL number of additional logs [...]
     * @return void
     */
    public static function error()
    {
        \$args = func_get_args();
        return self::_log(self::ERROR, \$args);
    }

    /**
     * sends a group log
     *
     * @param string value
     */
    public static function group()
    {
        \$args = func_get_args();
        return self::_log(self::GROUP, \$args);
    }

    /**
     * sends an info log
     *
     * @param mixed \$data,... unlimited OPTIONAL number of additional logs [...]
     * @return void
     */
    public static function info()
    {
        \$args = func_get_args();
        return self::_log(self::INFO, \$args);
    }

    /**
     * sends a collapsed group log
     *
     * @param string value
     */
    public static function groupCollapsed()
    {
        \$args = func_get_args();
        return self::_log(self::GROUP_COLLAPSED, \$args);
    }

    /**
     * ends a group log
     *
     * @param string value
     */
    public static function groupEnd()
    {
        \$args = func_get_args();
        return self::_log(self::GROUP_END, \$args);
    }

    /**
     * sends a table log
     *
     * @param string value
     */
    public static function table()
    {
        \$args = func_get_args();
        return self::_log(self::TABLE, \$args);
    }

    /**
     * internal logging call
     *
     * @param string \$type
     * @return void
     */
    protected static function _log(\$type, array \$args)
    {
        // nothing passed in, don't do anything
        if (count(\$args) == 0 && \$type != self::GROUP_END) {
            return;
        }

        \$logger = self::getInstance();

        \$logger->_processed = array();

        \$logs = array();
        foreach (\$args as \$arg) {
            \$logs[] = \$logger->_convert(\$arg);
        }

        \$backtrace = debug_backtrace(false);
        \$level = \$logger->getSetting(self::BACKTRACE_LEVEL);

        \$backtrace_message = 'unknown';
        if (isset(\$backtrace[\$level]['file']) && isset(\$backtrace[\$level]['line'])) {
            \$backtrace_message = \$backtrace[\$level]['file'] . ' : ' . \$backtrace[\$level]['line'];
        }

        \$logger->_addRow(\$logs, \$backtrace_message, \$type);
    }

    /**
     * converts an object to a better format for logging
     *
     * @param Object
     * @return array
     */
    protected function _convert(\$object)
    {
        // if this isn't an object then just return it
        if (!is_object(\$object)) {
            return \$object;
        }

        //Mark this object as processed so we don't convert it twice and it
        //Also avoid recursion when objects refer to each other
        \$this->_processed[] = \$object;

        \$object_as_array = array();

        // first add the class name
        \$object_as_array['___class_name'] = get_class(\$object);

        // loop through object vars
        \$object_vars = get_object_vars(\$object);
        foreach (\$object_vars as \$key => \$value) {

            // same instance as parent object
            if (\$value === \$object || in_array(\$value, \$this->_processed, true)) {
                \$value = 'recursion - parent object [' . get_class(\$value) . ']';
            }
            \$object_as_array[\$key] = \$this->_convert(\$value);
        }

        \$reflection = new ReflectionClass(\$object);

        // loop through the properties and add those
        foreach (\$reflection->getProperties() as \$property) {

            // if one of these properties was already added above then ignore it
            if (array_key_exists(\$property->getName(), \$object_vars)) {
                continue;
            }
            \$type = \$this->_getPropertyKey(\$property);

            if (\$this->_php_version >= 5.3) {
                \$property->setAccessible(true);
            }

            try {
                \$value = \$property->getValue(\$object);
            } catch (ReflectionException \$e) {
                \$value = 'only PHP 5.3 can access private/protected properties';
            }

            // same instance as parent object
            if (\$value === \$object || in_array(\$value, \$this->_processed, true)) {
                \$value = 'recursion - parent object [' . get_class(\$value) . ']';
            }

            \$object_as_array[\$type] = \$this->_convert(\$value);
        }
        return \$object_as_array;
    }

    /**
     * takes a reflection property and returns a nicely formatted key of the property name
     *
     * @param ReflectionProperty
     * @return string
     */
    protected function _getPropertyKey(ReflectionProperty \$property)
    {
        \$static = \$property->isStatic() ? ' static' : '';
        if (\$property->isPublic()) {
            return 'public' . \$static . ' ' . \$property->getName();
        }

        if (\$property->isProtected()) {
            return 'protected' . \$static . ' ' . \$property->getName();
        }

        if (\$property->isPrivate()) {
            return 'private' . \$static . ' ' . \$property->getName();
        }
    }

    /**
     * adds a value to the data array
     *
     * @var mixed
     * @return void
     */
    protected function _addRow(array \$logs, \$backtrace, \$type)
    {
        // if this is logged on the same line for example in a loop, set it to null to save space
        if (in_array(\$backtrace, \$this->_backtraces)) {
            \$backtrace = null;
        }

        // for group, groupEnd, and groupCollapsed
        // take out the backtrace since it is not useful
        if (\$type == self::GROUP || \$type == self::GROUP_END || \$type == self::GROUP_COLLAPSED) {
            \$backtrace = null;
        }

        if (\$backtrace !== null) {
            \$this->_backtraces[] = \$backtrace;
        }

        \$row = array(\$logs, \$backtrace, \$type);

        \$this->_json['rows'][] = \$row;
        \$this->_writeHeader(\$this->_json);
    }

    protected function _writeHeader(\$data)
    {
        header(self::HEADER_NAME . ': ' . \$this->_encode(\$data));
    }

    /**
     * encodes the data to be sent along with the request
     *
     * @param array \$data
     * @return string
     */
    protected function _encode(\$data)
    {
        return base64_encode(utf8_encode(json_encode(\$data)));
    }

    /**
     * adds a setting
     *
     * @param string key
     * @param mixed value
     * @return void
     */
    public function addSetting(\$key, \$value)
    {
        \$this->_settings[\$key] = \$value;
    }

    /**
     * add ability to set multiple settings in one call
     *
     * @param array \$settings
     * @return void
     */
    public function addSettings(array \$settings)
    {
        foreach (\$settings as \$key => \$value) {
            \$this->addSetting(\$key, \$value);
        }
    }

    /**
     * gets a setting
     *
     * @param string key
     * @return mixed
     */
    public function getSetting(\$key)
    {
        if (!isset(\$this->_settings[\$key])) {
            return null;
        }
        return \$this->_settings[\$key];
    }
}
?>";
	
	gravar(LIBS."ChromePhp.php", $str);
	
}


function getFilterWhere() {
	$str ="<?php
namespace engine\utils;

class FilterWhere{
	private \$collum    = \"\";
	private \$condition = \"=\";
	private \$value     = \"\";
	
	function getCollum()
	{
		return \$this->collum;		
	}
	
	function getCondition()
	{
		return \$this->condition;		
	}
	
	function getValue()
	{
		return \$this->value;		
	}
		
	function setCollum(\$collum)
	{
		\$this->collum = \$collum;
	}
	
	function setCondition(\$condition)
	{
		\$this->condition = \$condition;
	}
	
	function setValue(\$value)
	{		
		\$this->value = \$value;
	}
	
}

?>";
	gravar(UTILS."FilterWhere.php", $str);
}


function getPageable() {
    $str = "<?php
namespace engine\dao;

class Pageable implements \JsonSerializable
{

    public \$offset; //Integer
    public \$paged; //Boolean
    public \$pageNumber; //Integer
    public \$pageSize; //Integer
    public \$sort; //Sort
    public \$unpaged; //Boolean

    public function jsonSerialize()
    {
        return [
            'offset' => \$this->getOffset(),
            'paged' => \$this->getPaged(),
            'pageNumber' => \$this->getPageNumber(),
            'pageSize' => \$this->getPageSize(),
            'sort' => \$this->getSort(),
            'unpaged' => \$this->getUnpaged(),
        ];
    }

    public function getOffset()
    {
        return \$this->offset;
    }
    public function setOffset(\$offset)
    {
        \$this->offset = \$offset;
    }
    public function getPaged()
    {
        return \$this->paged;
    }
    public function setPaged(\$paged)
    {
        \$this->paged = \$paged;
    }
    public function getPageNumber()
    {
        return \$this->pageNumber;
    }
    public function setPageNumber(\$pageNumber)
    {
        \$this->pageNumber = \$pageNumber;
    }
    public function getPageSize()
    {
        return \$this->pageSize;
    }
    public function setPageSize(\$pageSize)
    {
        \$this->pageSize = \$pageSize;
    }
    public function getSort()
    {
        return \$this->sort;
    }
    public function setSort(\$sort)
    {
        \$this->sort = \$sort;
    }
    public function getUnpaged()
    {
        return \$this->unpaged;
    }
    public function setUnpaged(\$unpaged)
    {
        \$this->unpaged = \$unpaged;
    }

}";
    
    gravar(DAO."/Pageable.php", $str);
}

function getRootClass() {
    $str = "<?php
namespace engine\dao;

class RootClass implements \JsonSerializable
{

    public \$content; //Object
    public \$empty; //Boolean
    public \$first; //Boolean
    public \$last; //Boolean
    public \$number; //Integer
    public \$numberOfElements; //Integer
    public \$pageable; //Pageable
    public \$size; //Integer
    public \$sort; //Sort
    public \$totalElements; //Integer
    public \$totalPages; //Integer

    public function jsonSerialize()
    {
        return [
            'content' => \$this->getContent(),
            'empty' => \$this->getContent() == null?true:false,
            'first' => (\$this->getPageable()->getPageNumber() == 0)?true:false,
            'last' => ((\$this->getTotalPages()-1) == \$this->getPageable()->getPageNumber()) ?true:false,
            'number' => \$this->getPageable()->getPageNumber(),
            'numberOfElements' => sizeof(\$this->getContent()),
            'pageable' => \$this->getPageable(),
            'size' => sizeof(\$this->getContent()),
            'sort' => \$this->getSort(),
            'totalElements' => \$this->getTotalElements(),
            'totalPages' => \$this->getTotalPages()
        ];
    }

    public function getContent()
    {
        return \$this->content;
    }
    public function setContent(\$content)
    {
        \$this->content = \$content;
    }
    public function getEmpty()
    {
        return \$this->empty;
    }
    public function getFirst()
    {
        return \$this->first;
    }
    public function setFirst(\$first)
    {
        \$this->first = \$first;
    }
    public function getLast()
    {
        return \$this->last;
    }
    public function setLast(\$last)
    {
        \$this->last = \$last;
    }
    public function getNumber()
    {
        return \$this->number;
    }
    public function setNumber(\$number)
    {
        \$this->number = \$number;
    }
    public function getNumberOfElements()
    {
        return \$this->numberOfElements;
    }
    public function setNumberOfElements(\$numberOfElements)
    {
        \$this->numberOfElements = \$numberOfElements;
    }
    public function getPageable()
    {
        return \$this->pageable;
    }
    public function setPageable(\$pageable)
    {
        \$this->pageable = \$pageable;
    }
    public function getSize()
    {
        return \$this->size;
    }
    public function setSize(\$size)
    {
        \$this->size = \$size;
    }
    public function getSort()
    {
        return \$this->sort;
    }
    public function setSort(\$sort)
    {
        \$this->sort = \$sort;
    }
    public function getTotalElements()
    {
        return \$this->totalElements;
    }
    public function setTotalElements(\$totalElements)
    {
        \$this->totalElements = \$totalElements;
    }
    public function getTotalPages()
    {
        return \$this->totalPages;
    }
    public function setTotalPages(\$totalPages)
    {
        \$this->totalPages = \$totalPages;
    }

}";
    
    gravar(DAO."/RootClass.php", $str);
}


function getSort() {
    $str = "<?php
namespace engine\dao;

class Sort
{

    public \$empty; //Boolean
    public \$sorted; //Boolean
    public \$unsorted; //Boolean
    
    public function getEmpty() { 
            return \$this->empty; 
    }
    public function setEmpty(\$empty) { 
            \$this->empty = \$empty; 
    }    
    public function getSorted() { 
            return \$this->sorted; 
    }
    public function setSorted(\$sorted) { 
            \$this->sorted = \$sorted; 
    }    
    public function getUnsorted() { 
            return \$this->unsorted; 
    }
    public function setUnsorted(\$unsorted) { 
            \$this->unsorted = \$unsorted; 
    }    

}";
    
    gravar(DAO."/Sort.php", $str);
}

function getFactoryPageable() {
    $str = "<?php
namespace engine\dao;

class FactoryPageable
{
    public function makeResponse(\$lista, \$page, \$pageSize)
    {
        if(\$pageSize == 0){
            \$pageSize = 1;
        }
        
        //RootClass
        \$rootClass = new RootClass();
        \$rootClass->setContent(\$lista);
        \$rootClass->setTotalElements(sizeof(\$lista));

        \$pgSize = sizeof(\$lista) / \$pageSize;

        if (fmod(sizeof(\$lista), \$pageSize) > 0) {
            \$pgSize = (intval(\$pgSize) + 1);
        }
        \$rootClass->setTotalPages(\$pgSize);

        //Pageable
        \$pageable = new Pageable();
        if (\$page == 0) {
            \$page = 1;
        }
        \$pageable->setPageNumber(intval(\$page));
        \$pageable->setPageSize(intval(\$pageSize));

        \$sort = new Sort();

        \$pageable->setSort(\$sort);
        \$rootClass->setPageable(\$pageable);
        \$rootClass->setSort(\$sort);

        return json_encode(\$rootClass);
    }
}";
    
    gravar(DAO."/FactoryPageable.php", $str);
}


//-----------------------RESOURCES-------------------------------------
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
    $query = 'SHOW COLUMNS FROM `' . (MAPPING_DATABASE =="TESTE"?BANCO_T:BANCO). '`.`' . $table . '`';
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
    $sql = 'SHOW KEYS FROM `'. (MAPPING_DATABASE =="TESTE"?BANCO_T:BANCO). '`.`' . $table.'`  WHERE Key_name = \'PRIMARY\'';  
    $sth = $pdo_->prepare( $sql );
    $sth->execute();
    
    return $sth;
}

function getColum($table) {
    
    $pdo_ = getConection();
    $query = 'SHOW COLUMNS FROM `' . (MAPPING_DATABASE =="TESTE"?BANCO_T:BANCO). '`.`' . $table . '`';
    $sth = $pdo_->prepare( $query );
    $sth->execute();
    
    return $sth;    
}
//-----------------------SQL_STRUCT-------------------------------------
//-----------------------UTILS--------------------------------------

function gravar($arquivo,$texto,$replace = false){
    
    if ($replace || !file_exists($arquivo)) {
        
        //Variavel $fp armazena a conexão com o arquivo e o tipo de ação.
        $fp = fopen($arquivo, "a+");
        
        //Escreve no arquivo aberto.
        fwrite($fp, $texto);
        
        //Fecha o arquivo.
        fclose($fp);
    }
}

function ler($arquivo){
	//Variavel $fp armazena a conexão com o arquivo e o tipo de ação.
    $fp = fopen($arquivo, "r");
    
    //Le o conteudo do arquivo aberto.
    $conteudo = fread($fp, filesize($arquivo));
    
    //Fecha o arquivo.
    fclose($fp);
    
    //retorna o conteudo.
    return $conteudo;
}

//-----------------------UTILS-------------------------------------?>