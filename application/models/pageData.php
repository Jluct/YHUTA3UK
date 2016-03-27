<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 10:25
 */

class pageData
{
    static function getPageById($id)
    {

        db_connect::connect();

        $page = R::load('page',$id);
        return $page;
    }
}
