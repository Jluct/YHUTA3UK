<?php
session_start();
include_once('/core/data/get/get.php');

class getMenu extends getDataBase
{
    private static $query = "SELECT * FROM menu";
    private static $query1 = "SELECT * FROM sub_menu";

    public static function getDataMenu()
    {
        $menu = parent::getData(self::$query);
        $sub_menu = parent::getData(self::$query1);

        for($i=0;$i<count($menu);$i++){
            for($j=0;$j<count($sub_menu);$j++){
                if($menu[$i]['menu_id']==$sub_menu[$j]['menu_id']){
                    $menu[$i]['sub_menu'][$j]=$sub_menu[$j];
                }
            }
        }

        return $menu;
    }
}