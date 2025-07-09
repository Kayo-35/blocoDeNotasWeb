<?php
use Base\Response;
use Base\Database;
require path("env.php");

$db = new Database(
    $env["database"]["host"],
    $env["database"]["user"],
    $env["database"]["dbName"],
    $env["database"]["port"],
    $env["database"]["password"]
);
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
