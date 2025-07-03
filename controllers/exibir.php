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
$cod = $_GET['id'];
$lista = $db->exec('select * from notas where id_user = :id',['id' => $cod]);
require("views/exibir.view.php");
?>
