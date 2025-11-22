<?php
//-----------------------CREATE_MODELS--------------------------------------
function createModel()
{
    $tables = getAllTables();

    while ($tableRow = $tables->fetch()) {
        // Compatibilidade PHP 8: extrair nome da tabela
        $table = [is_array($tableRow) ? array_values($tableRow)[0] : $tableRow];

        $str = "<?php
    namespace engine\model;
   		
    class " . ucfirst($table[0]) . " implements \JsonSerializable {
";

        $str .= montaColunasModel($table[0]);
        $str .= montaPrimarys($table[0]);
        $str .= getSerializer($table[0]);
        $str .= montaGetSetModel($table[0]);
        $str .= '
	}
?>';
        gravar("engine/model/".ucfirst($table[0]).".php", $str);
    }
}

function montaColunasModel($table) {
    $sth = getColum($table);
    
    $arrayColl = '';    
    while ( $row = $sth->fetch() ) {
        $arrayColl .= '
		private $' . $row ['Field'] . ';';
    }
    
    return $arrayColl;
}

function montaPrimarys($table) {
    
    $sth = getPrimaryKeys( $table );
    $cont = 1;
    
    $construct = '
';
    $construct .= '
		public function getKeys() {';
    $construct .= '
			return [';
    
    $size = $sth->rowCount();
    
    while ( $row = $sth->fetch() ) {        
        $construct .= "
				'" . $row ['Column_name'] . '\' =>$this->get' . ucfirst ( $row ['Column_name'] ) . "()";
        
        if ($cont < $size) {
            $construct .= ",";
        }
        
        $cont ++;
    }
    
    $construct .= '
			];';
    $construct .= "
		}";
    return $construct;
}

function getSerializer($table) {
    $sth = getColum( $table );
    $cont = 1;
    
    $construct = '
';
    $construct .= '
		public function jsonSerialize() {';
    $construct .= '
			return [';
    
    $size = $sth->rowCount ();
    
    while ( $row = $sth->fetch () ) {
        
        $construct .= "
				'" . $row ['Field'] . '\' =>$this->get' . ucfirst ( $row ['Field'] ) . "()";
        
        if ($cont < $size) {
            $construct .= ",";
        }
        
        $cont ++;
    }

    
    $construct .= '
			];';
    $construct .= "
		}";
    return $construct;
}

function montaGetSetModel($table) {
    $colunas = getColum($table);
    
    $StringGetSet = '
			';
    
    while ( $row = $colunas->fetch () ) {
        
        $StringGetSet .= '
		//' . strtoupper ( $row ['Field'] );
        
        $StringGetSet .= '
		function get' . ucfirst ( $row ['Field'] ) . '() {
			' . 'return $this->' . $row ['Field'] . ';
		}';
        $StringGetSet .= '
		function set' . ucfirst ( $row ['Field'] ) . '($' . $row ['Field'] . ') {
			' . 'return $this->' . $row ['Field'] . ' = $' . $row ['Field'] . ';
		}';
        
        $StringGetSet .= '
		';
    }
    
    return $StringGetSet;
}
//-----------------------CREATE_MODELS-------------------------------------
?>
