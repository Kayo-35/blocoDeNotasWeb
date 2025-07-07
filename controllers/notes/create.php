<?php
use Base\Database;
use Base\Validator;
require path("env.php"); //Configurações de ambiente
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

    //Validação dos dados submetidos
    $erros = [];
    //Titulo
    if(Validator::title($_POST['title'],50) === null) {
        $_POST['title'] = 'Sem título';
    }
    else if(Validator::title($_POST['title'],50) === false) {
        $erros['title'] = "Título ultrapassa a quantidade limite de caracteres!";
    }
    //Corpo
    if(!Validator::string($_POST['body'],1,4000)) {
        $erros['body'] = "Anotações devem ter entre 1 e 4000 caracteres!";
    }

    if(empty($erros)) {
        $query = "
            INSERT INTO notas (id_user,title,body,dt_nota)
            VALUES (:id_user,:title,:body,:dt_nota);";
        $db->exec($query,
        [
            'id_user' => $_SESSION['userCode'],
            'title' => $_POST['title'],
            'body' => trim($_POST['body']), //trim impede blocos de espaços aleatórios
            'dt_nota' => date("Y-m-d")
        ]);
        confirmar("Nota criada com Sucesso!","/notas");
    }
}

view("notes/create.view",
[
    'url' => $url,
    'erros' => isset($erros) ? $erros : [],
]
);
?>
