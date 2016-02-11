<?php
require_once(__DIR__.'/../core/core/data/add/add.php');
require_once(__DIR__.'/../core/core/data/get/get.php');
require_once(__DIR__.'/../core/core/services/check.php');

class registrationController extends add
{
    function actionRegistration($view)
    {



        echo $view->render('registration.php');
    }

    function actionAddUser($view)
    {

        $view->menu = menu::getDataMenu();
        $userDataArray = array();
        $userDataArray['login'] = $_POST['login'];
        $userDataArray['password'] = $_POST['password'];
        $userDataArray['dblPassword'] = $_POST['dblPassword'];
        $userDataArray['email'] = $_POST['email'];
        $userDataArray['user_name'] = $_POST['user_name'];
        $userDataArray['user_surname'] = $_POST['user_surname'];

        if ($userDataArray['password'] !== $userDataArray['dblPassword']) {
            $view->userDataArray = $userDataArray;
            $view->message = " Пароли не совпадают !";
            echo $view->render('registration.php');
            return false;
        }

        if (!$userDataArray['login'] || !$userDataArray['password'] ||
            !$userDataArray['dblPassword'] || !$userDataArray['email'] ||
            !$userDataArray['user_name'] || !$userDataArray['user_surname']
        ) {
            $view->userDataArray = $userDataArray;
            $view->message = " Введены не все данные !";
            echo $view->render('registration.php');
            return false;
        }
        $userDataArray = checkClass::checkAll($userDataArray);

        $query = "SELECT user_id FROM user WHERE user.user_login =" . $userDataArray['login'] . ";";
        if (getDataBase::getData($query, 1)) {
            $view->userDataArray = $userDataArray;
            $view->message = " Данный логи занят";
            echo $view->render('registration.php');
            return false;
        }

        $query = "INSERT INTO  `maket`.`user` (`user_id` ,`user_login` ,`user_password` ,`user_status` ,`user_block`)
                  VALUES (NULL ,  '" . $userDataArray['login'] . "','" . $userDataArray['dblPassword'] . "',  'student',  '0');";
        if (!self::addData($query)) {
            $view->userDataArray = $userDataArray;
            $view->message = " Регистрация не удалась, попробуйте позже";
            echo $view->render('registration.php');
            return false;
        }

        $query = "SELECT user_id FROM user WHERE user.user_login =" . $userDataArray['login'] . ";";
        $id = getDataBase::getData($query, 1);
        if (!$id) {
            $view->userDataArray = $userDataArray;
            $view->message = " Регистрация не удалась, попробуйте позже";
            echo $view->render('registration.php');
            return false;
        }

        $query = "INSERT INTO `maket`.`user_data` (`user_data_id`, `user_id`, `user_data_name`, `user_data_surname`,
                    `user_data_email`, `user_data_secret_w`, `user_data_secret_a`, `user_data_cantry`, `user_data_sity`)
                    VALUES (NULL, '".$id."', '".$userDataArray['user_name']."', '".$userDataArray['user_surname']."',
                     '".$userDataArray['email']."', \'апап\', \'апа\', \'Беларусь\', \'Минск\');";
        if (!self::addData($query)) {
            $view->userDataArray = $userDataArray;
            $view->message = " Регистрация не удалась, попробуйте позже";
            echo $view->render('registration.php');
            return false;
        }


        $view->message = " Регистрация не удалась, попробуйте позже";
        echo $view->render('addUser.php');
    }
}


/*
 *
INSERT INTO  `maket`.`student` (
`student_id` ,
`user_id` ,
`courses_id` ,
`specialty_id`
)
VALUES (
NULL ,  '4',  '2',  '1'
);
 */