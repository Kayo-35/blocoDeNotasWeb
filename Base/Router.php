<?php
namespace Base;
use Base\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function route($url, $method)
    {
        foreach ($this->routes as $route) {
            if (
                $url === $route["url"] &&
                $route["method"] == strtoupper($method)
            ) {
                Middleware::resolve($route["middleware"]);
                return require path("Http/controllers" . $route["controller"]);
                die();
            }
        }
        abort(403, "Nenhuma página fora encontrada!");
    }
    public function add($url, $controller, $method)
    {
        $this->routes[] = [
            "url" => $url,
            "controller" => $controller,
            "method" => $method,
            "middleware" => null,
        ];
        return $this;
    }
    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]["middleware"] = $key;
        return $this;
    }
    public function redirect()
    {
        redirect($_SERVER["HTTP_REFERER"]) ?? redirect("/");
    }

    public function get($url, $controller)
    {
        return $this->add($url, $controller, "GET");
    }
    public function post($url, $controller)
    {
        return $this->add($url, $controller, "POST");
    }
    public function delete($url, $controller)
    {
        return $this->add($url, $controller, "DELETE");
    }
    public function patch($url, $controller)
    {
        return $this->add($url, $controller, "PATCH");
    }
    public function put($url, $controller)
    {
        return $this->add($url, $controller, "PUT");
    }
}
?>
