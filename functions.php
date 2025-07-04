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

function authorize($condition,$status = Response::FORBIDDEN,$mensagem) {
    if($condition === false) {
        abort($status,ROUTES,$mensagem);
    }
}
?>
