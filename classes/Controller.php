<?php


/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 7:15 PM
 */
class Controller
{
    protected $layout = 'main';
    protected $title  = 'Hirvi! ';
    protected $js     = [];
    protected $css    = [];


    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->initBaseStatic();
    }


    /**
     * для массовой инициализации js/css/layout в контроллере
     */
    protected function initBaseStatic()
    {

    }


    /**
     * Pass method arguments by name
     *
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __named($method, array $args = [])
    {
        $reflection = new ReflectionMethod($this, $method);

        $pass = [];
        foreach ($reflection->getParameters() as $param) {
            /* @var $param ReflectionParameter */
            if (isset($args[$param->getName()])) {
                $pass[] = $args[$param->getName()];
            } else {
                $pass[] = $param->getDefaultValue();
            }
        }

        return $reflection->invokeArgs($this, $pass);
    }


    /**
     * @param $tpl
     * @param array $params
     * @return string
     */
    protected function view($tpl, array $params = [])
    {
        $view = new View($this->layout, $tpl, $params, $this);
        $view->addTitle($this->title);
        $view->addJs(array_unique($this->js));
        $view->addCss(array_unique($this->css));

        return $view->getPage();
    }


    /**
     * @param $title
     */
    protected function setTitle($title)
    {
        $this->title = $title;
    }


    /**
     * @param $str
     */
    protected function appendTitle($str)
    {
        $this->title .= $str;
    }


    /**
     * @param $css
     */
    protected function registerCss($css)
    {
        $this->css[] = $css;
    }


    /**
     * @param $js
     */
    protected function registerJs($js)
    {
        $this->js[] = $js;
    }


    protected function setLayout($layout)
    {
        $this->layout = $layout;
    }

}