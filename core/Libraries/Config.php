<?php

namespace Core\Libraries;

class Config
{
    private static array $configs;

    public static function load(): void
    {
        self::$configs = require_once __DIR__ . '/../../config/app.php';
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return self::$configs[$key] ?? $default;
    }
}