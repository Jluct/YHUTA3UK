<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 16.02.2016
 * Time: 13:11
 */
class categoryList
{

    static public $information_count=0;

    static public $wisdomArray = [];

    static function categorMenu($array,$page=1)
    {
        $open = '';

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

            $i_count = 0;
            if (!$array[2]) {
                $j = $i->ownCategoryList;
            } else {
                $j = $i->withCondition('category.id = ? LIMIT 0,3', [$array[2]])->ownCategoryList;

            }
            foreach ($j as $v) {

                $v_count = 0;
                foreach ($v->ownCategory as $o) {
                    if (!$v_count && $o->name) {

                        $v_count = 1;

                        if ($v->id == $array[2]) $open = "open";
                        if (!$i_count) {
                            $i_count = 1;
                            $out .= "<h4>" . $i->name . "</h4>";
                        }
                        $out .= "<div class=\"dropdown $open\">
  <button class=\"btn btn-default btn-block dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" data-toggle=\"tooltip\"
  aria-haspopup=\"true\" aria-expanded=\"true\">
  <a href='?ctrl=wisdom&action=WisdomType&type=".$data->id."&subtype=".$i->id."&category=" . $v->id . "&page=1'>" . $v->name . "<span class=\"caret\"></span></a></button>
  <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu1\">";
                    }
                    if ($o->name) {
                        self::$information_count +=  $o->countOwn('information');
                        self::$wisdomArray[$i->name][$o->name]['type_id'] = $data->id;
                        self::$wisdomArray[$i->name][$o->name]['subtype_name'] = $i->name;
                        self::$wisdomArray[$i->name][$o->name]['category_name'] = $v->name;
                        self::$wisdomArray[$i->name][$o->name]['subcategory_id'] = $o->id;
                        $out .= "<li><a href='?ctrl=wisdom&action=WisdomType&type=".$data->id."&subtype=".$i->id."&category=" . $v->id . "&subcategory=".$o->id."&page=1'>" . $o->name . "</a></li>";

                    }
                }
                $out .= "</ul></div>";
            }

        }
        return $out;

    }


}