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