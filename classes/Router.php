<?php


/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:48 AM
 */
class Router
{
    /**
     * Router constructor.
     */
    public function __construct()
    {

    }


    /**
     * @return mixed
     */
    public function callAction()
    {
        $controller_ref = '\Controller\\' . ucfirst(Hirvi::$app->request->controller);
        $actionRef      = 'action' . ucfirst(Hirvi::$app->request->action);

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

        return $controller->__named($actionRef, Hirvi::$app->request->getGet());
    }

}