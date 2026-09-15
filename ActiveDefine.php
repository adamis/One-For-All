<?php
//--------------------------------DEFINES--------------------------------------
//ALTERE PARA GERAR SEU BACK-END

// NOME DA PASTA DO PROJETO (caminho web a partir do htdocs)
define ( "PROJECT",    "OneForAll/build" ); //ALTERE PARA O NOME DO PROJETO
define ( "ONEFORALL_VERSION", "2.0.2" );

// DADOS DE BANCO (OFFICIAL)
define ( "BANCO"  , "oseasy-local" ); //ALTERE PARA O NOME DO SEU BANCO
define ( "IP"     , "localhost"   ); //ALTERE O IP DO SEU SERVIDOR
define ( "USUARIO", "root"        ); //ALTERE O USUARIO DO SEU SERVIDOR
define ( "SENHA"  , ""    ); //ALTERE A SENHA DO SEU SERVIDOR

// DADOS DE BANCO (TESTE)
define ( "BANCO_T"  , "oseasy-local" ); //ALTERE PARA O NOME DO SEU BANCO
define ( "IP_T"     , "localhost"   ); //ALTERE O IP DO SEU SERVIDOR
define ( "USUARIO_T", "root"        ); //ALTERE O USUARIO DO SEU SERVIDOR
define ( "SENHA_T"  , ""    ); //ALTERE A SENHA DO SEU SERVIDOR

define ( "MAPPING_DATABASE"  , "TESTE");
define ( "CHARSET", "utf8mb4" );
define ( "FORCE_OVERWRITE", true ); // true = regenera engine/ a cada execuÃ§Ã£o

//-----------------------------------------------------------------------------------

// PASTAS DO PROJETO
define ( "FOLDER", 	   "engine" 			    );
define ( "ADAPTER",    FOLDER . "/adapter/" 	);
define ( "CONNECTION", FOLDER . "/connection/" 	);
define ( "INTERACTOR", FOLDER . "/interactor/" 	);
define ( "DAO", 	   FOLDER . "/dao/" 		);
define ( "LIBS", 	   FOLDER . "/lib/" 		);
define ( "UTILS", 	   FOLDER . "/utils/" 		);
define ( "AUTH", 	   FOLDER . "/auth/" 		);
date_default_timezone_set ( "America/Sao_Paulo" );

//-----------------------DEFINES--------------------------------------
//-----------------------CREATE_FOLDER--------------------------------------
// Criando Folders
if (! file_exists ( FOLDER )) {
    mkdir ( FOLDER, 0777 );
}
if (! file_exists ( ADAPTER )) {
    mkdir ( ADAPTER, 0777 );
}
if (! file_exists ( CONNECTION)) {
    mkdir ( CONNECTION, 0777 );
}
if (! file_exists ( INTERACTOR)) {
    mkdir ( INTERACTOR, 0777 );
}
if (! file_exists ( DAO)) {
    mkdir ( DAO, 0777 );
}
if (! file_exists ( LIBS)) {
    mkdir ( LIBS, 0777 );
}
if (! file_exists ( UTILS)) {
    mkdir ( UTILS, 0777 );
}
if (! file_exists ( AUTH )) {
    mkdir ( AUTH, 0777 );
}
//-----------------------CREATE_FOLDER--------------------------------------
?>