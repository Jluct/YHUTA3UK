<?php


function myAutoload($class_name)
{



    if($class_name=='R')
        return;

    if (file_exists(__DIR__ . '/application/models/' . $class_name . '.php')) {
        require_once __DIR__ . '/application/models/' . $class_name . '.php';
    } elseif (file_exists(__DIR__ . '/application/controllers/' . $class_name . '.php')) {
        require_once __DIR__ . '/application/controllers/' . $class_name . '.php';
    } elseif (file_exists(__DIR__ . '/application/views/' . $class_name . '.php')) {
        require_once __DIR__ . '/application/views/' . $class_name . '.php';
    } else {

//            throw new Exception('Не удалось обнаружить класс - "' . $class_name.'"');

    }
}



