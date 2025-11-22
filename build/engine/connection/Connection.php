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
        $id = null;
        
        $pieces = explode('\\', get_class($object));
        $nameTable = $pieces[sizeof($pieces) - 1];
        //TO LOWER
        $nameTable = strtolower($nameTable);
        
        $campos = '';
        $valores = '';
        $sql = '';
        
        
        $json = json_decode(json_encode($object), true);
        $jsonKeys = array_keys($json);
        $jsonData = array_values($json);
        
        $virgula = '';
        $aspas = '';
        
        for ($i = 0; $i < sizeof($jsonKeys); $i ++) {
            if ($i > 0) {
                $virgula = ',';
            } else {
                $virgula = '';
            }
        
            $campos .= ($virgula . $jsonKeys[$i]);
        
            if (strcasecmp('string', gettype($jsonData[$i])) == 0) {
                $aspas = '\'';
            } else {
                $aspas = '';
            }
        
            if ($jsonData[$i] == null) {
                $valores .= ($virgula . 'null');
            } else {
                $valores .= ($virgula . $aspas . $jsonData[$i] . $aspas);
            }
        }
        
        // Concatena todas as variaveis e finaliza a instrucao
        $sql .= 'INSERT INTO `' . $this->bancoName . '`.`' . $nameTable . '` (' . $campos . ')VALUES(' . $valores . ')';
        
        $this->showCase($sql);
        
        
        $this->beginConnection();
        $sth = $this->pdo_->prepare($sql);
        $sth->execute();
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
        $nameTable = $pieces[sizeof($pieces) - 1];
        
        
        //TO LOWER
        $nameTable = strtolower($nameTable);
        
        $set = '';
        $sql = '';
        
        
        $json = json_decode(json_encode($object), true);
        $jsonKeys = array_keys($json);
        $jsonData = array_values($json);
        
        $virgula = '';
        $aspas = '';
        $where = '';
        $id = null;
        
        for ($i = 0; $i < sizeof($jsonKeys); $i ++) {
            if ($i > 0) {
                $virgula = ',';
            } else {
                $virgula = '';
            }
        
            $dados = '';
            if ($jsonData[$i] == null) {
                $dados = 'null';
            } else {
                $dados = $jsonData[$i];
            }
        
            if (strcasecmp('string', gettype($jsonData[$i])) == 0) {
                $aspas = '\'';
            } else {
                $aspas = '';
            }
        
            if (strcasecmp('id', $jsonKeys[$i]) == 0) {
                $where = 'id=' . $jsonData[$i];
                $id = $jsonData[$i];
            }
        
            $set .= ($virgula . $jsonKeys[$i] . '=' . $aspas . $dados . $aspas);
        }
        
        // Concatena todas as variaveis e finaliza a instrucao
        $sql .= ' UPDATE `' . $this->bancoName . '`.`' . $nameTable . '`';
        $sql .= ' SET ' . $set;
        $sql .= ' WHERE ' . $where;
        
        $this->showCase($sql);
        
        $this->beginConnection();
        $sth = $this->pdo_->prepare($sql);
        $sth->execute();
        $resultAfected = $sth->rowCount();
        $this->commitConection();
        
        return $id;
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
        $pieces = explode(DIRECTORY_SEPARATOR, get_class($object));
        $nameTable = $pieces[sizeof($pieces) - 1];
        
        $sql = '';
        $where = '';
        
        $tempjson = json_encode($object);
        $json = json_decode($tempjson, true);
        
        $jsonKeys = array_keys($json);
        $jsonData = array_values($json);
        
        $resultSize = 0;
        
        for ($i = 0; $i < sizeof($jsonKeys); $i ++) {
            if (strcasecmp('id', $jsonKeys[$i]) == 0) {
                $where = 'id=' . $jsonData[$i];
                $resultSize = $jsonData[$i];
            }
        }
        
        // Concatena todas as variaveis e finaliza a instrucao
        $sql .= ' DELETE FROM `' . $this->bancoName . '`.`' . $nameTable . '`';
        $sql .= ' WHERE ' . $where;
        
        $this->showCase($sql);
        
        $this->beginConnection();
        $sth = $this->pdo_->prepare($sql);
        $sth->execute();  
        $resultSize= $sth->rowCount();
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
    function getAll($table, $where, $orderColun, $order = true, $page, $sizePage)
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
        
            $coluns .= $virgula . $row['Field'];
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
        
        if (!(strcasecmp(null, $page) == 0) && $sizePage > 0) {
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
        
        $dsn = 'mysql:dbname=' . $host->getBanco() . ';host=' . $host->getIp().';charset=utf8';
        
        $options = [
            \PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for 'real' prepared statements
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            \PDO::ATTR_PERSISTENT => true
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