<?php


/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:39 AM
 */
class Request
{
    private $get;
    private $server;
    private $post;


    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get    = $_GET;
        $this->post   = $_POST;
        $this->server = $_SERVER;
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
     * @return string
     */
    public function getUri()
    {
        return $this->server['REQUEST_URI'];
    }

}