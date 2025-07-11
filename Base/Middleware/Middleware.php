<?php
namespace Base\Middleware;
class Middleware
{
    public const MAP = [
        "logged" => Logged::class,
        "guest" => Guest::class,
    ];
    public static function resolve($key)
    {
        if (!$key) {
            return;
        }
        $middleware = static::MAP[$key] ?? false;
        if (!isset($middleware)) {
            throw new \Exception(
                "Nenhum middleware encontrado referente a esse acesso para a chave {$key}!"
            );
        }
        (new $middleware())->handle();
    }
}
?>
