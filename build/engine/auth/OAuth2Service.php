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