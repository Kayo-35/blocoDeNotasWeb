<?php

use Base\Session;

$nome = "Log In";
view("sessions/create.view", [
    "erros" => Session::get("erros") ?? [],
    "nome" => $nome,
]);
?>
