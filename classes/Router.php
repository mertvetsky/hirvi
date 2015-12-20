<?php


/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:48 AM
 */
class Router extends Singleton
{
    public $controller = 'index';
    public $action     = 'index';


    /**
     * Router constructor.
     */
    public function __construct()
    {
        $uri = Request::getInstance()->getUri();

        $parts = explode('/', parse_url($uri)['path']);

        if ($parts[1] != '') {
            $this->controller = strtolower($parts[1]);

            if ($parts[2] != '') {
                $this->action = strtolower($parts[2]);
            }
        }
    }


    /**
     * @return mixed
     */
    public function callAction()
    {
        $controller_ref = '\Controller\\' . ucfirst($this->controller);
        $actionRef      = 'action' . ucfirst($this->action);

        if (!class_exists($controller_ref)) {
            header("HTTP/1.0 404 Not Found");
            echo 404 . $controller_ref;
            die();
        }
        /** @var Controller $controller */
        $controller = new $controller_ref;

        if (!method_exists($controller, $actionRef)) {
            header("HTTP/1.0 404 Not Found");
            echo 404 . $controller_ref . '->' . $actionRef;
            die();
        }

        return $controller->__named($actionRef, Request::getInstance()->getGet());
    }

}