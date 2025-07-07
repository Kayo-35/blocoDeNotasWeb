<?php
require("../Base/functions.php");
const ROOT_DIR = __DIR__.'/../';

//Função responsável pelo autoload de classes
spl_autoload_register(function ($class) {
    $class = str_replace('\\',DIRECTORY_SEPARATOR,$class);
    $classPath = path("$class.php");

    if(file_exists($classPath)) {
        require path("$class.php");
    }
    else {
        abort(404,ROUTES,'Não encontrado');
    }
});

require(path('Base/router.php')); //Roteamento da aplicação
?>
