<?php
require("env.php"); //Configurações de ambiente
$nome = "Escreva suas anotações";
//Processando formulário
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $db = new Database(
        $env['database']['host'],
        $env['database']['user'],
        $env['database']['dbName'],
        $env['database']['port'],
        $env['database']['password']
    );
    $db->connect();

    $query = "INSERT INTO notas (id_user,body,dt_nota) VALUES (:id_user,:body,:dt_nota);";
    $db->exec($query,[
        'id_user' => $_SESSION['userCode'],
        'body' => $_POST['body'],
        'dt_nota' => date("Y-m-d")
    ]);

    confirmar("Nota criada com Sucesso!","/notas");
    die();
}

require("views/criarNotas.view.php");
?>
