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

    static $path = "";

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
                    self::$path = "?ctrl=wisdom&action=WisdomType&type=" . $array[0] . "&subtype=" . $array[1] . "&category=" . $array[2] . "&subcategory=" . $array[3];

                } else {
                    $step = 10;
                    $step1 = 2;
//                    echo $page;
                    $page2 = ($page - 1) * $step;
                    $page1 = ($page - 1) * $step1;
                    $data = $array[1] ? $category->with(' LIMIT ?,?', [$page2, $step])->ownInformationList : $category->with(' LIMIT ?,?', [$page1, $step1])->ownInformationList;

                    self::$count_data += $array[1] ? $category->with(' LIMIT ?,?', [$page2, $step])->countOwn('information') : $category->with(' LIMIT ?,?', [$page1, $step1])->countOwn('information');
//                    echo " ".self::$count_data." ";
                    self::$path = $array[1] ? "?ctrl=wisdom&action=WisdomType&type=" . $array[0] . "&subtype=" . $array[1] : "?ctrl=wisdom&action=WisdomType&type=" . $array[0];
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

        if ($type !== 3)

            $data = R::load('information', $id);
        $subData = $data->ownEducationList;
        $subData = reset(array_diff($subData, array('')));
        $teacher = reset(array_diff($data->sharedUserList, array('')));
        $teacherData = reset(array_diff($teacher->ownDossier, array('')));
//        print_r($subData);
        $count_modul = $subData->countOwn('education');
//        $count_modul = $data->countOwn('education') ? $data->countOwn('education') : $data->countOwn('lesson');

        $out = "<h2>" . $data->name . "</h2>
            <div>" . $subData->description . "</div>
            <div class=\"list-group\">
  <a href=\"#\" class=\"list-group-item active\">
    Дополнительная информация
  </a>
  <a href=\"#\" class=\"list-group-item\">Преподаватель: " . $teacher->login . " | " . $teacherData->surname . " " . $teacherData->name . " " . $teacherData->andername . "</a>
  <a href=\"#\" class=\"list-group-item\">Кол-во модулей: " .$count_modul. "</a>
</div>
<ul class=\"list-group\">
  <li class=\"list-group-item active\">Название модулей:</li>
";
        foreach ($subData->ownEducation as $item) {
            $out .= "<ol class=\"list-group-item\">" . $item->name . "</ol>";
        }
        $out .= "</ul>";

        $out .= "<ul class=\"list-group\">
  <li class=\"list-group-item active\">Требования:</li>";

        $requirement = R::findAll('requirements', "WHERE requirements.education_id = ?", [$id]);
        foreach($requirement->withCondition()->own){

        }
//        $requirement_eduation = R::findAll('education',"WHERE education.id = ?",[$requirement->requirements]);

        foreach($requirement_eduation->ownInformationList as $item){
            $out .= "<ol class=\"list-group-item\">" . $item->name . " | ".$requirement_eduation->name."</ol>";
        }


        $out .= '</ul>';
//        $data = R::load('information', $id);


        return $out;
    }

}
