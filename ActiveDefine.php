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
//-----------------------CREATE_FOLDER--------------------------------------
?>