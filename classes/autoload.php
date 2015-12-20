<?php
/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:03 AM
 * @param $class
 */

spl_autoload_register(function ($class) {
    $path = dirname(__FILE__) . '/' . str_replace('\\', '/', $class) . '.php';
    file_exists($path) && require_once dirname(__FILE__) . '/' . str_replace('\\', '/', $class) . '.php';
});
