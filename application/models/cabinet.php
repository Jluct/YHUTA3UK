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


    static function getLessonById($id)
    {


        $user = R::duplicate($_SESSION['user']);
        $data = R::load('lesson', $id);
        $userInfo = R::getAll('SELECT * FROM information_user WHERE user_id = ?', [$_SESSION['user']->id]);
        $userInfo = R::convertToBeans('information_user', $userInfo);
        if (!empty($data->education_id ) && $_SESSION['user']->status=='student') {
            $education = R::load('education', $data->education_id);
            if ($education->number != 1) {
                $numb = $education->number - 1;

                //получаем id предметов, которые предшевствуют текущему
                $prev_education = R::findAll('education', ' WHERE number =? and information_id=?', [$numb, $education->information_id]);

                foreach ($prev_education as $item) {

                    //проверяем, содержит ли массив $userInfo id приведущего модуля
                    foreach ($userInfo as $it) {
                        if ($item->id == $it->education_id && is_null($it->status))
                            return false;
                    }
                }


            }


        }
        if ($data->number != 1 && $_SESSION['user']->status=='student') {
            $numb = $data->number - 1;
//            echo $numb;
            if (!empty($data->education_id)) {
                $query = ' WHERE number =? and education_id=?';
                $dataArray = [$numb, $data->education_id];
            } else {
                $query = ' WHERE number =? and information_id=?';
                $dataArray = [$numb, $data->information_id];
            }

            $lesson_parent = R::findAll('lesson', $query, $dataArray);
//            print_r($lesson_parent);
            $lesson_flag = false;
            foreach ($lesson_parent as $item) {

                //проверяем, содержит ли массив $userInfo id приведущего модуля
                foreach ($userInfo as $it) {

                    if ($item->id == $it->lesson_id && !is_null($it->status))
                        $lesson_flag = true;
                }
                if ($lesson_flag == false) return false;

            }
        }

        $prev = '';
        $next = '';
        $next_lesson = array_values(R::find('lesson', "where number = ? and education_id=? and block=1", [$data->number + 1, $data->education_id]));


        if ($data->number == 1) {
            $help_class_prev = 'disabled';
            $prev = 1;
        } else {
            $help_class_prev = '';
            $prev = array_values(R::find('lesson', 'WHERE number = ? and block=1', [$numb]))[0]->id;
            print_r($prev);
        }
        if (!empty($next_lesson)) {
            $help_class_next = '';
            $next = $next_lesson[0]->id;

        } else {
            $help_class_next = 'disabled';
            $next = $data->id;
        }

        $out = '';
        $out = "<h4>" . $data->name . "</h4><div class='col-sm-12'>" . $data->text . "</div>";
        $out .= "
<div class='col-sm-4'></div>
<div class='col-sm-2'><a role='button' href='?ctrl=cabinet&action=GetLesson&id=" . $prev . "' class='btn " . $help_class_prev . " btn-success btn-block'><span class=\"glyphicon glyphicon-arrow-left\" aria-hidden=\"true\"></span>Назад</a></div>
<div class='col-sm-2'><a role='button' href='?ctrl=cabinet&action=GetLesson&id=" . $next . "' class='btn " . $help_class_next . " btn-success btn-block'>Далее<span class=\"glyphicon glyphicon-arrow-right\" aria-hidden=\"true\"></span></a></div>
<div class='col-sm-4'></div>
";
        return $out;
    }

    static function deleteUserProgress($id)
    {
        $data = R::duplicate($_SESSION['user']);
        unset($_SESSION['user']->sharedInformationList[$id]);
        R::store($_SESSION['user']);
        return true;

    }


    static private function getUserInfoProgress($id = 0, $userFlags = '')
    {
        $data = R::duplicate($_SESSION['user']);
        $userInfo = $data->ownInformation_userList;

        $flags = FALSE;

        foreach ($userInfo as $value) {
//            echo " " . $userFlags . " | значение - " . $value->$userFlags . " | id - " . $id . " | статус - " . $value->status . "<br>";
            if ($value->$userFlags == $id && $value->status == 1) {
                return $flags = TRUE;
//                $wisdom = R::findAll('information', 'where id = ?', [$id]);
            }
        }

//        if($flags=0)
        return $flags;

    }

    static private function renderLesson($value, $flag = 0)
    {
        $data = '';

        $typeMenu = 8;

/////////////////////////////////////////////////////////////

        $menuModerator = new menu("SELECT menu_item.*
        FROM  `menu` ,  `menu_item`
        WHERE menu_item.menu_id = ?
       AND menu.menu_id = menu_item.menu_id", [$typeMenu]);


        //$bigMenu->ul_tpl = "<ul class=\"nav nav-tabs nav-justified menu_heavy\">";
        //$bigMenu->li_tpl = "<li  class=\"dropdown primary\"  role=\"presentation\"><a data-toggle=\"tooltip\" href='%s" . $item->id . "'>%s %s</a>%s</li>";
        //$out .= $bigMenu->render();
        $menuModerator->ul_tpl = "<ul class=\"nav nav-tabs nav-justified menu_heavy\">";

        foreach ($value->ownLessonList as $subvalue) {

            $helpClass = '';
            $menuModerator->li_tpl = "<li  class=\"dropdown primary\"  role=\"presentation\"><a data-toggle=\"tooltip\" href='%s" . $value->id . "&lesson=".$subvalue->id."'>%s %s</a>%s</li>";

            //подсветка
            if (self::getUserInfoProgress($subvalue->id, 'lesson_id'))

            $helpClass = 'bg-success';

//                print_r($subvalue);
            $data .= "
  <li class=\"list-group-item " . $helpClass . "\">
    <h4>" . $subvalue->number . ". " . $subvalue->name . "<a role='button' href='?ctrl=cabinet&action=GetLesson&id=" . $subvalue->id . "' style='float:right;' class='btn btn-primary'>Приступить</a></h4>
    <p>" . $subvalue->description . "</p>

    ".$menuModerator->render()."
  </li>
";
        }
        return $data;
    }

    static private function getInfoEducation($item, $wisdom = '')
    {

        /*********************\
         * |******лекции*******|
         * \*********************/

        $menuModerator = new menu("SELECT menu_item.*
        FROM  `menu` ,  `menu_item`
        WHERE menu_item.menu_id = ?
       AND menu.menu_id = menu_item.menu_id", [8]);

        $menuModerator->ul_tpl = "<ul class=\"nav nav-tabs nav-justified menu_heavy\">";


        $data = "<ul class=\"list-group\">";

        if ($wisdom !== '') {
            $data .= self::renderLesson($wisdom);
            $data .= "</ul></div></div></div>";
            $data .= "</li>";
            return $data;
        }

        foreach ($item->ownEducationList as $value) {
            $helpClass = '';
            $menuModerator->li_tpl = "<li  class=\"dropdown primary\"  role=\"presentation\"><a data-toggle=\"tooltip\" href='%s" . $item->id . "&education=".$value->id."'>%s %s</a>%s</li>";

            //подсветка
            if (self::getUserInfoProgress($value->id, 'education_id'))
                $helpClass = 'bg-success';

            $data .= "<li href=\"#\" class=\"list-group-item " . $helpClass . " \">
    <h4 class=\"list-group-item-heading\">" . $value->name . "</h4>
    <div class=\"list-group-item-text \">" . $value->description . "</p>";

            $data .= "<div class=\"panel panel-primary\">
<div class=\"panel-heading \" role=\"tab\" id=\"heading" . $value->id . "\">
<h4 class=\"panel-title\">
<a class=\"collapsed\" role=\"button\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse" . $value->id .
                "\" aria-expanded=\"false\" aria-controls=\"collapse" . $value->id . "\"> Список предметов </a></h4></div>
                <div id=\"collapse" . $value->id . "\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"heading" . $value->id . "\">
      <div class=\"panel-body\"><ul class=\"list-group\">";

            $data .= self::renderLesson($value);
            $data .= "<hr>";
            if ($_SESSION['user']->status !== 'student' && !empty($_SESSION['user']->status) && $value->id != 0)
                $data .= "<a role='button' href='?ctrl=teacher&action=AddLesson&id=" . $value->id . "' class='btn btn-info btn-block'>Добавить лекцию</a>";
            $data .= "</ul></div></div><div class='panel-footer'>
".$menuModerator->render()."
<!--меню модуля-->
</div> </div>";
            $data .= "</li>";
        };


        $data .= "</ul>";
        return $data;
    }


    static function getUserProgress($id = 0, $complete = 0)
    {
        $data = R::duplicate($_SESSION['user']);

        $out = '';

        $out .= "<div class='col-sm-12'>
            <div class=\"list-group\"><ul style='padding-left:0;'>";
        $out .= "<li class=\"list-group-item active\">";

        if ($id == 0 && $complete == 0)
            $out .= "<h4 class=\"list-group-item-heading \"><a role='button' href='?ctrl=cabinet&action=GetCabinet' class='btn btn-info back_button'><span class=\"glyphicon glyphicon-arrow-left\" aria-hidden=\"true\"></span></a>Изучаемые курсы </h4>";

        if ($complete == 1)
            $out .= "<h4 class=\"list-group-item-heading \"><a role='button' href='?ctrl=cabinet&action=GetCabinet' class='btn btn-info back_button'><span class=\"glyphicon glyphicon-arrow-left\" aria-hidden=\"true\"></span></a>Изученные курсы</h4>";

        $out .= '</li></ul></div>';

        if ($id == 0) {

            $preWisdom = $data->ownInformation_userList;
            $arrayId = array();
            foreach ($preWisdom as $value) {
                if ($complete == 0) {
                    if (is_null($value->status) && is_null($value->education_id) && is_null($value->lesson_id))
                        $arrayId[] = $value->information_id;
                } else {
                    if (!is_null($value->status) && is_null($value->education_id) && is_null($value->lesson_id))
                        $arrayId[] = $value->information_id;
                }


            }
            $wisdom = R::loadAll('information', $arrayId);
//            print_r($wisdom);


        } else {

            // проверяем записан ли пользователь на данный УМ
            $userInfo = $data->ownInformation_userList;
            foreach ($userInfo as $value) {
                if ($value->information_id == $id)
                    $wisdom = R::findAll('information', 'where id = ?', [$id]);
            }

        }

        $typeMenu = '6';
        $typeMenu1 = '';
        if ($complete == 0)
            if ($id === 0) {
                switch ($_SESSION['user']->status) {
                    case "student":
                        $typeMenu = 3;
                        $typeMenu1 = '';
                        break;
                    case "teacher":
                        $typeMenu = 7;
                        $typeMenu1 = 8;
                        break;
                    case "moderator":
                        $typeMenu = 4;
//                        $typeMenu1=8;
                        break;
                    case "admin":
                        $typeMenu = 9;
                        $typeMenu1 = 8;
                        break;
                }

            }
        $bigMenu = new menu("SELECT menu_item.*
        FROM  `menu` ,  `menu_item`
        WHERE menu_item.menu_id = ?
       AND menu.menu_id = menu_item.menu_id", [$typeMenu]);

        $bigMenu->ul_tpl = "<ul class=\"nav nav-tabs nav-justified menu_heavy\">";


        if (!empty($wisdom))
            foreach ($wisdom as $item) {
                $typeData = wisdom::getType($item);

//                echo 1;
                if ($id != 0) {
                    $itemClone = '';
                    if ($typeData[3]->id != 1) {
                        $itemClone = $item;
                    }
                    $modul = self::getInfoEducation($item, $itemClone);

                }


                if ($_SESSION['user']->status !== 'author') {
                    $autor = wisdom::getAuthorName($item->id);
                    $author = "<br><a  href='?ctrl=cabinet&action=UserInfo&id=" . $autor['id'] . "'>" . $autor['login'] . "</a> |
                    <a  href='?ctrl=cabinet&action=UserInfo&id=" . $autor['id'] . "'> " . $autor['surname'] .
                        " " . $autor['name'] . " " . $autor['andername'] . " </a> ";
                }


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


                    $bigMenu->li_tpl = "<li  class=\"dropdown primary\"  role=\"presentation\"><a data-toggle=\"tooltip\" href='%s" . $item->id . "'>%s %s</a>%s</li>";


                    $out .= $bigMenu->render(); //"<a href='?ctrl=cabinet&action=GetUserInformation&id=" . $item->id . "'><div class='btn btn-success btn-block' style='margin-top:20px;'>Приступить</div></a>";
                }
                //меню модерирования модуля
                if ($_SESSION['user']->status !== 'student' && !empty($_SESSION['user']->status) && $id != 0)
                    $out .= "<a role='button' href='?ctrl=teacher&action=AddModul&id=" . $id . "' class='btn btn-info btn-block'>Добавить модуль</a>";
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


        $array = array();
        $session = $_SESSION['user'];
        $data = $session->dossier;


        foreach ($data as $key1 => $value1) {

            if (empty($errorArray) && !empty($errorArray[$key1])) {  // !!! \\
                $array[$key1] = $errorArray[$key1];

                continue;
            }
            if (empty($userArray) && !empty($userArray[$key1])) {   // !!! \\
                $array[$key1] = $userArray[$key1];

                continue;
            }


            if ($key1 == "image") continue;

            if ($data->$key1) {
                $array[$key1] = $value1;

            }
        }


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
    <p class=\"list-group-item-text\" ><textarea class='form-control' name='about'>" . $array['about'] . "</textarea></p >
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

        $user = R::findOne('user', ' user.login = :login and user.password=:password', $array);

        if (empty($user) || $user->block === 0)
            return false;

        $_SESSION['user'] = $user;

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
                    <li class=\"list-group-item\">Количество учебных материалов: " . $user->withCondition('activ = 1 and education_id is null and lesson_id is null')->countShared('information') . " </li>
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
            <h4 class=\"list-group-item-heading \">Разработанные учебные материалы</h4>
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