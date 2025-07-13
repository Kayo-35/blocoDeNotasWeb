<?php

use Base\Session;

$nome = "Log In";
view("sessions/create.view", [
    "erros" => Session::get("erros") ?? [],
    "old" => Session::get("old") ?? [],
    "nome" => $nome,
]);
?>
