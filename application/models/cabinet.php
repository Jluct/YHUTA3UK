<?php
session_start();

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 12:23
 *
 *  <div class="panel panel-default">
 * <div class="panel-heading" role="tab" id="headingTwo">
 * <h4 class="panel-title">
 * <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
 * Collapsible Group Item #2
 * </a>
 * </h4>
 * </div>
 *
 */
class cabinet
{


    static function getLessonById($id)
    {
        $out='';
        $data=R::load('lesson',$id);
        $out="<h4>".$data->name."</h4><div class='col-sm-12'>".$data->text."</div>";
        return $out;
    }

    static function deleteUserProgress($id)
    {
        $data = R::duplicate($_SESSION['user']);
        unset($_SESSION['user']->sharedInformationList[$id]);
        R::store($_SESSION['user']);
        return true;

    }


    static private function getUserInfoProgress($id=0,$userFlags=0)
    {
        $data = R::duplicate($_SESSION['user']);
        $userInfo = $data->ownInformation_userList;

        $flags=FALSE;

        foreach ($userInfo as $value) {
//                echo $value->information_id." ".$id;
            if ($value->information_id == $id) {
                $flags = TRUE;
                $wisdom = R::findAll('information', 'where id = ?', [$id]);
            }
        }

        if($flags=0)return $flags;
    }

    static private function getInfoEducation($item)
    {

         /**********************
         *******Выделение*******
         **********************/

        $data = "<ul class=\"list-group\">";

        $data = R::duplicate($_SESSION['user']);
        $userInfo = $data->ownInformation_userList; ///?


        foreach ($item->ownEducationList as $value) {

//            if(in_array($value->id,))

            $data .= "<li href=\"#\" class=\"list-group-item\">
    <h4 class=\"list-group-item-heading\">" . $value->name . "</h4>
    <div class=\"list-group-item-text\">" . $value->description . "</p>";

            $data .= "<div class=\"panel panel-primary\">
<div class=\"panel-heading \" role=\"tab\" id=\"heading" . $value->id . "\">
<h4 class=\"panel-title\">
<a class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse" . $value->id .
                "\" aria-expanded=\"false\" aria-controls=\"collapse" . $value->id . "\"> Список предметов </a></h4></div>
                <div id=\"collapse" . $value->id . "\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading" . $value->id . "\">
      <div class=\"panel-body\"><ul class=\"list-group\">";

            foreach ($value->ownLessonList as $subvalue) {
                $data .= "
  <li class=\"list-group-item\">
    <h4>" . $subvalue->number . ". " . $subvalue->name . "<a role='button' href='?ctrl=cabinet&action=GetLesson&id=".$subvalue->id."' style='float:right;' class='btn btn-success'>Приступить</a></h4>
    <p>" . $subvalue->description . "</p>
  </li>
";
            }

            $data .= "</ul></div></div></div>";
            $data .= "</li>";
        };


        $data .= "</ul>";
        return $data;
    }


    static function getUserProgress($id = 0)
    {
        $data = R::duplicate($_SESSION['user']);
//        print_r($data->ownInformation_userList);


        $out = '';

        $out .= "<div class='col-sm-12'>
            <div class=\"list-group\"><ul style='padding-left:0;'>";
        $out .= "<li class=\"list-group-item active\">";
        if ($id == 0)
            $out .= "<h4 class=\"list-group-item-heading \">Изучаемые курсы</h4>";
        $out .= '</li></ul></div>';

        if ($id == 0) {
            $wisdom = $data->sharedInformationList;
//            print_r($wisdom);
        } else {

            $userInfo = $data->ownInformation_userList;
            foreach ($userInfo as $value) {
//                echo $value->information_id." ".$id;
                if ($value->information_id == $id)
                    $wisdom = R::findAll('information', 'where id = ?', [$id]);
            }
//            print_r($userInfo);
        }

        if ($id === 0) {
            $typeMenu = '';
            switch ($_SESSION['user']->status) {
                case "student":
                    $typeMenu = 3;
                    break;
                case "teacher":
                    $typeMenu = 4;
                    break;
                case "moderator":
                    $typeMenu = 5;
                    break;
                case "admin":
                    $typeMenu = 6;
                    break;
            }

            $bigMenu = new menu("SELECT menu_item.*
        FROM  `menu` ,  `menu_item`
        WHERE menu_item.menu_id = ?
       AND menu.menu_id = menu_item.menu_id", [$typeMenu]);
//            $bigMenu->ul_tpl = "<ul class=\"nav nav-tabs nav-justified menu_heavy\">";
//            $bigMenu->li_tpl = "<li  class=\"dropdown primary\"  role=\"presentation\"><a data-toggle=\"tooltip\" href='%s" . $item->id . "'>%s %s</a>%s</li>";


            //$out .= $bigMenu->render(); //"<a href='?ctrl=cabinet&action=GetUserInformation&id=" . $item->id . "'><div class='btn btn-success btn-block' style='margin-top:20px;'>Приступить</div></a>";
        }

        if (!empty($wisdom))
            foreach ($wisdom as $item) {
//                echo 1;
                if ($id != 0) {
                    $modul = self::getInfoEducation($item);

                }

                if ($_SESSION['user']->status !== 'author') {
                    $autor = wisdom::getAuthorName($item->id);
                    $author = "<br><a  href='?ctrl=cabinet&action=UserInfo&id=" . $autor['id'] . "'>" . $autor['login'] . "</a> |
                    <a  href='?ctrl=cabinet&action=UserInfo&id=" . $autor['id'] . "'> " . $autor['surname'] .
                        " " . $autor['name'] . " " . $autor['andername'] . " </a> ";
                }

                $typeData = wisdom::getType($item);

                $short_description = !empty($item->shortdescription) ? $item->shortdescription : 'Краткое описание отсутствует';
                $out .= "<li class=\"list-group-item\">
                <ol class=\"breadcrumb\">
                    <li><a href=\"?ctrl=wisdom&action=WisdomType&type=" . $typeData[3]->id . "&page=1\" > " . $typeData[3]->name . "</a></li>
                    <li><a href=\"?ctrl=wisdom&action=WisdomType&type=" . $typeData[3]->id . "&subtype=" . $typeData[2]->id . "&page=1\" > " . $typeData[2]->name . "</a></li>
                    <li><a href=\"?ctrl=wisdom&action=WisdomType&type=" . $typeData[3]->id . "&subtype=" . $typeData[2]->id . "&category=" . $typeData[1]->id . "&page=1\" > " . $typeData[1]->name . "</a></li>
                    <li><a href=\"?ctrl=wisdom&action=WisdomType&type=" . $typeData[3]->id . "&subtype=" . $typeData[2]->id . "&category=" . $typeData[1]->id . "&subcategory=" . $typeData[0]->id . "&page=1\" > " . $typeData[0]->name . "</a></li>

                </ol>
            <h4 class=\"list-group-item-heading\"><a href='?ctrl=wisdom&action=GetWisdomById&id=" . $item->id . "'>" . $item->name . "</a></h4><h5>" . $author . "</h5>
    <p class=\"list-group-item-text\">" . $short_description . "</p>" . $modul;
                if ($id === 0) {
//                    $typeMenu = '';
//                    switch ($_SESSION['user']->status) {
//                        case "student":
//                            $typeMenu = 3;
//                            break;
//                        case "teacher":
//                            $typeMenu = 4;
//                            break;
//                        case "moderator":
//                            $typeMenu = 5;
//                            break;
//                        case "admin":
//                            $typeMenu = 6;
//                            break;
//                    }
//
//                    $bigMenu = new menu("SELECT menu_item.*
//        FROM  `menu` ,  `menu_item`
//        WHERE menu_item.menu_id = ?
//       AND menu.menu_id = menu_item.menu_id", [$typeMenu]);
                    $bigMenu->ul_tpl = "<ul class=\"nav nav-tabs nav-justified menu_heavy\">";
                    $bigMenu->li_tpl = "<li  class=\"dropdown primary\"  role=\"presentation\"><a data-toggle=\"tooltip\" href='%s" . $item->id . "'>%s %s</a>%s</li>";


                    $out .= $bigMenu->render(); //"<a href='?ctrl=cabinet&action=GetUserInformation&id=" . $item->id . "'><div class='btn btn-success btn-block' style='margin-top:20px;'>Приступить</div></a>";
                }
                $out .= "</li>";

                $out .= "</ul></div></div></div>";
//        print_r();
            }
        if (empty($wisdom))
            $out .= "Вы не подписанны на данный учебный материал";
        return $out;
    }

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

//        foreach ($_SESSION['user'] as $key => $value) {
////            echo"<br> value ";
////            print_r( $value);
////
////            echo" <br>$value->$key ";
////            print_r($value->$key);
////
////            echo "<br>Array ";
////            print_r($array ? $array : 'Пусто');
////            echo "<br>";
//            if (empty($errorArray) && !empty($errorArray[$key])) {  // !!! \\
//                $array[$key] = $errorArray[$key];
////                echo 4;
//                continue;
//            }
//            if (empty($userArray) && !empty($userArray[$key])) {   // !!! \\
//                $array[$key] = $userArray[$key];
////                echo 3;
//                continue;
//            }
//
//            if ($_SESSION[$key] == 'password') {
////                $array[$key] = $value;
////                echo 1;
//                continue;
//            }
//        }

        foreach ($data as $key1 => $value1) {

            if (empty($errorArray) && !empty($errorArray[$key1])) {  // !!! \\
                $array[$key1] = $errorArray[$key1];
//                echo 4;
                continue;
            }
            if (empty($userArray) && !empty($userArray[$key1])) {   // !!! \\
                $array[$key1] = $userArray[$key1];
//                echo 3;
                continue;
            }

//                echo"<br> value1 ";
//                print_r( $value1);
//
//                echo" <br>key1 ";
//                print_r($key1);

//                echo"<br>$value1->$key1<br>";
//                print_r($value1->$key1);
            if($key1=="image")continue;

            if ($data->$key1) {
                $array[$key1] = $value1;
                print_r($key1." ");


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
  <a href=\"#\" class=\"list-group-item\">
    <h4 class=\"list-group-item-heading\">О себе</h4 >
    <p class=\"list-group-item-text\" ><textarea class='form-control' name='about'>". $array['about'] ."</textarea></p >
  </a >

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
        $user = R::load('user', $id);

        $out = "<div class='col-sm-4 text-center'>
                    <img style=\"max-width: 100%;max-height:100%;margin: 15px; \" src='images/user/" . $user->dossier->image . "'>
                </div>
                    <div class='col-sm-8'>
                    <h3>" . $user->login . " | " . $user->dossier->surname .
            " " . $user->dossier->name . " " . $user->dossier->andername .
            "</h3>";
        $out .= "<ul class=\"list-group\">
                    <li class=\"list-group-item\"><h4>Основная информация</h4></li>
                    <li class=\"list-group-item\">Статус: " . $user->status . "</li>
                    <li class=\"list-group-item\">Страна: " . $user->dossier->land . "</li>
                    <li class=\"list-group-item\">Город: " . $user->dossier->sity . "</li>
                    <li class=\"list-group-item\">Электронная почта: " . $user->dossier->email . "</li>
                    <li class=\"list-group-item\">Количество учебных материалов: " . $user->withCondition('activ = 1')->countShared('information') . " </li>
                </ul>
                </div>";

        $about = $user->dossier->about ? $user->dossier->about : '<h3>Нет инфориации</h3>';

        $out .= "<div class='col-sm-12'>
                    <div class=\"panel panel-primary\">
                        <div class=\"panel-heading\">О себе</div>
                        <div class=\"panel-body\">" . $about . "</div>
                    </div>
                </div>";

        if ($user->status === 'teacher') {
            $data = $user->withCondition('activ=1')->sharedInformationList;
//    print_r($data);
            $out .= "<div class='col-sm-12'><div class=\"list-group\"><ul style='padding-left:0; '>";
            $out .= "<li class=\"list-group-item active\">
            <h4 class=\"list-group-item-heading \">Разработанные учебные матириалы</h4>
  </li>";
            foreach ($data as $item) {
                $short_description = !empty($item->shortdescription) ? $item->shortdescription : 'Краткое описание отсутствует';
                $out .= "<li class=\"list-group-item\">
            <h4 class=\"list-group-item-heading\"><a href='?ctrl=wisdom&action=GetWisdomById&id=" . $item->id . "'>" . $item->name . "</a></h4>
    <p class=\"list-group-item-text\">" . $short_description . "</p>
  </li>";
            }
            $out .= "</ul></div></div>";
        }
        return $out;
    }

}