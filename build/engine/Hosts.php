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
            $this->banco   = "mysql";
            $this->ip      = "localhost";
            $this->usuario = "root";
            $this->senha   = "";
        }else{
            $this->banco   = "mysql";
            $this->ip      = "localhost";
            $this->usuario = "root";
            $this->senha   = "";
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