<?php


function myAutoload($class_name)
{


    if (file_exists(__DIR__ . '/application/models/' . $class_name . '.php')) {
        require_once __DIR__ . '/application/models/' . $class_name . '.php';
    } elseif (file_exists(__DIR__ . '/application/controllers/' . $class_name . '.php')) {
        require_once __DIR__ . '/application/controllers/' . $class_name . '.php';
    } elseif (file_exists(__DIR__ . '/application/views/' . $class_name . '.php')) {
        require_once __DIR__ . '/application/views/' . $class_name . '.php';
    } else {
        if (!autoLoadDbConnect($class_name)) {
//            throw new Exception('Нужный класс не найден ' . $class_name);
        }
    }
}

function autoLoadDbConnect($class_name)
{

    if (file_exists(__DIR__ . '/application/core/connect/'.$class_name.'.php')) {
        require_once(__DIR__ . '/application/core/connect/'.$class_name.'.php');
    } else {
        throw new Exception('Не удалось обнаружить класс - ' . $class_name);
    }

}

//spl_autoload_register('autoLoadDbConnect');
spl_autoload_register('myAutoload');