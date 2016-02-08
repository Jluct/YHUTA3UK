<?php


class db_connect
{

    private $db = '';
    public $result = '';

    public function __construct($db = 'obuceisea')
    {
        $this->db = new PDO('mysql:host=localhost;dbname=' . $db . '', 'root', '');
    }


    /**
     * @param $columb строка, список полей
     * @param $array массив таблиц. Соединение по id с преведущей таблицей.
     * Если необходимо присоединиться к таблице, которая не является следующей в цепи,
     * необходимо передать в качестве элемента массива массив
     * [имя_таблицы_которую_присоединяем,имя_таблицы_от_которой_отталкиваемся]
     * При соединении смежной таблицы (многие ко многим)
     * [имя_таблицы_которую_присоединяем,имя_смежной_таблицы,поле_таблицы_которую_присоединяем]
     * @param $id
     * @return string
     */
    public function getDataSeveralTable($columb, $array, $id)
    {
        $columb = (string)$columb;
        $array = (array)$array;
        $id = (int)$id;

        $countArray = count($array);

        $query = "SELECT " . $columb . " FROM " . $array[0] . "";

        if ($countArray > 1) {
            for ($i = 1; $i < $countArray; $i++) {
                if (!is_array($array[$i])) {
                    $query .= " LEFT JOIN " . $array[$i] . " ON " . $array[$i - 1] . "." . $array[$i - 1] . "_id = " . $array[$i] . "." . $array[$i - 1] . "_id";
                } else {
                    $data = !empty($array[$i][2]) ? $array[$i][2] : $array[$i][1];
                    $query .= " LEFT JOIN " . $array[$i][0] . " ON " . $array[$i][0] . "." . $array[$i][0] . "_id = " . $array[$i][1] . "." . $data . "_id";
                }
            }
        }

        $query .= " WHERE " . $array[0] . "." . $array[0] . "_id = :id";

        $data = $this->db->prepare($query);
        $data->bindParam(':id', $id);
        $data->execute();
//return $query;
        return $data->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * @return PDO|string
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param $query строка запроса
     * @param $array массив переменных
     * @return array
     */
    public function getAll($query, $array)
    {
        $query = (string)$query;
        $array = (array)$array;

        try {
        $data = $this->db->prepare($query);
        if (!empty($array)) {
            for ($i = 0; $i < count($array); $i++) {
                $data->bindValue($i + 1, $array[$i], PDO::PARAM_INT);
            }
        }
            $data->execute();
            return $data->fetchAll(PDO::FETCH_CLASS);

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }


    }
}
//$db = new connect('obuceisea');
//
//
//print_r($db->getDataSeveralTable('*',['user','student','student_wisdom',['wisdom','student_wisdom','wisdom']],1));
//print_r($db->getDataSeveralTable('*',['menu','menu_item',['data']],1));


/*
 * SELECT  `user` . * ,  `student` . * ,  `student_wisdom` . * ,  `wisdom` . *
FROM user
LEFT JOIN  `obuceisea`.`student` ON  `user`.`user_id` =  `student`.`user_id`
LEFT JOIN  `obuceisea`.`student_wisdom` ON  `student`.`student_id` =  `student_wisdom`.`student_id`
LEFT JOIN  `wisdom` ON  `wisdom`.wisdom_id =  `student_wisdom`.wisdom_id
WHERE user.user_id =1
 */


/*
     * Array
(
    [0] => stdClass Object
        (
            [news_id] => 1
            [news_header] => Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного пр
            [news_body] => Сегодня во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.
            [news_date] => 2015-11-30 15:44:27
            [news_img] => photoTest.png
            [user_id] => 1
        )

    [1] => stdClass Object
        (
            [news_id] => 2
            [news_header] => Phasellus blandit nisl ac commodo aliquam.
            [news_body] => Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.
            [news_date] => 2015-11-30 17:40:27
            [news_img] => images/IMG_20151228_120826.jpg
            [user_id] => 1
        )

    [2] => stdClass Object
        (
            [news_id] => 3
            [news_header] => Praesent semper dui condimentum, auctor velit vitae, sagittis sapien.
            [news_body] => Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.
            [news_date] => 2015-11-30 17:44:56
            [news_img] => images/20151228_120827.jpg
            [user_id] => 1
        )

    [3] => stdClass Object
        (
            [news_id] => 4
            [news_header] => Sed in odio ac odio elementum ullamcorper et quis metus.
            [news_body] => Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.
            [news_date] => 2015-11-30 17:45:09
            [news_img] => images/20151228_115024.jpg
            [user_id] => 1
        )

    [4] => stdClass Object
        (
            [news_id] => 5
            [news_header] => Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            [news_body] => Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.
            [news_date] => 2015-11-30 17:45:40
            [news_img] => images/12_100229_1_96372.jpg
            [user_id] => 1
        )

    [5] => stdClass Object
        (
            [news_id] => 6
            [news_header] => Sed molestie quam id sapien consequat, pellentesque fringilla arcu commodo.
            [news_body] => Вчера во время проведения разведоперации наша группа подверглась нападению неизвестного противника в камуфляжной форме Алиенов.
            [news_date] => 2015-11-30 17:45:50
            [news_img] => images/12_100229_1_96370.jpg
            [user_id] => 1
        )

)
     */
