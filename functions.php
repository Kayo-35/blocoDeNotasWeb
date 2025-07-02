<?php
function isUrl($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function varStats($item) {
    echo "<pre>";
    var_dump($item);
    echo "</pre";
    die();
}
?>
