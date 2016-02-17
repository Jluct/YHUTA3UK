<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 16.02.2016
 * Time: 13:11
 */
class categoryList
{

    static function categorMenu($int)
    {
        db_connect::connect();
        $data = R::findAll('wsubtype', " WHERE wtype_id = :id", ['id' => $int]);
        $out = "<div class=\"btn-group-vertical\" role=\"group\" aria-label=\"...\">";
        foreach ($data as $categor)
        {
            $item = "<div class=\"btn-group\" role=\"group\">
    <button type=\"button\" class=\"btn btn-default dropdown-toggle\"
    data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
      " . $categor->name . "
      <span class=\"caret\"></span>
    </button>
    <ul class=\"dropdown-menu\">";

            foreach ($categor->ownWcategoryList as $subcateg)
            {

                $item .= "<li><a href=\"#\">" . $subcateg->name . "</a></li>";
            }

            $item .= "</ul></div>";
            $out .= $item;
        }
        $out .= "</div>";
        return $out;
    }
}