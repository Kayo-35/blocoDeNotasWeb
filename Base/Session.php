<?php

namespace Base;

class Session
{
    public static function add($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function get($key, $default = null)
    {
        if (isset($_SESSION["_inst"][$key])) {
            return $_SESSION["_inst"][$key];
        }
        return $_SESSION["_inst"] ?? $default;
    }
    public static function search($key)
    {
        return (bool) static::get($key);
    }
    public static function flash($key, $value)
    {
        $_SESSION["_inst"][$key] = $value;
    }
    public static function unset()
    {
        unset($_SESSION["_inst"]);
    }
    public static function reset()
    {
        $_SESSION = [];
    }
}
