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