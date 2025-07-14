<?php
use Base\Router;
use Base\Session;
use Base\ValidationException;

$_SESSION ?? session_start();
require "../Base/functions.php";
const ROOT_DIR = __DIR__ . "/../";

//Autoloader do composer
require path("vendor/autoload.php");
require path("bootstrap.php");

$router = new Router();
require path("routes.php");

$routes = $url = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

try {
    $router->route($url, $method);
} catch (ValidationException $exception) {
    Session::flash("erros", $exception->erros);
    foreach ($exception->old as $key => $valor) {
        Session::flash("old", [
            $key => $valor,
        ]);
    }
    $router->redirect();
}
Session::unset();
?>
