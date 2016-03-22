<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 04.01.2016
 * Time: 11:30
 */

class newsController
{
    public function actionNews($view){
        $page = (int)$_GET['page'];
        $view->page = $page;
        $view->news = news::getDataNews($page);
        echo $view->render('news.php');
    }

    public function actionGetArticle($view){
        $article_id=(int)$_GET['article'];
        $article = news::getArticle($article_id);
        $view->article=$article;
        echo $view->render('article.php');
    }
}