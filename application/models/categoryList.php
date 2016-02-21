<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 16.02.2016
 * Time: 13:11
 */
class categoryList
{

    static function categorMenu($int, $cat='', $subcat='')
    {
        db_connect::connect();
        $data = R::getAll("SELECT
	    wtype.id AS type_id,
        wsubtype.id AS wsubtype_id,
        wcategory.id AS category_id,
        wcategory.name AS category_name,
        wsubcategory.id AS subcategory_id,
        wsubcategory.name AS subcategory_name
        FROM wtype
        LEFT JOIN wsubtype ON wsubtype.wtype_id = wtype.id
        LEFT JOIN wcategory ON wcategory.wsubtype_id = wsubtype.id
        LEFT JOIN wsubcategory ON wsubcategory.wcategory_id = wcategory.id
        WHERE wtype.id = :id", ['id' => $int]);

        $out="<ul>";
            foreach($data as $item){
                $out.="<li>".$item['subcategory_name']."</li>";
            }
        $out.="</ul>";
        return $out;
    }
}

/*
 * SELECT
	wtype.id AS type_id,
        wsubtype.id AS wsubtype_id,
        wcategory.id AS category_id,
        wcategory.name AS category_name,
        wsubcategory.id AS subcategory_id,
        wsubcategory.name AS subcategory_name
        FROM wtype
        LEFT JOIN wsubtype ON wsubtype.wtype_id = wtype.id
        LEFT JOIN wcategory ON wcategory.wsubtype_id = wsubtype.id
        LEFT JOIN wsubcategory ON wsubcategory.wcategory_id = wcategory.id
        WHERE wtype.id = 1
 */