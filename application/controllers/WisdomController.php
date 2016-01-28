<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 27.01.2016
 * Time: 11:03
 */
class wisdomController
{
    public function actionWisdomType()
    {
        $type=$_GET['type'];
        $view = new View();
        $view->menu = menu::getDataMenu();
        $view->wisdomData = wisdom::getWisdomType($type);
//        echo wisdom::getWisdomType($type);
        $view->render("wisdom1.php");
    }
}