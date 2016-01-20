<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 05.01.2016
 * Time: 14:05
 */
require_once("/../core/core/data/get/get.php");
require_once("/../core/core/services/check.php");

class education extends getDataBase
{
    static function getEducationById($id)
    {

        $query = "SELECT * FROM educations
                  NATURAL JOIN specialty
                  WHERE educations_id = " . $id . ";";
        $education = parent::getData($query);
//        print_r(is_array($course));
//        die();

        $out = "<h2>" . $education[0]['educations_name'] . "</h2><p>" . $education[0]['educations_text'] . "</p>";
        for ($i = 0; $i < count($education); $i++) {

            $out .= "<div class=\"jumbotron specialty \">
                        <h3>" . $education[$i]['specialty_name'] . "</h3>
                        <p><a class=\"btn btn-primary btn-lg\" href=\"?ctrl=specialty&action=Specialty&id="
                . $education[$i]['specialty_id'] . "\" role=\"button\">Узнать больше</a></p>
                    </div>";
        }

        return $out;
    }

}


//{
//    "courses_id":"2","courses_name":"\u041f\u043e\u0432\u044b\u0448\u0435\u043d\u0438\u0435 \u043a\u0432\u0430\u043b\u0438\u0444\u0438\u043a\u0430\u0446\u0438\u0438","courses_text":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)","specialty_id":"2","specialty_name":"\u041f\u0440\u043e\u0433\u0440\u0430\u043c\u043c\u043d\u043e\u0435 \u043e\u0431\u0435\u0441\u043f\u0435\u0447\u0435\u043d\u0438\u0435 \u0438\u043d\u0444\u043e\u0440\u043c\u0430\u0446\u0438\u043e\u043d\u043d\u044b\u0445 \u0441\u0438\u0441\u0442\u0435\u043c"}

//[{
//    "courses_id":"1","courses_name":"\u041f\u0435\u0440\u0435\u043f\u043e\u0434\u0433\u043e\u0442\u043e\u0432\u043a\u0430","courses_text":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","specialty_id":"1","specialty_name":"\u0412\u0435\u0431-\u0434\u0438\u0437\u0430\u0439\u043d \u0438 \u043a\u043e\u043c\u043f\u044c\u044e\u0442\u0435\u0440\u043d\u0430\u044f \u0433\u0440\u0430\u0444\u0438\u043a\u0430"},{
//    "courses_id":"1","courses_name":"\u041f\u0435\u0440\u0435\u043f\u043e\u0434\u0433\u043e\u0442\u043e\u0432\u043a\u0430","courses_text":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","specialty_id":"3","specialty_name":"\u041a\u043e\u043c\u043f\u044c\u044e\u0442\u0435\u0440\u043d\u0430\u044f \u0433\u0440\u0430\u0444\u0438\u043a\u0430"}]