<?php
namespace Base;

class App
{
    protected static $container;
    public static function setContainer($container)
    {
        static::$container = $container;
    }
    public static function getContainer()
    {
        return static::$container;
    }
    public static function bind($key, $resolver)
    {
        return static::$container->bind($key, $resolver);
    }
    public static function resolve($key)
    {
        return static::$container->resolve($key);
    }
}
