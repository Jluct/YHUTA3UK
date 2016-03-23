<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 14:13
 */


//<ul style="list-style-type: none">
//    <li><button class="btn btn-block btn-info">Успеваемость</button></li>
//    <li><button class="btn btn-block btn-info">Лекции</button></li>
//    <li><hr color="black"></li>
//    <li><button class="btn btn-block btn-primary" type="button"><span class="badge" style="margin-right: 10px;">0</span>Сообщения</button></li>
//    <li><button class="btn btn-block btn-primary" type="button">Настройки</button></li>
//    <li><hr color="black"></li>
//    <li><a href="../../exit.php"><button class="btn btn-block btn-danger">Выйти</button></a></li>
//</ul>
include_once(__DIR__.'/'.$_SESSION['user']->status.'Menu.php');
$out = "<ul style=\"list-style-type: none\">
        <li><a href='?ctrl=cabinet&action=GetCabinet'> <button class=\"btn btn-block btn-primary\" type=\"button\">Кабинет</button></a></li>
        <li><button class=\"btn btn-block btn-primary\" type=\"button\"><span class=\"badge\" style=\"margin-right: 10px;\">0</span>Сообщения</button></li>
        <li><hr color=\"black\"></li>".$type."
        <li><hr color=\"black\"></li>
       <li><a href='?ctrl=cabinet&action=UserData'><button class=\"btn btn-block btn-primary\" type=\"button\">Личные данные</button></a></li>
       <li><a href=\"exit.php\"><button class=\"btn btn-block btn-danger\">Выйти</button></a></li>
</ul>";
echo $out;
?>