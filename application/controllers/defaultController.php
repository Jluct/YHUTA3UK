<?php
/**
 * Created by PhpStorm.
 * User: инкогнито
 * Date: 03.01.2016
 * Time: 15:01
 */




class defaultController {

    public function actionDefault() {
        $view = new View();
        $view->news = news::getDataDefaultNews();

        echo $view->render('default.php');
    }

} 