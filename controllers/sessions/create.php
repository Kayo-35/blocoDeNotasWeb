<?php
$nome = "Log In";
view("sessions/create.view", [
    "erros" => isset($erros) ? $erros : [],
    "nome" => $nome,
]);
?>
