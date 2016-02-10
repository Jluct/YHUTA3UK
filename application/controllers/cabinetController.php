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
        $view->cabinet = cabinet::getStudentById();
        if(!isset($_SESSION['user'])){
            return false;
        }
        $view->userMenu = "/../include/userMenu.php";
        echo $view->render('cabinet.php');
    }

    function actionAuthorisation(){
        if(isset($_POST['login']) || isset($_POST['password']))
            return false;
        $userDataArray = array();
        $userDataArray['login']=$_POST['login'];
        $userDataArray['password']=$_POST['password'];
        $view = new View();
        $view->user = cabinet::authorisation($userDataArray);
        echo $view->render('cabinet.php');
    }
}