<?php
/**
 * Created by PhpStorm.
 * User: инкогнито
 * Date: 03.01.2016
 * Time: 16:08
 */


require_once (__DIR__ . '/autoload.php');

//try {
    if(!isset($_GET['ctrl'])){
        $ctrl = "defaultController";
        $action = "actionDefault";
    }else {
        $ctrl = $_GET['ctrl'];
        $ctrl .= 'Controller';

        $action = 'action';
        $action .= $_GET['action'];
    }

    $controller = new $ctrl();
    $controller->$action();


//    $view = new View();
//    $view->abc = 123;


//} catch(Exception $e) {
//    die('Ошибка');
//}