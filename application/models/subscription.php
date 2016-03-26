<?php
session_start();

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
        if(empty($_SESSION['user']))
            header("Location: ?ctrl=wisdom&action=GetWisdomById&id=".$id);

        $requirement = R::findAll('requirements', "WHERE requirements.information_id = ?", [$id]);
        if(empty($requirement)){
            $information = R::load('information',$id);
            $information->sharedUser[] = $_SESSION['user'];
            R::store($information);

            header("Location:?ctrl=cabinet&action=GetUserInformation&id=".$id);

        }else{
            header("Location:?ctrl=wisdom&action=GetWisdomById&id=".$id);
        }

        die();

    }
}