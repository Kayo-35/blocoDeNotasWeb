<?php
use Base\Response;
use Base\Database;
use Base\App;

$db = App::resolve(Database::class);
$db->connect();

if (!session_start()) {
    session_start();
}

$originalUser = $db
    ->exec("SELECT id_user FROM notas WHERE id_nota = :id", [
        "id" => $_POST["id_nota"],
    ])
    ->findOrAbort()["id_user"];

authorize(
    $originalUser === $_SESSION["userCode"],
    $status = Response::FORBIDDEN,
    "Acesso Negado!"
);

$db->exec("DELETE FROM notas WHERE id_nota = :id", [
    "id" => $_POST["id_nota"],
]);

header("location: /notas");
?>
