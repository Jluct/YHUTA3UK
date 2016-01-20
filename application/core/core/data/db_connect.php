<?php
session_start();

class db_connect
{

    private static $hostname = 'localhost';
    private static $username = 'root';
    private static $password = '';
    private static $base = 'maket';

    protected static function connect()
    {
        $mysqli = new mysqli(self::$hostname, self::$username, self::$password, self::$base);

        if ($mysqli->connect_errno) {
            die("Соединение не удалось: ". $mysqli->connect_error);

        }

        return $mysqli;

    }

    protected static function processingUserData($arrQuery)
    {
        $a = self::connect();
        $out = array();
        $a->query("SET NAMES 'utf8'");
        $a->query("SET CHARACTER SET 'utf8'");
        $a->query("SET SESSION collation_connection = 'utf8_general_ci'");
        $a->query('SET NAMES utf8 COLLATE utf8_general_ci');

        foreach ($arrQuery as $key => $value) {
            $out[$key] = $a->real_escape_string($value);
        }
        return $out;
    }

}










//class setMenu extends setDataBase
//{
//    private static $menu_title;
//    private static $menu_url;
//
//
//    protected function setDataBase($arrQuery){
//
//        $out = parent::processingUserData($arrQuery);
//        $query = "INSERT INTO  `blog`.`menu` (`menu_id` ,`menu_title` ,`menu_url`) VALUES (NULL ,'".self::$menu_title."','".self::$menu_url."');";
//    }
//}

/*
private $hostname='localhost';
private $username='root';
private $password='';
private $base='blog';
public $out;
function __construct($query){
    $link = mysqli_connect($this->hostname, $this->username, $this->password, $this->base) or die('Error');
    $this->out= mysqli_query($link,$query) or die('Запрос не отправлен!' );
}
$query = "INSERT INTO  `blog`.`menu` (`menu_id` ,`menu_title` ,`menu_url`)VALUES(NULL ,  '".self::$menu_title."','".self::$menu_url."'");

*/

/*
private $hostname='localhost';
private $username='root';
private $password='';
private $base='blog';
public $out;
function __construct($query){
    $link = mysqli_connect($this->hostname, $this->username, $this->password, $this->base) or die('Error');
    $this->out= mysqli_query($link,$query) or die('Запрос не отправлен!' );
}
*/