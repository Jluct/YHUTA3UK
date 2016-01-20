<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 10:19
 */
class pageController
{
    function actionPage(){
        $id=$_GET['id'];
        $view = new View();
        $view->menu = menu::getDataMenu();
        $view->page = page::getPageById($id);

        echo $view->render('page.php');
    }
}