<?php
use Base\App;
use Base\Validator;
use Base\Database;
session_start();

$db = App::resolve(Database::class);
$db->connect();

$tags = $_POST["tags"] ?? [];
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
if (!Validator::qtItens($tags,3,0)) {
    $erros["tags"] = "Três(3) tags é o máximo!";
}

if (empty($erros)) {
    //Criação da Nota
    $query = "
        INSERT INTO notas (id_user,title,body,dt_nota)
        VALUES (:id_user,:title,:body,:dt_nota);";
    $db->exec($query, [
        "id_user" => $_SESSION["userCode"],
        "title" => $_POST["title"],
        "body" => trim($_POST["body"]), //trim impede blocos de espaços aleatórios
        "dt_nota" => date("Y-m-d"),
    ]);

    //Inserção das tags
    if (!empty($tags)) {
        $id_nota = $db->exec("SELECT MAX(id_nota) as idNota FROM notas;")->find()["idNota"];
        foreach($tags as $idTag) {
            $query = "INSERT INTO notas_tags(id_nota,id_tag)
                VALUES(:id_nota,:id_tag);";
            $db->exec($query,
                [
                    "id_nota" => $id_nota,
                    "id_tag" => $idTag,
                ]
            );
        }
        confirmar("Nota criada com Sucesso!", "/notas");
    }
}
else {
    //Redireciona o usuário com mensagens de erro
    $tags = $db->exec("SELECT id_tag,nm_tag FROM tag;")->findAll();
    view("notes/create.view", [
        "erros" => $erros,
        "tags" => $tags,
    ]);
}
