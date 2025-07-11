<?php
use Base\Validator;
use Base\Database;
use Base\App;

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$erros = [];
if (!Validator::string($name, 1, 50)) {
    $erros["name"] = "Insira um nome entre 1 e 50 caracteres";
}
if (!Validator::email($email)) {
    $erros["email"] = "Insira um email válido!";
}
if (!Validator::string($password, 7, 255)) {
    $erros["password"] = "Insira uma senha com no mínimo 7 caracteres!";
}

if (!empty($erros)) {
    return view("registrar/create.view", [
        "erros" => $erros,
    ]);
}

$db = App::resolve(Database::class);
$db->connect();

$result = $db
    ->exec("SELECT COUNT(id_user) as qt FROM usuario WHERE email = :email;", [
        "email" => $email,
    ])
    ->findOrAbort();

if ($result["qt"] !== 0) {
    $erros["login"] = "Usuario já cadastrado! Realize login ao invés!";
    return view("registrar/create.view", [
        "erros" => $erros,
    ]);
}

$db->exec(
    "INSERT INTO usuario(name,email,password) VALUES (:name,:email,:password);",
    [
        "name" => $name,
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT),
    ]
);

$user = $db
    ->exec("SELECT id_user,name,email FROM usuario WHERE email = :email", [
        "email" => $email,
    ])
    ->find();

//Armazena em sessão o acesso
login($user);

confirmar("Usuário Cadastrado!", "/notas");
?>
