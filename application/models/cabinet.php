<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 12:23
 */
require_once("/../core/core/data/get/get.php");
require_once("/../core/core/services/check.php");

class cabinet extends getDataBase
{
    static function getStudentById()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['user_block'] == true) {
            die('Авторизуйтесь !!<br><a href="index.php" ');
        }

        $query = "SELECT `student`.*,`educations`.`educations_name`,`specialty`.`specialty_name`
FROM student
LEFT JOIN  `maket`.`educations` ON  `student`.`educations_id` =  `educations`.`educations_id`
LEFT JOIN  `maket`.`specialty` ON  `student`.`specialty_id` =  `specialty`.`specialty_id`
WHERE student.user_id =" . $_SESSION['user']['user_id'] . ";";
        $data = parent::getData($query, 1);

        if($data){
            $_SESSION['student']=$data;
            return true;
        }else{
            return false;
        }
    }
}

/*
  простой запрос
 SELECT  `user`.`user_login` ,  `student` . * ,  `student_school` . *
FROM user
LEFT JOIN  `maket`.`student` ON  `user`.`user_id` =  `student`.`user_id`
LEFT JOIN  `maket`.`student_school` ON  `student`.`student_id` =  `student_school`.`student_id`
WHERE  `user`.`user_id` =2
 *не полный
 *
 * сложный запрос, не доделан
 * SELECT `user`.`user_login`,`student`.*,`student_school`.*,courses.courses_name,specialty.specialty_name FROM user
LEFT JOIN `maket`.`student` ON `user`.`user_id` = `student`.`user_id`
LEFT JOIN courses ON courses.courses_id=student.courses_id
LEFT JOIN specialty ON specialty.courses_id=courses.courses_id
LEFT JOIN `maket`.`student_school` ON `student`.`student_id` = `student_school`.`student_id`
where `user`.`user_id` = 2

не работает
 */


/*
 * первичная информация
 * SELECT  `user`.`user_id` ,  `user`.`user_login` ,  `student`.`student_id` ,  `student`.`user_id` ,
 * `student`.`courses_id` ,  `student`.`specialty_id` ,  `courses`.`courses_name` ,  `specialty`.`specialty_name`
FROM user
LEFT JOIN  `maket`.`student` ON  `user`.`user_id` =  `student`.`user_id`
LEFT JOIN  `maket`.`courses` ON  `student`.`courses_id` =  `courses`.`courses_id`
LEFT JOIN  `maket`.`specialty` ON  `student`.`specialty_id` =  `specialty`.`specialty_id`
WHERE user.user_id =2
 */