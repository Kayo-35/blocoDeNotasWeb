<?php
$url = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    "/" => "controllers/home.php",
    "/about" => "controllers/about.php",
    "/contact" => "controllers/about.php",
    "/notas" => "controllers/painelNotas.php",
    "/exibir" => "controllers/exibir.php",
    "/error" => "controllers/error.php"
];

function routing($url,$routes) {
    if(array_key_exists($url,$routes)) {
        require($routes[$url]);
    }
    else {
        abort(404,$routes);
    }
}

routing($url,$routes);
?>
