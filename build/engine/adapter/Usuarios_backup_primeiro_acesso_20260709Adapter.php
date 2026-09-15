<?php
namespace engine\adapter;
use engine\dao\Usuarios_backup_primeiro_acesso_20260709;
use engine\utils\FilterWhere;

class Usuarios_backup_primeiro_acesso_20260709Adapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listUsuarios_backup_primeiro_acesso_20260709 = $this->connection->getAll("usuarios_backup_primeiro_acesso_20260709", $where, $orderColun, $order, $page, $sizePage);        
        $listUsuarios_backup_primeiro_acesso_20260709Result = Array(); 
    	
    	foreach ($listUsuarios_backup_primeiro_acesso_20260709 as $result){
            $usuarios_backup_primeiro_acesso_20260709 = new Usuarios_backup_primeiro_acesso_20260709();            
         

            //ID
            $usuarios_backup_primeiro_acesso_20260709->setId($result['id']);

            //APROVADO
            $usuarios_backup_primeiro_acesso_20260709->setAprovado($result['aprovado']);

            //DATE_CREATE
            $usuarios_backup_primeiro_acesso_20260709->setDate_create($result['date_create']);

            //DATE_UPDATE
            $usuarios_backup_primeiro_acesso_20260709->setDate_update($result['date_update']);

            //NOME
            $usuarios_backup_primeiro_acesso_20260709->setNome($result['nome']);

            //PASSWORD
            $usuarios_backup_primeiro_acesso_20260709->setPassword($result['password']);

            //PASSWORD_FIST_ACCESS
            $usuarios_backup_primeiro_acesso_20260709->setPassword_fist_access($result['password_fist_access']);

            //ROOT_USER
            $usuarios_backup_primeiro_acesso_20260709->setRoot_user($result['root_user']);

            //TOKEN_ATIVACAO
            $usuarios_backup_primeiro_acesso_20260709->setToken_ativacao($result['token_ativacao']);

            //TOKEN_SEND
            $usuarios_backup_primeiro_acesso_20260709->setToken_send($result['token_send']);

            //USUARIO
            $usuarios_backup_primeiro_acesso_20260709->setUsuario($result['usuario']);

            //FK_CONDOMINIO_ID
            $usuarios_backup_primeiro_acesso_20260709->setFk_condominio_id($result['fk_condominio_id']);

            //FK_PERFIS_ID
            $usuarios_backup_primeiro_acesso_20260709->setFk_perfis_id($result['fk_perfis_id']);

            //ROLES
            $usuarios_backup_primeiro_acesso_20260709->setRoles($result['roles']);

            //TEMA_PREFERENCIA
            $usuarios_backup_primeiro_acesso_20260709->setTema_preferencia($result['tema_preferencia']);
            $listUsuarios_backup_primeiro_acesso_20260709Result[] = $usuarios_backup_primeiro_acesso_20260709;
        }

        return $listUsuarios_backup_primeiro_acesso_20260709Result;
    }

    /**
     * Create
     */
    public function create($usuarios_backup_primeiro_acesso_20260709) {
        return $this->connection->merge($usuarios_backup_primeiro_acesso_20260709);        
    }

    /**
     * Delete
     */
    public function delete($usuarios_backup_primeiro_acesso_20260709){
         return $this->connection->delete($usuarios_backup_primeiro_acesso_20260709);
    }
}
?>