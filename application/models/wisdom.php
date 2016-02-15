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
        $wisdomTypeArray = [1 => 1, 2 => 2, 3 => 3];
        if (!(int)$array[0]) {
            return false;
        }

        $data = R::findOne('wtype', "WHERE wtype.id = :id", ['id' => $wisdomTypeArray[$array[0]]]);

        $out = "<h2>" . $data->name . "</h2>";
        $queryArrayString = array();
        $queryArray = array();
        foreach ($data->ownWsubtypeList as $value) {
            $queryArrayString[] = "(
SELECT * ,
wtype.name AS type_name,
wsubtype.name AS subtype_name,
wisdom.name AS wisdom_name
FROM wtype
left join wsubtype on wsubtype.wtype_id = wtype.id
left join wisdom on wisdom.wsubtype_id = wsubtype.id
LEFT JOIN wcategories ON wcategories.id = wisdom.wcategories_id
where wtype.id = ? and wsubtype.id = ?
limit 0,10)";
            $queryArray[] = $data->id;
            $queryArray[] = $value->id;
        }

        $query = implode("UNION",$queryArrayString);

        $wisdom = R::getAll($query, $queryArray);
//        print_r($wisdom);die();
        $out .= "<table class='table table-striped'>";

        foreach($wisdom as $value)
        {
            $out .= "<tr>
                        <td>".$value['wisdom_name']."</td>
                        <td>".$value['name']."</td>
                        <td>".$value['subtype_name']."</td>
                    </tr>";
        }

        $out .= "</table>";
//        print_r($wisdom);
//        die();

        return $out;

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


// создание и связь таблиц
//        $wisdomType1 = R::dispense('type');
//        $wisdomType1->name = 'Высшее образование';
//
//        $wisdomSubtype1 = R::dispense('subtype');
//        $wisdomSubtype1->name = "Первое высшее";
//
//        $wisdom = R::dispense('wisdom');
//        $wisdom->name = "Вёрстка";

//        $wisdomSubtype1->ownWisdomList[] = $wisdom;
//        $wisdomSubtype2->ownTab3List[] = $wisdom1;
//
//        $wisdomType1->ownSubtypeList[] = $wisdomSubtype1;
//        $wisdomType1->ownTab2List[] = $wisdomSubtype2;
//        $wisdomType2->ownTab2List[] = $wisdomSubtype3;

//        R::storeAll([$wisdomType1,$wisdomSubtype1,$wisdom]);


/*
 * (SELECT * FROM `wtype`
left join wsubtype on wsubtype.wtype_id = wtype.id
left join wisdom on wisdom.wsubtype_id = wsubtype.id
where wtype.id = 1 and wsubtype.id = 1
limit 0,1)
UNION
(SELECT * FROM `wtype`
left join wsubtype on wsubtype.wtype_id = wtype.id
left join wisdom on wisdom.wsubtype_id = wsubtype.id
where wtype.id = 1 and wsubtype.id = 2
limit 0,1)
UNION
((SELECT * FROM `wtype`
left join wsubtype on wsubtype.wtype_id = wtype.id
left join wisdom on wisdom.wsubtype_id = wsubtype.id
where wtype.id = 1 and wsubtype.id = 3
limit 0,1))
 */


/*
 *         foreach ($data->ownWsubtypeList  as $punct) {
            $out .= "<table class='table table-striped'><caption><h4>" . $punct->name . "</h4></caption>";
            foreach ($punct->ownWisdomList= R::findAll('wisdom',"where wisdom.wsubtype_id = :id",['id'=>$data->id]) as $item) {

                if(!$item->name){
                    $out .= "<tr><td>Нет записей</td></tr>";
                    continue;
                }else{
                    $out .= "<tr><td>" . $item->name . "</td><td>".$item->cat = R::getCell('SELECT name FROM wcategories WHERE id = :id',['id'=>$item->wcategories_id])."</td></tr>";
                }
            }
            $out .= "</table>";
        }
 */