<?php
require("env.php"); //Configurações de ambiente

$db = new Database(
    $env['database']['host'],
    $env['database']['user'],
    $env['database']['dbName'],
    $env['database']['port'],
    $env['database']['password']
);

$db->connect();
$nome = "Anotações";

//Gerando dinâmicamente conteúdo das anotações
$codigo = 3;
$notas = $db->exec('select id_user,body from notas where id_user = :id',['id' => $codigo])->fetchAll();
$user = $db->exec('select name from usuario where id_user = :id',['id' => $codigo])->fetch();

require "views/notas.view.php";
?>
