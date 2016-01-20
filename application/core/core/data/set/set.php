<?php
session_start();

include_once('/../db_connect.php');

class setDataBase extends db_connect
{




    protected static function setData($query)
    {
        $out = array();

        $result = parent::connect()->query($query);
        if ($result->num_rows > 0) {
            foreach ($result as $key => $value) {
                $out[$key] = $value;
            }
            return $out;
        }
        return true;
    }
}



















