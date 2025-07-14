<?php

it("Valida strings", function () {
    $result = Base\Validator::string("Banana");
    expect($result)->toBe(true);
});

it("Valida uma string com um número máximo de caracteres", function () {
    $result = Base\Validator::string("Maçã", 4, 4);
    expect($result)->toBe(true);
    /*Resultado obtido: Primeramente retornou-se teste falho devido a função strlen que utilizei
    originalmente para testes não analisar corretamente caracteres não ASCII, sendo assim maçã, da
    qual seria representada pelo código de codificação UTF-8 retorna 6 como lenght, o que indica em
    bytes. Substitui então por mb_strlen() da qual permite incluir o padrão de codificação a ser utilizado*/
});

it("Valida um email", function () {
    $result = Base\Validator::email("kayo@gmail.com");
    expect($result)->toBe(false);
})->only();
