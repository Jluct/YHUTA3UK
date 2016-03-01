<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 29.02.2016
 * Time: 15:08
 */
class subscriptionController
{
    function actionSubscriptionById($view){
        $id = (int)$_GET['id'];
        $view->subscript = subscription::subscriptionUser($id);
        echo $view->render('cabinet.php');
    }
}