<?php
namespace engine\dao;
use engine\model\Dados_adamis_cnpj;
use engine\utils\FilterWhere;

class Dados_adamis_cnpjDao {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listDados_adamis_cnpj = $this->connection->getAll("dados_adamis_cnpj", $where, $orderColun, $order, $page, $sizePage);        
        $listDados_adamis_cnpjResult = Array(); 
    	
    	foreach ($listDados_adamis_cnpj as $result){
            $dados_adamis_cnpj = new Dados_adamis_cnpj();            
         

            //ID
            $dados_adamis_cnpj->setId($result['id']);

            //BAIRRO
            $dados_adamis_cnpj->setBairro($result['bairro']);

            //CEP
            $dados_adamis_cnpj->setCep($result['cep']);

            //CIDADE
            $dados_adamis_cnpj->setCidade($result['cidade']);

            //CNPJ
            $dados_adamis_cnpj->setCnpj($result['cnpj']);

            //DATE_CREATE
            $dados_adamis_cnpj->setDate_create($result['date_create']);

            //DATE_UPDATE
            $dados_adamis_cnpj->setDate_update($result['date_update']);

            //LOGRADOURO
            $dados_adamis_cnpj->setLogradouro($result['logradouro']);

            //NOME
            $dados_adamis_cnpj->setNome($result['nome']);

            //NUMERO
            $dados_adamis_cnpj->setNumero($result['numero']);

            //TECNICO
            $dados_adamis_cnpj->setTecnico($result['tecnico']);

            //URL_FIG
            $dados_adamis_cnpj->setUrl_fig($result['url_fig']);

            //TIPO_LOGRADOURO
            $dados_adamis_cnpj->setTipo_logradouro($result['tipo_logradouro']);
            $listDados_adamis_cnpjResult[] = $dados_adamis_cnpj;
        }

        return $listDados_adamis_cnpjResult;
    }

    /**
     * Create
     */
    public function create($dados_adamis_cnpj) {
        return $this->connection->merge($dados_adamis_cnpj);        
    }

    /**
     * Delete
     */
    public function delete($dados_adamis_cnpj){
         return $this->connection->delete($dados_adamis_cnpj);
    }
}
?>