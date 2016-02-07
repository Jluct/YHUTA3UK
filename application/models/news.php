<?php
require_once(__DIR__.'/../core/core/data/get/get.php');
require_once(__DIR__.'/../core/core/services/check.php');

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 04.01.2016
 * Time: 11:46
 */
class news extends getDataBase
{
    private static function count_news($data)
    {
        $data = checkClass::checkAll($data);
        $query = "SELECT * FROM news ORDER BY news.news_date LIMIT " . $data . ",5";
        return parent::getData($query);
    }

    public static function getNumbPagesNews()
    {
        $count_table = parent::getData("SELECT COUNT( news_id ) FROM  `news`",1)[0];
        $number1 = 5;
        $number1 = ceil($count_table / $number1);
        return $number1;
    }


    public static function getDataNews($data)
    {


        $newsData = self::count_news(0);

        $news = '';
        for ($i = 0; $i < count($newsData); $i++) {
            $news .= "<div class=\"row news_item\">
                        <div class=\"col-sm-3\">
                            <img src='/../../images/" . $newsData[$i]['news_img'] . "' alt=\"...\">
                        </div>
                        <div class=\"col-sm-9\">
                            <h3><a href=\"?ctrl=news&action=GetArticle&article=" . $newsData[$i]['news_id'] . "\">" . $newsData[$i]['news_header'] . "...</a>
                                <small>" . $newsData[$i]['news_date'] . "</small>
                            </h3>
                        </div>
                    </div>";
        }
        return $news;

    }

    public static function getArticle($id)
    {
        $query = "SELECT * FROM news WHERE news_id = " . $id . ";";
        $article = parent::getData($query,1);

        return $article;

    }

    public static function getDataDefaultNews(){
        return self::count_news(0);
    }
}