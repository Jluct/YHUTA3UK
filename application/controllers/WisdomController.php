<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 27.01.2016
 * Time: 11:03
 */
class wisdomController
{
    private $table = 'information';

    public function actionWisdomType($view)
    {
        $wisdomData[] = $_GET['type'];
        $wisdomData[] = $_GET['subtype'];
        $wisdomData[] = $_GET['category'];
        if ($_GET['category']) $this->table = 'category';
        $wisdomData[] = $_GET['subcategory'];

        $view->type = $_GET['type'];
        $view->table = $this->table;
        $view->page = (int)$_GET['page'];
        $view->categoryList = categoryList::categorMenu($wisdomData, $view->page);
        $view->wisdom = wisdom::getWisdomByType($wisdomData, categoryList::$wisdomArray, $view->page, $view->count_information);
        $view->count_data = wisdom::$count_data;
        $view->path = wisdom::$path;
        echo $view->render('wisdom.php');
    }

    public function actionGetWisdomById($view)
    {
        $id = (int)$_GET['id'];
        $view->id = $id;
        $view->data = wisdom::getWisdom($id);
        echo $view->render('wisdomId.php');
    }
}