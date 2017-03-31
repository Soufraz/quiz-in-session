<?php

namespace Soufraz\Session;

class SessionService
{
    private static $adapter;

    public static function init(SessionAdapter $adapter)
    {
        self::$adapter = $adapter;
    }

    public static function get($var)
    {
        return self::$adapter->get($var);
    }

    public static function set($var, $value)
    {
        return self::$adapter->set($var, $value);
    }
}
