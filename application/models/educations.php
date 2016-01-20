<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 05.01.2016
 * Time: 11:23
 */

require_once("/../core/core/data/get/get.php");
require_once("/../core/core/services/check.php");

class educations extends getDataBase
{
    public static function getAllEducations()
    {

        $educations = parent::getData("SELECT * FROM educations ;");
        $specialty = parent::getData("SELECT * FROM specialty ;");

        for ($i = 0; $i < count($educations); $i++) {
            for ($j = 0; $j < count($specialty); $j++) {
                if ($educations[$i]['educations_id'] == $specialty[$j]['educations_id']) {
                    $educations[$i]['specialty'][] = $specialty[$j];
                }
            }
        }
//        echo(json_encode($education[1]['specialty'][1]['specialty_name']));
//        die();


        $educationsBlock = '';
        for ($i = 0; $i < count($educations); $i++) {
            $a = '';
            for ($j = 0; $j < count($educations[$i]['specialty']); $j++) {
                $a .= "<h5>" . $educations[$i]['specialty'][$j]['specialty_name'] . "</h5>";

            }
            $educationsBlock .= "<div class=\"educations_name\">
                                <h4><a href='?ctrl=educations&action=Educations&id=".$educations[$i]['educations_id']."'>" . $educations[$i]['educations_name'] . "</a></h4>
                                " . $a . "
                            </div>";
        }

        return $educationsBlock;

    }
}

