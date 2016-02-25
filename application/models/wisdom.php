<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 12.02.2016
 * Time: 13:38
 */
class wisdom
{

    function getWisdomByType($array, $wisdomArray) //Вопрос о получении $wisdomData стаётся открытым. Пока костыль
    {
        $wisdomTypeArray = [1 => 1, 2 => 2, 3 => 3];
        if (!(int)$array[0]) {
            return false;
        }
//      print_r($wisdomArray);



        $out;
        db_connect::connect();

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
//                $gavno = R::dispense('information',1);
//                $gavno->name="Инженер-программист";
//                $category->ownGavnoList[] = $gavno;
//                R::store($category);
//                print_r('ok');die();
                foreach ($category->ownInformationList as $item) {
//                                    print_r($item);die();
                    $out .= "<tr>
                            <td><a href='" . $item->id . "'>" . $item->name . "</a></td>
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
}



/*
 * Array
(
    [Первое высшее] => Array
        (
            [Серверное программирование] => Array
                (
                    [subtype_name] => Первое высшее
                    [category_name] => Программирование
                    [subcategory_id] => 2
                )

            [Клиентское программирование] => Array
                (
                    [subtype_name] => Первое высшее
                    [category_name] => Программирование
                    [subcategory_name] => Клиентское программирование
                )

            [Desktop] => Array
                (
                    [subtype_name] => Первое высшее
                    [category_name] => Программирование
                    [subcategory_name] => Desktop
                )

        )

    [Переподготовка] => Array
        (
            [Фармацептика] => Array
                (
                    [subtype_name] => Переподготовка
                    [category_name] => Медицина
                    [subcategory_name] => Фармацептика
                )

        )

    [Сокращённое обучение] => Array
        (
            [Веб-дизайн] => Array
                (
                    [subtype_name] => Сокращённое обучение
                    [category_name] => Дизайн
                    [subcategory_name] => Веб-дизайн
                )

            [Векторная графика] => Array
                (
                    [subtype_name] => Сокращённое обучение
                    [category_name] => Дизайн
                    [subcategory_name] => Векторная графика
                )

        )

)
 */


/*
 * RedBeanPHP\OODBBean Object
(
    [properties:protected] => Array
        (
            [id] => 2
            [category_id] => 1
            [type_id] =>
            [name] => Серверное программирование
        )

    [__info:protected] => Array
        (
            [type] => category
            [sys.id] => id
            [sys.orig] => Array
                (
                    [id] => 2
                    [category_id] => 1
                    [type_id] =>
                    [name] => Серверное программирование
                )

            [tainted] =>
            [changed] =>
        )

    [beanHelper:protected] => RedBeanPHP\BeanHelper\SimpleFacadeBeanHelper Object
        (
        )

    [fetchType:protected] =>
    [withSql:protected] =>
    [withParams:protected] => Array
        (
        )

    [aliasName:protected] =>
    [via:protected] =>
    [noLoad:protected] =>
    [all:protected] =>
)
RedBeanPHP\OODBBean Object
(
    [properties:protected] => Array
        (
            [id] => 4
            [category_id] => 1
            [type_id] =>
            [name] => Клиентское программирование
        )

    [__info:protected] => Array
        (
            [type] => category
            [sys.id] => id
            [sys.orig] => Array
                (
                    [id] => 4
                    [category_id] => 1
                    [type_id] =>
                    [name] => Клиентское программирование
                )

            [tainted] =>
            [changed] =>
        )

    [beanHelper:protected] => RedBeanPHP\BeanHelper\SimpleFacadeBeanHelper Object
        (
        )

    [fetchType:protected] =>
    [withSql:protected] =>
    [withParams:protected] => Array
        (
        )

    [aliasName:protected] =>
    [via:protected] =>
    [noLoad:protected] =>
    [all:protected] =>
)
RedBeanPHP\OODBBean Object
(
    [properties:protected] => Array
        (
            [id] => 5
            [category_id] => 1
            [type_id] =>
            [name] => Desktop
        )

    [__info:protected] => Array
        (
            [type] => category
            [sys.id] => id
            [sys.orig] => Array
                (
                    [id] => 5
                    [category_id] => 1
                    [type_id] =>
                    [name] => Desktop
                )

            [tainted] =>
            [changed] =>
        )

    [beanHelper:protected] => RedBeanPHP\BeanHelper\SimpleFacadeBeanHelper Object
        (
        )

    [fetchType:protected] =>
    [withSql:protected] =>
    [withParams:protected] => Array
        (
        )

    [aliasName:protected] =>
    [via:protected] =>
    [noLoad:protected] =>
    [all:protected] =>
)
RedBeanPHP\OODBBean Object
(
    [properties:protected] => Array
        (
            [id] => 10
            [category_id] => 7
            [type_id] =>
            [name] => Фармацептика
        )

    [__info:protected] => Array
        (
            [type] => category
            [sys.id] => id
            [sys.orig] => Array
                (
                    [id] => 10
                    [category_id] => 7
                    [type_id] =>
                    [name] => Фармацептика
                )

            [tainted] =>
            [changed] =>
        )

    [beanHelper:protected] => RedBeanPHP\BeanHelper\SimpleFacadeBeanHelper Object
        (
        )

    [fetchType:protected] =>
    [withSql:protected] =>
    [withParams:protected] => Array
        (
        )

    [aliasName:protected] =>
    [via:protected] =>
    [noLoad:protected] =>
    [all:protected] =>
)
RedBeanPHP\OODBBean Object
(
    [properties:protected] => Array
        (
            [id] => 8
            [category_id] => 6
            [type_id] =>
            [name] => Веб-дизайн
        )

    [__info:protected] => Array
        (
            [type] => category
            [sys.id] => id
            [sys.orig] => Array
                (
                    [id] => 8
                    [category_id] => 6
                    [type_id] =>
                    [name] => Веб-дизайн
                )

            [tainted] =>
            [changed] =>
        )

    [beanHelper:protected] => RedBeanPHP\BeanHelper\SimpleFacadeBeanHelper Object
        (
        )

    [fetchType:protected] =>
    [withSql:protected] =>
    [withParams:protected] => Array
        (
        )

    [aliasName:protected] =>
    [via:protected] =>
    [noLoad:protected] =>
    [all:protected] =>
)
RedBeanPHP\OODBBean Object
(
    [properties:protected] => Array
        (
            [id] => 9
            [category_id] => 6
            [type_id] =>
            [name] => Векторная графика
        )

    [__info:protected] => Array
        (
            [type] => category
            [sys.id] => id
            [sys.orig] => Array
                (
                    [id] => 9
                    [category_id] => 6
                    [type_id] =>
                    [name] => Векторная графика
                )

            [tainted] =>
            [changed] =>
        )

    [beanHelper:protected] => RedBeanPHP\BeanHelper\SimpleFacadeBeanHelper Object
        (
        )

    [fetchType:protected] =>
    [withSql:protected] =>
    [withParams:protected] => Array
        (
        )

    [aliasName:protected] =>
    [via:protected] =>
    [noLoad:protected] =>
    [all:protected] =>
)
 */

/*
 *         $wisdomTypeArray = [1 => 1, 2 => 2, 3 => 3];
        if (!(int)$array[0]) {
            return false;
        }


        $data = R::findOne('wtype', "WHERE wtype.id = :id", ['id' => $wisdomTypeArray[$array[0]]]);

        $out = "<h2>" . $data->name . "</h2>";
        $queryArrayString = array();
        $queryArray = array();
        foreach ($data->ownWsubtypeList as $value) {
            $queryArrayString[] = "( SELECT
                wtype.name AS type_name,
                wsubtype.name AS subtype_name,
                wisdom.name AS wisdom_name,
                wisdom.id AS wisdom_id,
                wcategory.name AS categor_name,
                wsubcategory.name AS subcaterog_name
                FROM `wtype`
                left join wsubtype on wsubtype.wtype_id = wtype.id
                LEFT JOIN wcategory ON wcategory.wsubtype_id = wsubtype.id
                LEFT JOIN wsubcategory ON wsubcategory.wcategory_id = wcategory.id
                LEFT JOIN wisdom ON wisdom.wsubcategory_id = wsubcategory.id
                where wtype.id = ? and wsubtype.id = ?
                limit 0,10)";
            $queryArray[] = $data->id;
            $queryArray[] = $value->id;
        }

        $query = implode("UNION", $queryArrayString);

        $wisdom = R::getAll($query, $queryArray);
//        print_r($wisdom);die();
        $out .= "<table class='table table-striped'>
                    <tr>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Субкатегория</th>
                        <th>Раздел</th>
                    </tr>
                ";

        foreach ($wisdom as $value) {
            if(!$value['wisdom_id'])
                continue;
            $out .= "<tr>
                        <td><a href='?wisdom/" . $value['wisdom_id'] . "'>" . $value['wisdom_name'] . "</a></td>
                        <td>" . $value['categor_name'] . "</td>
                        <td>" . $value['subcaterog_name'] . "</td>
                        <td>" . $value['subtype_name'] . "</td>
                    </tr>";
        }

        $out .= "</table>";
//        print_r($wisdom);
//        die();

        return $out;
 */