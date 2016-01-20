<?php
session_start();

class userInfo
{
    static function sessionInfo()
    {
        if ($_SESSION['user']) {

            $out["user_login"] = $_SESSION['user']['user_login'];
            $out["user_status"] = $_SESSION['user']['user_status'];

            return $out;
        } else {
            return 0;
        }

    }
}