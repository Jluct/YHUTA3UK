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
                        <td>" . $data[$i]['wisdom_category_name'] . "</td>
                        <td>" . $data[$i]['wisdom_subcategory_name'] . "</td>
                        <td>" . $data[$i]['wisdom_name'] . "</td>
                        <td>" . $data[$i]['wisdom_student_count'] . "</td>
                     </tr>";
        }

        return $out;
    }

    public static function getWisdomMenu()
    {
        $data = getDataBase::getData("SELECT * FROM wisdom_category");
        $data1 = getDataBase::getData("SELECT * FROM wisdom_subcategory");

        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data1); $j++) {
                if ($data[$i]['wisdom_category_id'] == $data1[$j]['wisdom_category_id']) {
                    $data[$i]['wisdom_subcategory'][] = $data1[$j];
                }
            }
        }

//        print_r($data);die();
        $out = "";

        for ($i = 0; $i < count($data); $i++) {
            if (isset($data[$i]['wisdom_subcategory'])) {
                $item="";
                for($j=0;$j<count($data[$i]['wisdom_subcategory']);$j++){
                    $item.="<li><a href=\"#\">" . $data[$i]['wisdom_subcategory'][$j]['wisdom_subcategory_name'] . "</a></li>";
                }
                $out .= "
                    <div class=\"btn-group\" role=\"group\">
                        <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                            " . $data[$i]['wisdom_category_name'] . "
                            <span class=\"caret\"></span>
                        </button>
                        <ul class=\"dropdown-menu\">
                            ".$item."
                        </ul>
                    </div>";
            }
        }
        return $out;
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

/*
Array(
[0] => Array([wisdom_category_id] => 1 [wisdom_category_name] => Программирование [wisdom_subcategory_id] => 1 [wisdom_subcategory_name] => PHP )
[1] => Array([wisdom_category_id] => 1 [wisdom_category_name] => Программирование [wisdom_subcategory_id] => 2 [wisdom_subcategory_name] => C# )
[2] => Array ( [wisdom_category_id] => 2 [wisdom_category_name] => Дизайн [wisdom_subcategory_id] => 3 [wisdom_subcategory_name] => Web-дизайн )
[3] => Array ( [wisdom_category_id] => [wisdom_category_name] => Кройка и шитьё [wisdom_subcategory_id] => [wisdom_subcategory_name] => )
)
*/