<?php
require("functions.php"); //Arquivo contem funções básicas para operar certos recursos
require("router.php"); //Roteamento da aplicação
require("Database.php"); //Conexão a base de dados
require("env.php"); //Configurações de ambiente

$db = new Database(
    $env['database']['host'],
    $env['database']['user'],
    $env['database']['dbName'],
    $env['database']['port'],
    $env['database']['password']
);
$db->connect();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $resultados = $db->exec("select * from posts where id = ? ;",[$id])->fetch();
    print_r($resultados);
}
?>
