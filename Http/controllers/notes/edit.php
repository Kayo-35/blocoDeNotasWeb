<?php
use Base\App;
use Base\Database;
use Base\Response;

$db = App::resolve(Database::class);
$db->connect();
$cod = $_GET["id"];

$lista = $db
    ->exec("SELECT * FROM notas WHERE id_nota = :id;", ["id" => $cod])
    ->findOrAbort();
$tags = $db
    ->exec("SELECT id_tag,nm_tag FROM tag;")
    ->findAll();
$tagsDaNota = array_column($db
    ->exec
    ("SELECT t.id_tag as idTag FROM tag AS t
        INNER JOIN notas_tags AS nt ON t.id_tag = nt.id_tag
        INNER JOIN notas AS n ON n.id_nota = nt.id_nota
        WHERE n.id_nota = :id",[ "id" => $cod,])
    ->findAll(),"idTag");

authorize(
    $_SESSION["userCode"] === $lista["id_user"],
    RESPONSE::FORBIDDEN,
    "Não autorizado!"
);

view("notes/edit.view", [
    "nome" => "Editar",
    "id_nota" => $cod,
    "url" => $url,
    "nota" => $lista,
    "tags" => isset($tags) ? $tags : [],
    "tagsNota" => isset($tagsDaNota) ? $tagsDaNota : [],
]);
