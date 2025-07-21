<?php
use Base\App;
use Base\Database;
$db = App::resolve(Database::class);
$db->connect();

$nome = "Escreva suas anotações";
//Obtendo o conjunto de tags
$tags =$db->exec("SELECT id_tag,nm_tag FROM tag;")->findAll();

view("notes/create.view", [
    "url" => $url,
    "erros" => isset($erros) ? $erros : [],
    "tags" => isset($tags) ? $tags : [],
]);
?>
