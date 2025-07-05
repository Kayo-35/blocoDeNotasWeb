<?php
global $url;
$url = parse_url($_SERVER['REQUEST_URI'])['path'];

const ROUTES = [
    "/" => "controllers/home.php", //Home page
    "/about" => "controllers/about.php",
    "/contact" => "controllers/about.php",
    "/notas" => "controllers/painelNotas.php", //Painel de Notas
    "/notas/criar-nota" => "controllers/criaNotas.php", //Controla criação de notas
    "/exibir" => "controllers/exibir.php", //Exibir uma nota única
    "/error" => "controllers/error.php", //Tratamento de erros
    "/confirmar" => "controllers/confirmar.php"
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
        abort(404,'/error');
    }
}

routing($url);
?>
