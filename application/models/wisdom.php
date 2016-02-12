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
        $wisdomType = [1=>'education',2=>'course',3=>'seminar'];

        if(count($wisdomType)<$array[0])
            die($array[0]." - ".count($wisdomType));

        $data = R::getAll("SELECT * FROM wisdom_type
        LEFT JOIN wisdom_subtype ON wisdom_subtype.wisdom_type_id = wisdom_type.id
        LEFT JOIN wisdom ON wisdom.wisdom_subtype_id = wisdom_subtype.id
        LEFT JOIN education ON  wisdom.id= education.wisdom_id
        WHERE wisdom_type.id = 1
        order by wisdom_subtype.id
        LIMIT 0,30"
            );
        $wisdom = R::convertToBeans('wisdom',$data);

        $out;

        foreach($wisdom as $w){
            $out[$w->wisdom_type_id].=$w;
        }

        print_r($out);
    }
}