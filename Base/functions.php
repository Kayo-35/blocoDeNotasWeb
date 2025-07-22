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
    redirect($path);
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
    require path("Http/controllers/responses/error.php");
    die();
}

function redirect($path)
{
    header("location: {$path}");
    die();
}

//Tags Helper
function cor() : string {
    $cores = [
        "danger",
        "success",
        "primary",
        "secondary",
        "warning",
    ];

    $key = array_rand($cores);
    return $cores[$key];
}
?>
