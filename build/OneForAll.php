<?php

//----------------------- ActiveDefine.php -----------------------
//--------------------------------DEFINES--------------------------------------
//ALTERE PARA GERAR SEU BACK-END

// NOME DA PASTA DO PROJETO (caminho web a partir do htdocs)
define ( "PROJECT",    "OneForAll/build" ); //ALTERE PARA O NOME DO PROJETO
define ( "ONEFORALL_VERSION", "2.0.2" );

// DADOS DE BANCO (OFFICIAL)
define ( "BANCO"  , "oseasy-local" ); //ALTERE PARA O NOME DO SEU BANCO
define ( "IP"     , "localhost"   ); //ALTERE O IP DO SEU SERVIDOR
define ( "USUARIO", "root"        ); //ALTERE O USUARIO DO SEU SERVIDOR
define ( "SENHA"  , ""    ); //ALTERE A SENHA DO SEU SERVIDOR

// DADOS DE BANCO (TESTE)
define ( "BANCO_T"  , "oseasy-local" ); //ALTERE PARA O NOME DO SEU BANCO
define ( "IP_T"     , "localhost"   ); //ALTERE O IP DO SEU SERVIDOR
define ( "USUARIO_T", "root"        ); //ALTERE O USUARIO DO SEU SERVIDOR
define ( "SENHA_T"  , ""    ); //ALTERE A SENHA DO SEU SERVIDOR

define ( "MAPPING_DATABASE"  , "TESTE");
define ( "CHARSET", "utf8mb4" );
define ( "FORCE_OVERWRITE", true ); // true = regenera engine/ a cada execuÃ§Ã£o

//-----------------------------------------------------------------------------------

// PASTAS DO PROJETO
define ( "FOLDER", 	   "engine" 			    );
define ( "ADAPTER",    FOLDER . "/adapter/" 	);
define ( "CONNECTION", FOLDER . "/connection/" 	);
define ( "INTERACTOR", FOLDER . "/interactor/" 	);
define ( "DAO", 	   FOLDER . "/dao/" 		);
define ( "LIBS", 	   FOLDER . "/lib/" 		);
define ( "UTILS", 	   FOLDER . "/utils/" 		);
define ( "AUTH", 	   FOLDER . "/auth/" 		);
date_default_timezone_set ( "America/Sao_Paulo" );

//-----------------------DEFINES--------------------------------------
//-----------------------CREATE_FOLDER--------------------------------------
// Criando Folders
if (! file_exists ( FOLDER )) {
    mkdir ( FOLDER, 0777 );
}
if (! file_exists ( ADAPTER )) {
    mkdir ( ADAPTER, 0777 );
}
if (! file_exists ( CONNECTION)) {
    mkdir ( CONNECTION, 0777 );
}
if (! file_exists ( INTERACTOR)) {
    mkdir ( INTERACTOR, 0777 );
}
if (! file_exists ( DAO)) {
    mkdir ( DAO, 0777 );
}
if (! file_exists ( LIBS)) {
    mkdir ( LIBS, 0777 );
}
if (! file_exists ( UTILS)) {
    mkdir ( UTILS, 0777 );
}
if (! file_exists ( AUTH )) {
    mkdir ( AUTH, 0777 );
}
//-----------------------CREATE_FOLDER--------------------------------------

//----------------------- Utils.php -----------------------
//-----------------------UTILS--------------------------------------

function gravar($arquivo, $texto, $replace = null)
{
    if ($replace === null) {
        $replace = !defined('FORCE_OVERWRITE') || FORCE_OVERWRITE;
    }

    if (!$replace && file_exists($arquivo)) {
        return false;
    }

    $dir = dirname($arquivo);
    if ($dir !== '.' && $dir !== '' && !is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    return file_put_contents($arquivo, $texto) !== false;
}

function ler($arquivo)
{
    return file_get_contents($arquivo);
}

//-----------------------UTILS--------------------------------------

//----------------------- SqlStruct.php -----------------------
//-----------------------SQL_STRUCT--------------------------------------

function getSchemaName()
{
    return MAPPING_DATABASE == "TESTE" ? BANCO_T : BANCO;
}

function assertIdent($name)
{
    if (!preg_match('/^[A-Za-z0-9_]+$/', (string) $name)) {
        throw new InvalidArgumentException('Identificador SQL invÃ¡lido: ' . $name);
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

//----------------------- CreateSecurity.php -----------------------
//-----------------------SECURITY_OAUTH2--------------------------------------

function persistAndReadSecurity()
{
    $flagFile = FOLDER . '/.security_flag';
    if (isset($_GET['security'])) {
        $raw = strtolower(trim((string) $_GET['security']));
        $on = in_array($raw, ['1', 'true', 'sim', 'yes', 'on'], true);
        if (!is_dir(FOLDER)) {
            mkdir(FOLDER, 0777, true);
        }
        file_put_contents($flagFile, $on ? '1' : '0');
        return $on;
    }
    if (is_file($flagFile)) {
        return trim(file_get_contents($flagFile)) === '1';
    }
    return false;
}

function isSecurityEnabled()
{
    return persistAndReadSecurity();
}

function setupSecurity($enabled)
{
    if (!is_dir(AUTH)) {
        mkdir(AUTH, 0777, true);
    }

    writeSecurityConfig($enabled);
    writeTokenGuard();
    writeOAuth2Service();

    if (!$enabled) {
        if (is_file(FOLDER . '/oauth-admin.txt')) {
            unlink(FOLDER . '/oauth-admin.txt');
        }
        return;
    }

    $pdo = getConection();
    createOauthTables($pdo);
    $creds = seedOauth($pdo);
    writeOAuthInteractor();
    writeOauthCredentialsFile($creds);
}

function createOauthTables($pdo)
{
    $pdo->exec("CREATE TABLE IF NOT EXISTS ofa_users (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL,
        active TINYINT(1) NOT NULL DEFAULT 1,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $pdo->exec("CREATE TABLE IF NOT EXISTS ofa_oauth_clients (
        client_id VARCHAR(80) NOT NULL PRIMARY KEY,
        client_secret_hash VARCHAR(255) NULL,
        name VARCHAR(120) NOT NULL,
        public_client TINYINT(1) NOT NULL DEFAULT 1,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $pdo->exec("CREATE TABLE IF NOT EXISTS ofa_oauth_access_tokens (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        token VARCHAR(80) NOT NULL UNIQUE,
        user_id INT UNSIGNED NOT NULL,
        client_id VARCHAR(80) NOT NULL,
        expires_at DATETIME NOT NULL,
        revoked TINYINT(1) NOT NULL DEFAULT 0,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        INDEX idx_ofa_access_token (token),
        INDEX idx_ofa_access_user (user_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $pdo->exec("CREATE TABLE IF NOT EXISTS ofa_oauth_refresh_tokens (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        token VARCHAR(80) NOT NULL UNIQUE,
        access_token VARCHAR(80) NULL,
        user_id INT UNSIGNED NOT NULL,
        client_id VARCHAR(80) NOT NULL,
        expires_at DATETIME NOT NULL,
        revoked TINYINT(1) NOT NULL DEFAULT 0,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        INDEX idx_ofa_refresh_token (token)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
}

function seedOauth($pdo)
{
    $clientId = 'ofa-public';
    $existsClient = $pdo->prepare('SELECT client_id FROM ofa_oauth_clients WHERE client_id = :id');
    $existsClient->execute([':id' => $clientId]);
    if (!$existsClient->fetch()) {
        $ins = $pdo->prepare('INSERT INTO ofa_oauth_clients (client_id, client_secret_hash, name, public_client) VALUES (:id, NULL, :name, 1)');
        $ins->execute([':id' => $clientId, ':name' => 'OneForAll Public Client']);
    }

    $username = 'admin';
    $existsUser = $pdo->prepare('SELECT id FROM ofa_users WHERE username = :u');
    $existsUser->execute([':u' => $username]);
    $row = $existsUser->fetch(PDO::FETCH_ASSOC);

    $password = null;
    $created = false;
    if (!$row) {
        $password = bin2hex(random_bytes(8));
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $insU = $pdo->prepare('INSERT INTO ofa_users (username, password_hash, active) VALUES (:u, :p, 1)');
        $insU->execute([':u' => $username, ':p' => $hash]);
        $created = true;
    }

    return [
        'username' => $username,
        'password' => $password,
        'created' => $created,
        'client_id' => $clientId,
    ];
}

function writeOauthCredentialsFile($creds)
{
    $lines = [
        'OneForAll OAuth2',
        'Endpoint: POST /api/oauth/token',
        'grant_type=password',
        'username=' . $creds['username'],
        'client_id=' . $creds['client_id'],
    ];
    if (!empty($creds['created']) && !empty($creds['password'])) {
        $lines[] = 'password=' . $creds['password'];
        $lines[] = 'Guarde esta senha. Ela nao sera exibida de novo na proxima geracao.';
    } else {
        $lines[] = 'Usuario admin ja existia. A senha nao foi alterada.';
    }
    $lines[] = 'Exemplo: Authorization: Bearer {access_token}';
    gravar(FOLDER . '/oauth-admin.txt', implode(PHP_EOL, $lines) . PHP_EOL, true);
}

function writeSecurityConfig($enabled)
{
    $flag = $enabled ? 'true' : 'false';
    $str = <<<PHP
<?php
namespace engine;

class SecurityConfig
{
    public static function enabled()
    {
        return {$flag};
    }

    public static function accessTtl()
    {
        return 3600;
    }

    public static function refreshTtl()
    {
        return 2592000;
    }

    public static function defaultClientId()
    {
        return 'ofa-public';
    }
}
PHP;
    gravar(FOLDER . '/SecurityConfig.php', $str, true);
}

function writeTokenGuard()
{
    $str = <<<'PHP'
<?php
namespace engine\auth;

use engine\SecurityConfig;

class TokenGuard
{
    public static function isPublicRoute($class, $method)
    {
        return strtolower((string) $class) === 'oauth' && strtolower((string) $method) === 'token';
    }

    public static function assert($class, $method)
    {
        if (!SecurityConfig::enabled()) {
            return;
        }
        if (self::isPublicRoute($class, $method)) {
            return;
        }

        $token = self::extractBearer();
        $service = new OAuth2Service();
        if (!$service->validateAccessToken($token)) {
            http_response_code(401);
            header('WWW-Authenticate: Bearer realm="OneForAll", error="invalid_token"');
            echo json_encode([
                'error' => 'invalid_token',
                'error_description' => 'Token ausente, expirado ou invalido'
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }
    }

    public static function extractBearer()
    {
        $header = $_SERVER['HTTP_AUTHORIZATION'] ?? $_SERVER['REDIRECT_HTTP_AUTHORIZATION'] ?? '';
        if ($header === '' && function_exists('apache_request_headers')) {
            $headers = apache_request_headers();
            foreach ($headers as $name => $value) {
                if (strcasecmp($name, 'Authorization') === 0) {
                    $header = $value;
                    break;
                }
            }
        }
        if (stripos($header, 'Bearer ') === 0) {
            return trim(substr($header, 7));
        }
        if (!empty($_GET['access_token'])) {
            return (string) $_GET['access_token'];
        }
        if (!empty($_POST['access_token'])) {
            return (string) $_POST['access_token'];
        }
        return null;
    }
}
PHP;
    gravar(AUTH . 'TokenGuard.php', $str, true);
}

function writeOAuth2Service()
{
    $str = <<<'PHP'
<?php
namespace engine\auth;

use engine\Hosts;
use engine\SecurityConfig;
use PDO;

class OAuth2Service
{
    private $pdo;

    public function __construct()
    {
        $host = new Hosts();
        $dsn = 'mysql:dbname=' . $host->getBanco() . ';host=' . $host->getIp() . ';charset=utf8mb4';
        $this->pdo = new PDO($dsn, $host->getUsuario(), $host->getSenha(), [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function issueToken(array $input)
    {
        $grant = isset($input['grant_type']) ? (string) $input['grant_type'] : '';
        if ($grant === 'password') {
            return $this->passwordGrant($input);
        }
        if ($grant === 'refresh_token') {
            return $this->refreshGrant($input);
        }
        http_response_code(400);
        return [
            'error' => 'unsupported_grant_type',
            'error_description' => 'Use grant_type=password ou grant_type=refresh_token'
        ];
    }

    public function validateAccessToken($token)
    {
        if ($token === null || $token === '') {
            return false;
        }
        $sth = $this->pdo->prepare('SELECT id FROM ofa_oauth_access_tokens WHERE token = :t AND revoked = 0 AND expires_at > NOW() LIMIT 1');
        $sth->execute([':t' => $token]);
        return (bool) $sth->fetch();
    }

    private function passwordGrant(array $input)
    {
        $username = isset($input['username']) ? trim((string) $input['username']) : '';
        $password = isset($input['password']) ? (string) $input['password'] : '';
        $clientId = isset($input['client_id']) && $input['client_id'] !== ''
            ? (string) $input['client_id']
            : SecurityConfig::defaultClientId();

        if ($username === '' || $password === '') {
            http_response_code(400);
            return [
                'error' => 'invalid_request',
                'error_description' => 'username e password sao obrigatorios'
            ];
        }

        if (!$this->clientExists($clientId)) {
            http_response_code(401);
            return ['error' => 'invalid_client', 'error_description' => 'client_id invalido'];
        }

        $sth = $this->pdo->prepare('SELECT id, password_hash, active FROM ofa_users WHERE username = :u LIMIT 1');
        $sth->execute([':u' => $username]);
        $user = $sth->fetch();
        if (!$user || (int) $user['active'] !== 1 || !password_verify($password, $user['password_hash'])) {
            http_response_code(400);
            return ['error' => 'invalid_grant', 'error_description' => 'Usuario ou senha invalidos'];
        }

        return $this->createTokenPair((int) $user['id'], $clientId);
    }

    private function refreshGrant(array $input)
    {
        $refresh = isset($input['refresh_token']) ? (string) $input['refresh_token'] : '';
        $clientId = isset($input['client_id']) && $input['client_id'] !== ''
            ? (string) $input['client_id']
            : SecurityConfig::defaultClientId();

        if ($refresh === '') {
            http_response_code(400);
            return ['error' => 'invalid_request', 'error_description' => 'refresh_token obrigatorio'];
        }

        $sth = $this->pdo->prepare('SELECT * FROM ofa_oauth_refresh_tokens WHERE token = :t AND revoked = 0 AND expires_at > NOW() LIMIT 1');
        $sth->execute([':t' => $refresh]);
        $row = $sth->fetch();
        if (!$row || $row['client_id'] !== $clientId) {
            http_response_code(400);
            return ['error' => 'invalid_grant', 'error_description' => 'refresh_token invalido'];
        }

        $this->pdo->prepare('UPDATE ofa_oauth_refresh_tokens SET revoked = 1 WHERE token = :t')->execute([':t' => $refresh]);
        if (!empty($row['access_token'])) {
            $this->pdo->prepare('UPDATE ofa_oauth_access_tokens SET revoked = 1 WHERE token = :t')->execute([':t' => $row['access_token']]);
        }

        return $this->createTokenPair((int) $row['user_id'], $clientId);
    }

    private function createTokenPair($userId, $clientId)
    {
        $access = bin2hex(random_bytes(32));
        $refresh = bin2hex(random_bytes(32));
        $accessTtl = SecurityConfig::accessTtl();
        $refreshTtl = SecurityConfig::refreshTtl();
        $accessExp = date('Y-m-d H:i:s', time() + $accessTtl);
        $refreshExp = date('Y-m-d H:i:s', time() + $refreshTtl);

        $insA = $this->pdo->prepare('INSERT INTO ofa_oauth_access_tokens (token, user_id, client_id, expires_at) VALUES (:t, :u, :c, :e)');
        $insA->execute([
            ':t' => $access,
            ':u' => $userId,
            ':c' => $clientId,
            ':e' => $accessExp,
        ]);

        $insR = $this->pdo->prepare('INSERT INTO ofa_oauth_refresh_tokens (token, access_token, user_id, client_id, expires_at) VALUES (:t, :a, :u, :c, :e)');
        $insR->execute([
            ':t' => $refresh,
            ':a' => $access,
            ':u' => $userId,
            ':c' => $clientId,
            ':e' => $refreshExp,
        ]);

        return [
            'access_token' => $access,
            'token_type' => 'Bearer',
            'expires_in' => $accessTtl,
            'refresh_token' => $refresh,
        ];
    }

    private function clientExists($clientId)
    {
        $sth = $this->pdo->prepare('SELECT client_id FROM ofa_oauth_clients WHERE client_id = :id LIMIT 1');
        $sth->execute([':id' => $clientId]);
        return (bool) $sth->fetch();
    }
}
PHP;
    gravar(AUTH . 'OAuth2Service.php', $str, true);
}

function writeOAuthInteractor()
{
    $str = <<<'PHP'
<?php
use engine\auth\OAuth2Service;

function token()
{
    $input = $_POST;
    if (!$input) {
        $raw = file_get_contents('php://input');
        $json = json_decode($raw, true);
        if (is_array($json)) {
            $input = $json;
        } else {
            parse_str($raw, $parsed);
            if (is_array($parsed) && $parsed) {
                $input = $parsed;
            }
        }
    }
    if (!$input) {
        $input = $_REQUEST;
    }

    $service = new OAuth2Service();
    return json_encode($service->issueToken($input), JSON_UNESCAPED_UNICODE);
}
PHP;
    gravar(INTERACTOR . 'oauth.php', $str, true);
}

//-----------------------SECURITY_OAUTH2--------------------------------------

//----------------------- CreateDaos.php -----------------------
//-----------------------CREATE_DAOS--------------------------------------
function createDao()
{
    $tables = getAllTables();

    while ($table = $tables->fetch()) {
        if (!shouldGenerateCrud($table[0])) {
            continue;
        }

        $str = "<?php
    namespace engine\dao;
   		
    class " . ucfirst($table[0]) . " implements \JsonSerializable {
";

        $str .= montaColunasDao($table[0]);
        $str .= montaPrimarys($table[0]);
        $str .= getSerializer($table[0]);
        $str .= montaGetSetDao($table[0]);
        $str .= '
	}
?>';
        gravar("engine/dao/".ucfirst($table[0]).".php", $str);
    }
}

function montaColunasDao($table) {
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
		public function jsonSerialize(): mixed {';
    $construct .= '
			return [';
    
    $size = $sth->rowCount ();
    
    while ( $row = $sth->fetch () ) {
        
        $construct .= "
				'" . $row ['Field'] . '\' =>$this->get' . ucfirst ( $row ['Field'] ) . "()";
        // echo '<br>'.$cont.'->'.$size;
        if ($cont < $size) {
            $construct .= ",";
        }
        
        $cont ++;
    }
    // echo "<br><br>";
    
    $construct .= '
			];';
    $construct .= "
		}";
    return $construct;
}

function montaGetSetDao($table) {
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
//-----------------------CREATE_DAOS--------------------------------------

//----------------------- CreateAdapters.php -----------------------
//-----------------------CREATE_ADAPTER--------------------------------------

function createAdapters() {
    $tables = getAllTables();
    
    while ($table = $tables->fetch()) {
        if (!shouldGenerateCrud($table[0])) {
            continue;
        }
        
        $strHeader = "<?php
namespace engine\adapter;
";
        $strHeader = setUseAdapter($strHeader,"engine\dao\\".ucfirst($table[0]));
        $strHeader = setUseAdapter($strHeader,"engine\utils\FilterWhere");
        
        $str = "
class ".ucfirst($table[0])."Adapter {
			
    private \$connection;
    	
    public function __construct(\$connection) {
    	\$this->connection = \$connection;
    }
    
    /**
     * GetAll
     */
    public function getAll(\$where, \$orderColun, \$order, \$page, \$sizePage){
    	\$list".ucfirst($table[0])." = \$this->connection->getAll(\"".$table[0]."\", \$where, \$orderColun, \$order, \$page, \$sizePage);        
        \$list".ucfirst($table[0])."Result = Array(); 
    	
    	foreach (\$list".ucfirst($table[0])." as \$result){
            \$".$table[0]." = new ".ucfirst($table[0])."();            
         ";
           
            $fkByColumn = array();
            $fks = getFk($table[0]);
            while ($fk = $fks->fetch()) {
                $fkByColumn[$fk['coluna']] = $fk;
            }

            $coluns = getColum($table[0]);
                
            while ( $row = $coluns->fetch() ) {
                $field = $row ['Field'];
                $control = !isset($fkByColumn[$field]);
                
                if($control){//CAMPO NORMAL
                    $str .= "

            //".strtoupper($row ['Field'])."
            \$".$table[0]."->set".ucfirst($row ['Field'])."(\$result['".$row ['Field']."']);"; //CAMPO NORMAL
                
                }else{//FK
                
                    $tab = $fkByColumn[$field];
                    
                    $str .= "
           if(\$result['".$row ['Field']."'] != null){
                //".strtoupper($row ['Field'])."
                \$".$tab['tabela_referencia']."Adapter = new ".ucfirst($tab['tabela_referencia'])."Adapter(\$this->connection);
				\$filter = new FilterWhere();
                \$filter->setCollum('".$tab["coluna_referencia"]."');
                \$filter->setValue(\$result['".$row ['Field']."']);
                \$list = Array(\$filter);                


                \$result".ucfirst($tab['tabela_referencia'])." = \$".$tab['tabela_referencia']."Adapter->getAll(\$list, \"\", \"\", 0, 0);
            	\$".$table[0]."->set".ucfirst($row ['Field'])."(\$result".ucfirst($tab['tabela_referencia'])."[0]);
                
           }
";
                    
                }
            }
            
            $str .= "
            \$list".ucfirst($table[0])."Result[] = \$".$table[0].";";
            
            $str .= "
        }
";
            $str .= "
        return \$list".ucfirst($table[0])."Result;";
            
            $str .= "
    }";
            $str .= "

    /**
     * Create
     */
    public function create(\$".$table[0].") {
        return \$this->connection->merge(\$".$table[0].");        
    }";
            
            $str .="

    /**
     * Delete
     */
    public function delete(\$".$table[0]."){
         return \$this->connection->delete(\$".$table[0].");
    }";
            
         $str .= "
}
?>";
        
        gravar("engine/adapter/".ucfirst($table[0])."Adapter.php", $strHeader.$str);
    }
}

function setUseAdapter($strHeader,$table) {
	
	if (strpos($strHeader, ucfirst($table)) !== false) {
		$strHeader = $strHeader;
	}else{
		$strHeader .= 'use '.$table.';
';
	}
	
	return $strHeader;
}




//-----------------------CREATE_ADAPTER--------------------------------------

//----------------------- CreateInteractor.php -----------------------
//-----------------------CREATE_INTERACTOR--------------------------------------

function createInteractor() {
    $tables = getAllTables();
    
    while ($table = $tables->fetch()) {
        if (!shouldGenerateCrud($table[0])) {
            continue;
        }
        
        $strHeader = "<?php    
";
        $strHeader = setUseInteractor($strHeader, 'engine\adapter');
        $strHeader = setUseInteractor($strHeader, 'engine\connection');
        $strHeader = setUseInteractor($strHeader, 'engine\dao');
        $strHeader = setUseInteractor($strHeader, 'engine\utils\FilterWhere');
        $strHeader = setUseInteractor($strHeader, 'engine\utils\ResponseDelete');
        
        $str ="";
        
        $str .= "
/**
 * FindAll
 */
function find()
{
    \$where = new FilterWhere();
	\$page = 0;
	\$pageSize = 0;
	\$list = Array(); 

";
    $coluns = getColum($table[0]);
                
    while ( $row = $coluns->fetch() ) {
        if(strtolower($row['Field']) == 'id'){
            $str .= "
    if (isset(\$_REQUEST['".strtolower("id")."'])) {
		\$where = new FilterWhere();
		\$where->setCollum('".$table[0].".id');		
		\$where->setValue(\$_REQUEST['".strtolower("id")."']);
        \$list[]=\$where;
    }
";
        }else if(strpos($row['Type'], 'int') !== false){
            $str .= " 
    if(isset(\$_REQUEST['".strtolower($row['Field'])."'])) {
 
		 \$where = new FilterWhere();       
		 \$where->setCollum('".strtolower($table[0].".".$row['Field'])."');         
		 \$where->setValue(\$_REQUEST['".strtolower($row['Field'])."']);
		 \$list[]=\$where;

    }
";
        }else{
            $str .= "
    if (isset(\$_REQUEST['".strtolower($row['Field'])."'])) {

		\$where = new FilterWhere();       
		\$where->setCollum('".strtolower($table[0].".".$row['Field'])."');
        \$where->setCondition('like');
		\$where->setValue('%'.\$_REQUEST['".strtolower($row['Field'])."'].'%');
		\$list[]=\$where;
        
    }";
            
        }
    }
    		$str .= "

 	if (isset(\$_REQUEST['page'])) {
    	\$page = \$_REQUEST['page'];
    }
    if (isset(\$_REQUEST['pageSize'])) {
    	\$pageSize = \$_REQUEST['pageSize'];
    }
"; 
    
            $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Adapter = new adapter\\".ucfirst($table[0])."Adapter(\$connection);
    \$result = \$".strtolower($table[0])."Adapter->getAll(\$list, \"\", \"\", \$page, \$pageSize);
        
    return json_encode(\$result, JSON_UNESCAPED_UNICODE);
";
    
                $str .= "
}
";
        $str .= "
/**
 * Get
 */
function findAll()
{
    \$where = new FilterWhere();
	\$page = 0;
	\$pageSize = 0;
	\$list = Array();

";
        $coluns = getColum($table[0]);
        
        while ( $row = $coluns->fetch() ) {
            if(strtolower($row['Field']) == 'id'){
                $str .= "
    if (isset(\$_GET['".strtolower("id")."'])) {        
		\$where = new FilterWhere();
		\$where->setCollum('".$table[0].".id');
		\$where->setValue(\$_GET['".strtolower("id")."']);
        \$list[]=\$where;
    }
";
            }else if(strpos($row['Type'], 'int') !== false){
                $str .= "
    if (isset(\$_GET['".strtolower($row['Field'])."'])) {
         \$where = new FilterWhere();       
		 \$where->setCollum('".strtolower($table[0].".".$row['Field'])."');         
		 \$where->setValue(\$_GET['".strtolower($row['Field'])."']);
		 \$list[]=\$where;
    }
";
            }else{
                $str .= "
    if (isset(\$_GET['".strtolower($row['Field'])."'])) {
       \$where = new FilterWhere();       
		\$where->setCollum('".strtolower($table[0].".".$row['Field'])."');
        \$where->setCondition('like');
		\$where->setValue('%'.\$_GET['".strtolower($row['Field'])."'].'%');
		\$list[]=\$where;
    }";
                
            }
        }
        
        $str .= "
        		
 	if (isset(\$_REQUEST['page'])) {
    	\$page = \$_REQUEST['page'];
    }
    if (isset(\$_REQUEST['pageSize'])) {
    	\$pageSize = \$_REQUEST['pageSize'];
    }
"; 
        
        $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Adapter = new adapter\\".ucfirst($table[0])."Adapter(\$connection);
    \$result = \$".strtolower($table[0])."Adapter->getAll(\$list, \"\", \"\", \$page, \$pageSize);
        
    return json_encode(\$result, JSON_UNESCAPED_UNICODE);
";
        $str .= "
}
"; 
        $str .= "
/**
 * Delete
 */
function remove()
{
    \$".strtolower($table[0])." = new dao\\".ucfirst($table[0])."();
";
    $coluns = getColum($table[0]);
                
    while ( $row = $coluns->fetch() ) {
        if(strtolower($row['Field']) == 'id'){
            $str .= "
    if (isset(\$_GET['".strtolower("id")."'])) {        
        \$".strtolower($table[0])."->setId(\$_GET['".strtolower("id")."']);
    }
";
        }else if(strpos($row['Type'], 'int') !== false){
            $str .= "
    if (isset(\$_GET['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$_GET['".strtolower($row['Field'])."']);
    }
";
        }else{
            $str .= "
    if (isset(\$_GET['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$_GET['".strtolower($row['Field'])."']);
    }";
            
        }
    }
    
   
    
    
    $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Adapter = new adapter\\".ucfirst($table[0])."Adapter(\$connection);
    \$result = \$".strtolower($table[0])."Adapter->delete(\$".strtolower($table[0]).");

    ";    
	$str .= "
	\$response = new ResponseDelete();
	\$response->setSize(\$result);
	if(\$result > 0){
		\$response->setStatus(true);
	}else{
		\$response->setStatus(false);
	}	
";
	$str .= "
    return json_encode(\$response, JSON_UNESCAPED_UNICODE);
";
    
    $str .= "
}
";
        $str .="
/**
 * Put
 */
function update()
{
 \$".strtolower($table[0])." = new dao\\".ucfirst($table[0])."();
";
    $str .="
	\$post_vars = getParametersPUT();
	\$listKey = array(\"id\");	
	
	if(!validPut(\$listKey,\$post_vars)){
		http_response_code(400);
		return; 
	}";
    
    $coluns = getColum($table[0]);
                
    while ( $row = $coluns->fetch() ) {
        if(strtolower($row['Field']) == 'id'){
            $str .= "
    if (isset(\$post_vars['".strtolower("id")."'])) {        
        \$".strtolower($table[0])."->setId(\$post_vars['".strtolower("id")."']);
    }
";
        }else if(strpos($row['Type'], 'int') !== false){
            $str .= "
    if (isset(\$post_vars['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$post_vars['".strtolower($row['Field'])."']);
    }
";
        }else{
            $str .= "
    if (isset(\$post_vars['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$post_vars['".strtolower($row['Field'])."']);
    }";
            
        }
    }
    $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Adapter = new adapter\\".ucfirst($table[0])."Adapter(\$connection);
    \$result = \$".strtolower($table[0])."Adapter->create(\$".strtolower($table[0]).");
        
    return json_encode(\$result, JSON_UNESCAPED_UNICODE);
";
    
    $str .="
}
";
        
        $str .="
/**
 * Insert
 */
function create()
{
    \$".strtolower($table[0])." = new dao\\".ucfirst($table[0])."();
";
    $coluns = getColum($table[0]);
                
    while ( $row = $coluns->fetch() ) {
        if(strtolower($row['Field']) == 'id'){
            $str .= "
    if (isset(\$_REQUEST['".strtolower("id")."'])) {        
        \$".strtolower($table[0])."->setId(\$_REQUEST['".strtolower("id")."']);
    }
";
        }else if(strpos($row['Type'], 'int') !== false){
            $str .= "
    if (isset(\$_REQUEST['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$_REQUEST['".strtolower($row['Field'])."']);
    }
";
        }else{
            $str .= "
    if (isset(\$_REQUEST['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$_REQUEST['".strtolower($row['Field'])."']);
    }";
            
        }
    }
    $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Adapter = new adapter\\".ucfirst($table[0])."Adapter(\$connection);
    \$result = \$".strtolower($table[0])."Adapter->create(\$".strtolower($table[0]).");
        
    return json_encode(\$result, JSON_UNESCAPED_UNICODE);
";
    
    $str .="       
}
";
        
        $str .= "
?>";
        gravar("engine/interactor/".strtolower($table[0]).".php", $strHeader.$str);
    }
}


function setUseInteractor($strHeader,$table) {
    
    if (strpos($strHeader, ucfirst($table)) !== false) {        
        $strHeader = $strHeader;
    }else{        
        $strHeader .= 'use '.$table.';
';
    }
    
    return $strHeader;
}

//-----------------------CREATE_INTERACTOR--------------------------------------

//----------------------- Recursos.php -----------------------
//-----------------------RESOURCES--------------------------------------

function getAutoload()
{
    $str = "<?php
        spl_autoload_register(function (\$class) {
            require __DIR__ . \"/\" . str_replace(\"\\\\\", \"/\", \$class) . \".php\";
        });
?>";

    gravar("Autoload.php", $str);
}

function getBarramento()
{
    $str = 
'<?php
    include_once \'Autoload.php\';
    use engine\Acl;
?>
<!doctype html>
<html lang="pt-br">
        
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Barramento</h5>  
            <p class="card-text">Todas as suas apis serÃ£o listadas aqui!</p>  
            </div>
        </div>
<?php
    if (class_exists(\'engine\\SecurityConfig\') && \\engine\\SecurityConfig::enabled()) {
        echo \'<div class="card" style="margin:20px;"><div class="card-body">\';
        echo \'<h5 class="card-title">OAuth2</h5>\';
        echo \'<p class="card-text">APIs protegidas. Obtenha o token em <code>POST /api/oauth/token</code> com <code>grant_type=password</code>, <code>username</code> e <code>password</code>. Envie <code>Authorization: Bearer {access_token}</code> nas demais rotas. Refresh: <code>grant_type=refresh_token</code>.</p>\';
        $credFile = __DIR__ . \'/engine/oauth-admin.txt\';
        if (is_file($credFile)) {
            echo \'<pre style="background:#f5f5f5;padding:12px;white-space:pre-wrap;">\' . htmlspecialchars(file_get_contents($credFile), ENT_QUOTES, \'UTF-8\') . \'</pre>\';
        }
        echo \'</div></div>\';
    }
?>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <style>       

            /*the container must be positioned relative:*/
            .custom-select {
            position: relative;
            font-family: Arial;
            }

            .custom-select select {
            display: none; /*hide original SELECT element:*/
            }

            .select-selected {
            background-color: DodgerBlue;
            }

            /*style the arrow inside the select element:*/
            .select-selected:after {
            position: absolute;
            content: "";
            top: 14px;
            right: 10px;
            width: 0;
            height: 0;
            border: 6px solid transparent;
            border-color: #fff transparent transparent transparent;
            }

            /*point the arrow upwards when the select box is open (active):*/
            .select-selected.select-arrow-active:after {
            border-color: transparent transparent #fff transparent;
            top: 7px;
            }

            /*style the items (options), including the selected item:*/
            .select-items div,.select-selected {
            color: #ffffff;
            padding: 8px 16px;
            border: 1px solid transparent;
            border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
            cursor: pointer;
            user-select: none;
            }

            /*style items (options):*/
            .select-items {
            position: absolute;
            background-color: DodgerBlue;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 99;
            }

            /*hide the items when the select box is closed:*/
            .select-hide {
            display: none;
            }

            .select-items div:hover, .same-as-selected {
            background-color: rgba(0, 0, 0, 0.1);
            }

            pre {
                background-color: ghostwhite;
                border: 1px solid silver;
                padding: 10px 20px;
                margin: 20px; 
            }
            .json-key {
                color: brown;
            }
            .json-value {
                color: navy;
            }
            .json-string {
                color: olive;
            }


            table {
                margin-bottom: 0px !important;   
                border-spacing: 0 !important;   
            }

            .titles{
                background-color: #212529;
                color:white;                
            }

            .coluna1{
                background-color: #f5f5f5;                
                color:gray;                
            }
            .coluna2{
                background-color: #ffffff;                
                color:gray;   
                text-decoration: none;           
            }
            .formstyle {
                background-color: #ffffff;                
                padding: 10px;
                float:left; 
                border:solid 1px #bdbdbd; 
                border-radius:4px;
            }
            .shadow { 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 8px 16px 0 rgba(0, 0, 0, 0.16); 
            }
            .btnColapse {
                margin: 10px 0;
            }
            .btnDefault {
                margin-top: 10px;
                margin-bottom: 10px;
            }


        </style>


<?php

    $acls = new Acl();
    $permission =  $acls->getAcls();
    
    $tempName = "";
    $script = "";

    $arrTemp = Array();
    $cont = 0;
    $host = str_replace(\'barramento.php\',\'\',$_SERVER[\'HTTP_HOST\'].$_SERVER[\'REQUEST_URI\']);
    $host = str_replace(\'barramento\',\'\',$host).\'api/\';

    foreach($permission as $item) { //foreach element in $arr        
        if($tempName != $item[2]){            
            $tempName = $item[2];            
            $arrTemp[$cont]= \'http://\'.$host.$item[2];
            $cont++;
        }
    }
    
    $cont = 0;

    foreach ($arrTemp as $temp) {
        echo \'<div  class="table-responsive" style="padding:20px 20px; float:left;">\';
            echo \'<div class="table-responsive shadow" style="background-color: #212529; float:left; border:solid 1px #bdbdbd; border-radius:4px;">\';
                echo \'<table class="table" >\';

                    echo \'<tr>\';
                        echo \'<td  colspan="10" class="titles">\';
                            echo $temp;
                        echo \'</td>\';    
                    echo \'</tr>\';
            
                    $th = \'\';
                    $th .= \'<th scope="col">\';
                        $th .= \'Type:\';
                    $th .= \'</th>\';

                    $td = \'\';
                    $td .= \'<td scope="row">\';
                        $td .= \'FunÃ§Ã£o:\';
                    $td .=  \'</td>\';    

                    foreach ($permission as $key) {
                        if((\'http://\'.$host.$key[2]) == $temp){                

                                $th .= \'<th scope="col">\';
                                    $th .= \'\'.$key[0];
                                $th .= \'</th>\';

                                $td .= \'<td >\';
                                    $td .=  "<a title=\'http://".$host.$key[2].\'/\'.$key[1]."\' target=\'_blank\' href=\'http://".$host.$key[2].\'/\'.$key[1]."\'>".$key[1]."</a>";
                                $td .=  \'</td>\';    

                        }            
                    }

                   
                    echo \'<tr class="coluna1">\';
                        echo strtoupper($th);
                    echo \'</tr>\';
                    
                    echo \'<tr class="coluna2">\';
                        echo $td;
                    echo \'</tr>\';        

                echo \'</table>\';                
            echo \'</div>\';

?>
            <a id="toggleBtn<?=$cont?>" class="btn btn-primary btnColapse" data-toggle="collapse" href="#collapseForm<?=$cont?>" role="button" aria-expanded="false" aria-controls="collapseForm<?=$cont?>">
                Testar(+)
            </a>            


            <div id="collapseForm<?=$cont?>" class="collapse table-responsive shadow formstyle">
                    
                    <form id="gz-form<?=$cont?>">

                        <div class="form-group">
                                                        
                            <label for="exampleInputEmail1">FunÃ§Ã£o:</label>                            
                            <select>
<?php
                            foreach ($permission as $key) {
                                if((\'http://\'.$host.$key[2]) == $temp){                
                                    echo \'<option value="\'.$key[0].\':\'.$key[1].\'" >\'.$key[1].\'</option>\';
                                }            
                            }
?>                            
                            </select>
                            <small id="emailHelp" class="form-text text-muted">Selecione a funÃ§Ã£o que deseja testar!</small>    

                        </div>
                        

                        <div id="add<?=$cont?>">
                            <div id="group0" class="form-group">
                                
                                <div class="form-row">
                                    
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Chave">
                                    </div>

                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Valor">
                                    </div>
                                    
                                    <div onclick="deleteParam(\'0\')" class="btn btn-outline-danger" style="margin-right:10px;">Remover</div>
                                    
                                </div>

                            </div>
                        </div>
                            
                        <div class="form-group btnDefault">
                            <div onclick="addParam(<?=$cont?>)" class="btn btn-success">Adicionar</div>
<?php
                            foreach ($permission as $key) {
                                if((\'http://\'.$host.$key[2]) == $temp){
                                 echo \'<div onclick="exec(\\\'\'.$host.$key[2].\'/\\\',\'.$cont.\')" class="btn btn-primary">Executar</div>\';
                                 break;
                                }
                            }
?>                            
                        </div>                        
                        
                    </form>

                    <form id="formTextArea<?=$cont?>">
                        <div class="form-group">
                            <label for="formControlTextArea<?=$cont?>">Result:</label>
                            <label id="label<?=$cont?>" for="formControlTextArea<?=$cont?>">-</label>                            
                            <pre style="height:180px; overflow:auto;"><code id="formControlTextArea<?=$cont?>" rows="10"></code></pre>                            
                        </div>
                    </form>
            </div>

        </div>

 <?php   
    $script .= \'
        $(\\\'#collapseForm\'.$cont.\'\\\').on(\\\'show.bs.collapse\\\', function () {        
            document.getElementById(\\\'toggleBtn\'.$cont.\'\\\').innerHTML=\\\'Testar(-)\\\';
        });

        $(\\\'#collapseForm\'.$cont.\'\\\').on(\\\'hidden.bs.collapse\\\', function () {        
            document.getElementById(\\\'toggleBtn\'.$cont.\'\\\').innerHTML=\\\'Testar(+)\\\';
        });
                
\';

        $cont++;
    }
?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
    <script src="https://wtag.com.br/res/js/jsmin-1.0.0.js"></script>

    <script type="text/javascript">
        <?php echo $script; ?>

        //-------------- PRETTY --------------------------
        if (!library)
        var library = {};

        library.json = {
        replacer: function(match, pIndent, pKey, pVal, pEnd) {
            var key = \'<span class=json-key>\';
            var val = \'<span class=json-value>\';
            var str = \'<span class=json-string>\';
            var r = pIndent || \'\';
            if (pKey)
                r = r + key + pKey.replace(/[": ]/g, \'\') + \'</span>: \';
            if (pVal)
                r = r + (pVal[0] == \'"\' ? str : val) + pVal + \'</span>\';
            return r + (pEnd || \'\');
            },
        prettyPrint: function(obj) {
            var jsonLine = /^( *)("[\w]+": )?("[^"]*"|[\w.+-]*)?([,[{])?$/mg;
            return JSON.stringify(obj, null, 3)
                .replace(/&/g, \'&amp;\').replace(/\\\"/g, \'&quot;\')
                .replace(/</g, \'&lt;\').replace(/>/g, \'&gt;\')
                .replace(jsonLine, library.json.replacer);
            }
        };
        //-------------- FIM PRETTY --------------------------


        var contControl = new Array();

        function addParam(id) {
            console.log(contControl);
            contControl[id] = (contControl[id] == null)?1:contControl[id]; 
            
            var div = document.getElementById(\'add\'+id);
            //div.innerHTML= div.innerHTML+
            $("#add"+id).append(
            \'<div id="group\'+contControl[id]+\'" class="form-group"> \'+
                \'<div class="form-row"> \'+
                    
                    \'<div class="col"> \'+
                        \'<input type="text" class="form-control" placeholder="Chave"> \'+
                    \'</div> \'+

                    \'<div class="col"> \'+
                        \'<input type="text" class="form-control" placeholder="Valor"> \'+                        
                    \'</div> \'+
                    
                    \'<div onclick="deleteParam(\'+contControl[id]+\')" class="btn btn-outline-danger">Remover</div>\'+
                    
                \'</div> \'+
            \'</div>\');

            contControl[id] = contControl[id]+1;
        }

        function deleteParam(groupId) {
            var node = document.getElementById(\'group\'+groupId);
            if (node.parentNode) {
                node.parentNode.removeChild(node);
            }
        }

        function exec(url,idForm) {
            var type;
            var funcName;
            var params ="";
                        
            var result = getForm(idForm).split(\'<gz>\');

            for (let index = 0; index < result.length;index++) {
                if(index == 0){
                    var func = result[index].split(\':\');
                    type = func[0];
                    funcName = func[1];

                }else{

                    if(index%2 == 1){                        
                        params += result[index];                         
                    }else{                        
                        params += "="+result[index]; 
                        
                        if(index+1 != result.length){
                            params += "&";
                        }
                    }
                    
                }                
            }           
            //alert(params);

            if(type == \'GET\'){
                request(type,"http://"+url+funcName +"?"+ params, null, \'resultconsole\',idForm);            
            }else{
                request(type,"http://"+url+funcName, params, \'resultconsole\',idForm);            
            }
            

        }

        function resultconsole(msg,status,idForm){
            //alert(status+": "+msg+" - "+idForm);
            
            var div = document.getElementById(\'label\'+idForm);
            div.innerHTML = status;
            
            var textArea = document.getElementById(\'formControlTextArea\'+idForm);
            //textArea.html(library.json.prettyPrint(msg));
            //var jsonPretty = JSON.stringify(JSON.parse(msg),null,2); 
            if(status == 200){
                textArea.innerHTML = library.json.prettyPrint(JSON.parse(msg));
            }else{
                textArea.innerHTML = msg;
            }
            
        }

        function request(method, url, object, callback,idForm) {
            var request = new XMLHttpRequest();
            request.open(method, url, true);			
            request.setRequestHeader("Accept-Language", "pt-BR");
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
            request.onreadystatechange = function() {
                if (request.readyState == 4 && (request.status == 200 || request.status == 300)) {
                    
                        if (callback != null) {                            
                            eval(callback + "(\'" + request.responseText + "\',\'"+request.status+"\',\'"+idForm+"\')");
                        }
                    
                } else if (request.readyState == 4 && request.status == 400) {
                    try {                                            
                        eval(callback + "(\'" + request.responseText + "\',\'"+request.status+"\',\'"+idForm+"\')");
                    } catch (error) {
                        console.log(error);
                        eval(callback + "(\'{\"erro\":\""+error+"\"}\',\'"+request.status+"\',\'"+idForm+"\')");
                    }
                } else if (request.readyState == 4 && request.status == 500) {
                    if (callback != null) {
                        eval(callback + "(\'Internal Server Error\',\'"+request.status+"\',\'"+idForm+"\')");
                    } else {
                        alert("500 Internal Server Error");
                    }
                } else if (request.readyState == 4 && (request.status == 404 || request.status == 501)) {
                    if (callback != null) {
                        eval(callback + "(\'Not Implemented\',\'"+request.status+"\',\'"+idForm+"\')");
                    } else {
                        alert("501 Not Implemented");
                    }
                } else if (request.readyState == 4 && request.status == 502) {
                    if (callback != null) {
                        eval(callback + "(\'Bad Gateway\',\'"+request.status+"\',\'"+idForm+"\')");
                    } else {
                        alert("502 Bad Gateway");
                    }
                } else if (request.readyState == 4 && (request.status == 0 || request.status == 503)) {
                    if (callback != null) {
                        eval(callback + "(\'Service Unavailable\',\'"+request.status+"\',\'"+idForm+"\')");
                    } else {
                        alert("503 Service Unavailable");
                    }
                } else if (request.readyState == 4 && request.status == 504) {
                    if (callback != null) {                        
                        eval(callback + "(\'Gateway Timeout\',\'"+request.status+"\',\'"+idForm+"\')");
                    } else {
                        alert("504 Gateway Timeout");
                    }
                } else if (request.readyState == 4 && request.status == 505) {
                    if (callback != null) {
                        eval(callback + "(\'HTTP Version Not Supported\',\'"+request.status+"\',\'"+idForm+"\')");
                    } else {
                        alert("505 HTTP Version Not Supported");
                    }
                }
            };
            var data = "";
            if (method == "POST" || method == "PUT") {
                data = object;//"request=" + JSON.stringify(object);
            }
            request.send(data);
        }

        function getForm(idForm) {
            var one = true;
            var option = true;
            var get = "";
            var repeat = false;

            if (gI("gz-form"+idForm) != undefined) {
                var fields = gI("gz-form"+idForm);
                
                for (var i = 0; i < gL(fields); i++) {
                    if (gY(fields.elements[i]) != "submit") {
                        if (i == 0 || repeat) {
                            repeat = false;

                            if (gY(fields.elements[i]) == "checkbox") 
                                get = fields.elements[i].checked;
                            else {
                                if (gC(fields.elements[i]).indexOf("gz-option") > 0) {
                                    var options = fields.elements[i].options;
                                    
                                    for (var j = 0; j < options.length; j++) {
                                        option = false;
                                        
                                        if (j == 0)
                                            get = options[j].value;
                                        else
                                            get += "<,>" + options[j].value;
                                    }
                                } else {
                                    if (gY(fields.elements[i]) == "textarea") {
                                        /*
                                        * @see nicEdit.js
                                        */	
                                        var textStyle = document.getElementsByClassName("nicEdit-main");
                                        
                                        if (gH(textStyle[0]) != undefined)
                                            get = gH(textStyle[0]);			
                                        else {
                                            var normalized_enters = gV(fields.elements[i]).replace(/\r|\n/g, "\r\n");
                                            var text_with_br = normalized_enters.replace(/\r\n/g, "<br />");
                                            
                                            get = (gL(gV(fields.elements[i])) == 0) ? 
                                                    "null" : text_with_br;
                                        }
                                    } else {
                                        if (gC(fields.elements[i]).includes("gz-datalist-") > 0) {
                                            var datalist = gC(fields.elements[i]).split("gz-datalist-")[1];
                                            for (var j = 0; j < gI(datalist.split("-to-")[0]).options.length; j++) {
                                                if (gI(datalist.split("-to-")[0]).options[j].value == 
                                                        document.getElementsByName(datalist.split("-to-")[1])[0].value) {
                                                    get = gI(datalist.split("-to-")[0]).options[j].getAttribute("data-id");
                                                    j = gI(datalist.split("-to-")[0]).options.length;
                                                }
                                            }
                                        } else if (gY(fields.elements[i]) == "file")
                                            repeat = true;
                                        else			
                                            get = (gL(gV(fields.elements[i])) == 0) ? 
                                                    "null" : gV(fields.elements[i]);
                                    }
                                }
                            }
                        } else {
                            if (gY(fields.elements[i]) == "checkbox") 
                                get += "<gz>" + fields.elements[i].checked;
                            else {
                                if (gC(fields.elements[i]).indexOf("gz-option") > 0) {
                                    var options = fields.elements[i].options;
                                    
                                    for (var j = 0; j < options.length; j++) {
                                        if (option)
                                            get += options[j].value;
                                        else
                                            get += "<,>" + options[j].value;
                                    }
                                } else {	
                                    if (gY(fields.elements[i]) == "textarea") {
                                        /*
                                        * @see nicEdit.js
                                        */
                                        var textStyle = document.getElementsByClassName("nicEdit-main");

                                        if (gH(textStyle[0]) != undefined)
                                            get += "<gz>" + gH(textStyle[0]);				
                                        else {
                                            var normalized_enters = gV(fields.elements[i]).replace(/\r|\n/g, "\r\n");
                                            var text_with_br = normalized_enters.replace(/\r\n/g, "<br />");
                                            
                                            get += "<gz>" + 
                                                    ((gL(gV(fields.elements[i])) == 0) 
                                                    ? "null" : text_with_br);
                                        }
                                    } else {
                                        if (gC(fields.elements[i]).includes("gz-datalist-") > 0) {
                                            var datalist = gC(fields.elements[i]).split("gz-datalist-")[1];
                                            for (var j = 0; j < gI(datalist.split("-to-")[0]).options.length; j++) {
                                                if (gI(datalist.split("-to-")[0]).options[j].value == 
                                                        document.getElementsByName(datalist.split("-to-")[1])[0].value) {
                                                    if (get != "") {
                                                        get += "<gz>" + gI(datalist.split("-to-")[0]).options[j].getAttribute("data-id");
                                                    } else {	
                                                        get += gI(datalist.split("-to-")[0]).options[j].getAttribute("data-id");
                                                    }
                                                    j = gI(datalist.split("-to-")[0]).options.length;
                                                }
                                            }
                                        } else if (gY(fields.elements[i]) != "file") {
                                            if (get != "") {
                                                one = false;
                                                
                                                get += "<gz>" + 
                                                        ((gL(gV(fields.elements[i])) == 0) 
                                                        ? "null" : gV(fields.elements[i]));
                                            } else {
                                                one = true;
                                                
                                                get += ((gL(gV(fields.elements[i])) == 0) 
                                                        ? "null" : gV(fields.elements[i]));	
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            if (one)
                get += "<gz>";
                
            return get;
        }
    </script>

</html>';

    gravar("barramento.php", $str);
}

function getHost() {
    $str = "<?php
namespace engine;

class Hosts{
    
    private \$oficial   = false;   
    private \$showDebug = false; 
    private \$banco   = \"\";
    private \$ip      = \"\";
    private \$usuario = \"\";
    private \$senha   = \"\";
    private \$folder  = \"\";
    
    
    function __construct() {
        if(\$this->oficial){
            \$this->banco   = \"".BANCO."\";
            \$this->ip      = \"".IP."\";
            \$this->usuario = \"".USUARIO."\";
            \$this->senha   = \"".SENHA."\";
        }else{
            \$this->banco   = \"".BANCO_T."\";
            \$this->ip      = \"".IP_T."\";
            \$this->usuario = \"".USUARIO_T."\";
            \$this->senha   = \"".SENHA_T."\";
        }
    }
    
    
    function getBanco()
    {
        return \$this->banco;
        
    }

    function getIp()
    { 
        return \$this->ip;
        
    }
    
    function getUsuario()
    {
        return \$this->usuario;
        
    }

    function getSenha()
    {
        return \$this->senha;
    }

    function getShowDebug()
    {
        return \$this->showDebug;
    }
}
?>";
    
    gravar(FOLDER."/Hosts.php", $str);
}

function getConnection() {
    $str = 
"<?php
namespace engine\connection;
        
use engine;
use engine\utils\FilterWhere;
use engine\lib\ChromePhp;
        
class Connection{
        
    private \$pdo_ = null;
    private \$bancoName;
    private \$showcaseSQL;
        
        
    function __construct()
    {
        \$this->pdo_ = \$this->getConnect();
    }
        
    /**
     * Metodo SQL de INSERT
     *
     * @param \$object =
     *            Objeto de dados contendo colunas e valores
     * @return \$object
     */
    private function insert(\$object)
    {
        \$pieces = explode('\\\', get_class(\$object));
        \$nameTable = strtolower(\$pieces[sizeof(\$pieces) - 1]);

        \$json = json_decode(json_encode(\$object), true);
        \$campos = array();
        \$placeholders = array();
        \$params = array();
        \$i = 0;

        foreach (\$json as \$key => \$value) {
            if (\$value === null) {
                continue;
            }
            \$ph = ':p' . \$i;
            \$campos[] = '`' . str_replace('`', '', \$key) . '`';
            \$placeholders[] = \$ph;
            \$params[\$ph] = \$value;
            \$i++;
        }

        if (count(\$campos) === 0) {
            throw new \InvalidArgumentException('INSERT sem colunas');
        }

        \$sql = 'INSERT INTO `' . \$this->bancoName . '`.`' . \$nameTable . '` (' . implode(',', \$campos) . ') VALUES (' . implode(',', \$placeholders) . ')';

        \$this->showCase(\$sql);
        \$this->beginConnection();
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute(\$params);
        \$id = \$this->pdo_->lastInsertId();
        \$this->commitConection();

        return \$id;
    }
        
    /**
     * MÃ¯Â¿Â½todo SQL de UPDATE
     *
     * @param \$object =
     *            Objeto de dados contendo colunas e valores
     * @return OBJECT
     */
    private function update(\$object)
    {
        \$pieces = explode('\\\', get_class(\$object));
        \$nameTable = strtolower(\$pieces[sizeof(\$pieces) - 1]);
        \$json = json_decode(json_encode(\$object), true);
        \$keys = \$object->getKeys();

        \$sets = array();
        \$params = array();
        \$i = 0;

        foreach (\$json as \$key => \$value) {
            \$ph = ':p' . \$i;
            \$sets[] = '`' . str_replace('`', '', \$key) . '` = ' . \$ph;
            \$params[\$ph] = \$value;
            \$i++;
        }

        \$wheres = array();
        foreach (\$keys as \$keyName => \$keyVal) {
            \$ph = ':w' . \$i;
            \$wheres[] = '`' . str_replace('`', '', \$keyName) . '` = ' . \$ph;
            \$params[\$ph] = \$keyVal;
            \$i++;
        }

        if (count(\$wheres) === 0) {
            throw new \InvalidArgumentException('UPDATE sem chave primÃ¡ria');
        }

        \$sql = 'UPDATE `' . \$this->bancoName . '`.`' . \$nameTable . '` SET ' . implode(',', \$sets) . ' WHERE ' . implode(' AND ', \$wheres);

        \$this->showCase(\$sql);
        \$this->beginConnection();
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute(\$params);
        \$this->commitConection();

        \$keyVals = array_values(\$keys);
        return \$keyVals[0];
    }
        
    /**
     * Metodo SQL de DELETE
     *
     * @param \$object =
     *            Objeto de dados contendo colunas e valores
     * @return \$object
     */
    function delete(\$object)
    {
        \$pieces = explode('\\\', get_class(\$object));
        \$nameTable = strtolower(\$pieces[sizeof(\$pieces) - 1]);
        \$keys = \$object->getKeys();

        \$wheres = array();
        \$params = array();
        \$i = 0;

        foreach (\$keys as \$keyName => \$keyVal) {
            if (\$keyVal === null || \$keyVal === '') {
                continue;
            }
            \$ph = ':w' . \$i;
            \$wheres[] = '`' . str_replace('`', '', \$keyName) . '` = ' . \$ph;
            \$params[\$ph] = \$keyVal;
            \$i++;
        }

        if (count(\$wheres) === 0) {
            throw new \InvalidArgumentException('DELETE sem chave primÃ¡ria');
        }

        \$sql = 'DELETE FROM `' . \$this->bancoName . '`.`' . \$nameTable . '` WHERE ' . implode(' AND ', \$wheres);

        \$this->showCase(\$sql);
        \$this->beginConnection();
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute(\$params);
        \$resultSize = \$sth->rowCount();
        \$this->commitConection();

        return \$resultSize;
    }
        
    /**
     * Persist Object Informations
     *
     * @param
     *            \$object
     */
    function persist(\$object)
    {
        return \$this->insert(\$object);
    }
        
    function merge(\$object)
    {
    	\$listWhere = Array();
    	\$pieces = \"\";
    	\$nameTable = \"\";
    	\$tempjson = \"\";
    	\$json = \"\";
    	\$jsonData = \"\";
    	\$list = null;
    	\$id = 0;
    	\$orderColun = '';
    	
        \$pieces = explode('\\\', get_class(\$object));
        
        \$nameTable = \$pieces[sizeof(\$pieces) - 1];
        //TO LOWER
        \$nameTable = strtolower(\$nameTable);
        
        \$tempjson = json_encode(\$object);
        
        \$json = json_decode(\$tempjson, true);
        
        \$jsonData = array_values(\$json);
        
        \$list = \$object->getKeys();
        
        
        if (\$list != null) {
        
            // //PRIMARY KEYS
            \$listKeys = array_keys(\$list);
        
            // //WHERE            
            
            \$anding = '';
        
            for (\$i = 0; \$i < sizeof(\$listKeys); \$i ++) {
        
                if(\$jsonData[\$i] != null){
                	\$where = new FilterWhere();
                	\$where->setCollum(\$listKeys[\$i]);
                	\$where->setValue(\$jsonData[\$i]);
                	\$listWhere[] = \$where;
                }
        
            }        
            
            if(sizeof(\$listWhere)>0){
        
                \$orderColun = '';
        
                \$result = \$this->getAll(\$nameTable, \$listWhere, \$orderColun, true, 0, 0);
                
                if (sizeof(\$result) > 0) {
        
                	\$id = \$this->update(\$object);
                } else {
        
                	\$id = \$this->insert(\$object);
                }
            }else{
            	\$id = \$this->insert(\$object);
            }
        } else {
        	\$id = \$this->insert(\$object);
        }        
        
        return \$this->getAll(\$nameTable, \$listWhere, \$orderColun, true, 0, 0);
                
    }
        
    /**
     * /**
     * MÃ©todo SQL de SELECT
     *
     * @param String \$table
     * @param FilterWhere \$where
     * @param String \$orderColun
     * @param boolean \$order
     *            == (true -> 'ASC' or false-> 'DESC')
     * @return array object
     */
    function getAll(\$table, \$where, \$orderColun, \$order, \$page, \$sizePage)
    {   
        \$table = strtolower(\$table);
        \$lista = \$this->showColum(\$table);
        
        
        \$coluns = '';
        \$virgula = '';
        \$cont = 0;
        
        while (\$row = \$lista->fetch()) {
        
            if (\$cont == 0) {
                \$virgula = '';
            } else {
                \$virgula = ',';
            }
        
            \$coluns .= \$virgula . '`' . str_replace('`', '', \$row['Field']) . '`';
            \$cont ++;
        }
        
        \$sql = ' SELECT ' . \$coluns;
        \$sql .= ' FROM `' . \$this->bancoName . '`.`' . \$table . '`';
        
        //var_dump(\$where);
        
        \$params = Array();
        
		if (sizeof(\$where)>0) {
			
			\$sql .= ' WHERE ';
			
			for (\$i = 0; \$i < sizeof(\$where); \$i++) {
			
				if(\$i > 0){
					\$sql .= ' AND ';
				}
				
				\$sql .= \$where[\$i]->getCollum().\" \".\$where[\$i]->getCondition().\" :param\".\$i;
				
				\$params[] = \$where[\$i]->getValue();
				
				\$cont++;			
			}            
        }
        
        if (strlen(\$orderColun)>0) {
            \$sql .= ' ORDER BY ' . \$orderColun;
        }

        
        if ((strlen(\$orderColun)>0)) {
            if (\$order) {
                \$sql .= ' ASC ';
            } else if (! \$order) {
                \$sql .= ' DESC ';
            }
        }
        
        if (\$page !== null && \$page !== '' && \$sizePage > 0) {
        	if(\$page > 0){
            	\$sql .= ' LIMIT ' . (\$page - 1) * \$sizePage . ',' . \$sizePage;
        	}else{
        		\$sql .= ' LIMIT ' . 0 * \$sizePage . ',' . \$sizePage;
        	}
        }
        
        \$this->showCase(\$sql);
        
        \$this->beginConnection();
       
        \$sth = \$this->pdo_->prepare(\$sql);
        
        for (\$i = 0; \$i < sizeof(\$params); \$i++) {
        	if(gettype(\$params[\$i]) == \"string\"){
        		\$sth->bindValue(\":param\".\$i, \$params[\$i],\PDO::PARAM_STR);
        	}else{
        		\$sth->bindValue(\":param\".\$i, \$params[\$i],\PDO::PARAM_INT);
        	}        	
        }
       
        \$sth->execute();
        
        
        \$this->commitConection();
        
        \$array = Array();
        
        while (\$foren = \$sth->fetch(\PDO::FETCH_ASSOC)) {
            \$array[] = \$foren;
        }
        return \$array;
    }
        
    function execSelect(\$sql){
        \$this->beginConnection();       
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();                
        \$this->commitConection();

        \$array = Array();
        
        while (\$foren = \$sth->fetch(\PDO::FETCH_ASSOC)) {
            \$array[] = \$foren;
        }
        
        return \$array;
    }

    // -------------------------------------------UTILS-----------------------------------------------
        
    /**
     * Return PDO Connection
     *
     * @return /PDO
     */
    private function getConnect()
    {
        \$host = new engine\Hosts();
        \$this->bancoName   = \$host->getBanco();
        \$this->showcaseSQL = \$host->getShowDebug();
        
        \$dsn = 'mysql:dbname=' . \$host->getBanco() . ';host=' . \$host->getIp().';charset=utf8mb4';
        
        \$options = [
            \PDO::ATTR_EMULATE_PREPARES   => false,
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
            \PDO::ATTR_PERSISTENT => false
        ];
        
        try{
        \$this->pdo_ = new \PDO(\$dsn
            ,  \$host->getUsuario()
            ,  \$host->getSenha()
            ,  \$options
            );
        
        }catch (\Exception \$e){
            error_log(\$e->getMessage());
            exit('Algo estranho aconteceu ao conectar com o Banco de Dados!'); //something a user can understand
        }
        return \$this->pdo_;
    }
        
    /**
     * Begin Connection
     */
    private function beginConnection()
    {
        \$this->pdo_->beginTransaction();
    }
        
    /**
     * Commit Conection
     */
    private function commitConection()
    {
        \$this->pdo_->commit();
    }
        
    /**
     * Show Coluns
     *
     * @param
     *            \$table
     * @return /PDOStatement
     */
    private function showColum(\$table)
    {
        
        \$sql = 'SHOW COLUMNS FROM `' . \$this->bancoName . '`.`' . strtolower(\$table) . '`';
        
        \$this->beginConnection();
        
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();
        
        \$this->commitConection();
        
        return \$sth;
    }
        
    private function showPrimaryKey(\$table)
    {
        \$sql = 'SHOW KEYS FROM `' . \$this->bancoName . '`.`' . \$table . '`  WHERE Key_name = \'PRIMARY\'';
        
        \$this->beginConnection();
        
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();
        
        \$this->commitConection();
        
        return \$sth;
    }
        
    private function showCase(\$values){
        if(\$this->showcaseSQL){

            if (\$this->showcaseSQL) {

                ChromePHP::warn(\$values);
    
            }
        	        	
        }		
    }
    // -------------------------------------------UTILS FIM-----------------------------------------------
}
?>";
    
    gravar(CONNECTION."Connection.php", $str);
}

function getComposer() {
    $str= "{}";
    gravar("composer.json", $str);
}

function getBase() {
    $str= "<?php

use engine\Hosts;

define('METHOD', \$_SERVER['REQUEST_METHOD']);
define('URI', \$_SERVER['REQUEST_URI']);
define('TIME_FLOAT', \$_SERVER['REQUEST_TIME_FLOAT']);

define('BARRA', DIRECTORY_SEPARATOR);



/*
 * Allow from any origin.
 */
if (isset(\$_SERVER[\"HTTP_ORIGIN\"])) {
    header(\"Access-Control-Allow-Origin: \" . \$_SERVER[\"HTTP_ORIGIN\"]);
    header(\"Access-Control-Allow-Credentials: true\");
    header(\"Access-Control-Max-Age: 86400\"); // cache for 1 day    
}

/*
 * Access-Control headers are received during OPTIONS requests.
 */
if (\$_SERVER[\"REQUEST_METHOD\"] == \"OPTIONS\") {
	
    if (isset(\$_SERVER[\"HTTP_ACCESS_CONTROL_REQUEST_METHOD\"]))
        header(\"Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS\");

    if (isset(\$_SERVER[\"HTTP_ACCESS_CONTROL_REQUEST_HEADERS\"]))
        header(\"Access-Control-Allow-Headers: \" . \$_SERVER[\"HTTP_ACCESS_CONTROL_REQUEST_HEADERS\"]);

    exit(0);
}


if(METHOD == \"PUT\"){
	function validPut(\$listkeys,\$listValues){
		
		\$valid = false;
		\$control = array();
		
		for (\$i = 0; \$i < sizeof(\$listkeys); \$i++) {
			
			if(\$_GET[\$listkeys[\$i]] == \$listValues[\$listkeys[\$i]]){
				\$valid = true;
			}
			
		}
		
		return \$valid;
	}
	
	function getParametersPUT(){
		parse_str(file_get_contents(\"php://input\"),\$post_vars);
		return \$post_vars;
	}
}

?>";
    gravar(INTERACTOR."base.php", $str);
}

function getHtAccess() {
	$str = "Options -Indexes\nDirectoryIndex index.php OneForAll.php\n\nRewriteEngine On\nRewriteBase /" . PROJECT . "/\n\n";
	$str .= "RewriteCond %{HTTP:Authorization} .\n";
	$str .= 'RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]' . "\n";
	$str .= 'SetEnvIf Authorization "(.*)" HTTP_AUTHORIZATION=$1' . "\n\n";
	$str .= 'RewriteRule ^api/(\w+)/(\w+)/?$ engine/Router.php?class=$1&method=$2&param=api [NC,L,QSA]' . "\n\n";
	$str .= 'RewriteRule ^web/(\w+)/(\w+)/?$ engine/Router.php?class=$1&method=$2&param=web [NC,L]' . "\n\n";
	$str .= 'RewriteRule ^barramento/?$ barramento.php [NC,L]';
    gravar(".htaccess", $str);
}

function getAcls() {
    $str = '<?php

namespace engine;

class Acl {

    function getAcls()
    {
		$permission = Array();
		
        ';

        $tables = getAllTables();

        if (isSecurityEnabled()) {
            $str .= '
            $permission = $this->setRouter("oauth","POST","token",$permission);
';
        }
	
        while ($table = $tables->fetch()) {
            if (!shouldGenerateCrud($table[0])) {
                continue;
            }
            $str .= "
            
            //".strtoupper($table[0])."
            \$permission = \$this->setRouter(\"".strtolower($table[0])."\",\"POST\"  ,\"find\",\$permission);
            \$permission = \$this->setRouter(\"".strtolower($table[0])."\",\"GET\"   ,\"findAll\"    ,\$permission);
            \$permission = \$this->setRouter(\"".strtolower($table[0])."\",\"DELETE\",\"remove\" ,\$permission);
            \$permission = \$this->setRouter(\"".strtolower($table[0])."\",\"PUT\"   ,\"update\"    ,\$permission);
            \$permission = \$this->setRouter(\"".strtolower($table[0])."\",\"POST\"  ,\"create\" ,\$permission);
            ";
        }

 $str .= '
        return $permission;
	}
	
	function setRouter($url,$type,$method,$permission) {	

		$len = count($permission);
		
		$permission[$len][0] = $type;
		$permission[$len][1] = $method;
		$permission[$len][2] = $url;		

		return $permission;
	}
}  
?>';
 
    gravar(FOLDER."/Acl.php", $str);
}


function getRouter() {
	$str="<?php
	use engine\Hosts;
    use engine\\auth\\TokenGuard;
    use engine\Acl;

	include_once 'interactor/base.php';
	include_once '../Autoload.php';

	\$_GET[\"class\"] = preg_replace('/[^a-z0-9_]/i', '', \$_GET[\"class\"] ?? '');
	\$_GET[\"method\"] = preg_replace('/[^a-z0-9_]/i', '', \$_GET[\"method\"] ?? '');
	\$_GET[\"param\"] = preg_replace('/[^a-z0-9_]/i', '', \$_GET[\"param\"] ?? '');

	if(\$_GET[\"param\"] == 'api'){
		header(\"Content-type: application/json; charset=UTF-8\");
	}

	if (file_exists(__DIR__ . '/auth/TokenGuard.php')) {
		TokenGuard::assert(\$_GET[\"class\"], \$_GET[\"method\"]);
	}
	
	if(\$_GET[\"param\"] == 'api'){
		
		\$Hosts = new Hosts();
		
		if(\$_GET[\"class\"] !== '' && file_exists(\"interactor/\".\$_GET[\"class\"].'.php')){
			include_once \"interactor/\".\$_GET[\"class\"].'.php';
		}
	}

	//--------------------------------------------------------------------------
	
	
    
    \$acls = new Acl();
	\$permission =  \$acls->getAcls();
		
	run(\$permission);
	
	
	//--------------------------------------------------------------------------
	
	function setRouter(\$url,\$type,\$method,\$permission) {	

		\$len = count(\$permission);
		
		\$permission[\$len][0] = \$type;
		\$permission[\$len][1] = \$method;
		\$permission[\$len][2] = \$url;		

		return \$permission;
	}
	
	function run(\$permission){
			
		ob_start();
		
		\$acess  = false;
		
		for (\$i = 0; \$i < count(\$permission); \$i++) {
			
			if(METHOD == (\$permission[\$i][0])){ 
		      if(\$_GET[\"method\"] == \$permission[\$i][1]){
				if(\$_GET[\"class\"] == \$permission[\$i][2]){				
				
					try {
						echo call_user_func(\$permission[\$i][1]);	
					} catch (\Throwable \$th) {
						http_response_code(400);
						echo \$th;
					}
					\$acess = true;

				}
			  }
			}
		}
		if(!\$acess){
            http_response_code(401);
			echo json_encode(array(\"erro\" => \"ACESSO NEGADO!\"));
		}
		ob_end_flush();
	}
?>";
	gravar(FOLDER."/Router.php", $str);
}

function getResponse() {
	$str = "<?php
namespace engine\utils;

class ResponseDelete implements \JsonSerializable
{

    private \$status;
    private \$size;

    
    public function jsonSerialize(): mixed
    {
        return ['status' => \$this->getStatus(),
            'size' => \$this->getSize()        		
        ];
    }

    // STATUS
    function getStatus()
    {
        return \$this->status;
    }

    function setStatus(\$status)
    {
    	return \$this->status= \$status;
    }

    // SIZE
    function getSize()
    {
        return \$this->size;
    }

    function setSize(\$size)
    {
    	return \$this->size= \$size;
    }

}
?>";
	gravar(UTILS."ResponseDelete.php", $str);
	
}


function getChromePhp() {
    $str = "<?php
namespace engine\lib;

class ChromePhp
{
    /**
     * @var string
     */
    const VERSION = '4.1.0';

    /**
     * @var string
     */
    const HEADER_NAME = 'X-ChromeLogger-Data';

    /**
     * @var string
     */
    const BACKTRACE_LEVEL = 'backtrace_level';

    /**
     * @var string
     */
    const LOG = 'log';

    /**
     * @var string
     */
    const WARN = 'warn';

    /**
     * @var string
     */
    const ERROR = 'error';

    /**
     * @var string
     */
    const GROUP = 'group';

    /**
     * @var string
     */
    const INFO = 'info';

    /**
     * @var string
     */
    const GROUP_END = 'groupEnd';

    /**
     * @var string
     */
    const GROUP_COLLAPSED = 'groupCollapsed';

    /**
     * @var string
     */
    const TABLE = 'table';

    /**
     * @var string
     */
    protected \$_php_version;

    /**
     * @var int
     */
    protected \$_timestamp;

    /**
     * @var array
     */
    protected \$_json = array(
        'version' => self::VERSION,
        'columns' => array('log', 'backtrace', 'type'),
        'rows' => array()
    );

    /**
     * @var array
     */
    protected \$_backtraces = array();

    /**
     * @var bool
     */
    protected \$_error_triggered = false;

    /**
     * @var array
     */
    protected \$_settings = array(
        self::BACKTRACE_LEVEL => 1
    );

    /**
     * @var ChromePhp
     */
    protected static \$_instance;

    /**
     * Prevent recursion when working with objects referring to each other
     *
     * @var array
     */
    protected \$_processed = array();

    /**
     * constructor
     */
    private function __construct()
    {
        \$this->_php_version = phpversion();
        \$this->_timestamp = \$this->_php_version >= 5.1 ? \$_SERVER['REQUEST_TIME'] : time();
        \$this->_json['request_uri'] = \$_SERVER['REQUEST_URI'];
    }

    /**
     * gets instance of this class
     *
     * @return ChromePhp
     */
    public static function getInstance()
    {
        if (self::\$_instance === null) {
            self::\$_instance = new self();
        }
        return self::\$_instance;
    }

    /**
     * logs a variable to the console
     *
     * @param mixed \$data,... unlimited OPTIONAL number of additional logs [...]
     * @return void
     */
    public static function log()
    {
        \$args = func_get_args();
        return self::_log('', \$args);
    }

    /**
     * logs a warning to the console
     *
     * @param mixed \$data,... unlimited OPTIONAL number of additional logs [...]
     * @return void
     */
    public static function warn()
    {
        \$args = func_get_args();
        return self::_log(self::WARN, \$args);
    }

    /**
     * logs an error to the console
     *
     * @param mixed \$data,... unlimited OPTIONAL number of additional logs [...]
     * @return void
     */
    public static function error()
    {
        \$args = func_get_args();
        return self::_log(self::ERROR, \$args);
    }

    /**
     * sends a group log
     *
     * @param string value
     */
    public static function group()
    {
        \$args = func_get_args();
        return self::_log(self::GROUP, \$args);
    }

    /**
     * sends an info log
     *
     * @param mixed \$data,... unlimited OPTIONAL number of additional logs [...]
     * @return void
     */
    public static function info()
    {
        \$args = func_get_args();
        return self::_log(self::INFO, \$args);
    }

    /**
     * sends a collapsed group log
     *
     * @param string value
     */
    public static function groupCollapsed()
    {
        \$args = func_get_args();
        return self::_log(self::GROUP_COLLAPSED, \$args);
    }

    /**
     * ends a group log
     *
     * @param string value
     */
    public static function groupEnd()
    {
        \$args = func_get_args();
        return self::_log(self::GROUP_END, \$args);
    }

    /**
     * sends a table log
     *
     * @param string value
     */
    public static function table()
    {
        \$args = func_get_args();
        return self::_log(self::TABLE, \$args);
    }

    /**
     * internal logging call
     *
     * @param string \$type
     * @return void
     */
    protected static function _log(\$type, array \$args)
    {
        // nothing passed in, don't do anything
        if (count(\$args) == 0 && \$type != self::GROUP_END) {
            return;
        }

        \$logger = self::getInstance();

        \$logger->_processed = array();

        \$logs = array();
        foreach (\$args as \$arg) {
            \$logs[] = \$logger->_convert(\$arg);
        }

        \$backtrace = debug_backtrace(false);
        \$level = \$logger->getSetting(self::BACKTRACE_LEVEL);

        \$backtrace_message = 'unknown';
        if (isset(\$backtrace[\$level]['file']) && isset(\$backtrace[\$level]['line'])) {
            \$backtrace_message = \$backtrace[\$level]['file'] . ' : ' . \$backtrace[\$level]['line'];
        }

        \$logger->_addRow(\$logs, \$backtrace_message, \$type);
    }

    /**
     * converts an object to a better format for logging
     *
     * @param Object
     * @return array
     */
    protected function _convert(\$object)
    {
        // if this isn't an object then just return it
        if (!is_object(\$object)) {
            return \$object;
        }

        //Mark this object as processed so we don't convert it twice and it
        //Also avoid recursion when objects refer to each other
        \$this->_processed[] = \$object;

        \$object_as_array = array();

        // first add the class name
        \$object_as_array['___class_name'] = get_class(\$object);

        // loop through object vars
        \$object_vars = get_object_vars(\$object);
        foreach (\$object_vars as \$key => \$value) {

            // same instance as parent object
            if (\$value === \$object || in_array(\$value, \$this->_processed, true)) {
                \$value = 'recursion - parent object [' . get_class(\$value) . ']';
            }
            \$object_as_array[\$key] = \$this->_convert(\$value);
        }

        \$reflection = new ReflectionClass(\$object);

        // loop through the properties and add those
        foreach (\$reflection->getProperties() as \$property) {

            // if one of these properties was already added above then ignore it
            if (array_key_exists(\$property->getName(), \$object_vars)) {
                continue;
            }
            \$type = \$this->_getPropertyKey(\$property);

            if (\$this->_php_version >= 5.3) {
                \$property->setAccessible(true);
            }

            try {
                \$value = \$property->getValue(\$object);
            } catch (ReflectionException \$e) {
                \$value = 'only PHP 5.3 can access private/protected properties';
            }

            // same instance as parent object
            if (\$value === \$object || in_array(\$value, \$this->_processed, true)) {
                \$value = 'recursion - parent object [' . get_class(\$value) . ']';
            }

            \$object_as_array[\$type] = \$this->_convert(\$value);
        }
        return \$object_as_array;
    }

    /**
     * takes a reflection property and returns a nicely formatted key of the property name
     *
     * @param ReflectionProperty
     * @return string
     */
    protected function _getPropertyKey(ReflectionProperty \$property)
    {
        \$static = \$property->isStatic() ? ' static' : '';
        if (\$property->isPublic()) {
            return 'public' . \$static . ' ' . \$property->getName();
        }

        if (\$property->isProtected()) {
            return 'protected' . \$static . ' ' . \$property->getName();
        }

        if (\$property->isPrivate()) {
            return 'private' . \$static . ' ' . \$property->getName();
        }
    }

    /**
     * adds a value to the data array
     *
     * @var mixed
     * @return void
     */
    protected function _addRow(array \$logs, \$backtrace, \$type)
    {
        // if this is logged on the same line for example in a loop, set it to null to save space
        if (in_array(\$backtrace, \$this->_backtraces)) {
            \$backtrace = null;
        }

        // for group, groupEnd, and groupCollapsed
        // take out the backtrace since it is not useful
        if (\$type == self::GROUP || \$type == self::GROUP_END || \$type == self::GROUP_COLLAPSED) {
            \$backtrace = null;
        }

        if (\$backtrace !== null) {
            \$this->_backtraces[] = \$backtrace;
        }

        \$row = array(\$logs, \$backtrace, \$type);

        \$this->_json['rows'][] = \$row;
        \$this->_writeHeader(\$this->_json);
    }

    protected function _writeHeader(\$data)
    {
        header(self::HEADER_NAME . ': ' . \$this->_encode(\$data));
    }

    /**
     * encodes the data to be sent along with the request
     *
     * @param array \$data
     * @return string
     */
    protected function _encode(\$data)
    {
        return base64_encode(json_encode(\$data, JSON_UNESCAPED_UNICODE));
    }

    /**
     * adds a setting
     *
     * @param string key
     * @param mixed value
     * @return void
     */
    public function addSetting(\$key, \$value)
    {
        \$this->_settings[\$key] = \$value;
    }

    /**
     * add ability to set multiple settings in one call
     *
     * @param array \$settings
     * @return void
     */
    public function addSettings(array \$settings)
    {
        foreach (\$settings as \$key => \$value) {
            \$this->addSetting(\$key, \$value);
        }
    }

    /**
     * gets a setting
     *
     * @param string key
     * @return mixed
     */
    public function getSetting(\$key)
    {
        if (!isset(\$this->_settings[\$key])) {
            return null;
        }
        return \$this->_settings[\$key];
    }
}
?>";
	
	gravar(LIBS."ChromePhp.php", $str);
	
}


function getFilterWhere() {
	$str ="<?php
namespace engine\utils;

class FilterWhere{
	private \$collum    = \"\";
	private \$condition = \"=\";
	private \$value     = \"\";
	
	function getCollum()
	{
		return \$this->collum;		
	}
	
	function getCondition()
	{
		return \$this->condition;		
	}
	
	function getValue()
	{
		return \$this->value;		
	}
		
	function setCollum(\$collum)
	{
		\$this->collum = \$collum;
	}
	
	function setCondition(\$condition)
	{
		\$allowed = array('=', 'like', '>', '<', '>=', '<=', '!=', '<>');
		if (!in_array(strtolower(\$condition), \$allowed, true)) {
			\$condition = '=';
		}
		\$this->condition = \$condition;
	}
	
	function setValue(\$value)
	{		
		\$this->value = \$value;
	}
	
}

?>";
	gravar(UTILS."FilterWhere.php", $str);
}

//-----------------------RESOURCES--------------------------------------

//----------------------- CallsActivated.php -----------------------
function callJs() {
	$str = <<<'JS'
window.onload = readyGenerate;

var cont = 0;
var urlHost;
var securityFlag = '0';

function readyGenerate(){
	var temp = document.getElementById('urlLocal').innerHTML;
	urlHost = temp + "OneForAll.php";
}

function startGenerate(sec){
	securityFlag = sec;
	var box = document.getElementById('securityBox');
	if (box) {
		box.style.display = 'none';
	}
	service(urlHost + "?security=" + securityFlag, "");
}

function initRequest() {
	if (window.XMLHttpRequest) {
		if (navigator.userAgent.indexOf("MSIE") != -1)
			isIE = true;
		return new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		isIE = true;
		try {
			return new ActiveXObject("Microsoft.XMLHTTP");
		} catch(e) {
			try {
				return new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) { }
		}
	}
}

function service(url, param) {
	var request = initRequest();
	request.open("GET", url + param, true);
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {
			var respText = request.responseText;
			var res = respText.split(",");
			var status = res[0];
			var txt    = res[1];
			var method = res[2];

			if (cont > 0) {
				var anterior = document.getElementById(cont - 1);
				anterior.innerHTML = '<p class="accept">&#10003</p>';
			}
			var table = document.getElementById("tableMain");
			table.innerHTML = table.innerHTML + '<tr><td>' + txt + '</td><td id="' + cont + '"><div class="loader" ></div></td></tr>';

			if (method == 'Fim') {
				var anterior = document.getElementById(cont);
				anterior.innerHTML = '<p class="accept">&#10003</p>';
				var response = document.getElementById("tableMain");
				response.innerHTML = table.innerHTML + '<tr><td>Finalizado</td><td><p class="accept">&#10003</p></td></tr>';
				response.innerHTML = table.innerHTML + '<tr><td>Acessar Barramento</td><td><a href="barramento.php">AQUI</a></td></tr>';
				setTimeout(function () {
					window.open('barramento.php', '_blank');
				}, 2000);
			} else {
				if (status == 'OK') {
					service(urlHost + "?method=" + method + "&security=" + securityFlag, "");
				} else {
					var error = document.getElementById('error');
					error.innerHTML = '' + status;
				}
			}
			cont++;
		}
	};
	request.send();
}
JS;
	gravar("script.js", $str, true);
}

function callIndex() {
	$str = <<<'PHP'
<?php
header('Content-Type: text/html; charset=utf-8');
$project = str_replace('index.php', '', $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
?>
<html lang="pt-br">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="content-language" content="pt-br">
<meta name="title" content="OneForAll">
<style>
 td { padding-left:32px; }
 .loader {
  border: 4px solid #f3f3f3;
  border-radius: 50%;
  border-top: 4px solid #3498db;
  width: 20px;
  height: 20px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
 }
 @-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
 }
 @keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
 }
 .accept { color: green; font-size: 24px; font-weight: bold; }
 .nameOne { text-align:center; font-weight: bold; font-size: 30px; vertical-align: middle; }
 p { margin:0; }
 .copiart { text-align:center; font-weight: bold; }
 .security-box {
  max-width: 560px;
  margin: 24px auto;
  padding: 20px;
  border: 1px solid #bdbdbd;
  border-radius: 8px;
  background: #fafafa;
  text-align: center;
  font-family: Arial, sans-serif;
 }
 .security-box h2 { margin: 0 0 8px 0; font-size: 20px; }
 .security-box p { margin: 0 0 16px 0; color: #444; }
 .btn-sec {
  display: inline-block;
  margin: 0 8px;
  padding: 10px 18px;
  border: 0;
  border-radius: 4px;
  color: #fff;
  font-weight: bold;
  cursor: pointer;
 }
 .btn-yes { background:#2e7d32; }
 .btn-no { background:#546e7a; }
</style>
<script charset="UTF-8" src="script.js"></script>
</head>
<body>
<div id="urlLocal" style="display:none;">http://<?php echo htmlspecialchars($project, ENT_QUOTES, 'UTF-8'); ?></div>
<p class="nameOne"><img src="https://adamis.com.br/oru_maito.png" height="64" alt="">OneForAll Framework</p>
<div id="securityBox" class="security-box">
<h2>ProteÃ§Ãµes de seguranÃ§a</h2>
<p>Deseja construir as proteÃ§Ãµes de seguranÃ§a? Se sim, serÃ£o criadas tabelas de usuÃ¡rio e senha, tokens OAuth2 e todas as APIs ficarÃ£o protegidas pelo Bearer token.</p>
<button class="btn-sec btn-yes" type="button" onclick="startGenerate('1')">Sim, gerar OAuth2</button>
<button class="btn-sec btn-no" type="button" onclick="startGenerate('0')">NÃ£o, APIs abertas</button>
</div>
<table id="tableMain"></table>
<p id="redir"></p>
<p class="copiart">Adamis Â© <?php echo date('Y'); ?> OneForAll v{{VERSION}}</p>
<div id="error"></div>
</body>
</html>
PHP;
	$version = defined('ONEFORALL_VERSION') ? ONEFORALL_VERSION : '2.0.0';
	$str = str_replace('{{VERSION}}', htmlspecialchars($version, ENT_QUOTES, 'UTF-8'), $str);
	gravar("index.php", $str, true);
}

//----------------------- Calls.php -----------------------
// -----------------------CALLS--------------------------------------

if(!file_exists("index.php") && !file_exists("script.js")){
	
	callJs();
	callIndex();
	if (php_sapi_name() !== 'cli' && !headers_sent()) {
		header("Location: index.php");
		exit;
	}
	echo "index.php gerado. Abra no navegador para iniciar a geraÃ§Ã£o.\n";
	exit;
	
}else if (!isset ( $_GET ["method"] )) {
	persistAndReadSecurity();
	echo "OK,Criando Barramento de InformaÃ§Ãµes,barramento";
	
} else {
	persistAndReadSecurity();
	
	if ($_GET ["method"] == "barramento") {		
		try {
			getBarramento();
			echo "OK,Criando Autoload,Autoload";
		} catch (Exception $e) {
			echo $e.",Criando Autoload,Autoload";
		}
		
	}
	
	if ($_GET ["method"] == "Autoload") {
		try {
			getAutoload ();
			echo "OK,Criando ConfiguraÃ§Ãµes de Host,host";
		} catch (Exception $e) {
			echo $e.",Criando ConfiguraÃ§Ãµes de Host,host";
		}
		
	}
	
	if ($_GET ["method"] == "host") {
		try {
			getHost ();
			echo "OK,Criando estrutra de resposta,response";
		} catch (Exception $e) {
			echo $e.",Criando estrutra de resposta,response";
		}
	}
	
	if ($_GET ["method"] == "response") {
		try {		
			getResponse ();
			echo "OK,Criando biblioteca ChromePHP,chromePhp";
		} catch (Exception $e) {
			echo $e.",Criando biblioteca ChromePHP,chromePhp";
		}
	}
	
	if ($_GET ["method"] == "chromePhp") {
		try {
			getChromePhp();
			echo "OK,Criando Filtros para Where,filterWhere";
		} catch (Exception $e) {
			echo $e.",Criando Filtros para Where,filterWhere";
		}
	}
	
	if ($_GET ["method"] == "filterWhere") {
		try {
			getFilterWhere();
			echo "OK,Criando arquivos de conexÃ£o,connection";
		} catch (Exception $e) {
			echo $e.",Criando arquivos de conexÃ£o,connection";
		}
	}
	
	if ($_GET ["method"] == "connection") {
		try {		
			getConnection();
			echo "OK,Criando arquivo de composiÃ§Ã£o,composer";
		} catch (Exception $e) {
			echo $e.",Criando arquivo de composiÃ§Ã£o,composer";
		}
	}
	
	if ($_GET ["method"] == "composer") {
		try {
			getComposer ();
			echo "OK,Criando Arquivo de Diretivas de Acesso,htacess";
		} catch (Exception $e) {
			echo $e.",Criando Arquivo de Diretivas de Acesso,htacess";
		}
		
	}
		
	if ($_GET ["method"] == "htacess") {
		try {			
			getHtAccess ();
			echo "OK,Configurando SeguranÃ§a OAuth2,securitySetup";		
		} catch (Exception $e) {
			echo $e.",Configurando SeguranÃ§a OAuth2,securitySetup";
		}
	}

	if ($_GET ["method"] == "securitySetup") {
		try {
			setupSecurity(isSecurityEnabled());
			echo "OK,Criando Rotas,acls";
		} catch (Exception $e) {
			echo $e.",Criando Rotas,acls";
		}
	}
	
	if ($_GET ["method"] == "acls") {
		try {		
			getAcls();
			echo "OK,Criando arquivos de Base,router";		
		} catch (Exception $e) {
			echo $e."Criando arquivos de Base,router";
		}
	}
	
	if ($_GET ["method"] == "router") {
		try {		
			getRouter ();
			echo "OK,Criando arquivos de Base,base";		
		} catch (Exception $e) {
			echo $e."Criando arquivos de Base,base";
		}
	}

	if ($_GET ["method"] == "base") {
		try {
			getBase ();
			echo "OK,Criando DAO's,createDao";
		} catch (Exception $e) {
			echo $e.",Criando DAO's,createDao";
		}
	}
	
	if ($_GET ["method"] == "createDao") {
		try {
			createDao ();
			echo "OK,Criando Adapters,createAdapter";
		} catch (Exception $e) {
			echo $e.",Criando Adapters,createAdapter";
		}
	}
	
	if ($_GET ["method"] == "createAdapter") {
		try {
			createAdapters ();
			echo "OK,Criando Interactors,createInteractor";
		} catch (Exception $e) {
			echo $e.",Criando Interactors,createInteractor";
		}
	}
	
	if ($_GET ["method"] == "createInteractor") {
		try {
			createInteractor ();
			echo "OK,Finalizando Processamento,Fim";
		} catch (Exception $e) {
			echo $e.",Finalizando Processamento,Fim";
		}	
		unlink("script.js");
		unlink("index.php");
	}
	
	if ($_GET ["method"] == "Fim") {		
			echo "OK,Finalizado,stop";			
	}
	
	
}
// getBarramento();
// getAutoload();
// getHost();
// getResponse();
// getConnection();
// getComposer();
// getlibSqlFormatter();
// getHtAccess();
// getRouter();
// getBase();
// createDao();
// createAdapters();
// createInteractor();

// -----------------------CALLS--------------------------------------
