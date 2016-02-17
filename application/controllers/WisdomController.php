<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 27.01.2016
 * Time: 11:03
 */
class wisdomController
{
    public function actionWisdomType($view)
    {
        if(!isset($_GET['type']) || !isset($_GET['subtype']))
        $wisdomData[]=$_GET['type'];
        $wisdomData[]=$_GET['subtype'];
//        print_r($wisdomData);die();
        $view->type = $_GET['type'];
        $view->wisdom = wisdom::getWisdomByType($wisdomData);
        echo $view->render('wisdom.php');
    }
}