<?php
$url = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    "/" => "controllers/home.php",
    "/about" => "controllers/about.php",
    "/contact" => "controllers/about.php",
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

function abort($code,$routes) {
    http_response_code($code);
    require($routes["/error"]);
    die();
}
routing($url,$routes);
?>
