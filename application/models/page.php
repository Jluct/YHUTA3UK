<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 10:25
 */
require_once(__DIR__."/../core/core/data/get/get.php");
require_once(__DIR__."/../core/core/services/check.php");

class page extends getDataBase
{
    function getPageById($data){
        $data = checkClass::checkAll($data);
        $query = "SELECT * FROM page WHERE page_id=" . $data . ";";
        return parent::getData($query,1);
    }
}