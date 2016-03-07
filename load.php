<?php
/**
 * Created by PhpStorm.
 * User: инкогнито
 * Date: 03.01.2016
 * Time: 16:08
 */


require_once (__DIR__ . '/autoload.php');
require_once(__DIR__ . '/application/core/connect/db_connect.php');

//try {
    if(!isset($_GET['ctrl'])){
        $ctrl = "defaultController";
        $action = "actionDefault";
    }else {
       $controller = $ctrl = $_GET['ctrl'];
        $ctrl .= 'Controller';

        $action = 'action';
        $action .= $_GET['action'];
    }

    spl_autoload_register('myAutoload');


db_connect::connect();



$view = new View();
$controller = new $ctrl();
$controller->$action($view);

//    $view = new View();
//    $view->abc = 123;


//} catch(Exception $e) {
//    die('Ошибка');
//}