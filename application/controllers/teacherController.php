<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 14.03.2016
 * Time: 8:40
 */
class teacherController
{
    function actionWisdomData($view)
    {

        if (!empty($_POST)) {
            $id = teacher::wisdomRecord((int)$_GET['id']);
//            $view->message = ["Ошибка добавления курса!", "Внимание", 4];

            if (!empty($id) && $id) {
                header('Location:?ctrl=cabinet&action=GetUserInformation&id=' . $id);
//                $view->data = wisdom::getWisdom($id);
//                $view->message = ["Модуль добавлен!", "Добавление модуля", 1];
//                echo $view->render('wisdomId.php');
                return;
            } else {
                $view->message = ["Ошибка добавления модуля!", "Добавление модуля", 4];
            }
        }

        $wisdomData[] = $_GET['type'];
        $wisdomData[] = $_GET['subtype'];
        $wisdomData[] = $_GET['category'];
        $wisdomData[] = $_GET['subcategory'];

        $view->data = teacher::addWisdom($wisdomData);
        echo $view->render('teacher.php');
    }

    function actionEditWisdom($view)
    {
        $id = (int)$_GET['id'];
        $view->data = teacher::editWisdom($id);
        echo $view->render('teacher.php');
    }

    function actionAddModul($view)
    {
        $id = (int)$_GET['id'];
        if(!empty($_POST)){
            $userData = $_POST;
            $success = teacher::modulRecord($userData,$id);
            if($success){
                header('Location:?ctrl=cabinet&action=GetUserInformation&id=' . $id);
            }else{
                $view->message = ["Ошибка добавления модуля!", "Добавление модуля", 4];
            }
        }
        $view->data = teacher::addModul($id);
        echo $view->render('teacher.php');

    }

    function actionAddLesson($view)
    {
        //добавление лекции
        $id = (int)$_GET['id'];
        if(!empty($_POST)){
            $userData = $_POST;
            $success = teacher::modulRecord($userData,$id);
            if($success){
                header('Location:?ctrl=cabinet&action=GetUserInformation&id=' . $id);
            }else{
                $view->message = ["Ошибка добавления модуля!", "Добавление модуля", 4];
            }
        }
        $view->data = teacher::AddLesson($id);
        echo $view->render('teacher.php');
    }


}