<?php
namespace engine\dao;
use engine\model\Usuarios;
use engine\utils\FilterWhere;

class UsuariosDao {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listUsuarios = $this->connection->getAll("usuarios", $where, $orderColun, $order, $page, $sizePage);        
        $listUsuariosResult = Array(); 
    	
    	foreach ($listUsuarios as $result){
            $usuarios = new Usuarios();            
         

            //ID
            $usuarios->setId($result['id']);

            //APROVADO
            $usuarios->setAprovado($result['aprovado']);

            //DATE_CREATE
            $usuarios->setDate_create($result['date_create']);

            //DATE_UPDATE
            $usuarios->setDate_update($result['date_update']);

            //NOME
            $usuarios->setNome($result['nome']);

            //PASSWORD
            $usuarios->setPassword($result['password']);

            //PASSWORD_FIST_ACCESS
            $usuarios->setPassword_fist_access($result['password_fist_access']);

            //ROOT_USER
            $usuarios->setRoot_user($result['root_user']);

            //TOKEN_ATIVACAO
            $usuarios->setToken_ativacao($result['token_ativacao']);

            //TOKEN_SEND
            $usuarios->setToken_send($result['token_send']);

            //USUARIO
            $usuarios->setUsuario($result['usuario']);
           if($result['fk_condominio_id'] != null){
                //FK_CONDOMINIO_ID
                $condominiosDao = new CondominiosDao($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_condominio_id']);
                $list = Array($filter);                


                $resultCondominios = $condominiosDao->getAll($list, "", "", 0, 0);
            	$usuarios->setFk_condominio_id($resultCondominios[0]);
                
           }

           if($result['fk_perfis_id'] != null){
                //FK_PERFIS_ID
                $perfisDao = new PerfisDao($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_perfis_id']);
                $list = Array($filter);                


                $resultPerfis = $perfisDao->getAll($list, "", "", 0, 0);
            	$usuarios->setFk_perfis_id($resultPerfis[0]);
                
           }


            //ROLES
            $usuarios->setRoles($result['roles']);
            $listUsuariosResult[] = $usuarios;
        }

        return $listUsuariosResult;
    }

    /**
     * Create
     */
    public function create($usuarios) {
        return $this->connection->merge($usuarios);        
    }

    /**
     * Delete
     */
    public function delete($usuarios){
         return $this->connection->delete($usuarios);
    }
}
?>