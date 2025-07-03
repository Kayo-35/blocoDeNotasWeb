<?php
//Verificar se o caminho requisitado em urls é o mesmo presente como título de paginas
function isUrl($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

//Exibe valores de vetores de forma formatada
function varStats($item) {
    echo "<pre>";
    var_dump($item);
    echo "</pre";
    die();
}

//Exibe página de erro ao usuário
function abort($code,$routes) {
    http_response_code($code);
    require($routes["/error"]);
    die();
}
?>
