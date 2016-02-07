<?php
session_start();
/**
 * Created by PhpStorm.
 * User: инкогнито
 * Date: 04.01.2016
 * Time: 21:25
 */

require_once(__DIR__.'/../core/core/data/session/openSession.php');
require_once(__DIR__.'/../core/core/data/session/getSession.php');


class authorizationController
{
    public function actionStartSession()
    {
        $userDataArray = array();
        $userDataArray['login']=$_POST['login'];
        $userDataArray['password']=$_POST['password'];
        $view = new View();
        openSession::openSession1($userDataArray,1);
        header("Location: /");
        echo $view->render('default.php');
    }
} 