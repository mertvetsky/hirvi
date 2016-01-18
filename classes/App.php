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
     * @var Request
     */
    public $request;

    /**
     * @var Router
     */
    public $router;

    /**
     * @var Config
     */
    public $config;


    /**
     * @return string
     */
    public function run()
    {

        $this->config  = new Config();
        $this->request = new Request();
        $this->router  = new Router();
        Log::write('started');

        echo (string)Hirvi::$app->router->callAction();
    }

}
