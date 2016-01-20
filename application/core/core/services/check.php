<?
include_once('config.php');
session_start();

final class checkClass
{

    public static function checkUserData($userData)
    {


        if (is_array($userData)) {

            if(!isset($userData))
                return true;
            foreach ($userData as $value) {

                if (!is_string($value) && !is_numeric($value)) die("Это не строка и не число!!!"); //die(ERROR_VALUE);
            }

        } else {
            if (!is_string($userData) && !is_numeric($userData)) die("Это не строка и не число!!!");
        }
    }

    public static function deleteSpace($array)
    {
        $out;

        if (is_array($array)) {

            foreach ($array as $key => $value) {
                $out[$key] = trim($value);
            }

        } else {

            $out = trim($array);
        }

        return $out;
    }

    public static function htmlTransform($array)
    {

        $out;

        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $out[$key] = htmlspecialchars($value);
            }
        } else {

            $out = htmlspecialchars($array);
        }

        return $out;
    }

    public static function checkAll($array)
    {

        self::checkUserData($array);
        $out = self::deleteSpace($array);
        $out = self::htmlTransform($out);

        return $out;
    }

}