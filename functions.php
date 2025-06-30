<?php
function isUrl($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}
?>
