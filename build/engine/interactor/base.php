<?php

use engine\Hosts;

define('METHOD', $_SERVER['REQUEST_METHOD']);
define('URI', $_SERVER['REQUEST_URI']);
define('TIME_FLOAT', $_SERVER['REQUEST_TIME_FLOAT']);

define('BARRA', DIRECTORY_SEPARATOR);



/*
 * Allow from any origin.
 */
if (isset($_SERVER["HTTP_ORIGIN"])) {
    header("Access-Control-Allow-Origin: " . $_SERVER["HTTP_ORIGIN"]);
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Max-Age: 86400"); // cache for 1 day    
}

/*
 * Access-Control headers are received during OPTIONS requests.
 */
if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
	
    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"]))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]))
        header("Access-Control-Allow-Headers: " . $_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]);

    exit(0);
}


if(METHOD == "PUT"){
	function validPut($listkeys,$listValues){
		
		$valid = false;
		$control = array();
		
		for ($i = 0; $i < sizeof($listkeys); $i++) {
			
			if($_GET[$listkeys[$i]] == $listValues[$listkeys[$i]]){
				$valid = true;
			}
			
		}
		
		return $valid;
	}
	
	function getParametersPUT(){
		parse_str(file_get_contents("php://input"),$post_vars);
		return $post_vars;
	}
}

?>