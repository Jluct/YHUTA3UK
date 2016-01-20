<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 19.11.2015
 * Time: 12:40
 */

include_once('/core/data/get/get.php');

class getMenu_2 extends getDataBase
{
    private static $query = "SELECT menu_2_id,menu_2_title,menu_2_url from menu_2";
    public static function getDataMenu_2(){
        return parent::getData(self::$query);
    }
}