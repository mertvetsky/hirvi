<?php


/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:38 AM
 */
class Singleton
{
    /**
     * @var static
     */
    protected static $instances = [];


    /**
     * Singleton constructor.
     */
    protected function __construct()
    {
    }


    /**
     * @return static
     */
    final public static function getInstance()
    {
        $class = get_called_class();
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new $class;
        }

        return self::$instances[$class];
    }


    /**
     *
     */
    protected function __clone()
    {
    }

}