<?php
namespace Base;
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
                require path($route["controller"]);
                die();
            }
        }
        abort(403,'Nenhuma página fora encontrada!');
    }
    public function add($url, $controller,$method)
    {
        $this->routes[] = [
            "url" => $url,
            "controller" => $controller,
            "method" => $method
        ];
    }

    public function get($url, $controller)
    {
        $this->add($url, $controller,'GET');
    }
    public function post($url, $controller)
    {
        $this->add($url, $controller,'POST');
    }
    public function delete($url, $controller)
    {
        $this->add($url, $controller, 'DELETE');
    }
    public function patch($url, $controller)
    {
        $this->add($url, $controller, 'PATCH');
    }
    public function put($url, $controller)
    {
        $this->add($url, $controller, 'PUT');
    }
}
?>
