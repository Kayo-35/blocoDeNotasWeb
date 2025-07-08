<?php
global $url;
$url = parse_url($_SERVER['REQUEST_URI'])['path'];

const ROUTES = [
    "/" => "../controllers/home.php", //Home page
    "/about" => "../controllers/about.php",
    "/contact" => "../controllers/contact.php",
    "/notas" => "../controllers/notes/index.php", //Painel de Notas
    "/exibir" => "../controllers/notes/show.php", //Exibir uma nota única
    "/notas/criar-nota" => "../controllers/notes/create.php", //Controla criação de notas
    "/error" => "../controllers/responses/error.php", //Tratamento de erros
    "/confirmar" => "../controllers/responses/confirmar.php" //Feedback positivo
];

function abort($code = 404,$set = ROUTES,$mensagem) {
    http_response_code($code);
    require($set['/error']);
    die();
}

function routing($url) {
    if(array_key_exists($url,ROUTES)) {
        require(ROUTES[$url]);
    }
    else {
        abort(404,'/error','Não encontrado!');
    }
}

routing($url);
?>
