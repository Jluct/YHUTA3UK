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