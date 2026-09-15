<?php
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
