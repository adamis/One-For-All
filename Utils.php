<?php
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

//-----------------------UTILS--------------------------------------
?>