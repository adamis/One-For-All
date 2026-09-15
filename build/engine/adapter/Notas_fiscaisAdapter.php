<?php
namespace engine\adapter;
use engine\dao\Notas_fiscais;
use engine\utils\FilterWhere;

class Notas_fiscaisAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listNotas_fiscais = $this->connection->getAll("notas_fiscais", $where, $orderColun, $order, $page, $sizePage);        
        $listNotas_fiscaisResult = Array(); 
    	
    	foreach ($listNotas_fiscais as $result){
            $notas_fiscais = new Notas_fiscais();            
         

            //ID
            $notas_fiscais->setId($result['id']);

            //ANEXO
            $notas_fiscais->setAnexo($result['anexo']);

            //DATE_CREATE
            $notas_fiscais->setDate_create($result['date_create']);

            //DATE_UPDATE
            $notas_fiscais->setDate_update($result['date_update']);

            //NUMERO_NOTA_FISCAL
            $notas_fiscais->setNumero_nota_fiscal($result['numero_nota_fiscal']);

            //VALOR
            $notas_fiscais->setValor($result['valor']);
           if($result['fk_condominio_id'] != null){
                //FK_CONDOMINIO_ID
                $condominiosAdapter = new CondominiosAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['fk_condominio_id']);
                $list = Array($filter);                


                $resultCondominios = $condominiosAdapter->getAll($list, "", "", 0, 0);
            	$notas_fiscais->setFk_condominio_id($resultCondominios[0]);
                
           }

            $listNotas_fiscaisResult[] = $notas_fiscais;
        }

        return $listNotas_fiscaisResult;
    }

    /**
     * Create
     */
    public function create($notas_fiscais) {
        return $this->connection->merge($notas_fiscais);        
    }

    /**
     * Delete
     */
    public function delete($notas_fiscais){
         return $this->connection->delete($notas_fiscais);
    }
}
?>