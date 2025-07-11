<?php
use Base\Response;

//Verificar se o caminho requisitado em urls é o mesmo presente como título de paginas
function isUrl($value)
{
    return $_SERVER["REQUEST_URI"] === $value;
}

//Exibe valores de vetores de forma formatada
function varStats($item)
{
    echo "<pre>";
    var_dump($item);
    echo "</pre";
    die();
}

function authorize($condition, $status = Response::FORBIDDEN, $mensagem)
{
    if ($condition === false) {
        abort($status, $mensagem);
    }
}

function confirmar($titulo = "Ação bem sucedida!", $path)
{
    require "../controllers/responses/confirmar.php";
    varStats($titulo);
    die();
}

function path($sufix)
{
    return ROOT_DIR . $sufix;
}

function view($path, $params = ["nome" => "Bloco de notas Web"])
{
    require path("views/$path.php", $params);
}

function abort($code = 404, $mensagem)
{
    http_response_code($code);
    require "../controllers/responses/error.php";
    die();
}

function login($user)
{
    $_SESSION["user"] = [
        "name" => $user["name"],
        "email" => $user["email"],
        "userCode" => $user["id_user"],
    ];

    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];
    session_destroy();
    //Destuindo o cookie local do browser
    $params = session_get_cookie_params();
    setcookie(
        "PHPSESSID",
        "",
        time() - 3600,
        $params["path"],
        $params["domain"],
        $params["httponly"]
    );
}
?>
