<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 16.02.2016
 * Time: 13:11
 */
class categoryList
{

    static public $wisdomArray = [];

    static function categorMenu($array)
    {

//        if(!$array[0] || !is_int($array[0]))
//            return false;

        db_connect::connect();

        $data = R::load('type', $array[0]);
        $item = '';

        if (!$array[1]) {
            $item = $data->ownType;
        } else {
            $item = $data->withCondition('id = :id', ["id" => $array[1]])->ownType;
        }

        $out = "";


        foreach ($item as $i) {


            if (!$array[2]) {
                $j = $i->ownCategoryList;
//                print_r($i);
            } else {
                $j = $i->withCondition('category.id = ?', [$array[2]])->ownCategoryList;

            }
            foreach ($j as $v) {
//                print_r($v->name."<br>");
                $v_count = 0;
                foreach ($v->ownCategory as $o) {
                    if (!$v_count && $o->name) {


                        $v_count = 1;
                        $out .= "<div class=\"dropdown\">
  <button class=\"btn btn-default btn-block dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" data-toggle=\"dropdown\"
  aria-haspopup=\"true\" aria-expanded=\"true\"><a href='http://obuceisea.my/?ctrl=wisdom&action=WisdomType&type=1&subtype=2&category=".$v->id."'>" . $v->name . "</a><span class=\"caret\"></span></button>
  <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu1\">";
                    }
                    if ($o->name) {

                        self::$wisdomArray[$i->name][$o->name]['subtype_name'] = $i->name;
                        self::$wisdomArray[$i->name][$o->name]['category_name'] = $v->name;
                        self::$wisdomArray[$i->name][$o->name]['subcategory_id'] = $o->id;
                        $out .= "<li><a href=\"#\">" . $o->name . "</a></li>";

//                        print_r(" - ".$o->name."<br>");
                    }
                }
                $out .= "</ul></div>";
            }

        }
        return $out;

    }


}