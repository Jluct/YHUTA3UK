<?php
session_start();
include_once('/core/data/get/get.php');
include_once('/core/services/check.php');

class getSlide extends getDataBase
{
    private static $query = "SELECT slider_id, image_id, image_name FROM  `slider` NATURAL JOIN image
        WHERE ( slider_begin >= TO_DAYS( NOW( ) )
        AND slider_end < TO_DAYS( NOW( ) ))
        OR ( slider_begin IS NULL AND slider_begin IS NULL )
        ORDER BY slider_image_number
        LIMIT 0 , 10 ";

    public static function getDataSlide()
    {
        return parent::getData(self::$query);
    }
}