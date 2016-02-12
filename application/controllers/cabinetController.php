<?php
session_start();

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 11:01
 */
class cabinetController
{
    function actionGetCabinet($view)
    {


        if (!isset($_SESSION['user'])) {
            return false;
        }

        echo $view->render('cabinet.php');
    }

    function actionAuthorisation($view)
    {

        if (empty($_POST['login']) || empty($_POST['password'])) {
            $view->message = ["Не введён логин или пароль", "Внимание", 4];
            echo $view->render('authorisation.php');
            return;
        }

        $userDataArray = array();
        $userDataArray['login'] = $_POST['login'];
        $userDataArray['password'] = $_POST['password'];
        if (!cabinet::authorisation($userDataArray)) {
            $view->message = ["Неверный логин или пароль", "Внимание", 4];
            echo $view->render('authorisation.php');
            return;
        }

        header("Location: /?");

//        header("Location: /?ctrl=cabinet&action=GetCabinet");
    }
}