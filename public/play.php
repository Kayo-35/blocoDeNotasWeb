<?php
use Illuminate\Support\Collection;
require __DIR__ . "/../vendor/autoload.php";

$frutas = new Collection(["Banana", "Maçã", "Goiaba", "Melancia"]);

$filtro = $frutas->filter(function ($fruta) {
    return mb_strlen($fruta, "UTF-8") === 6;
});
var_dump($filtro->all());
?>
