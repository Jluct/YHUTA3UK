<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 05.01.2016
 * Time: 8:30
 */
class educationsController
{
    public function actionAllEducations(){

        $view = new View();
        $view->menu = menu::getDataMenu();
        $view->educationsBlock = educations::getAllEducations();

        echo $view->render('allEducations.php');
    }

    public function actionEducations(){
        $id=$_GET['id'];
        $view = new View();
        $view->menu = menu::getDataMenu();
        $view->educations = education::getEducationById($id);

        echo $view->render('education.php');
    }
}