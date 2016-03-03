<?php
session_start();



/**
 * Created by PhpStorm.
 * User: инкогнито
 * Date: 03.01.2016
 * Time: 16:09
 */


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-2.1.1.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <title>Обучайся!</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<header class="head">
    <div class="container">
        <? print_r($_SESSION); ?>
        <div class="row">
            <div class="col-sm-8 menu_light">
                <? $lightMenu = new menu("SELECT menu_item.*
        FROM  `menu` ,  `menu_item`
        WHERE menu_item.menu_id = ?
        AND menu.menu_id = menu_item.menu_id", [1]);
                $lightMenu->ul_tpl = "<ul class=\"nav\">";
                echo $lightMenu->render(); ?>

            </div>
            <div class="col-sm-4">
                <?php require_once(__DIR__.'/authorization.php'); ?>
            </div>
        </div>
        <div class="row menu_heavy">
            <div class="col-sm-2">
                <img class="logo_img" src="images/imgTest.png">
                Обучайся!
            </div>
            <div class="col-sm-9 actual_menu">

                <? $bigMenu = new menu("SELECT menu_item.*
        FROM  `menu` ,  `menu_item`
        WHERE menu_item.menu_id = ?
       AND menu.menu_id = menu_item.menu_id", [2]);
                $bigMenu->ul_tpl = "<ul class=\"nav nav-tabs nav-justified menu_heavy\">";
                $bigMenu->li_tpl = "<li  class=\"dropdown\"  role=\"presentation\"><a data-toggle=\"tooltip\" href='%s'>%s %s</a>%s</li>";
                echo $bigMenu->render();

                ?>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-block btn_search">Поиск</button>
            </div>
        </div>

        <? // print_r($messageData);?>

        <? if (!empty($message)) {
            $mes = new messager($message[0]);
            $mes->setMessageControl(true)->setHeader($message[1])->setTplClassVariable($message[2]);
            echo $mes;
        } ?>

    </div>
</header>
<section class="container">

