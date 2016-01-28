<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 04.01.2016
 * Time: 9:07
 */
require_once("/../core/core/data/get/get.php");
class menu extends getDataBase
{
    private static $query = "SELECT * FROM menu";
    private static $query1 = "SELECT * FROM sub_menu";

    public static function getDataMenu()
    {
        $menu = parent::getData(self::$query);
        $sub_menu = parent::getData(self::$query1);

        for ($i = 0; $i < count($menu); $i++) {
            for ($j = 0; $j < count($sub_menu); $j++) {
                if ($menu[$i]['menu_id'] == $sub_menu[$j]['menu_id']) {
                    $menu[$i]['sub_menu'][] = $sub_menu[$j];
                }
            }
        }
//        print_r($menu);


        $menuEnd = "";
        for ($i = 0; $i < count($menu); $i++) {
            if ($menu[$i]['sub_menu']) {
                $a = "<ul class=\"dropdown-menu sub_menu\">";
                for ($j = 0; $j < count($menu[$i]['sub_menu']); $j++) {
                    $a .= "<li role=\"presentation\"><a  href='" . $menu[$i]['sub_menu'][$j]['sub_menu_url']."'>" . $menu[$i]['sub_menu'][$j]['sub_menu_title'] . "</a></li>";
//                        echo $a;
                }
                $a .= "</ul>";
//                    die();
                $menuEnd[$menu[$i]['menu_type']] .= "<li class=\"dropdown\" role=\"presentation\"><a href='" . $menu[$i]['menu_url'] . "'>" . $menu[$i]['menu_title'] . "<span class=\"caret\"></span></a>" . $a . "</li>";
            } else {
                $menuEnd[$menu[$i]['menu_type']] .= "<li role=\"presentation\"><a href='" . $menu[$i]['menu_url'] . "'>" . $menu[$i]['menu_title'] . "</a></li>";
            }

        }
//        $menuEnd.="</ul>";

        return $menuEnd;


    }
}