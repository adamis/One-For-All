<?php
//-----------------------SQL_STRUCT--------------------------------------

function getSchemaName()
{
    return MAPPING_DATABASE == "TESTE" ? BANCO_T : BANCO;
}

function assertIdent($name)
{
    if (!preg_match('/^[A-Za-z0-9_]+$/', (string) $name)) {
        throw new InvalidArgumentException('Identificador SQL inválido: ' . $name);
    }
    return $name;
}

function getConection()
{
    $schema  = getSchemaName();
    $host    = MAPPING_DATABASE == "TESTE" ? IP_T : IP;
    $user    = MAPPING_DATABASE == "TESTE" ? USUARIO_T : USUARIO;
    $pass    = MAPPING_DATABASE == "TESTE" ? SENHA_T : SENHA;
    $charset = defined('CHARSET') ? CHARSET : 'utf8mb4';

    $pdo_ = new PDO(
        'mysql:dbname=' . $schema . ';host=' . $host . ';charset=' . $charset,
        $user,
        $pass
    );
    $pdo_->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo_->exec('SET NAMES ' . assertIdent($charset));

    return $pdo_;
}

function getAllTables()
{
    $pdo_ = getConection();
    $sth = $pdo_->prepare('SHOW TABLES');
    $sth->execute();

    return $sth;
}

function showColum($table)
{
    return getColum($table);
}

function shouldGenerateCrud($table)
{
    return strpos(strtolower((string) $table), 'ofa_') !== 0;
}

function isDateColumn($type)
{
    $t = strtolower(trim(preg_replace('/\(.*$/', '', (string) $type)));
    return in_array($t, ['date', 'datetime', 'timestamp', 'time'], true);
}

function getFk($table)
{
    $pdo_ = getConection();
    $query = 'SELECT
                table_name AS tabela,
                column_name AS coluna,
                referenced_table_name AS tabela_referencia,
                referenced_column_name AS coluna_referencia
              FROM information_schema.key_column_usage
              WHERE TABLE_SCHEMA = :schema
                AND TABLE_NAME = :table
                AND referenced_table_name IS NOT NULL';

    $sth = $pdo_->prepare($query);
    $sth->execute([
        ':schema' => getSchemaName(),
        ':table'  => assertIdent($table),
    ]);

    return $sth;
}

function getFkTable($table, $fk)
{
    $pdo_ = getConection();
    $query = 'SELECT
                table_name AS tabela,
                column_name AS coluna,
                referenced_table_name AS tabela_referencia,
                referenced_column_name AS coluna_referencia
              FROM information_schema.key_column_usage
              WHERE TABLE_SCHEMA = :schema
                AND TABLE_NAME = :table
                AND column_name = :fk
                AND referenced_table_name IS NOT NULL';

    $sth = $pdo_->prepare($query);
    $sth->execute([
        ':schema' => getSchemaName(),
        ':table'  => assertIdent($table),
        ':fk'     => assertIdent($fk),
    ]);

    return $sth;
}

function getPrimaryKeys($table)
{
    $pdo_ = getConection();
    $sql = 'SHOW KEYS FROM `' . getSchemaName() . '`.`' . assertIdent($table) . '` WHERE Key_name = \'PRIMARY\'';
    $sth = $pdo_->prepare($sql);
    $sth->execute();

    return $sth;
}

function getColum($table)
{
    $pdo_ = getConection();
    $query = 'SHOW COLUMNS FROM `' . getSchemaName() . '`.`' . assertIdent($table) . '`';
    $sth = $pdo_->prepare($query);
    $sth->execute();

    return $sth;
}
//-----------------------SQL_STRUCT--------------------------------------
