<?php
date_default_timezone_set ( "America/Sao_Paulo" );

if (!file_exists('build')) {
    mkdir('build', 0777, true);
}

if (file_exists('build/OneForAll.php')) {
    unlink('build/OneForAll.php');
}
 
$arq = "build/OneForAll.php";
$payload = file_get_contents('http://adamis.com.br/OneForAllManager/api/getVersion/findAll?status=1');
//$payload = file_get_contents('http://localhost/OneForAllManager/api/getVersion/findAll?status=1');
$objServer = json_decode($payload);

if ($handle = opendir('.')) {
    	
	while (false !== ($entry = readdir($handle))) {
		if($entry == "Activated.php"){
			$conteudo = trim(ler($entry));
			gravar($arq,$conteudo,$objServer->version,$objServer->dataAtual);
		}
	}
	
	$handle = opendir('.');
	
	gravar($arq, "<?php",$objServer->version,$objServer->dataAtual);
	    
    while (false !== ($entry = readdir($handle))) {
            	
        if (   $entry != "." 
            && $entry != ".." 
            && $entry[0] != "." 
            && $entry != "Package.php" 
            && $entry != "build"
        	&& $entry != "Activated.php"
        	&& $entry != "README.md"
        ) {            
                //echo "$entry<br>";
                
                //L� o conte�do do arquivo aberto.
                $conteudo = trim(ler($entry)); 
                
                $size = strlen($conteudo);
                
//                 echo 'SIZE> '.$size.'<br>';
                
                $conteudo = substr($conteudo,5, $size-10);
//                 echo $conteudo;
//                 echo '<br>';
                                
                gravar($arq,$conteudo,$objServer->version,$objServer->dataAtual);               
        }
    }
    
//     gravar($arq, "
// //-----------------------FINAL-------------------------
// \$now = new DateTime ();
// echo 'FINALIZADO!<br>' . \$now->format ( 'd-m-Y H:i:s' );
// //-----------------------FINAL-------------------------
// ");
    
    gravar($arq, "?>",$objServer->version,$objServer->dataAtual);
    
    closedir($handle);

    //header("location:build/OneForAll.php");    
    $currentDirectory = getcwd();

//<form name=\"myForm\" id=\"myForm\"  enctype=\"multipart/form-data\" action=\"http://adamis.com.br/OneForAllManager/api/upload/find?version=$objServer->version&data=$objServer->dataGenerate\" method=\"POST\">       
//<form name=\"myForm\" id=\"myForm\"  enctype=\"multipart/form-data\" action=\"http://localhost/OneForAllManager/api/upload/find?version=$objServer->version&data=$objServer->dataGenerate\" method=\"POST\">       	

    echo "    
    <form name=\"myForm\" id=\"myForm\"  enctype=\"multipart/form-data\" action=\"http://adamis.com.br/OneForAllManager/api/upload/find?version=$objServer->version&data=$objServer->dataGenerate\" method=\"POST\">       
       <input id=\"file\" name=\"file\" type=\"file\" />        
       <input type=\"submit\" value=\"Enviar\" />
    </form>    
    ";
}



function gravar($arquivo,$texto,$version,$dataAtual){
    

    //Vari�vel $fp armazena a conex�o com o arquivo e o tipo de a��o.
    $texto = str_replace("%dataAtual%",date("d/m/Y H:i:s"), $texto);
    $fp = fopen($arquivo, "a+");
    
    //Escreve no arquivo aberto.
    fwrite($fp, $texto);
    
    //Fecha o arquivo.
    fclose($fp);


}

function ler($arquivo){    
    //Vari�vel $fp armazena a conex�o com o arquivo e o tipo de a��o.
    $fp = fopen($arquivo, "a+");
    
    //L� o conte�do do arquivo aberto.
    $conteudo = fread($fp, filesize($arquivo));
    
    //Fecha o arquivo.
    fclose($fp);
    
    //retorna o conte�do.
    return $conteudo;
}


?>