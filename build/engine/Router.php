<?php
	use engine\Hosts;
    use engine\Acl;

	include_once 'interactor/base.php';
	include_once '../Autoload.php';
	
	if($_GET["param"] == 'api'){
		
		$Hosts = new Hosts();
				
		header("Content-type: application/json; charset=UTF-8");		
		
		if(file_exists("interactor/".$_GET["class"].'.php')){
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
		if($acess){
			return $this_string = ob_get_contents();
		}else{
            http_response_code(401);
			echo "ACESSO NEGADO!";
			return $this_string = ob_get_contents();
		}
		ob_end_clean();
	}
?>