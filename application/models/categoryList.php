<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 16.02.2016
 * Time: 13:11
 */
class categoryList
{

    static function categorMenu($type, $subtype='', $cat='')
    {
        db_connect::connect();

        $data = R::load('type',$type);
        $item = $data->ownType;
//        print_r($item);


        foreach($item as $i){
//            print_r($i);
            foreach($i->ownCategoryList as $v){
                $v_cpunt=0;
                foreach($v->ownCategory as $o){
                    if($o && !$v_cpunt){
                        $v_cpunt=1;
                        print_r((string)$v->name."<br>");
                    }
                    print_r(" - ".(string)$o->name."<br>");
                }

            }
        }



//        $type = R::dispense('type',10);
//        print_r($type);
//        $type->name = "Высшее образование";
//        $type1 = R::dispense('type');
//        $type1->name = "Первое высшее";
//        $type[1]->ownType = [$type[2]];
//        $id = R::store($type[1]);


//        $query = "SELECT
//	      wtype.id AS type_id,
//        wsubtype.id AS wsubtype_id,
//        wcategory.id AS category_id,
//        wcategory.name AS category_name,
//        wsubcategory.id AS subcategory_id
//        FROM wtype
//        LEFT JOIN wsubtype ON wsubtype.wtype_id = wtype.id
//        LEFT JOIN wcategory ON wcategory.wsubtype_id = wsubtype.id
//        LEFT JOIN wsubcategory ON wsubcategory.wcategory_id = wcategory.id
//        WHERE wtype.id = :type".$subtype.$cat;
//        $bindings=['type' => $type];
//
//        if($subtype){
//            $subtype =" AND wsubtype.id = :subtype";
//            $bindings[]=['subtype'=>$subtype];
//            if($cat){
//                $cat =" AND wcategory.id = :cat";
//                $bindings[]=['cat'=>$cat];
//            }
//        }
//
//
//
//        $data = R::getAll($query,$bindings);
//
//        print_r($data);

//        return $out;

    }
}



/*Связь внутри таблицы

        $category = R::dispense('category',10);
        $category[1]->ownCategory = [$category[2]];
        $id = R::store($category[1]);

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
        WHERE wtype.id = :id
 */