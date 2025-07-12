<?php
use Base\App;
use Base\Validator;
use Base\Database;
session_start();

$db = App::resolve(Database::class);
$db->connect();

//Validação dos dados submetidos
$erros = [];

//Titulo
if (Validator::title($_POST["title"], 50) === null) {
    $_POST["title"] = "Sem título";
} elseif (Validator::title($_POST["title"], 50) === false) {
    $erros["title"] = "Título ultrapassa a quantidade limite de caracteres!";
}
//Corpo
if (!Validator::body($_POST["body"], 1, 4000)) {
    $erros["body"] = "Anotações devem ter entre 1 e 4000 caracteres!";
}

if (!empty($erros)) {
    view("notes/edit.view", ["erros" => $erros]);
} else {
    $db->exec(
        "UPDATE notas SET title = :title, body = :body WHERE id_nota = :id;",
        [
            "title" => $_POST["title"],
            "body" => trim($_POST["body"]),
            "id" => $_GET["id"],
        ]
    );
    confirmar("Nota Atualizada com sucesso!", "/notas");
}
?>
