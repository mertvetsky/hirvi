<?php


/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:26 AM
 */
class Config
{
    public function __construct()
    {
        $this->init(require_once __DIR__ . '/../config.php');
    }


    /**
     * сейчас через него инициализируются константы, но потом можно сделать больше
     *
     * @param array $config
     */
    public function init(array $config)
    {

    }

}