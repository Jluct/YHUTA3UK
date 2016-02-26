<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 27.01.2016
 * Time: 11:03
 */
class wisdomController
{
    private $table='information';

    public function actionWisdomType($view)
    {
//        if(!isset($_GET['type']))
        $wisdomData[]=$_GET['type'];
        $wisdomData[]=$_GET['subtype'];
        $wisdomData[]=$_GET['category'];
        if($_GET['category'])$this->table = 'category';
        $wisdomData[]=$_GET['subcategory'];

        $view->type = $_GET['type'];
        $view->table = $this->table;
        $view->page = (int)$_GET['page'];
        $view->categoryList = categoryList::categorMenu($wisdomData,$view->page);
        $view->wisdom = wisdom::getWisdomByType($wisdomData,categoryList::$wisdomArray,$view->page);
        echo $view->render('wisdom.php');
    }

    public function actionGetWisdomById($view){
        $type=$_GET['typeId'];
        $id=$_GET['id'];
        $view->data = wisdom::getWisdom($type,$id);
        echo $view->render('wisdomId.php');
    }
}