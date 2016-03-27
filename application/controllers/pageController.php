<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 10:19
 */
class pageController
{
    function actionPage($view){
        if(!isset($_GET['id'])){return;}
        $id=$_GET['id'];;
        $view->page = page::getPageById($id);

        echo $view->render('page.php');
    }
}