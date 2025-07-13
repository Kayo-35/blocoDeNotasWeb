<?php

use Base\Session;

$nome = "Criar Conta";
view("registrar/create.view", [
    "nome" => $nome,
    "erros" => Session::get("erros") ?? [],
]);
