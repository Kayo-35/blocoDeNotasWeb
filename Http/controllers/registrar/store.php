<?php
use Base\Authenticator;
use Http\Forms\LoginForm;
use Http\Forms\User;
use Base\Session;

$user = new User();
$user->setup();

$form = new LoginForm();

if (!$form->validar($user)) {
    Session::flash("erros", $form->getErros());
    redirect("/registrar/cadastrar");
}

$result = $user->search();

if (!empty($result)) {
    $form->addError("login", "Usuário já cadastrado! Realize login ao invés!");
    Session::flash("erros", $form->getErros());
    Session::flash("old", [
        "name" => $user->name,
        "email" => $user->email,
    ]);
    redirect("/registrar/cadastrar");
}

$user->register($user);

//Armazena em sessão o acesso
$auth = new Authenticator();
$auth->login($user);

confirmar("Usuário Cadastrado!", "/confirmar");
?>
