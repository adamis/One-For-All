<?php

namespace engine;

class Acl {

    function getAcls()
    {
		$permission = Array();
		
        
            
            //DESPESAS_MENSAIS            
            $permission = $this->setRouter("despesas_mensais","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("despesas_mensais","DELETE","remove" ,$permission);
            $permission = $this->setRouter("despesas_mensais","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("despesas_mensais","POST"  ,"create" ,$permission);
            
            
            //EMPRESAS            
            $permission = $this->setRouter("empresas","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("empresas","DELETE","remove" ,$permission);
            $permission = $this->setRouter("empresas","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("empresas","POST"  ,"create" ,$permission);
            
            
            //EQUIPAMENTOS            
            $permission = $this->setRouter("equipamentos","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("equipamentos","DELETE","remove" ,$permission);
            $permission = $this->setRouter("equipamentos","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("equipamentos","POST"  ,"create" ,$permission);
            
            
            //ESTOQUES            
            $permission = $this->setRouter("estoques","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("estoques","DELETE","remove" ,$permission);
            $permission = $this->setRouter("estoques","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("estoques","POST"  ,"create" ,$permission);
            
            
            //FABRICANTES            
            $permission = $this->setRouter("fabricantes","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("fabricantes","DELETE","remove" ,$permission);
            $permission = $this->setRouter("fabricantes","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("fabricantes","POST"  ,"create" ,$permission);
            
            
            //GARANTIAS            
            $permission = $this->setRouter("garantias","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("garantias","DELETE","remove" ,$permission);
            $permission = $this->setRouter("garantias","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("garantias","POST"  ,"create" ,$permission);
            
            
            //MENUS            
            $permission = $this->setRouter("menus","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("menus","DELETE","remove" ,$permission);
            $permission = $this->setRouter("menus","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("menus","POST"  ,"create" ,$permission);
            
            
            //MODELOS            
            $permission = $this->setRouter("modelos","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("modelos","DELETE","remove" ,$permission);
            $permission = $this->setRouter("modelos","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("modelos","POST"  ,"create" ,$permission);
            
            
            //ORDEM_SERVICO_EQUIPAMENTO            
            $permission = $this->setRouter("ordem_servico_equipamento","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("ordem_servico_equipamento","DELETE","remove" ,$permission);
            $permission = $this->setRouter("ordem_servico_equipamento","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("ordem_servico_equipamento","POST"  ,"create" ,$permission);
            
            
            //ORDER_SERVICOS            
            $permission = $this->setRouter("order_servicos","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("order_servicos","DELETE","remove" ,$permission);
            $permission = $this->setRouter("order_servicos","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("order_servicos","POST"  ,"create" ,$permission);
            
            
            //OS_EQUIP_PECAS            
            $permission = $this->setRouter("os_equip_pecas","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("os_equip_pecas","DELETE","remove" ,$permission);
            $permission = $this->setRouter("os_equip_pecas","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("os_equip_pecas","POST"  ,"create" ,$permission);
            
            
            //PECAS            
            $permission = $this->setRouter("pecas","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("pecas","DELETE","remove" ,$permission);
            $permission = $this->setRouter("pecas","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("pecas","POST"  ,"create" ,$permission);
            
            
            //PERFIL_TELAS            
            $permission = $this->setRouter("perfil_telas","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("perfil_telas","DELETE","remove" ,$permission);
            $permission = $this->setRouter("perfil_telas","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("perfil_telas","POST"  ,"create" ,$permission);
            
            
            //PERFIS            
            $permission = $this->setRouter("perfis","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("perfis","DELETE","remove" ,$permission);
            $permission = $this->setRouter("perfis","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("perfis","POST"  ,"create" ,$permission);
            
            
            //PERMISSOES            
            $permission = $this->setRouter("permissoes","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("permissoes","DELETE","remove" ,$permission);
            $permission = $this->setRouter("permissoes","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("permissoes","POST"  ,"create" ,$permission);
            
            
            //SITUACOES            
            $permission = $this->setRouter("situacoes","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("situacoes","DELETE","remove" ,$permission);
            $permission = $this->setRouter("situacoes","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("situacoes","POST"  ,"create" ,$permission);
            
            
            //STATUS            
            $permission = $this->setRouter("status","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("status","DELETE","remove" ,$permission);
            $permission = $this->setRouter("status","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("status","POST"  ,"create" ,$permission);
            
            
            //TELAS            
            $permission = $this->setRouter("telas","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("telas","DELETE","remove" ,$permission);
            $permission = $this->setRouter("telas","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("telas","POST"  ,"create" ,$permission);
            
            
            //TEMAS            
            $permission = $this->setRouter("temas","GET"   ,"findAll"    ,$permission);            
            $permission = $this->setRouter("temas","DELETE","remove" ,$permission);
            $permission = $this->setRouter("temas","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("temas","POST"  ,"create" ,$permission);
            
            
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