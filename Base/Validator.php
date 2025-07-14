<?php
namespace Base;

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        return mb_strlen($value, "UTF-8") >= $min &&
            mb_strlen($value, "UTF-8") <= $max;
    }
    //Valida titulos de anotações
    public static function title($value, $max = 50)
    {
        $value = trim($value);

        if (mb_strlen($value, "UTF-8") === 0) {
            return null;
        } elseif (mb_strlen($value, "UTF-8") > $max) {
            return false;
        } else {
            return true;
        }
    }
    public static function body($value, $min = 1, $max = 4000)
    {
        $value = trim($value);
        return mb_strlen($value, "UTF-8") >= $min &&
            mb_strlen($value, "UTF-8") <= $max;
    }
    public static function email($email): bool
    {
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
?>
