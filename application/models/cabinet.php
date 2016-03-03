<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 12:23
 */



class cabinet
{
    function getStudentById()
    {

    }
    function authorisation($array){
        db_connect::connect();
//        print_r($array);
        $user = R::findOne('user',' login = :login and password=:password',$array);
//        print_r($user);die;
        if(empty($user) || $user->user_block===0)
            return false;
        $user->dossier = R::load('dossier',$user->dossier_id);
        $user->authorisation = "7gF5dFG546jX15";
        $_SESSION['user'] = $user;
        return true;

    }

}