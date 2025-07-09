<?php
use Base\App;
use Base\Database;
use Base\Container;
$container = new Container();

$container->bind("Base\Database", function () {
    require path("env.php");
    $db = new Database($env["database"]);
    return $db;
});

App::setContainer($container);
