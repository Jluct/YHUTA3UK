<?
session_start();
include_once('/../db_connect.php');
//include_once('/core/data/set/set.php');

class getDataBase extends db_connect
{
    private static function aaa($query)
    {
       parent::connect()->query("SET NAMES 'utf8'");
       parent::connect()->query("SET CHARACTER SET 'utf8'");
       parent::connect()->query("SET SESSION collation_connection = 'utf8_general_ci'");
        parent::connect()->query('SET NAMES utf8 COLLATE utf8_general_ci');
        $out = parent::connect()->query($query);
        return $out;
    }

    public static function getData($query,$count=0)
    {
        $result = self::aaa($query);
//        echo(json_encode($result));die();
        if($result->num_rows ===1 && $count==1){
            return $result->fetch_assoc();
        }
        $out = array();
        foreach ( $result as $key => $value) {
            $out[$key] = $value;
        }
        parent::connect()->close();
        return $out;
    }
}