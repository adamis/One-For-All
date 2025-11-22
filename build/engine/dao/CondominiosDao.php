<?php
namespace engine\dao;
use engine\model\Condominios;
use engine\utils\FilterWhere;

class CondominiosDao {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listCondominios = $this->connection->getAll("condominios", $where, $orderColun, $order, $page, $sizePage);        
        $listCondominiosResult = Array(); 
    	
    	foreach ($listCondominios as $result){
            $condominios = new Condominios();            
         

            //ID
            $condominios->setId($result['id']);

            //BAIRRO
            $condominios->setBairro($result['bairro']);

            //CELULAR
            $condominios->setCelular($result['celular']);

            //CEP
            $condominios->setCep($result['cep']);

            //CIDADE
            $condominios->setCidade($result['cidade']);

            //CNPJ
            $condominios->setCnpj($result['cnpj']);

            //COMPLEMENTO
            $condominios->setComplemento($result['complemento']);

            //DATE_CREATE
            $condominios->setDate_create($result['date_create']);

            //DATE_UPDATE
            $condominios->setDate_update($result['date_update']);

            //EMAIL
            $condominios->setEmail($result['email']);

            //ESTADO
            $condominios->setEstado($result['estado']);

            //INSCRICAO_MUNICIPAL
            $condominios->setInscricao_municipal($result['inscricao_municipal']);

            //LOGRADOURO
            $condominios->setLogradouro($result['logradouro']);

            //NUMERO
            $condominios->setNumero($result['numero']);

            //RAZAO_SOCIAL
            $condominios->setRazao_social($result['razao_social']);

            //TELEFONE
            $condominios->setTelefone($result['telefone']);

            //TIPO_LOGRADOURO
            $condominios->setTipo_logradouro($result['tipo_logradouro']);
            $listCondominiosResult[] = $condominios;
        }

        return $listCondominiosResult;
    }

    /**
     * Create
     */
    public function create($condominios) {
        return $this->connection->merge($condominios);        
    }

    /**
     * Delete
     */
    public function delete($condominios){
         return $this->connection->delete($condominios);
    }
}
?>