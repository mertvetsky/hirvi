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

    public function actionPage()
    {
        echo $this->view('page', ['date' => date('c')]);
    }


    public function actionIndex($pr)
    {
        $this->layout = 'coral';
        $this->appendTitle('index page');

        echo $this->view('index', ['name' => $pr]);
    }

}