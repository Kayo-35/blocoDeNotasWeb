<?php
//Rotas de acesso da aplicação
// $routes = [
//     "/" => "../controllers/home.php", //Home page
//     "/about" => "../controllers/about.php",
//     "/contact" => "../controllers/contact.php",
//     "/notas" => "../controllers/notes/index.php", //Painel de Notas
//     "/exibir" => "../controllers/notes/show.php", //Exibir uma nota única
//     "/notas/criar-nota" => "../controllers/notes/create.php", //Controla criação de notas
//     "/error" => "../controllers/responses/error.php", //Tratamento de erros
//     "/confirmar" => "../controllers/responses/confirmar.php" //Feedback positivo
// ];

$router->get('/','controllers/home.php');
$router->get('/about','controllers/about.php');
$router->get('/contact', 'controllers/contact.php');
$router->get('/notas', 'controllers/notes/index.php');
$router->get('/exibir', 'controllers/notes/show.php');
$router->get('/notas/criar-nota', 'controllers/notes/create.php');
$router->get('/error', 'controllers/responses/error.php');
$router->get('/confirmar', 'controllers/responses/confirmar.php');
?>
