<?php
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
			echo "OK,Criando DAO's,createDao";
		} catch (Exception $e) {
			echo $e.",Criando DAO's,createDao";
		}
	}
	
	if ($_GET ["method"] == "createDao") {
		try {
			createDao ();
			echo "OK,Criando Adapters,createAdapter";
		} catch (Exception $e) {
			echo $e.",Criando Adapters,createAdapter";
		}
	}
	
	if ($_GET ["method"] == "createAdapter") {
		try {
			createAdapters ();
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

// -----------------------CALLS--------------------------------------
?>
