<?php

spl_autoload_register(function ($class) {
    $path = dirname(__FILE__) . '/../classes/' . str_replace('\\', '/', $class) . '.php';
    file_exists($path) && require_once $path;
});

echo new App();
