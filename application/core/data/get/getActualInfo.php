<?php
session_start();
include_once('/core/data/get/get.php');

class getActualInfo extends getDataBase
{
    private static $query = "SELECT * FROM actual_info where actual_info_checked=TRUE ";
    public static function getDataActualInfo(){
        return parent::getData(self::$query);
    }
}