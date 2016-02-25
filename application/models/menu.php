<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 04.01.2016
 * Time: 9:07
 */


class menu
{

    public $ul_tpl = "<ul class=\"dropdown-menu sub_menu\">";
    public $sub_ul_tpl = "<ul class=\"dropdown-menu sub_menu\">";
    public $li_tpl = "<li role=\"presentation\"><a href='%s'>%s%s</a>%s</li>";
    public $caret = "<span class=\"caret\"></span>";

    public $items;

    function __construct($query,$array)
    {

//        $this->items = getDataBase::getData("SELECT *
//        FROM  `menu` ,  `menu_item`
//        WHERE menu_item.menu_id =" . intval($id) . "
//        AND menu.menu_id = menu_item.menu_id");

        db_connect::connect();

        $this->items = R::getAll($query,$array);
    }

    public function render()
    {
        if(!$this->items)
            return false;

        $ul = new Ul();
        foreach ($this->items as $v) {
            if ($v['menu_item_parent'] !== '0') {
                continue;
            }

            $li = new Li($v['menu_item_name'], $v['menu_item_url'], $this->renderSubMenu($v['menu_item_id']),$this->caret);
            $li->tpl = $this->li_tpl;
            $ul->appendLi($li, $this->ul_tpl);
        }

//        echo($ul);
        return $ul;
    }

    public function renderSubMenu($id)
    {
        $ul = new Ul();
        foreach ($this->items as $v) {
            if ($v['menu_item_parent'] === $id) {
                $ul->appendLi(new Li($v['menu_item_name'], $v['menu_item_url'], $this->renderSubMenu($v['menu_item_id']),$this->caret ), $this->sub_ul_tpl);
            }
        }
        return $ul;
    }
}

class Ul
{

    private $ul_tpl;

    public $li = array();

    public function appendLi($li, $tpl)
    {
        $this->li[] = $li;
        $this->ul_tpl = $tpl;
    }

    public function __toString()
    {
        $content = implode('', $this->li);
        return empty($content) ? "" : $this->ul_tpl . $content . "</ul>";
    }
}

class Li
{
    public $content = "";
    private $ul = "";
    public $url = "";
    public $caret = "";

    function __construct($content, $url, $ul, $caret)
    {
//        print_r($ul->li);
        $this->content = $content;
        $this->url = $url;
        $this->ul = $ul;

        $this->caret = $caret;
    }

    public $tpl = "<li><a href='%s'>%s %s</a>%s</li>";

    public function __toString()
    {
        if(empty($this->ul->li)){
            $this->caret = '';
        }
        return sprintf($this->tpl, $this->url, $this->content, $this->caret, $this->ul);
    }
}



//class menu
//{
//
//    public $ul_tpl = "<ul class=\"dropdown-menu sub_menu\">";
//
//    public $sub_ul_tpl = "<ul class=\"dropdown-menu sub_menu\">";
//
//    public $li_tpl = "<li role=\"presentation\"><a href='%s'>%s</a>%s</li>";
//
//    public $items;
//
//    function __construct($id)
//    {
//        $id = (int)$id;
//
//        db_connect::connect();
//
//        $this->items = R::getAll("SELECT menu_item.*
//        FROM  `menu` ,  `menu_item`
//        WHERE menu_item.menu_id = ?
//        AND menu.menu_id = menu_item.menu_id", [$id]);
//
//    }
//
//    public function render()
//    {
////        print_r($this->items);
//
//        if(!$this->items)
//            return false;
//
//        $ul = new Ul();
//        foreach ($this->items as $v) {
//            if ($v['menu_item_parent'] !== '0') {
//                continue;
//            }
//            $li = new Li($v['menu_item_name'], $v['menu_item_url'], $this->renderSubMenu($v['menu_item_id']));
//            $li->tpl = $this->li_tpl;
//            $ul->appendLi($li, $this->ul_tpl);
//        }
//
////        echo($ul);
//        return $ul;
//    }
//
//    public function renderSubMenu($id)
//    {
//        $ul = new Ul();
//        foreach ($this->items as $v) {
//            if ($v['menu_item_parent'] === $id) {
//                $ul->appendLi(new Li($v['menu_item_name'], $v['menu_item_url'], $this->renderSubMenu($v['menu_item_id'])), $this->sub_ul_tpl);
//            }
//        }
//        return $ul;
//    }
//}
//
//class Ul
//{
//
//    private $ul_tpl;
//
//    public $li = array();
//
//    public function appendLi($li, $tpl)
//    {
//        $this->li[] = $li;
//        $this->ul_tpl = $tpl;
//    }
//
//    public function __toString()
//    {
//        $content = implode('', $this->li);
//        return empty($content) ? "" : $this->ul_tpl . $content . "</ul>";
//    }
//}
//
//class Li
//{
//
//    public $content = "";
//    public $ul = "";
//    public $url = "";
//
//    function __construct($content, $url, $ul = "")
//    {
//        $this->content = $content;
//        $this->url = $url;
//        $this->ul = $ul;
//    }
//
//    public $tpl = "<li><a href='%s'>%s</a>%s</li>";
//
//    public function __toString()
//    {
//        return sprintf($this->tpl, $this->url, $this->content, $this->ul);
//    }
//}

