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

    function actionGetInformation($view)
    {
        $view->data = cabinet::getUserInforamtion();
        echo $view->render('userInformation.php');

    }

    function actionGetCabinet($view)
    {
        if (!$_SESSION['user']->login || !$_SESSION['user']->authorisation === "7gF5dFG546jX15" ||
            !$_SESSION['user']->status || $_SESSION['user']->block != 0
        ) {
            header("Location: /?");
            return false;
        }




        $view->userMenu = '';
        switch ($_SESSION['user']->status) {
            case 'student':
                $view->typeMenu = 'studentMenu.php';
                break;
            case 'teacher':
                $view->typeMenu = 'teacherMenu.php';
                break;
            case 'moderator':
                $view->typeMenu = 'moderatorMenu.php';
                break;
            case 'admin':
                $view->typeMenu = "adminMenu.php";
                break;
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

    function actionUserData($view, $userArray = '', $errorArray = '')
    {
        if (!empty($errorArray))
            $view->message = ["Неверные данные или заполненны не все обязательные поля", "Внимание", 4];

        $view->data = cabinet::getUserData($userArray, $errorArray);
        echo $view->render('cabinet.php');
    }

    function actionUpdateUserData($view)
    {
        $userArray = array();
        $errorArray = array();
        $session = $_SESSION['user'];
        if($_POST['firstPassword'] && $_POST['anderPassword'] && ($_POST['firstPassword'] === $_POST['anderPassword'])){
            $session->password = $_POST['firstPassword'];
        }else{
            $view->message = ["Пароли не совпадают или не все поля заполненны", "Внимание", 4];
            $errorArray = $_POST;
            $view->data = cabinet::getUserData($userArray, $errorArray);
            echo $view->render('cabinet.php');
            return;
        }

        foreach ($_POST as $key => $value) {
            if ($key == 'firstPassword' || $key == 'anderPassword') {
                if (empty($value))
                    continue;
            }
            if ($key == 'email')
                if (preg_match("~([a-zA-Z0-9!#$%&\'*+-/=?^_`{|}\~])@([a-zA-Z0-9-]).([a-zA-Z0-9]{2,4})~", $value)) {
                    $userArray[$key] = $value;
                    continue;
                } else {
                    $errorArray[$key] = $value;
                    continue;
                }

            if ($key == 'phone')
                if (preg_match("/^[+0-9-]{5,30}$/", $value)) {
                    $userArray[$key] = $value;
                    continue;
                } else {
                    $errorArray[$key] = $value;
                    continue;
                }

            if (!preg_match('/^[A-Za-zАаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя0-9_]{2,30}$/', trim($value))) {
                $errorArray[$key] = $value;
            } else {
                $userArray[$key] = $value;
            }
//
        }

        if (!isset($errorArray)) {
            $view->message = ["Неверные данные или заполненны не все обязательные поля", "Внимание", 4];
        } elseif (isset($userArray) && empty($errorArray)) {

//            echo '<br>';
//            print_r($session);
//            echo "<br>";
//            foreach ($session as $key => $value) {
//            unset($session->authorisation);
//                if ($session->$key)
//                    $session->$key = $userArray[$key];
            foreach ($session->dossier as $key => $value) {

                if ($_SESSION['user']->dossier->$key && isset($userArray[$key])) {
                    $session->dossier->$key = $userArray[$key];

                }
            }
//            }
            db_connect::connect();

//            R::freeze( TRUE );
//            R::freeze( false );
//            echo "Конечные данные:<br>";
//            print_r($session);
//            echo "<br>Конец данных";

            $id = R::store($session);
            if (!$id) {
                $view->message = ["Ошибка записи. Проверьте данные", "Ошибка", 4];

            }

            $view->message = ["Ваши личные данные изменены:", "Данные изменены", 1];

            $userArray = $errorArray = '';
        } else {
            $view->message = ["Ошибка записи. Проверьте данные", "Ошибка", 4];

        }

        $view->data = cabinet::getUserData($userArray, $errorArray);
        echo $view->render('cabinet.php');


//        echo "Норм ";
//        print_r($userArray);
//        echo "<br>Нет ";
//        print_r($errorArray);
//        echo $view->render('cabinet.php');
    }

    function actionUserInfo($view){
        $view->user = cabinet::userInfo($_GET['id']);

        echo $view->render('userInfo.php');
    }
}

/*
 * АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя
 */