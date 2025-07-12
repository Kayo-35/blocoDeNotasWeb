<?php
$nome = "Criar Conta";

view("registrar/create.view", [
    "erros" => isset($erros) ? $erros : [],
]);
