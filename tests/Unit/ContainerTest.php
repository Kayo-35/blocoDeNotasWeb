<?php
use Base\Database;
use Base\Container;
test(
    "Consegue resolver conexão a base de dados a partír do container",
    function () {
        //Preparar
        $container = new Container();
        $container->bind("Base\Database", function () {
            require __DIR__ . "/../../env.php";
            $db = new Database($env["database"]);
            return $db;
        });
        //Agir
        $result = $container->resolve(Database::class);
        //Analisar resultados
    }
);
