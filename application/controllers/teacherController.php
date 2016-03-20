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
            $id = teacher::wisdomRecord((int)$_GET['id'],(int)$_GET['education']);
//            $view->message = ["Ошибка добавления курса!", "Внимание", 4];

            if (!empty($id) && $id) {
                header('Location:?ctrl=cabinet&action=GetUserInformation&id=' . (int)$_GET['id']);
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

    function actionLessonData($view)
    {

        if (!empty($_POST)) {
            $id = teacher::lessonRecord($_GET['id']);
//            $view->message = ["Ошибка добавления курса!", "Внимание", 4];

            if (!empty($id) && $id) {
                if(!empty($id->information_id)) {
//                    echo $id->education->information->id;die;
                    $id=$id->information_id;
                }else{
                    $id= $id->education->information->id;

                }
                header('Location:?ctrl=cabinet&action=GetUserInformation&id=' . $id);
                return;
            } else {
                $view->message = ["Ошибка добавления модуля!", "Добавление модуля", 4];
            }
        }
//
//        $wisdomData[] = $_GET['type'];
//        $wisdomData[] = $_GET['subtype'];
//        $wisdomData[] = $_GET['category'];
//        $wisdomData[] = $_GET['subcategory'];
//
//        $view->data = teacher::addWisdom($wisdomData);
//        echo $view->render('teacher.php');
    }

    function actionEditWisdom($view)
    {
        $id = (int)$_GET['id'];
        $education = (int)$_GET['education'];
        $lesson = (int)$_GET['lesson'];
        $view->data = teacher::editWisdom($id,$education,$lesson);
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
        $education = (int)$_GET['education'];    //было id
        if(!empty($_POST)){
            $userData = $_POST;
            $success = teacher::modulRecord($userData,$id,$education);
            if($success){
                header('Location:?ctrl=cabinet&action=GetUserInformation&id=' . $id);
            }else{
                $view->message = ["Ошибка добавления модуля!", "Добавление модуля", 4];
            }
        }
        $view->data = teacher::AddLesson($id);
        echo $view->render('teacher.php');
    }

    function actionEditLesson($view)
    {
        $lesson = (int)$_GET['lesson'];
        $view->data = teacher::editLesson($lesson);
        echo $view->render('teacher.php');
    }

}