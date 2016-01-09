<?php


/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:39 AM
 */
class Request
{
    public  $controller = 'index';
    public  $action     = 'index';
    public  $uri_params;
    private $get;
    private $server;
    private $post;


    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get        = $_GET;
        $this->post       = $_POST;
        $this->server     = $_SERVER;
        $this->uri_params = [];
        $this->initParts();
    }


    /**
     *
     */
    private function initParts()
    {
        $parts = [];
        foreach (explode('/', parse_url($this->getUri())['path']) as $part) {
            $part = trim(urldecode($part));
            if (!empty($part)) {
                $parts[] = $part;
            }
        }

        if (empty($parts[0])) {
            return;
        }
        $this->controller = strtolower($parts[0]);

        if (empty($parts[1])) {
            return;
        }
        $this->action = strtolower($parts[1]);

        $this->uri_params = array_slice($parts, 2);
    }


    /**
     * @return string
     */
    public function getUri()
    {
        return $this->server['REQUEST_URI'];
    }


    /**
     *
     */
    public function getGet()
    {
        return $this->get;
    }


    /**
     *
     */
    public function getPost()
    {
        return $this->get;
    }


    /**
     * @return array
     */
    public function getUriParams()
    {
        return $this->uri_params;
    }
}