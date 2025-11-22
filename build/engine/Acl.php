<?php

namespace engine;

class Acl {

    function getAcls()
    {
		$permission = Array();
		
        
            
            //CHAMADOS            
            $permission = $this->setRouter("chamados","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("chamados","DELETE","remove" ,$permission);
            $permission = $this->setRouter("chamados","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("chamados","POST"  ,"create" ,$permission);
            
            
            //CHAMADOS_SERVICOS            
            $permission = $this->setRouter("chamados_servicos","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("chamados_servicos","DELETE","remove" ,$permission);
            $permission = $this->setRouter("chamados_servicos","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("chamados_servicos","POST"  ,"create" ,$permission);
            
            
            //CONDOMINIOS            
            $permission = $this->setRouter("condominios","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("condominios","DELETE","remove" ,$permission);
            $permission = $this->setRouter("condominios","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("condominios","POST"  ,"create" ,$permission);
            
            
            //CONFIGS            
            $permission = $this->setRouter("configs","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("configs","DELETE","remove" ,$permission);
            $permission = $this->setRouter("configs","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("configs","POST"  ,"create" ,$permission);
            
            
            //DADOS_ADAMIS_CNPJ            
            $permission = $this->setRouter("dados_adamis_cnpj","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("dados_adamis_cnpj","DELETE","remove" ,$permission);
            $permission = $this->setRouter("dados_adamis_cnpj","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("dados_adamis_cnpj","POST"  ,"create" ,$permission);
            
            
            //NOTAS_FISCAIS            
            $permission = $this->setRouter("notas_fiscais","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("notas_fiscais","DELETE","remove" ,$permission);
            $permission = $this->setRouter("notas_fiscais","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("notas_fiscais","POST"  ,"create" ,$permission);
            
            
            //PERFIS            
            $permission = $this->setRouter("perfis","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("perfis","DELETE","remove" ,$permission);
            $permission = $this->setRouter("perfis","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("perfis","POST"  ,"create" ,$permission);
            
            
            //REFRESH_TOKENS            
            $permission = $this->setRouter("refresh_tokens","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("refresh_tokens","DELETE","remove" ,$permission);
            $permission = $this->setRouter("refresh_tokens","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("refresh_tokens","POST"  ,"create" ,$permission);
            
            
            //SERVICOS            
            $permission = $this->setRouter("servicos","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("servicos","DELETE","remove" ,$permission);
            $permission = $this->setRouter("servicos","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("servicos","POST"  ,"create" ,$permission);
            
            
            //STATUS_CHAMADOS            
            $permission = $this->setRouter("status_chamados","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("status_chamados","DELETE","remove" ,$permission);
            $permission = $this->setRouter("status_chamados","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("status_chamados","POST"  ,"create" ,$permission);
            
            
            //TELAS            
            $permission = $this->setRouter("telas","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("telas","DELETE","remove" ,$permission);
            $permission = $this->setRouter("telas","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("telas","POST"  ,"create" ,$permission);
            
            
            //TELAS_PERFIS            
            $permission = $this->setRouter("telas_perfis","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("telas_perfis","DELETE","remove" ,$permission);
            $permission = $this->setRouter("telas_perfis","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("telas_perfis","POST"  ,"create" ,$permission);
            
            
            //USUARIOS            
            $permission = $this->setRouter("usuarios","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("usuarios","DELETE","remove" ,$permission);
            $permission = $this->setRouter("usuarios","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("usuarios","POST"  ,"create" ,$permission);
            
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
?>