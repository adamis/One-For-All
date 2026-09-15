<?php
namespace engine;

class SecurityConfig
{
    public static function enabled()
    {
        return true;
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