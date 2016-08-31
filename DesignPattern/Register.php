<?php
namespace pj\DesignPattern;

class Register
{
    public static $tree = array();

    public static function setTree($key, $value)
    {
        self::$tree[$key] = $value;
    }

    public static function unsetTree($key)
    {
        if (isset(self::$tree[$key])) {
            unset(self::$tree[$key]);
        }
    }

    public static function getTree($key)
    {
        if (isset(self::$tree[$key])) {
            return self::$tree[$key];
        } else {
            return null;
        }
    }
}