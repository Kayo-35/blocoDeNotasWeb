<?php
require("functions.php"); //Arquivo contem funções básicas para operar certos recursos
require("router.php"); //Roteamento da aplicação
require("Database.php"); //Conexão a base de dados

$dsn = "mysql:host=localhost;port=3306;dbname=db_estudos;charset=utf8mb4";
$user = "root";
$password = "123456";

$db = new Database($dsn,$user,$password);
$db->connect();
$resultados = $db->exec("select * from posts where id = 1;")->fetch(PDO::FETCH_OBJ);
varStats($resultados->title);
?>
