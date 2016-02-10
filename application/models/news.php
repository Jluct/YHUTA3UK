<?php


/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 04.01.2016
 * Time: 11:46
 */
db_connect::connect();

//require(__DIR__."/../core/vendor/rb.php");
//R::setup('mysql:host=localhost;dbname=obuceisea', 'root', '');
//R::setAutoResolve(TRUE);
//R::freeze( TRUE );
class news
{
    private static function count_news($begin = 0, $count = 5)
    {

//        $menu=R::load('menu',1);

    }


    public static function getDataNews($page)
    {
        $count = 5;
        $page = (int)($page - 1) * $count;
        $newsData = self::count_news($page, $count);

        $news = '';
        for ($i = 0; $i < count($newsData); $i++) {
            $news .= "<div class=\"row news_item\">
                        <div class=\"col-sm-3\">
                            <img src='" . $newsData[$i]->news_img . "' alt=\"...\">
                        </div>
                        <div class=\"col-sm-9\">
                            <h3><a href=\"?ctrl=news&action=GetArticle&article=" . $newsData[$i]->news_id . "\">" . $newsData[$i]->news_header . "...</a>
                                <small>" . $newsData[$i]->news_date . "</small>
                            </h3>
                        </div>
                    </div>";
        }
        return $news;
    }

    public static function getArticle($id)
    {

        $id = (int)$id;
        $data = new db_connect();
        return $data->getAll("SELECT * FROM news WHERE news_id=?",[$id])[0];

    }

    public static function getDataDefaultNews()
    {
        return self::count_news(0);

    }
}