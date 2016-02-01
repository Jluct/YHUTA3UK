<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 04.01.2016
 * Time: 11:30
 */
require_once("/../core/core/services/check.php");
class newsController
{

    public function actionNews(){
        $pageNumber;
        if(isset($_GET['article'])) {
            $pageNumber = $_GET['article'];
        }else{
            $pageNumber=0;
        }
        $view = new View();

        if(isset($article)){

        }
        $news = news::getDataNews($pageNumber);

         $view->paggination = news::getNumbPagesNews();


        $view->news = $news;
        echo $view->render('news.php');
    }

    public function actionGetArticle(){
        $article_id=$_GET['article'];
        $article_id=checkClass::checkAll($article_id);
        $article = news::getArticle($article_id);

        $view = new View();
        $view->article=$article;
        echo $view->render('article.php');

    }
}