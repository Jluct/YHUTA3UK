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
    static function getUserData($userArray = '', $errorArray = '')
    {

//        print_r($userArray);
//        echo "Jib,rb ";
//        print_r($errorArray);

//        $name;
//        $surname;
//        $andername;
//        $land;
//        $sity;
//        $email;
//        $phone = 'login';

        $array = array();
        $session = $_SESSION['user'];
        $data = $session->dossier;
//        echo '<br>';
//        print_r($_SESSION);

//        print_r($data);
//        echo "<br>";
//        print_r($data->dossier);

        foreach ($_SESSION['user'] as $key => $value) {
//            echo"<br> value ";
//            print_r( $value);
//
//            echo" <br>$value->$key ";
//            print_r($value->$key);
//
//            echo "<br>Array ";
//            print_r($array ? $array : 'Пусто');
//            echo "<br>";
            if (empty($errorArray) && !empty($errorArray[$key])) {  // !!! \\
                $array[$key] = $errorArray[$key];
//                echo 4;
                continue;
            }
            if (empty($userArray) && !empty($userArray[$key])) {   // !!! \\
                $array[$key] = $userArray[$key];
//                echo 3;
                continue;
            }

            if ($_SESSION[$key]=='password') {
//                $array[$key] = $value;
//                echo 1;
                continue;
            }
            foreach($data as $key1 => $value1){
//                echo"<br> value1 ";
//                print_r( $value1);
//
//                echo" <br>key1 ";
//                print_r($key1);

//                echo"<br>$value1->$key1<br>";
//                print_r($value1->$key1);
                if ($data->$key1) {
                    $array[$key1] = $value1;

                }
            }

        }


//        $name = $_SESSION['user']->dossier->name;
//        if ($userArray['name'])
//            $name = $userArray['name'];
//        if ($errorArray['name'])
//            $name = $errorArray['name'];
//
//        $surname = $_SESSION['user']->dossier->surname;
//        if ($userArray['surname'])
//            $surname = $userArray['surname'];
//        if ($errorArray['surname'])
//            $name = $errorArray['surname'];
//
//        $andername = $_SESSION['andername']->dossier->andername;
//        if ($userArray['andername'])
//            $surname = $userArray['andername'];
//        if ($errorArray['andername'])
//            $name = $errorArray['andername'];


        $out = "<h3>Личные данные</h3>
<form action='?ctrl=cabinet&action=UpdateUserData' method='post'>
        <div class='col-sm-6'>
            <div class=\"list-group\">
  <a href=\"#\" class=\"list-group-item\">
    <h4 class=\"list-group-item-heading\">Имя*</h4>
    <p class=\"list-group-item-text\">
    <input class='form-control' name='name' type='text' value='" . $array['name'] . "'/>
</p>
  </a>
  <a href=\"#\" class=\"list-group-item\">
    <h4 class=\"list-group-item-heading\">Фамилия*</h4>
    <p class=\"list-group-item-text\"><input class='form-control' name='surname' type='text' value='" . $array['surname'] . "'/></p>
  </a>
    <a href=\"#\" class=\"list-group-item\">
    <h4 class=\"list-group-item-heading\">Отчество*</h4 >
    <p class=\"list-group-item-text\" ><input class='form-control' name='andername' type = 'text' value = '" . $array['andername'] . "' /></p >
  </a >
  <hr>
  <a href=\"#\" class=\"list-group-item\">
    <h4 class=\"list-group-item-heading\">Страна</h4>
    <p class=\"list-group-item-text\"><input type='text' class='form-control' name='land' value='" . $array['land'] . "'></p>
  </a>
  <a href=\"#\" class=\"list-group-item\">
    <h4 class=\"list-group-item-heading\">Город</h4>
    <p class=\"list-group-item-text\"><input type='text' class='form-control' name='sity' value='" . $array['sity'] . "'></p>
  </a>

</div>
        </div>";


        $out .= "<div class='col-sm-6'>
            <div class=\"list-group\">
              <a href=\"#\" class=\"list-group-item \">
            <h4 class=\"list-group-item-heading\"> Email*</h4 >
    <p class=\"list-group-item-text\" ><input class='form-control' name='email' type = 'email' value = '" . $array['email'] . "' /></p >
  </a >
                <a href=\"#\" class=\"list-group-item\">
                 <h4 class=\"list-group-item-heading\">Телефон</h4>
    <p class=\"list-group - item - text\">
    <input class='form-control' type='text' name='phone' value='" . $array['phone'] . "'/>
</p>
  </a>
  <hr>
  <a href=\"#\" class=\"list-group-item\">
    <h4 class=\"list-group-item-heading\">Пароль</h4>
    <p class=\"list-group-item-text\"><input name='firstPassword' class='form-control' type='password' value=''/></p>
  </a>
  <a href=\"#\" class=\"list-group-item\">
    <h4 class=\"list-group-item-heading\">Повторите пароль</h4>
    <p class=\"list-group-item-text\"><input name='anderPassword' class='form-control' type='password' value=''/></p>
  </a>
            </div>
            </div>
            <div class='col-sm-12'>
                <input type='submit' class='btn btn-primary btn-block'>
                </form>
            </div>";
        return $out;
    }

    function authorisation($array)
    {
//        db_connect::connect();
//        $user = R::dispense('user');
//        $dossier = R::dispense('dossier');
////$dossier->name = "Сергей";
//        $user->login = 'admin';
//        $user->password = '12345';
//        $user->dossier = $dossier;
//
//        R::store($user);die();
//        print_r($array);
        $user = R::findOne('user', ' user.login = :login and user.password=:password', $array);
//        print_r($user);die;
        if (empty($user) || $user->block === 0)
            return false;
//        $dossier = $user->dossier;//R::load('dossier', $user->dossier_id);
//        $user->authorisation = "7gF5dFG546jX15";
//        $user->dossier = $dossier;
        $_SESSION['user'] = $user;
//        print_r($user);
        return true;

    }

    static function userInfo($id)
    {
        db_connect::connect();
        $user = R::getRow('SELECT user.login,user.status dossier.* from user left join dossier on dossier.id = user.dossier_id where user.id = ?'[$id]);

        $out="<h3>".$user['login']." | ".$user['surname'] .
            " " . $user['name'] . " " . $user['andername']."</h3>";
        $out .="<ul class=\"list-group\">
                    <li class=\"list-group-item\">Статус: ".$user['status']."</li>
                    <li class=\"list-group-item\">Страна: ".$user['land']."</li>
                    <li class=\"list-group-item\">Город: ".$user['sity']."</li>
                    <li class=\"list-group-item\">Количество учебных материалов: </li>
                </ul>";
    }

}

/*
 * <a  href='?ctrl=cabinet&action=UserInfo&id=" . $autor['id'] . "'>" . $autor['login'] . "</a> |
                    <a  href='?ctrl=cabinet&action=UserInfo&id=" . $autor['id'] . "'> " . $autor['surname'] .
            " " . $autor['name'] . " " . $autor['andername'] . " </a>
 *
 *
        Array
(
    [user] => RedBeanPHP\OODBBean Object
        (
            [properties:protected] => Array
                (
                    [id] => 3
                    [login] => boris
                    [password] => 12345
                    [dossier_id] => 3
                    [block] => 0
                    [status] => student
                    [authorisation] => 7gF5dFG546jX15
                    [dossier] => RedBeanPHP\OODBBean Object
                        (
                            [properties:protected] => Array
                                (
                                    [id] => 3
                                    [name] => Борис
                                    [andername] => Борисович
                                    [lastname] => Борисов
                                    [phone] => 11111111
                                    [sity] => Минск
                                    [land] => Беларусь
                                    [email] => boris@gmail.com
                                )

                            [__info:protected] => Array
                                (
                                    [type] => dossier
                                    [sys.id] => id
                                    [sys.orig] => Array
                                        (
                                            [id] => 3
                                            [name] => Борис
                                            [andername] => Борисович
                                            [lastname] => Борисов
                                            [phone] => 11111111
                                            [sity] => Минск
                                            [land] => Беларусь
                                            [email] => boris@gmail.com
                                        )

                                    [tainted] =>
                                    [changed] =>
                                )

                            [beanHelper:protected] => RedBeanPHP\BeanHelper\SimpleFacadeBeanHelper Object
                                (
                                )

                            [fetchType:protected] =>
                            [withSql:protected] =>
                            [withParams:protected] => Array
                                (
                                )

                            [aliasName:protected] =>
                            [via:protected] =>
                            [noLoad:protected] =>
                            [all:protected] =>
                        )

                )

            [__info:protected] => Array
                (
                    [type] => user
                    [sys.id] => id
                    [sys.orig] => Array
                        (
                            [id] => 3
                            [login] => boris
                            [password] => 12345
                            [dossier_id] => 3
                            [block] => 0
                            [status] => student
                        )

                    [tainted] => 1
                    [changed] => 1
                )

            [beanHelper:protected] => RedBeanPHP\BeanHelper\SimpleFacadeBeanHelper Object
                (
                )

            [fetchType:protected] =>
            [withSql:protected] =>
            [withParams:protected] => Array
                (
                )

            [aliasName:protected] =>
            [via:protected] =>
            [noLoad:protected] =>
            [all:protected] =>
        )

)

 */