<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 29.02.2016
 * Time: 15:20
 */
class subscription
{
    static function subscriptionUser($id)
    {
//        if(!$_SESSION['user'])
//            header("Location: ?ctrl=registration&action=Registration");


        $requirement = R::findAll('requirements', "WHERE requirements.education_id = ?", [$id]);
        if(empty($requirement)){
            echo"NOT<br>";
            print_r($requirement);
        }else{


            print_r($requirement);
        }

        die();

    }
}