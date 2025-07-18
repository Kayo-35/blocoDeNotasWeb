<?php
use Base\Database;
use Base\App;

$db = App::resolve(Database::class);
$db->connect();

$nome = "Anotações";

//Gerando dinâmicamente conteúdo das anotações
$_SESSION["userCode"] = $_SESSION["user"]["userCode"];
$notas = $db
    ->exec(
        'select id_nota,title,SUBSTRING_INDEX(body," ",6) as body
    from notas where id_user = :id order by dt_nota desc;',
        ["id" => $_SESSION["userCode"]]
    )
    ->findAll();

$user = $db
    ->exec("select name from usuario where id_user = :id", [
        "id" => $_SESSION["userCode"],
    ])
    ->find();

view("notes/index.view", [
    "nome" => "Anotações",
    "notas" => $notas,
    "user" => $user,
]);

?>
