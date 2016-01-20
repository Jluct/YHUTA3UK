<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 11:01
 */
class cabinetController
{
    function actionGetCabinet(){

        $view = new View();
        $view->menu = menu::getDataMenu();
        $view->cabinet = cabinet::getStudentById();
        if(!isset($_SESSION['student'])){
            return false;
        }
        $view->userMenu = "/../include/userMenu.php";
        echo $view->render('cabinet.php');
    }
}