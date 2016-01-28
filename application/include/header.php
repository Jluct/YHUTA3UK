<?php
session_start();

if (isset($_SESSION['user']['user_login']) && $_SESSION['user']['user_block'] == false) {
    $authorization = "/../include/cabinet.php";
} else {
    $authorization = "/../include/authorization.php";

}
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
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-2.1.1.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <title>Обучайся!</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<header class="head">
    <div class="container">
        <? print_r ($_SESSION); ?>
        <div class="row">
            <div class="col-sm-8 menu_light">
                <? echo $menu[2]; ?>
            </div>
            <div class="col-sm-4">
                <?php require_once($authorization); ?>


            </div>
        </div>
        <div class="row menu_heavy">
            <div class="col-sm-2">
                <img class="logo_img" src="images/imgTest.png">
                Обучайся!
            </div>
            <div class="col-sm-9 actual_menu">
                <ul class="nav nav-tabs nav-justified menu_heavy">
                    <? echo $menu[1]; ?>
                </ul>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-block btn_search">Поиск</button>
            </div>
        </div>
    </div>
</header>

