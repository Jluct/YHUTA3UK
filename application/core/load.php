<?php
session_start();

header('Content-Type: text/html; charset= utf-8');
$clientData = json_decode(trim(file_get_contents('php://input')), true);
$userData = $clientData['data'];


//echo(json_encode($userData));die();
// echo json_encode($clientData['data']);die();
//echo json_encode($_SESSION[0]);

switch ($clientData["target"]) {
    case 'menu':
        include_once('data/get/getMenu.php');
        echo json_encode(getMenu::getDataMenu());
        break;
    case 'news':
        include_once('data/get/getNews.php');
        echo json_encode(getNews::getDataNews($userData));
        break;
    case'comment':
        include_once('data/get/getComment.php');
        echo json_encode(getComment::getDataComment($userData));
        break;

    case 'authorization':
        include_once('core/data/session/openSession.php');
        echo json_encode(openSession::openSession1($userData));
        break;
    case 'getSession':
        include_once('core/data/session/getSession.php');
        echo json_encode(userInfo::sessionInfo());
        break;
    case 'slide':
        include_once('data/get/getSlide.php');
        echo json_encode(getSlide::getDataSlide());
        break;
    default:
        echo "This command undefined!";

}