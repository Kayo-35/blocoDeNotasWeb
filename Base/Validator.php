<?php
namespace Base;

class Validator {
    public static function string($value,$min = 1,$max = INF) {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }
    public static function title($value,$max = 50) {
        $value = trim($value);

        if(strlen($value) === 0) {
            return null;
        }
        else if(strlen($value) > $max){
            return false;
        }
        else {
            return true;
        }
    }
}
?>
