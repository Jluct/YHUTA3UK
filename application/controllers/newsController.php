<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 04.01.2016
 * Time: 11:30
 */





class newsController
{

    public function actionNews(){
        $page = $_GET['page'];

        $view = new View();

        $view->page = (int)$page;
        $view->news = news::getDataNews($page);
        echo $view->render('news.php');
    }

    public function actionGetArticle(){
        $article_id=(int)$_GET['article'];

        $article = news::getArticle($article_id);

        $view = new View();

        $view->article=$article;
        echo $view->render('article.php');

    }
}