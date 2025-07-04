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

session_start();
$cod = $_GET['id'];
$bloco = 'select id_user,body,DATE_FORMAT(dt_nota,"%d/%m/%Y") as dt_nota from notas where id_nota =';
$lista = $db->exec($bloco.' :id',['id' => $cod])->fetch();

if($lista['id_user'] !== $_SESSION['userCode']) {
    abort(Response::FORBIDDEN,$routes);
}

require("views/exibir.view.php");
?>
