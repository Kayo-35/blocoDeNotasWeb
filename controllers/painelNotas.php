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
session_start();
$_SESSION['userCode'] = 2;

$notas = $db->exec('select id_nota,body from notas where id_user = :id',['id' => $_SESSION['userCode']])->fetchAll();
$user = $db->exec('select name from usuario where id_user = :id',['id' => $_SESSION['userCode']])->fetch();

require "views/notas.view.php";
?>
