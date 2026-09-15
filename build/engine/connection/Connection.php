<?php
namespace engine\connection;
        
use engine;
use engine\utils\FilterWhere;
use engine\lib\ChromePhp;
        
class Connection{
        
    private $pdo_ = null;
    private $bancoName;
    private $showcaseSQL;
        
        
    function __construct()
    {
        $this->pdo_ = $this->getConnect();
    }
        
    /**
     * Metodo SQL de INSERT
     *
     * @param $object =
     *            Objeto de dados contendo colunas e valores
     * @return $object
     */
    private function insert($object)
    {
        $pieces = explode('\\', get_class($object));
        $nameTable = strtolower($pieces[sizeof($pieces) - 1]);

        $json = json_decode(json_encode($object), true);
        $campos = array();
        $placeholders = array();
        $params = array();
        $i = 0;

        foreach ($json as $key => $value) {
            if ($value === null) {
                continue;
            }
            $ph = ':p' . $i;
            $campos[] = '`' . str_replace('`', '', $key) . '`';
            $placeholders[] = $ph;
            $params[$ph] = $value;
            $i++;
        }

        if (count($campos) === 0) {
            throw new \InvalidArgumentException('INSERT sem colunas');
        }

        $sql = 'INSERT INTO `' . $this->bancoName . '`.`' . $nameTable . '` (' . implode(',', $campos) . ') VALUES (' . implode(',', $placeholders) . ')';

        $this->showCase($sql);
        $this->beginConnection();
        $sth = $this->pdo_->prepare($sql);
        $sth->execute($params);
        $id = $this->pdo_->lastInsertId();
        $this->commitConection();

        return $id;
    }
        
    /**
     * Mï¿½todo SQL de UPDATE
     *
     * @param $object =
     *            Objeto de dados contendo colunas e valores
     * @return OBJECT
     */
    private function update($object)
    {
        $pieces = explode('\\', get_class($object));
        $nameTable = strtolower($pieces[sizeof($pieces) - 1]);
        $json = json_decode(json_encode($object), true);
        $keys = $object->getKeys();

        $sets = array();
        $params = array();
        $i = 0;

        foreach ($json as $key => $value) {
            $ph = ':p' . $i;
            $sets[] = '`' . str_replace('`', '', $key) . '` = ' . $ph;
            $params[$ph] = $value;
            $i++;
        }

        $wheres = array();
        foreach ($keys as $keyName => $keyVal) {
            $ph = ':w' . $i;
            $wheres[] = '`' . str_replace('`', '', $keyName) . '` = ' . $ph;
            $params[$ph] = $keyVal;
            $i++;
        }

        if (count($wheres) === 0) {
            throw new \InvalidArgumentException('UPDATE sem chave primária');
        }

        $sql = 'UPDATE `' . $this->bancoName . '`.`' . $nameTable . '` SET ' . implode(',', $sets) . ' WHERE ' . implode(' AND ', $wheres);

        $this->showCase($sql);
        $this->beginConnection();
        $sth = $this->pdo_->prepare($sql);
        $sth->execute($params);
        $this->commitConection();

        $keyVals = array_values($keys);
        return $keyVals[0];
    }
        
    /**
     * Metodo SQL de DELETE
     *
     * @param $object =
     *            Objeto de dados contendo colunas e valores
     * @return $object
     */
    function delete($object)
    {
        $pieces = explode('\\', get_class($object));
        $nameTable = strtolower($pieces[sizeof($pieces) - 1]);
        $keys = $object->getKeys();

        $wheres = array();
        $params = array();
        $i = 0;

        foreach ($keys as $keyName => $keyVal) {
            if ($keyVal === null || $keyVal === '') {
                continue;
            }
            $ph = ':w' . $i;
            $wheres[] = '`' . str_replace('`', '', $keyName) . '` = ' . $ph;
            $params[$ph] = $keyVal;
            $i++;
        }

        if (count($wheres) === 0) {
            throw new \InvalidArgumentException('DELETE sem chave primária');
        }

        $sql = 'DELETE FROM `' . $this->bancoName . '`.`' . $nameTable . '` WHERE ' . implode(' AND ', $wheres);

        $this->showCase($sql);
        $this->beginConnection();
        $sth = $this->pdo_->prepare($sql);
        $sth->execute($params);
        $resultSize = $sth->rowCount();
        $this->commitConection();

        return $resultSize;
    }
        
    /**
     * Persist Object Informations
     *
     * @param
     *            $object
     */
    function persist($object)
    {
        return $this->insert($object);
    }
        
    function merge($object)
    {
    	$listWhere = Array();
    	$pieces = "";
    	$nameTable = "";
    	$tempjson = "";
    	$json = "";
    	$jsonData = "";
    	$list = null;
    	$id = 0;
    	$orderColun = '';
    	
        $pieces = explode('\\', get_class($object));
        
        $nameTable = $pieces[sizeof($pieces) - 1];
        //TO LOWER
        $nameTable = strtolower($nameTable);
        
        $tempjson = json_encode($object);
        
        $json = json_decode($tempjson, true);
        
        $jsonData = array_values($json);
        
        $list = $object->getKeys();
        
        
        if ($list != null) {
        
            // //PRIMARY KEYS
            $listKeys = array_keys($list);
        
            // //WHERE            
            
            $anding = '';
        
            for ($i = 0; $i < sizeof($listKeys); $i ++) {
        
                if($jsonData[$i] != null){
                	$where = new FilterWhere();
                	$where->setCollum($listKeys[$i]);
                	$where->setValue($jsonData[$i]);
                	$listWhere[] = $where;
                }
        
            }        
            
            if(sizeof($listWhere)>0){
        
                $orderColun = '';
        
                $result = $this->getAll($nameTable, $listWhere, $orderColun, true, 0, 0);
                
                if (sizeof($result) > 0) {
        
                	$id = $this->update($object);
                } else {
        
                	$id = $this->insert($object);
                }
            }else{
            	$id = $this->insert($object);
            }
        } else {
        	$id = $this->insert($object);
        }        
        
        return $this->getAll($nameTable, $listWhere, $orderColun, true, 0, 0);
                
    }
        
    /**
     * /**
     * Método SQL de SELECT
     *
     * @param String $table
     * @param FilterWhere $where
     * @param String $orderColun
     * @param boolean $order
     *            == (true -> 'ASC' or false-> 'DESC')
     * @return array object
     */
    function getAll($table, $where, $orderColun, $order, $page, $sizePage)
    {   
        $table = strtolower($table);
        $lista = $this->showColum($table);
        
        
        $coluns = '';
        $virgula = '';
        $cont = 0;
        
        while ($row = $lista->fetch()) {
        
            if ($cont == 0) {
                $virgula = '';
            } else {
                $virgula = ',';
            }
        
            $coluns .= $virgula . '`' . str_replace('`', '', $row['Field']) . '`';
            $cont ++;
        }
        
        $sql = ' SELECT ' . $coluns;
        $sql .= ' FROM `' . $this->bancoName . '`.`' . $table . '`';
        
        //var_dump($where);
        
        $params = Array();
        
		if (sizeof($where)>0) {
			
			$sql .= ' WHERE ';
			
			for ($i = 0; $i < sizeof($where); $i++) {
			
				if($i > 0){
					$sql .= ' AND ';
				}
				
				$sql .= $where[$i]->getCollum()." ".$where[$i]->getCondition()." :param".$i;
				
				$params[] = $where[$i]->getValue();
				
				$cont++;			
			}            
        }
        
        if (strlen($orderColun)>0) {
            $sql .= ' ORDER BY ' . $orderColun;
        }

        
        if ((strlen($orderColun)>0)) {
            if ($order) {
                $sql .= ' ASC ';
            } else if (! $order) {
                $sql .= ' DESC ';
            }
        }
        
        if ($page !== null && $page !== '' && $sizePage > 0) {
        	if($page > 0){
            	$sql .= ' LIMIT ' . ($page - 1) * $sizePage . ',' . $sizePage;
        	}else{
        		$sql .= ' LIMIT ' . 0 * $sizePage . ',' . $sizePage;
        	}
        }
        
        $this->showCase($sql);
        
        $this->beginConnection();
       
        $sth = $this->pdo_->prepare($sql);
        
        for ($i = 0; $i < sizeof($params); $i++) {
        	if(gettype($params[$i]) == "string"){
        		$sth->bindValue(":param".$i, $params[$i],\PDO::PARAM_STR);
        	}else{
        		$sth->bindValue(":param".$i, $params[$i],\PDO::PARAM_INT);
        	}        	
        }
       
        $sth->execute();
        
        
        $this->commitConection();
        
        $array = Array();
        
        while ($foren = $sth->fetch(\PDO::FETCH_ASSOC)) {
            $array[] = $foren;
        }
        return $array;
    }
        
    function execSelect($sql){
        $this->beginConnection();       
        $sth = $this->pdo_->prepare($sql);
        $sth->execute();                
        $this->commitConection();

        $array = Array();
        
        while ($foren = $sth->fetch(\PDO::FETCH_ASSOC)) {
            $array[] = $foren;
        }
        
        return $array;
    }

    // -------------------------------------------UTILS-----------------------------------------------
        
    /**
     * Return PDO Connection
     *
     * @return /PDO
     */
    private function getConnect()
    {
        $host = new engine\Hosts();
        $this->bancoName   = $host->getBanco();
        $this->showcaseSQL = $host->getShowDebug();
        
        $dsn = 'mysql:dbname=' . $host->getBanco() . ';host=' . $host->getIp().';charset=utf8mb4';
        
        $options = [
            \PDO::ATTR_EMULATE_PREPARES   => false,
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
            \PDO::ATTR_PERSISTENT => false
        ];
        
        try{
        $this->pdo_ = new \PDO($dsn
            ,  $host->getUsuario()
            ,  $host->getSenha()
            ,  $options
            );
        
        }catch (\Exception $e){
            error_log($e->getMessage());
            exit('Algo estranho aconteceu ao conectar com o Banco de Dados!'); //something a user can understand
        }
        return $this->pdo_;
    }
        
    /**
     * Begin Connection
     */
    private function beginConnection()
    {
        $this->pdo_->beginTransaction();
    }
        
    /**
     * Commit Conection
     */
    private function commitConection()
    {
        $this->pdo_->commit();
    }
        
    /**
     * Show Coluns
     *
     * @param
     *            $table
     * @return /PDOStatement
     */
    private function showColum($table)
    {
        
        $sql = 'SHOW COLUMNS FROM `' . $this->bancoName . '`.`' . strtolower($table) . '`';
        
        $this->beginConnection();
        
        $sth = $this->pdo_->prepare($sql);
        $sth->execute();
        
        $this->commitConection();
        
        return $sth;
    }
        
    private function showPrimaryKey($table)
    {
        $sql = 'SHOW KEYS FROM `' . $this->bancoName . '`.`' . $table . '`  WHERE Key_name = \'PRIMARY\'';
        
        $this->beginConnection();
        
        $sth = $this->pdo_->prepare($sql);
        $sth->execute();
        
        $this->commitConection();
        
        return $sth;
    }
        
    private function showCase($values){
        if($this->showcaseSQL){

            if ($this->showcaseSQL) {

                ChromePHP::warn($values);
    
            }
        	        	
        }		
    }
    // -------------------------------------------UTILS FIM-----------------------------------------------
}
?>