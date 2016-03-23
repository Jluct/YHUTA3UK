<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 04.01.2016
 * Time: 8:44
 */
echo("Приветствую Вас, <span class='alert-info'>" . $_SESSION['user']->login . "</span>");
?>
        <a href="?ctrl=cabinet&action=GetCabinet"><button class="btn btn-block btn-info">Перейти в кабинет</button></a>
        <a href="../../exit.php"><button class="btn btn-block btn-danger">Выйти</button></a>
