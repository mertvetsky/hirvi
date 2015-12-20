<?php
/**
 * Created by PhpStorm.
 * User: mert
 * Date: 12/20/15
 * Time: 8:13 AM
 */

namespace Controller;

class Testik extends \Controller
{
    /**
     * @return string
     */
    public function actionPage()
    {
        return $this->view('page', ['date' => date('c')]);
    }


    /**
     * @param $pr
     * @return string
     */
    public function actionIndex($pr = 'default value for $pr')
    {
        $this->appendTitle('index page');
        $this->setLayout('coral');
        $this->registerCss('testik/white_text.css');
        $this->registerJs('testik/chtoto.js');

        return $this->view('index', ['name' => $pr]);
    }


    /**
     *
     */
    protected function initBaseStatic()
    {
        $this->registerCss('main.css');
        $this->registerJs('main.js');
    }

}