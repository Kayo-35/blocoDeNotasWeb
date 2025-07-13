<?php
use Base\Authenticator;
use Base\ValidationException;
use Http\Forms\LoginForm;
use Http\Forms\User;

$user = new User();
$user->setup();

$form = (new LoginForm($user))->validar();
$auth = new Authenticator();
if ($auth->attempt($user)) {
    $auth->login($user);
}
$form->addError("password", "Usuário ou senha incorretos!")->throw();
ValidationException::throw($form->getErros(), $user);
?>
