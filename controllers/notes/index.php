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

$notas = $db->exec('select id_nota,title,SUBSTRING_INDEX(body," ",6) as body from notas where id_user = :id order by dt_nota desc;',['id' => $_SESSION['userCode']])->findAllOrAbort();
$user = $db->exec('select name from usuario where id_user = :id',['id' => $_SESSION['userCode']])->findOrAbort();

require "views/notes/index.view.php";
?>
