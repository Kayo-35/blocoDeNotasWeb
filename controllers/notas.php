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
require "views/notas.view.php";
?>
