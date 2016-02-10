<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 10:25
 */

class page
{
    static function getPageById($id)
    {
        $id = (int)$id;


        db_connect::connect();

        $result = R::load('page1',$id);

        return $result;
    }
}