<?php
namespace engine;

class Hosts{
    
    private $oficial   = false;   
    private $showDebug = false; 
    private $banco   = "";
    private $ip      = "";
    private $usuario = "";
    private $senha   = "";
    private $folder  = "";
    
    
    function __construct() {
        if($this->oficial){
            $this->banco   = "oseasy-dev";
            $this->ip      = "192.168.0.223";
            $this->usuario = "admin";
            $this->senha   = "Adamis1234@";
        }else{
            $this->banco   = "oseasy-dev";
            $this->ip      = "192.168.0.223";
            $this->usuario = "admin";
            $this->senha   = "Adamis1234@";
        }
    }
    
    
    function getBanco()
    {
        return $this->banco;
        
    }

    function getIp()
    { 
        return $this->ip;
        
    }
    
    function getUsuario()
    {
        return $this->usuario;
        
    }

    function getSenha()
    {
        return $this->senha;
    }

    function getShowDebug()
    {
        return $this->showDebug;
    }
}
?>