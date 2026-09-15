<?php
	use engine\Hosts;
    use engine\auth\TokenGuard;
    use engine\Acl;

	include_once 'interactor/base.php';
	include_once '../Autoload.php';

	$_GET["class"] = preg_replace('/[^a-z0-9_]/i', '', $_GET["class"] ?? '');
	$_GET["method"] = preg_replace('/[^a-z0-9_]/i', '', $_GET["method"] ?? '');
	$_GET["param"] = preg_replace('/[^a-z0-9_]/i', '', $_GET["param"] ?? '');

	if($_GET["param"] == 'api'){
		header("Content-type: application/json; charset=UTF-8");
	}

	if (file_exists(__DIR__ . '/auth/TokenGuard.php')) {
		TokenGuard::assert($_GET["class"], $_GET["method"]);
	}
	
	if($_GET["param"] == 'api'){
		
		$Hosts = new Hosts();
		
		if($_GET["class"] !== '' && file_exists("interactor/".$_GET["class"].'.php')){
			include_once "interactor/".$_GET["class"].'.php';
		}
	}

	//--------------------------------------------------------------------------
	
	
    
    $acls = new Acl();
	$permission =  $acls->getAcls();
		
	run($permission);
	
	
	//--------------------------------------------------------------------------
	
	function setRouter($url,$type,$method,$permission) {	

		$len = count($permission);
		
		$permission[$len][0] = $type;
		$permission[$len][1] = $method;
		$permission[$len][2] = $url;		

		return $permission;
	}
	
	function run($permission){
			
		ob_start();
		
		$acess  = false;
		
		for ($i = 0; $i < count($permission); $i++) {
			
			if(METHOD == ($permission[$i][0])){ 
		      if($_GET["method"] == $permission[$i][1]){
				if($_GET["class"] == $permission[$i][2]){				
				
					try {
						echo call_user_func($permission[$i][1]);	
					} catch (\Throwable $th) {
						http_response_code(400);
						echo $th;
					}
					$acess = true;

				}
			  }
			}
		}
		if(!$acess){
            http_response_code(401);
			echo json_encode(array("erro" => "ACESSO NEGADO!"));
		}
		ob_end_flush();
	}
?>