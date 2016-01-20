<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 16.11.2015
 * Time: 15:48
 */

session_start();

include_once('/core/data/get/get.php');
include_once('/core/services/check.php');

class searchData extends getDataBase
{
    public static function searchArticle($array){

        $array = checkClass::checkAll($array);

        $query = 'SELECT * FROM article where news_header like "%'.$array.'%"';
        return parent::getData($query);
    }
}



//'SELECT * FROM news where news_header like "%'.$search.'%"'