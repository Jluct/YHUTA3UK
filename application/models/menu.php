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

    public $li_tpl = "<li role=\"presentation\"><a href='%s'>%s</a>%s</li>";

    public $items;

    function __construct($id)
    {
        $id = (int)$id;

        db_connect::connect();

        $this->items = R::getAll("SELECT menu_item.*
        FROM  `menu` ,  `menu_item`
        WHERE menu_item.menu_id = ?
        AND menu.menu_id = menu_item.menu_id", [$id]);

    }

    public function render()
    {
//        print_r($this->items);

        $ul = new Ul();
        foreach ($this->items as $v) {
            if ($v['menu_item_parent'] !== '0') {
                continue;
            }
            $li = new Li($v['menu_item_name'], $v['menu_item_url'], $this->renderSubMenu($v['menu_item_id']));
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
                $ul->appendLi(new Li($v['menu_item_name'], $v['menu_item_url'], $this->renderSubMenu($v['menu_item_id'])), $this->sub_ul_tpl);
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
    public $ul = "";
    public $url = "";

    function __construct($content, $url, $ul = "")
    {
        $this->content = $content;
        $this->url = $url;
        $this->ul = $ul;
    }

    public $tpl = "<li><a href='%s'>%s</a>%s</li>";

    public function __toString()
    {
        return sprintf($this->tpl, $this->url, $this->content, $this->ul);
    }
}

//$menu = new menuService(1);
//echo $menu->render();
//
//$menu2 = new menuService(2);
//echo $menu2->render();


/*
 *
                    Array
(
    [0] => Array
        (
            [menu_id] => 2
            [menu_name] => Главное меню
            [menu_item_id] => 4
            [menu_item_name] => Высшее образование
            [menu_item_url] => ?ctrl=wisdom&action=WisdomType&type=1
            [menu_item_patern] => 0
            [menu_item_activ] => 1
        )

    [1] => Array
        (
            [menu_id] => 2
            [menu_name] => Главное меню
            [menu_item_id] => 5
            [menu_item_name] => Первое высшее образование
            [menu_item_url] => ?ctrl=wisdom&action=WisdomType&type=1&subtype=1
            [menu_item_patern] => 4
            [menu_item_activ] => 1
        )

    [2] => Array
        (
            [menu_id] => 2
            [menu_name] => Главное меню
            [menu_item_id] => 6
            [menu_item_name] => Переподготовка
            [menu_item_url] => ?ctrl=wisdom&action=WisdomType&type=1&subtype=2
            [menu_item_patern] => 4
            [menu_item_activ] => 1
        )

    [3] => Array
        (
            [menu_id] => 2
            [menu_name] => Главное меню
            [menu_item_id] => 7
            [menu_item_name] => Сокращённое обучение
            [menu_item_url] => ?ctrl=wisdom&action=WisdomType&type=1&subtype=3
            [menu_item_patern] => 4
            [menu_item_activ] => 1
        )

    [4] => Array
        (
            [menu_id] => 2
            [menu_name] => Главное меню
            [menu_item_id] => 8
            [menu_item_name] => Курсы
            [menu_item_url] => ?ctrl=wisdom&action=WisdomType&type=2
            [menu_item_patern] => 0
            [menu_item_activ] => 1
        )

    [5] => Array
        (
            [menu_id] => 2
            [menu_name] => Главное меню
            [menu_item_id] => 9
            [menu_item_name] => Сертифицированные
            [menu_item_url] => ?ctrl=wisdom&action=WisdomType&type=2&subtype=1
            [menu_item_patern] => 8
            [menu_item_activ] => 1
        )

    [6] => Array
        (
            [menu_id] => 2
            [menu_name] => Главное меню
            [menu_item_id] => 10
            [menu_item_name] => Не сертифицированные
            [menu_item_url] => ?ctrl=wisdom&action=WisdomType&type=2&subtype=2
            [menu_item_patern] => 8
            [menu_item_activ] => 1
        )

    [7] => Array
        (
            [menu_id] => 2
            [menu_name] => Главное меню
            [menu_item_id] => 11
            [menu_item_name] => Семинары
            [menu_item_url] => ?ctrl=wisdom&action=WisdomType&type=3
            [menu_item_patern] => 0
            [menu_item_activ] => 1
        )

    [8] => Array
        (
            [menu_id] => 2
            [menu_name] => Главное меню
            [menu_item_id] => 12
            [menu_item_name] => Мастер-классы
            [menu_item_url] => ?ctrl=wisdom&action=WisdomType&type=3&subtype=1
            [menu_item_patern] => 11
            [menu_item_activ] => 1
        )

    [9] => Array
        (
            [menu_id] => 2
            [menu_name] => Главное меню
            [menu_item_id] => 13
            [menu_item_name] => Доклады
            [menu_item_url] => ?ctrl=wisdom&action=WisdomType&type=3&subtype=2
            [menu_item_patern] => 11
            [menu_item_activ] => 1
        )

)
          */