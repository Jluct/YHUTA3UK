<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 8:43
 */

require_once("/../core/core/data/get/get.php");
require_once("/../core/core/services/check.php");

class specialty extends getDataBase
{
    static function getSpecialtyById($data){
        $data = checkClass::checkAll($data);
        $query = "SELECT  `specialty` . * ,  `school`.`school_name`
FROM specialty
LEFT JOIN  `maket`.`specialty_school` ON  `specialty`.`specialty_id` =  `specialty_school`.`specialty_id`
LEFT JOIN  `maket`.`school` ON  `specialty_school`.`school_id` =  `school`.`school_id`
WHERE  `specialty`.specialty_id =".$data.";";
        $specialty = parent::getData($query);
        $out[]="";
        $out[0]="<h2>".$specialty[0]['specialty_name']."</h2>";

        $out[1] = "<p>" . $specialty[0]['specialty_text'] . "</p>";
        for ($i = 0; $i < count($specialty); $i++) {
            if (isset($specialty[$i]['school_name'])) {
                $out[1] .= "<ul class=\"\">
                        <li>" . $specialty[$i]['school_name'] . "</li>
                    </ul>";
            }
        }

        return $out;
    }
}

