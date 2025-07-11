<?php
//Rotas básicas
$router->get("/", "controllers/home.php");
$router->get("/about", "controllers/about.php");
$router->get("/contact", "controllers/contact.php");
//Rotas para notas
$router->get("/notas", "controllers/notes/index.php");
$router->get("/nota", "controllers/notes/show.php");
$router->delete("/nota", "controllers/notes/destroy.php");
$router->get("/nota/editar", "controllers/notes/edit.php");
$router->patch("/nota/editar", "controllers/notes/update.php");
$router->get("/notas/criar-nota", "controllers/notes/create.php");
$router->post("/notas/criar-nota", "controllers/notes/store.php");
//Rotas para registro de usuários
$router->get("/registrar/cadastrar", "controllers/registrar/create.php");
$router->post("/registrar/cadastrar", "controllers/registrar/store.php");
//Rotas para respostas de requisições
$router->get("/error", "controllers/responses/error.php");
$router->get("/confirmar", "controllers/responses/confirmar.php");
?>
