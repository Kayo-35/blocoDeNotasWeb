<?php
use Base\App;
use Base\Database;
use Base\Response;

$db = App::resolve(Database::class);
$db->connect();
session_start();
$cod = $_GET["id"];

$lista = $db
    ->exec("SELECT * FROM notas WHERE id_nota = :id;", ["id" => $cod])
    ->findOrAbort();

authorize(
    $_SESSION["userCode"] === $lista["id_user"],
    RESPONSE::FORBIDDEN,
    "Não autorizado!"
);

view("notes/edit.view", [
    "nome" => "Editar",
    "id_nota" => $cod,
    "nota" => $lista,
]);
