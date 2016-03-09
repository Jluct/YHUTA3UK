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
                        <th>Автор</th>
                        <th>Категория</th>
                        <th>Субкатегория</th>
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

                    $autor = self::getAuthorName($item->id);

                    $out .= "<tr>
                            <td><a href='?ctrl=wisdom&action=GetWisdomById&id=" . $item->id . "'>" . $item->name . "</a></td>
                            <td><a  href='?ctrl=cabinet&action=UserInfo&id=" . $autor['id'] . "'>" . $autor['login'] . "</a> |
                    <a  href='?ctrl=cabinet&action=UserInfo&id=" . $autor['id'] . "'> " . $autor['surname'] .
            " " . $autor['name'] . " " . $autor['andername'] . " </a></td>
                            <td>" . $smallKey . "</td>
                            <td>" . $subValue['category_name'] . "</td>

                        </tr>";
                }
            }
            $out .= "</table>";
        }
        return $out;

    }

    static public function getType($obj)
    {
        $subcategory = $obj->category;
        $category = $subcategory->category;
        $subtype = $category->type;
        $type = $subtype->type;

        return [$subcategory,$category,$subtype,$type];
    }

    public function getWisdom($id)
    {
        $information = R::load('information', $id);
        $typeData = self::getType($information);

//        if (!(int)$id || !(int)$type) {
//            return false;
//        }


        db_connect::connect();
        $wisdomTypeArray = [1 => 1, 2 => 2, 3 => 3];
        $out = '';



//        print_r($subtype);die;
        $autor = self::getAuthorName($id);
//        print_r($autor);
        if($typeData[3]->id == 6){

            $out= R::load('lesson',$id)->text."Автор:<a  href='?ctrl=user&action=UserInfo&id=" . $autor['id'] . "'> " . $autor['surname'] .
            " " . $autor['name'] . " " . $autor['andername'] . " </a></div>";
            return $out;
        }
        if($typeData[3]->id == 1) {
            $count_modul = R::count("education", " education.information_id = ? and education.block = 1 and education.parent is NOT NULL ", [$id]);
        }elseif($typeData[3]->id == 5){
            $count_modul = R::count("lesson", "lesson.information_id = ? and lesson.block = 1", [$id]);
        }

        $out .= "<ol class=\"breadcrumb\">
                    <li><a href=\"?ctrl=wisdom&action=WisdomType&type=".$typeData[3]->id."&page=1\">".$typeData[3]->name."</a></li>
                    <li><a href=\"?ctrl=wisdom&action=WisdomType&type=".$typeData[3]->id."&subtype=".$typeData[2]->id."&page=1\">".$typeData[2]->name."</a></li>
                    <li><a href=\"?ctrl=wisdom&action=WisdomType&type=".$typeData[3]->id."&subtype=".$typeData[2]->id."&category=".$typeData[1]->id."&page=1\">".$typeData[1]->name."</a></li>
                    <li><a href=\"?ctrl=wisdom&action=WisdomType&type=".$typeData[3]->id."&subtype=".$typeData[2]->id."&category=".$typeData[1]->id."&subcategory=".$typeData[0]->id."&page=1\">".$typeData[0]->name."</a></li>

                </ol>";

        $out .= "<h2>" . $information->name . "</h2>";
        $out .= "<div style='margin-bottom: 15px;'>" . $information->description . "</div>";

        if ($count_modul === 0) {
            $out .= "<h2 class='text-center'>Совсем скоро!</h2>";
            return $out;
        }

        $out .= "<ul class=\"list-group\">
                    <li class=\"list-group-item active\">Дополнительная информация</li>
                    <li class=\"list-group-item \">Автор:
                    <a  href='?ctrl=cabinet&action=UserInfo&id=" . $autor['id'] . "'>" . $autor['login'] . "</a> |
                    <a  href='?ctrl=cabinet&action=UserInfo&id=" . $autor['id'] . "'> " . $autor['surname'] .
            " " . $autor['name'] . " " . $autor['andername'] . " </a></li>
                    <li class=\"list-group-item\"> Кол-во модулей: " . $count_modul . "</li></ul>";

//        print_r($information);
        if($typeData[3]->id == 1) {
            $education = $information->withCondition('education.information_id = ? and education.block = 1',[$id])->ownEducationList;
        }elseif($typeData[3]->id == 5){
            $education = $information->withCondition('lesson.information_id = ? and lesson.block = 1',[$id])->ownLessonList;
        }
        $out.="<ul class=\"list-group\"><li class=\"list-group-item active\">Изучаемые модули</li>";

        foreach($education as $item){
            $out.="<li class=\"list-group-item \"><h4 class=\"list-group-item-heading\">".$item->name."</h4>
                    <p class=\"list-group-item-text\">$item->description</p>
            </li>";
        }

        $out.="</ul>";

        $requirements = $information->withCondition('block = 1')->ownRequirementsList;

        $out .= "<ul class=\"list-group\"><li class=\"list-group-item active\">Требования</li>";
        if (empty($requirements)) {
            $out .= "<li class=\"list-group-item\"><strong>Без дополнительных требований</strong></li></ul>";
        } else {

            foreach ($requirements as $item) {
                $information_requirements = R::getRow("SELECT information.id,information.name from information WHERE information.id = ?", [$item->requirements]);

                $out .= "<li class=\"list-group-item\"><a href='?ctrl=wisdom&action=GetWisdomById&id="
                    . $information_requirements['id'] . "'>" . $information_requirements['name'] . "</a></li>";
            }

            $out .= "</ul>";
        }
//        print_r($education);die();


        $out .= "</div><div class=\"col-sm-3\"></div>
        <div class=\"col-sm-6\">
            <a href=\"?ctrl=subscription&action=SubscriptionById&id=" . $id . "\"><button style='margin-top:15px;' class=\"btn btn-success btn-block\">Записаться!</button></a>
        </div>
        <div class=\"col-sm-3\"></div>";

        return $out;
    }

    static function getAuthorName($id){
        $autor = R::getRow("SELECT  `information`.`id` as info,user.id,  `user`.`login` ,  `dossier`.`name` ,  `dossier`.`andername` ,  `dossier`.`surname`
FROM information
LEFT JOIN  `obuceisea`.`information_user` ON  `information`.`id` =  `information_user`.`information_id`
LEFT JOIN  `obuceisea`.`user` ON  `information_user`.`user_id` =  `user`.`id`
LEFT JOIN  `obuceisea`.`dossier` ON  `user`.`dossier_id` =  `dossier`.`id`
WHERE  `information`.`id` =?
AND user.status =  \"teacher\"", [$id]);
        return $autor;
    }

}
