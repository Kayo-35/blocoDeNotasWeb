<?php
use Base\Validator;
use Base\Database;
use Base\App;
use Http\Forms;
use Http\Forms\LoginForm;

$atributos = [
    "name" => $_POST["name"],
    "email" => $_POST["email"],
    "password" => $_POST["password"],
];

$form = new LoginForm();

if (!$form->validar($atributos)) {
    return view("registrar/create.view", [
        "erros" => $form->getErros(),
    ]);
}

$db = App::resolve(Database::class);
$db->connect();

$result = $db
    ->exec("SELECT COUNT(id_user) as qt FROM usuario WHERE email = :email;", [
        "email" => $atributos["email"],
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
