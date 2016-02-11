<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 12:23
 */



class cabinet
{
    function getStudentById()
    {

    }

    function authorisation($array){
        db_connect::connect();

        $user = R::findOne('user',' user_login = :login and user_password=:password',$array);
        if(!$user || $user->user_block)
            return false;
        $_SESSION['user'] = $user;
        return true;

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