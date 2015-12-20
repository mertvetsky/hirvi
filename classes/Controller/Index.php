<?php
/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/21/15
 * Time: 12:08 AM
 */

namespace Controller;

class Index extends \Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->view('index', ['hello' => 'Hirvi']);
    }


    /**
     *
     */
    protected function initBaseStatic()
    {
        $this->registerCss('//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
        $this->registerCss('/css/main.css');
        $this->registerJs('/js/main.js');
    }

}