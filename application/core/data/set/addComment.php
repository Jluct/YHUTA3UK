<?php
session_start();
include_once('/core/data/set/set.php');

if (!$_SESSION['user'] || $_SESSION['user']['status'] == 'block') {
    die('No avtorization');
}

class addComment extends setDataBase
{


    /**
     * @array { text: "11111", news_id: "2"}
     * @array1 метод принимает массив. Пришлось завернуть. Потом подумаю
     */
    public
    static function addDataComment($array)
    {

        $trueArray = parent::processingUserData($array);

        $text = $trueArray["text"];
        $news_id = $trueArray["news_id"];
        $array1[0] = $news_id;

        $query = "INSERT INTO blog.comment (comment_id, comment_date, comment_text, article_id) VALUES (NULL, " . $_SESSION['user']['user_id'] . ", CURRENT_TIMESTAMP, '$text', '$news_id');";
//        parent::setData($query);
        parent::setData($query) or die("Запрос не отправлен: " . $query);

        include_once('data/get/getComment.php');
        return getComment::getDataComment($array1);

    }
}



//INSERT INTO `blog`.`comment` (`comment_id`, `comment_user`, `comment_date`, `comment_text`, `news_id`) VALUES (NULL, '".$name."', CURRENT_TIMESTAMP, '".$text."', '".$news_id."');"