<?php

/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:01 AM
 */
class App
{
    /**
     * App constructor.
     */
    public function __construct()
    {
        Config::set(require_once __DIR__ . '/../config.php');
        Log::write('started');
    }


    /**
     * @return string
     */
    function __toString()
    {
        return (string)Router::getInstance()->callAction();
    }

}