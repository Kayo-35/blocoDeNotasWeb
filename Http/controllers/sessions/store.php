<?php
use Base\Authenticator;
use Http\Forms\LoginForm;
use Http\Forms\User;

$user = new User();
$user->setup();

$form = new LoginForm();

if ($form->validar($user)) {
    $auth = new Authenticator();

    if ($auth->attempt($user)) {
        redirect("/");
    } else {
        $form->addError("password", "Usuário ou senha incorretos!");
    }
}

//Caso autenticação falhe
return view("/sessions/create.view", [
    "erros" => $form->getErros(),
]);
?>
