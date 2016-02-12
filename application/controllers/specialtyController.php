<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 8:38
 *
 * Конкретное направление или предмет
 */



class specialtyController
{
    function actionSpecialty(){
        $id=$_GET['id'];
        $view = new View();
        $view->specialty = specialty::getSpecialtyById($id);

        echo $view->render('specialty.php');
    }
}