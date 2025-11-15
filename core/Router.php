<?php

class Router
{
    private $routes = [];

    public function get($route, $controllerAction)
    {
        $this->routes['GET'][$route] = $controllerAction;
    }

    public function post($route, $controllerAction)
    {
        $this->routes['POST'][$route] = $controllerAction;
    }

    public function run()
    {
        $url = $_GET['url'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        // Se a URL começar com /, remove
        if ($url !== '/' && str_starts_with($url, '/')) {
            $url = substr($url, 1);
        }

        // Se não existir rota registrada
        if (!isset($this->routes[$method]['/' . $url])) {
            http_response_code(404);
            echo "404 - Página não encontrada!";
            return;
        }

        // Pega controller e action
        list($controllerName, $methodName) = explode('@', $this->routes[$method]['/' . $url]);

        // Carrega controller
        $controllerFile = __DIR__ . '/../app/controllers/' . $controllerName . '.php';
        if (!file_exists($controllerFile)) {
            die("Controller $controllerName não encontrado.");
        }

        require_once $controllerFile;
        $controller = new $controllerName();

        if (!method_exists($controller, $methodName)) {
            die("Método $methodName não existe no controller $controllerName.");
        }

        $controller->$methodName();
    }
}
