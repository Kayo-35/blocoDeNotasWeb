<?php
global $url;
$url = parse_url($_SERVER['REQUEST_URI'])['path'];

const ROUTES = [
    "/" => "controllers/home.php",
    "/about" => "controllers/about.php",
    "/contact" => "controllers/about.php",
    "/notas" => "controllers/painelNotas.php",
    "/exibir" => "controllers/exibir.php",
    "/error" => "controllers/error.php",
    "/ops" => "controllers/ops.php"
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
