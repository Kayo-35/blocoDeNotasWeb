<?php
use Base\Database;
use Http\Forms;
use Base\App;
use Http\Forms\LoginForm;

$atributos = [
    "email" => $_POST["email"],
    "password" => $_POST["password"],
];

$form = new LoginForm();

if (!$form->validar($atributos)) {
    return view("/sessions/create.view", [
        "erros" => $form->getErros(),
    ]);
}

$db = App::resolve(Database::class);
$db->connect();
$user = $db
    ->exec("SELECT * FROM usuario WHERE email = :email;", [
        "email" => $_POST["email"],
    ])
    ->find();

if (isset($user["id_user"])) {
    if (password_verify($_POST["password"], $user["password"])) {
        login($user);
        header("location: /notas");
        die();
    }
}

return view("/sessions/create.view", [
    "erros" => [
        "email" =>
            "Nenhum usuário encontrado relativo ao e-mail e senhas indicados!",
    ],
]);
?>
