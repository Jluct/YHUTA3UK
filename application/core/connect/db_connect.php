<?php


require_once(__DIR__ . "/../vendor/rb.php");
define( 'REDBEAN_MODEL_PREFIX', '' );
class db_connect
{

    static function connect()
    {
////        R::setup('mysql:host=localhost;dbname=obuceisea', 'root', '');
////        R::setAutoResolve(TRUE);
////        R::freeze( TRUE );
    }
//
}
//
R::setup('mysql:host=localhost;dbname=obuceisea', 'root', '');
R::setAutoResolve(TRUE);
//R::freeze( TRUE );
//R::debug(true);