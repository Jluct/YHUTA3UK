<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 14.03.2016
 * Time: 8:40
 */
class teacher
{
    static function addWisdom($wisdomData)
    {
        $out='<h2>Создание учебного материала</h2>';
        db_connect::connect();


        $subcategory = R::load('category',$wisdomData[3]);
        $category = R::load('category',$wisdomData[2]);
        $subtype = R::load('type',$wisdomData[1]);
        $type = R::load('type',$wisdomData[0]);

        $out .= "<div class='col-sm-12'>
                <ol class=\"breadcrumb\">
                    <li><a href=\"?ctrl=wisdom&action=WisdomType&type=" . $type->id . "&page=1\" > " . $type->name . "</a></li>
                    <li><a href=\"?ctrl=wisdom&action=WisdomType&type=" . $type->id . "&subtype=" . $subtype->id . "&page=1\" > " . $subtype->name . "</a></li>
                    <li><a href=\"?ctrl=wisdom&action=WisdomType&type=" . $type->id . "&subtype=" . $subtype->id . "&category=" . $category->id . "&page=1\" > " . $category->name . "</a></li>
                    <li><a href=\"?ctrl=wisdom&action=WisdomType&type=" . $type->id . "&subtype=" . $subtype->id . "&category=" . $category->id . "&subcategory=" . $subcategory->id . "&page=1\" > " . $subcategory->name . "</a></li>

                </ol>";
        $out .="

            <form method='post' action='?ctrl=teacher&action=WisdomData&category=".$subcategory->id."'>
                <input class='form-control' name='name' placeholder='Имя'>



            <textarea class='form-control' name='shortdescription' placeholder='Краткое описание'></textarea>

            <textarea class='form-control' name='description' placeholder='Полное описание'></textarea>
</div>
        <div class='col-sm-6'>
            <input type='reset' class='btn alert-danger btn-block'>
        </div>
        <div class='col-sm-6'>
            <input type='submit' class='btn alert-success btn-block'>
            </form>
        </div>
        <script src='../../ckeditor/ckeditor.js'></script>
        <script>
            CKEDITOR.replace('description');
        </script>
        ";

        return $out;
    }

    static function wisdomRecord()
    {
        $information = R::dispense('information');

        $information->name = $_POST['name'];
        $information->shortdescription = $_POST['shortdescription'];
        $information->category_id = $_GET['category'];
        $information->description = $_POST['description'];

        $information->sharedUser[]=$_SESSION['user'];

        $id = R::store($information);

//        print_r($id);


        return $id;

    }

}


//http://obuceisea.my/?ctrl=teacher&action=WisdomData