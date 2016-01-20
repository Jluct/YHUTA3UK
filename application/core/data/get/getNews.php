<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 30.11.2015
 * Time: 17:51
 */

session_start();
include_once('/core/data/get/get.php');
include_once('/core/services/check.php');


class getNews extends getDataBase{

    /**
     * @param $data is array
     * [0] - LIMIT start number
     */

    private static function count_news($data){
        $data = checkClass::checkAll($data);
        $count_table = parent::getData("SELECT COUNT( news_id ) FROM  `news`")[0];
        $number = 5;
        $number = ceil($count_table/$number);

        self::$query = "SELECT  `news` . * , `image`.`image_name`
FROM news
LEFT JOIN  `iitBsuir`.`news_image` ON  `news`.`news_id` =  `news_image`.`news_id` AND `news_image`.cover =1
LEFT JOIN  `iitBsuir`.`image` ON  `news_image`.`image_id` =  `image`.`image_id`  ORDER BY  news.news_date DESC LIMIT ".$data[0]." ,5";

    }

    private static $query = "SELECT  `news` . * , `image`.`image_name`
FROM news
LEFT JOIN  `iitBsuir`.`news_image` ON  `news`.`news_id` =  `news_image`.`news_id` AND `news_image`.cover =1
LEFT JOIN  `iitBsuir`.`image` ON  `news_image`.`image_id` =  `image`.`image_id`  ORDER BY  news.news_date DESC LIMIT 0 , 5";

    public static function getDataNews($data){
        if(isset($data[0]) && $data[0]!=1){

            self::count_news($data);
        }
        return parent::getData(self::$query);

    }

}