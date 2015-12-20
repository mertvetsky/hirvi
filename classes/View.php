<?php


/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:43 PM
 */
class View
{
    private $layout;
    private $template;
    private $params;
    private $title;
    private $controller;


    /**
     * View constructor.
     * @param $layout
     * @param $title
     * @param $template
     * @param $params
     * @param $controller
     */
    public function __construct($layout, $title, $template, $params, $controller)
    {
        $this->layout     = $layout;
        $this->template   = $template;
        $this->params     = $params;
        $this->title      = $title;
        $this->controller = $controller;
    }


    /**
     * Конечное получение страницы
     *
     * @return string
     */
    public function getPage()
    {
        $layout_path = $this->getPath('layouts', $this->layout);
        $page_path   = $this->getPath(Router::getInstance()->controller, $this->template);

        return $this->render($layout_path,
            ['title' => $this->title, 'content' => $this->render($page_path, $this->params)]);
    }


    /**
     * @param $dir
     * @param $name
     * @return string
     */
    private function getPath($dir, $name)
    {
        return HIRVI_VIEW . '/' . $dir . '/' . $name . '.php';
    }


    /**
     * @param $tpl_path
     * @param $params
     * @return string
     */
    private function render($tpl_path, $params)
    {
        ob_start();
        extract($params);
        require $tpl_path;
        $page = ob_get_contents();
        ob_end_clean();

        return $page;
    }

}