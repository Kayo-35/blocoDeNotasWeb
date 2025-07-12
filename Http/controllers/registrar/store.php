<?php
use Base\Authenticator;
use Http\Forms\LoginForm;
use Http\Forms\User;

$user = new User();
$user->setup();

$form = new LoginForm();

if (!$form->validar($user)) {
    return view("registrar/create.view", [
        "erros" => $form->getErros(),
    ]);
}

$result = $user->search();

if (!empty($result)) {
    $erros["login"] = "Usuario já cadastrado! Realize login ao invés!";
    return view("registrar/create.view", [
        "erros" => $erros,
    ]);
}
$user->register($user);

//Armazena em sessão o acesso
$auth = new Authenticator();
$auth->login($user);

confirmar("Usuário Cadastrado!", "/notas");
?>
