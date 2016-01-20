<?php
/**
 * Created by PhpStorm.
 * User: инкогнито
 * Date: 10.01.2016
 * Time: 20:50
 */

session_start();

include_once('/../db_connect.php');

class add extends db_connect
{
    protected static function addData($query)
    {
        $result = parent::connect()->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}