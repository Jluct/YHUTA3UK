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
        $type=$_GET['type'];  //высшее
        $subtype=$_GET['subtype']; //переподготовка
        $category=$_GET['category']; //Программирование

        $view = new View();


        echo $view->render("wisdom1.php");
    }
}