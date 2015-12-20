<?php

/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:01 AM
 */
class App
{
    public function __construct()
    {
        Config::set(require_once __DIR__ . '/../config.php');
        Log::write('started');
    }


    function __toString()
    {
        return (string)Router::getInstance()->callAction();
    }

}