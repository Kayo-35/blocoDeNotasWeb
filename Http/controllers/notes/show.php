<?php
use Base\Response;
use Base\Database;
use Base\App;

$db = App::resolve(Database::class);
$db->connect();

session_start();
$cod = $_GET["id"];

//Tratamento de requsições GET(Acessar a página)
$bloco = 'select id_nota,id_user,body,DATE_FORMAT(dt_nota,"%d/%m/%Y")
    as dt_nota from notas where id_nota =';
$lista = $db->exec($bloco . " :id", ["id" => $cod])->findOrAbort();

authorize(
    $lista["id_user"] === $_SESSION["userCode"],
    Response::FORBIDDEN,
    "Acesso não autorizado"
);

view("notes/show.view", [
    "lista" => $lista,
    "url" => $url,
]);
?>
