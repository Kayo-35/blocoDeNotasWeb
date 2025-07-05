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
$_SESSION['userCode'] = 3;

$notas = $db->exec('select id_nota,body from notas where id_user = :id',['id' => $_SESSION['userCode']])->findAllOrAbort();
$user = $db->exec('select name from usuario where id_user = :id',['id' => $_SESSION['userCode']])->findOrAbort();

require "views/notas.view.php";
?>
