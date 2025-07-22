<?php
use Base\App;
use Base\Database;
use Http\Forms\Notas;

$db = App::resolve(Database::class);
$db->connect();
$nota = new Notas($db);
$tags = $_POST["tags"] ?? [];

$erros = [];
$result = $nota->setTitle($_POST["title"]);
if ($result === false) {
    $erros["title"] = "Título ultrapassa a quantidade limite de caracteres!";
}
$result = $nota->setBody($_POST["body"]);
if ($result === false) {
    $erros["body"] = "Anotações devem ter entre 1 e 4000 caracteres!";
}
$result = $nota->setTags($tags);
if($result === false) {
    $erros["tags"] = "Três(3) tags é o máximo!";
}

if (empty($erros)) {
    $nota->storeNote($_SESSION["userCode"]);
    if (!empty($tags)) {
        $nota->storeTags();
        confirmar("Nota criada com Sucesso!", "/notas");
    }
}
else {
    $tags = $nota->getTagList();
    view("notes/create.view", [
        "erros" => $erros,
        "tags" => $tags,
    ]);
}
