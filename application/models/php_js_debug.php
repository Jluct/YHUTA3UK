<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 12.02.2016
 * Time: 14:57
 *
 * Надо доделать
 */


class php_js_debug
{
    static function console_log($data)
    {
        echo $out="<script type=\"tex\\javascript\">
            console.log(".json_encode($data).");
        </script>";
    }
}