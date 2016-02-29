<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 12.02.2016
 * Time: 13:38
 */
class wisdom
{
static $count_data = 0;

    function getWisdomByType($array, $wisdomArray, $page = 1) //Вопрос о получении $wisdomData стаётся открытым. Пока костыль
    {
        $wisdomTypeArray = [1 => 1, 2 => 2, 3 => 3];
        if (!(int)$array[0]) {
            return false;
        }
//      print_r($wisdomArray);


        $out = '';
        db_connect::connect();

//        print_r($wisdomArray);die();
        if (empty($wisdomArray)) {
            $out .= "<h2>Ничего не найдено</h2>";
            return $out;
        }
        foreach ($wisdomArray as $key => $value) {

            $out .= "<h2>" . $key . "</h2><table class='table table-striped'>
                    <tr>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Субкатегория</th>
                        <th>Раздел</th>
                    </tr>";
            foreach ($value as $smallKey => $subValue) {
                $category = R::load('category', $subValue['subcategory_id']);

                if ($array[3] && $array[2]) {
                    $step = 10;
                    $page3 = ($page - 1) * $step;
//                    echo "page3 ".$page3;
                    $data = $category->withCondition('information.category_id = ? LIMIT ?,?', [$array[3], $page3, $step])->ownInformationList;
                    self::$count_data += $category->withCondition('information.category_id = ? LIMIT ?,?', [$array[3], $page3, $step])->countOwn('information');

                } else {
                    $step = 10;
                    $step1 = 2;
//                    echo $page;
                    $page2 = ($page - 1) * $step;
                    $page1 = ($page - 1) * $step1;
                    $data = $array[1] ? $category->with(' LIMIT ?,?', [$page2, $step])->ownInformationList : $category->with(' LIMIT ?,?', [$page1, $step1])->ownInformationList;

                    self::$count_data += $array[1] ? $category->with(' LIMIT ?,?', [$page2, $step])->countOwn('information'): $category->with(' LIMIT ?,?', [$page1, $step1])->countOwn('information');
//                    echo " ".self::$count_data." ";
                }

                foreach ($data as $item) {
                    if (!$item && $array[2]) {
                        $out .= "<tr><td colspan='4'><h4 class='text-center'><b>Ничего не найдено</b></h4></td></tr>";
                        continue;
                    }
                    $out .= "<tr>
                            <td><a href='?ctrl=wisdom&action=GetWisdomById&wisdomId=" . $subValue['type_id'] . "&id=" . $item->id . "'>" . $item->name . "</a></td>
                            <td>" . $smallKey . "</td>
                            <td>" . $subValue['category_name'] . "</td>
                            <td>" . $subValue['subtype_name'] . "</td>
                        </tr>";
                }
            }
            $out .= "</table>";
        }
        return $out;

    }

    public function getWisdom($type, $id)
    {
//        if (!(int)$id || !(int)$type) {
//            return false;
//        }
        db_connect::connect();
        $wisdomTypeArray = [1 => 1, 2 => 2, 3 => 3];
        $out = '';

        $data = R::load('information', $id);

        function foo($obj, $id, $int)
        {
            $table = ['Education', 'course', 'seminar'];//вопрос о получении открыт
            if ($int > count($table))
                return false;
            $method = "own" . $table[$int];
            $data = $obj->$method;
            $data = reset(array_filter($data));
            if ($data->count() != 0) {
                return $data;
            } else {
                foo($data, $id, $int + 1);
            }
        }

        $outData = foo($data, $id, 0);
        $out = "<h2>" . $data->name . "</h2>
        %
         <div>" . $outData->description . "</div>";

        return $out;
    }

    private function education()
    {
        $data = "<ul class=\"list-group\">
            <li class=\"list-group-item\">Количество предметов :</li>
            <li class=\"list-group-item\">Преподаватель :</li>
            <li class=\"list-group-item\">Количество выпускников :</li>
         </ul>";
    }
}
