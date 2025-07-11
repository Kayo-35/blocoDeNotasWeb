<?php
use Base\Validator;
use Base\Database;
use Base\App;
$email = $_POST["email"];
$password = $_POST["password"];

$erros = [];
if (!Validator::email($_POST["email"])) {
    $erros["email"] = "Insira um email válido!";
}
if (!Validator::string($_POST["password"])) {
    $erros["password"] = "Insira uma senha com ao menos 7 caracteres!";
}

if (!empty($erros)) {
    return view("/sessions/create.view", [
        "erros" => $erros,
    ]);
}

$db = App::resolve(Database::class);
$db->connect();
$user = $db
    ->exec("SELECT * FROM usuario WHERE email = :email;", [
        "email" => $email,
    ])
    ->find();

if (isset($user["id_user"])) {
    if (password_verify($password, $user["password"])) {
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
