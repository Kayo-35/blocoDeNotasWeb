<?php
use Base\Authenticator;
use Http\Forms\LoginForm;
use Http\Forms\User;

$user = new User();
$user->setup();
//Valida os dados fornecidos
$form = new LoginForm($user);
$form->validar($user);

//Verifica se ja há cadastro na base de dados;
$user->check($user, $form);

//Efetura cadastro
$user->register($user, $form);
$auth = new Authenticator();
$auth->login($user);
confirmar("Usuário Cadastrado!", "/confirmar");
?>
