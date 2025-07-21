<?php
use Base\App;
use Base\Validator;
use Base\Database;
session_start();

$db = App::resolve(Database::class);
$db->connect();
$codigoNota = $_GET["id"];
$tagsOriginais = array_column(
    $db
        ->exec(
            "SELECT t.id_tag as idTag FROM tag AS t
        INNER JOIN notas_tags AS nt ON t.id_tag = nt.id_tag
        where id_nota = :id",
            ["id" => $codigoNota],
        )
        ->findAll(),
    "idTag",
);

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
if (!Validator::qtItens($tags, 3, 0)) {
    $erros["tags"] = "Três(3) tags é o máximo!";
}

if (!empty($erros)) {
    $tags = $db->exec("SELECT id_tag,nm_tag FROM tag;")->findAll();
    $tagsDaNota = array_column(
        $db
            ->exec(
            "SELECT t.id_tag as idTag FROM tag AS t
                INNER JOIN notas_tags AS nt ON t.id_tag = nt.id_tag
                INNER JOIN notas AS n ON n.id_nota = nt.id_nota
                WHERE n.id_nota = :id",
                    ["id" => $codigoNota],
            )
            ->findAll(),
        "idTag",
    );
    view("notes/edit.view", [
        "erros" => $erros,
        "tags" => $tags,
        "tagsNota" => $tagsDaNota,
    ]);
} else {
    $tagsIncluir = array_diff($tags, $tagsOriginais) ?? [];
    $tagsRemover = array_diff($tagsOriginais, $tags) ?? [];

    //Corpo da Nota
    $db->exec(
        "UPDATE notas SET title = :title, body = :body WHERE id_nota = :id;",
        [
            "title" => $_POST["title"],
            "body" => trim($_POST["body"]),
            "id" => $_GET["id"],
        ],
    );
    //Tags
    if (!empty($tagsRemover)) {
        foreach ($tagsRemover as $cdRemover) {
            $db->exec(
                "DELETE FROM notas_tags WHERE id_nota = :id AND id_tag = :idTag",
                [
                    "id" => $codigoNota,
                    "idTag" => $cdRemover,
                ],
            );
        }
    }
    if (!empty($tagsIncluir)) {
        foreach ($tagsIncluir as $cdIncluir) {
            $db->exec(
                "INSERT INTO notas_tags(id_nota,id_tag) VALUES (:id,:id_tag);",
                [
                    "id" => $codigoNota,
                    "id_tag" => $cdIncluir,
                ],
            );
        }
    }
    confirmar("Nota Atualizada com sucesso!", "/notas");
}
?>
