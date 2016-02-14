<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 12.02.2016
 * Time: 13:38
 */
class wisdom
{

    function getWisdomByType($array) //Вопрос о получении $wisdomData стаётся открытым. Пока костыль
    {
        $wisdomTypeArray = [1 => 'education', 2 => 'course', 3 => 'seminar'];

//        if (count($wisdomTypeArray) < $array[0])
//            die($array[0] . " - " . count($wisdomTypeArray));

        $wisdomType = R::load('wisdom_type',$array[0]);
        $wisdomSubtype = R::findAll('wisdom_subtype','where wisdom_type_id = :id',['id'=>$wisdomType->id]);
//        print_r($wisdomSubtype);die();
        $wisdomType->ownWisdom_subtypeList[]=$wisdomSubtype;
        $wisdom = R::findAll('wisdom',"where wisdom.wisdom_subtype_id =:id",['id'=>1]);


//        print_r($wisdom);die();
//        $wisdomSubtype->ownWisdomList[]=$wisdom;

//        print_r($wisdomType->ownWisdom_subtype[1]->wisdom_subtype_name);
        print_r($wisdomSubtype);
        print_r($wisdom);


    }
}




/*
 * SELECT * FROM wisdom_type
        LEFT JOIN wisdom_subtype ON wisdom_subtype.wisdom_type_id = wisdom_type.id
        LEFT JOIN wisdom ON wisdom.wisdom_subtype_id = wisdom_subtype.id
        LEFT JOIN education ON  wisdom.id= education.wisdom_id
        WHERE wisdom_type.id = 1
        order by wisdom_subtype.id
        LIMIT 0,30
 */


/*
 *
RedBeanPHP\OODBBean Object
(
    [properties:protected] => Array
        (
            [id] => 1
            [wisdom_type_name] => Высшее образование
            [ownWisdom_subtype] => Array
                (
                    [1] => RedBeanPHP\OODBBean Object
                        (
                            [properties:protected] => Array
                                (
                                    [id] => 1
                                    [wisdom_type_id] => 1
                                    [wisdom_subtype_name] => Первое высшее образование
                                )

                            [__info:protected] => Array
                                (
                                    [type] => wisdom_subtype
                                    [sys.id] => id
                                    [sys.orig] => Array
                                        (
                                            [id] => 1
                                            [wisdom_type_id] => 1
                                            [wisdom_subtype_name] => Первое высшее образование
                                        )

                                    [tainted] =>
                                    [changed] =>
                                    [sys.parentcache.wisdom_type] => RedBeanPHP\OODBBean Object
 *RECURSION*
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

                    [2] => RedBeanPHP\OODBBean Object
                        (
                            [properties:protected] => Array
                                (
                                    [id] => 2
                                    [wisdom_type_id] => 1
                                    [wisdom_subtype_name] => Переподготовка
                                )

                            [__info:protected] => Array
                                (
                                    [type] => wisdom_subtype
                                    [sys.id] => id
                                    [sys.orig] => Array
                                        (
                                            [id] => 2
                                            [wisdom_type_id] => 1
                                            [wisdom_subtype_name] => Переподготовка
                                        )

                                    [tainted] =>
                                    [changed] =>
                                    [sys.parentcache.wisdom_type] => RedBeanPHP\OODBBean Object
 *RECURSION*
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

                    [3] => RedBeanPHP\OODBBean Object
                        (
                            [properties:protected] => Array
                                (
                                    [id] => 3
                                    [wisdom_type_id] => 1
                                    [wisdom_subtype_name] => Сокращённое обучение
                                )

                            [__info:protected] => Array
                                (
                                    [type] => wisdom_subtype
                                    [sys.id] => id
                                    [sys.orig] => Array
                                        (
                                            [id] => 3
                                            [wisdom_type_id] => 1
                                            [wisdom_subtype_name] => Сокращённое обучение
                                        )

                                    [tainted] =>
                                    [changed] =>
                                    [sys.parentcache.wisdom_type] => RedBeanPHP\OODBBean Object
 *RECURSION*
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

                    [4] => Array
                        (
                        )

                )

        )

    [__info:protected] => Array
        (
            [type] => wisdom_type
            [sys.id] => id
            [sys.orig] => Array
                (
                    [id] => 1
                    [wisdom_type_name] => Высшее образование
                )

            [tainted] => 1
            [changed] =>
            [sys.shadow.ownWisdom_subtype] => Array
                (
                    [1] => RedBeanPHP\OODBBean Object
                        (
                            [properties:protected] => Array
                                (
                                    [id] => 1
                                    [wisdom_type_id] => 1
                                    [wisdom_subtype_name] => Первое высшее образование
                                )

                            [__info:protected] => Array
                                (
                                    [type] => wisdom_subtype
                                    [sys.id] => id
                                    [sys.orig] => Array
                                        (
                                            [id] => 1
                                            [wisdom_type_id] => 1
                                            [wisdom_subtype_name] => Первое высшее образование
                                        )

                                    [tainted] =>
                                    [changed] =>
                                    [sys.parentcache.wisdom_type] => RedBeanPHP\OODBBean Object
 *RECURSION*
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

                    [2] => RedBeanPHP\OODBBean Object
                        (
                            [properties:protected] => Array
                                (
                                    [id] => 2
                                    [wisdom_type_id] => 1
                                    [wisdom_subtype_name] => Переподготовка
                                )

                            [__info:protected] => Array
                                (
                                    [type] => wisdom_subtype
                                    [sys.id] => id
                                    [sys.orig] => Array
                                        (
                                            [id] => 2
                                            [wisdom_type_id] => 1
                                            [wisdom_subtype_name] => Переподготовка
                                        )

                                    [tainted] =>
                                    [changed] =>
                                    [sys.parentcache.wisdom_type] => RedBeanPHP\OODBBean Object
 *RECURSION*
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

                    [3] => RedBeanPHP\OODBBean Object
                        (
                            [properties:protected] => Array
  …
 */