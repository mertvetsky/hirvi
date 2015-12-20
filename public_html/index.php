<?php
function __autoload($class)
{
    require_once '../classes/' . str_replace('\\', '/', $class) . '.php';
}

new App();
