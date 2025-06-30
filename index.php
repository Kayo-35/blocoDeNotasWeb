<?php
require("functions.php");
$url = parse_url($_SERVER['REQUEST_URI'])['path'];
$urlSet = [
    "/",
    "/about",
    "/contact",
    "/donations",
];
switch($url) {
    case ("/") :
        require("controllers/home.php");
        break;
    case ("/about") :
        require("controllers/about.php");
        break;
    case ("/contact") :
        require("controllers/about.php");
        break;
    default :
        require("controllers/home.php");
        break;
}
?>
