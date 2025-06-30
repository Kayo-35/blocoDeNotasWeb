<?php
require("functions.php");

$url = parse_url($_SERVER['REQUEST_URI'])['path'];
$urlSet = [
    "/",
    "/about",
    "/contact",
    "/donations",
];

$routes = [
    "/" => "controllers/home.php",
    "/about" => "controllers/about.php",
    "/contact" => "controllers/about.php",
];

if(array_key_exists($url,$routes)) {
    require($routes[$url]);
}
?>
