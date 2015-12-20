<?php
/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:03 AM
 * @param $class
 */

function __autoload($class)
{
    require_once '../classes/' . str_replace('\\', '/', $class) . '.php';
}