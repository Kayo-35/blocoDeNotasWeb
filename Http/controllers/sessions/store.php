<?php
use Base\Authenticator;
use Base\Session;
use Http\Forms\LoginForm;
use Http\Forms\User;

$user = new User();
$user->setup();

$form = new LoginForm();

if ($form->validar($user)) {
    $auth = new Authenticator();
    if ($auth->attempt($user)) {
        $auth->login($user);
    }
    $form->addError("password", "Usuário ou senha incorretos!");
}

//Caso autenticação falhe
Session::flash("erros", $form->getErros());
redirect("/login");
?>
