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

        if(!empty($_POST)) {
            $id = teacher::wisdomRecord();
//            $view->message = ["Ошибка добавления курса!", "Внимание", 4];

            if (!empty($id) && $id) {
                header('Location:?ctrl=cabinet&action=GetUserInformation&id='.$id);
//                $view->data = wisdom::getWisdom($id);
//                $view->message = ["Модуль добавлен!", "Добавление модуля", 1];
//                echo $view->render('wisdomId.php');
                return;
            } else {
                $view->message = ["Ошибка добавления курса!", "Добавление модуля", 4];
            }
        }

        $wisdomData[] = $_GET['type'];
        $wisdomData[] = $_GET['subtype'];
        $wisdomData[] = $_GET['category'];
        $wisdomData[] = $_GET['subcategory'];

        $view->data = teacher::addWisdom($wisdomData);
        echo $view->render('teacher.php');
    }
}