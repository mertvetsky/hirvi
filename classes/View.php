<?php


/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:43 PM
 */
class View
{
    private $css;
    private $js;
    private $layout;
    private $template;
    private $params;
    private $title = '';
    private $controller;


    /**
     * View constructor.
     * @param $layout
     * @param $template
     * @param $params
     * @param $controller
     */
    public function __construct($layout, $template, $params, $controller)
    {
        $this->layout     = $layout;
        $this->template   = $template;
        $this->params     = $params;
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

        return $this->render($layout_path, [
            'title'   => $this->title,
            'js'      => $this->js,
            'css'     => $this->css,
            'content' => $this->render($page_path, $this->params)
        ]);
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


    /**
     * @param $title
     */
    public function addTitle($title)
    {
        $this->title = $title;
    }


    /**
     * @param array $js_array
     */
    public function addJs(array $js_array)
    {
        $this->js = $js_array;
    }


    /**
     * @param array $css_array
     */
    public function addCss(array $css_array)
    {
        $this->css = $css_array;
    }


    protected function getCssJsTitle()
    {
        $result = "<title>$this->title</title>" . PHP_EOL;
        foreach ($this->js as $js_path) {
            $result .= '<script type = "text/javascript" src = "' . $js_path . '" ></script >' . PHP_EOL;
        }

        foreach ($this->css as $css_path) {
            $result .= '<link href = "' . $css_path . '" rel = "stylesheet" media = "all" />' . PHP_EOL;
        }

        return $result;
    }

}