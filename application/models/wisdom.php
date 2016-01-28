<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 27.01.2016
 * Time: 11:09
 */

require_once("/../core/core/data/get/get.php");
require_once("/../core/core/services/check.php");

class wisdom extends getDataBase
{
    public static function getWisdomType($type)
    {

        $data = getDataBase::getData("SELECT * FROM " . $type . "
left join wisdom on wisdom.wisdom_id = education.wisdom_id
left join wisdom_subcategory on wisdom_subcategory.wisdom_subcategory_id = wisdom.wisdom_subcategory_id
left join wisdom_category on wisdom_category.wisdom_category_id = wisdom_subcategory.wisdom_subcategory_id
ORDER BY wisdom.wisdom_student_count;
");
        $out = "";

        for ($i = 0; $i < count($data); $i++) {
            $out .= "<tr>
                        <td>". $data[$i]['wisdom_category_name'] ."</td>
                        <td>". $data[$i]['wisdom_subcategory_name'] ."</td>
                        <td>". $data[$i]['wisdom_name'] ."</td>
                        <td>". $data[$i]['wisdom_student_count'] ."</td>
                     </tr>";
        }

        return $out;
    }

    public static function getWisdomMenu($type)
    {
        $data = getDataBase::getData("SELECT * FROM " . $type . "
left join wisdom on wisdom.wisdom_id = education.wisdom_id
left join wisdom_subcategory on wisdom_subcategory.wisdom_subcategory_id = wisdom.wisdom_subcategory_id
left join wisdom_category on wisdom_category.wisdom_category_id = wisdom_subcategory.wisdom_subcategory_id
ORDER BY wisdom.wisdom_student_count;
");
        $out = "";

        for ($i = 0; $i < count($data); $i++) {
            $out .= "<tr>
                        <td>". $data[$i]['wisdom_category_name'] ."</td>
                        <td>". $data[$i]['wisdom_subcategory_name'] ."</td>
                        <td>". $data[$i]['wisdom_name'] ."</td>
                        <td>". $data[$i]['wisdom_student_count'] ."</td>
                     </tr>";
        }
    }

}



/*
 Конкретная высшка
SELECT * FROM education
left join wisdom on wisdom.wisdom_id = education.wisdom_id
left join wisdom_subcategory on wisdom_subcategory.wisdom_subcategory_id = wisdom.wisdom_subcategory_id
left join wisdom_category on wisdom_category.wisdom_category_id = wisdom_subcategory.wisdom_subcategory_id
where education.wisdom_id = 1
 */

