<?php
use Base\Response;
use Base\Database;
use Base\App;

$db = App::resolve(Database::class);
$db->connect();

$cod = $_GET["id"];

//Tratamento de requsições GET(Acessar a página)
$bloco = 'select id_nota,id_user,body,DATE_FORMAT(dt_nota,"%d/%m/%Y")
    as dt_nota from notas where id_nota =';
$lista = $db->exec($bloco . " :id", ["id" => $cod])->findOrAbort();

$tags = $db
    ->exec(
        "SELECT t.id_tag,t.nm_tag FROM tag AS t
            INNER JOIN notas_tags AS nt on t.id_tag = nt.id_tag
            INNER JOIN notas AS n on nt.id_nota = n.id_nota
            WHERE n.id_nota = :id;",
        ["id" => $cod],
    )
    ->findAll();

authorize(
    $lista["id_user"] === $_SESSION["userCode"],
    Response::FORBIDDEN,
    "Acesso não autorizado",
);

view("notes/show.view", [
    "lista" => $lista,
    "url" => $url,
    "tags" => $tags,
]);
?>
