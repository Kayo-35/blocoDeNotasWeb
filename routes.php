<?php
//Rotas básicas
$router->get("/", "/home.php");
$router->get("/about", "/about.php");
$router->get("/contact", "/contact.php");

//Rotas para notas
$router->get("/notas", "/notes/index.php")->only("logged");
$router->get("/nota", "/notes/show.php")->only("logged");
$router->delete("/nota", "/notes/destroy.php")->only("logged");
$router->get("/nota/editar", "/notes/edit.php")->only("logged");
$router->patch("/nota/editar", "/notes/update.php")->only("logged");
$router->get("/notas/criar-nota", "/notes/create.php")->only("logged");
$router->post("/notas/criar-nota", "/notes/store.php")->only("logged");

//Rotas para registro e login de usuários
$router->get("/registrar", "/registrar/create.php")->only("guest");
$router->post("/registrar", "/registrar/store.php")->only("guest");
$router->get("/login", "/sessions/create.php")->only("guest");
$router->post("/login", "/sessions/store.php")->only("guest");
$router->delete("/login", "/sessions/destroy.php")->only("logged");

//Rotas para respostas de requisições
$router->get("/error", "/responses/error.php");
$router->get("/confirmar", "/responses/confirmar.php");
?>
