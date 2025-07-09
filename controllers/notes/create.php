<?php
$nome = "Escreva suas anotações";

view("notes/create.view", [
    "url" => $url,
    "erros" => isset($erros) ? $erros : [],
]);
?>
