<?php
require("env.php"); //Configurações de ambiente
$nome = "Escreva suas anotações";
//Processando formulário
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('Validator.php');
    session_start();
    $db = new Database(
        $env['database']['host'],
        $env['database']['user'],
        $env['database']['dbName'],
        $env['database']['port'],
        $env['database']['password']
    );
    $db->connect();

    //Validação dos dados submetidos
    $erros = [];

    if(!Validator::string($_POST['body'],1,4000)) {
        $erros['body'] = "Anotações devem ter entre 1 e 4000 caracteres!";
    }

    if(empty($erros)) {
        $query = "INSERT INTO notas (id_user,body,dt_nota) VALUES (:id_user,:body,:dt_nota);";
        $db->exec($query,[
            'id_user' => $_SESSION['userCode'],
            'body' => $_POST['body'],
            'dt_nota' => date("Y-m-d")
        ]);
        confirmar("Nota criada com Sucesso!","/notas");
    }

}

require("views/criarNotas.view.php");
?>
