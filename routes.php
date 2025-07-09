<?php
//Rotas básicas
$router->get("/", "controllers/home.php");
$router->get("/about", "controllers/about.php");
$router->get("/contact", "controllers/contact.php");
//Rotas para notas
$router->get("/notas", "controllers/notes/index.php");
$router->get("/nota", "controllers/notes/show.php");
$router->delete("/nota", "controllers/notes/destroy.php");
$router->get("/notas/criar-nota", "controllers/notes/create.php");
$router->post("/notas/criar-nota", "controllers/notes/store.php");
//Rotas para respostas de requisições
$router->get("/error", "controllers/responses/error.php");
$router->get("/confirmar", "controllers/responses/confirmar.php");
?>
