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

        $data = new db_connect();
        $result = $data->getAll("SELECT * FROM page WHERE page_id = ?", [$id])[0];
        return $result;
    }
}