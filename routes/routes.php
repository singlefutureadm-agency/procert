<?php

// Obtém a URL acessada
$url = $_GET['url'] ?? 'login';

// Divide a URL em partes
$url = rtrim($url, '/');
$partes = explode('/', $url);

// Controller e método padrão
$controllerName = ucfirst($partes[0]) . "Controller";
$metodo = $partes[1] ?? "index";
$param = $partes[2] ?? null;

// Carrega o controller
$controllerPath = "../app/controllers/" . $controllerName . ".php";

if (!file_exists($controllerPath)) {
    http_response_code(404);
    echo "<h1>404 - Controller não encontrado</h1>";
    exit;
}

require_once $controllerPath;

// Instancia o controller
$controller = new $controllerName();

// Verifica se o método existe
if (!method_exists($controller, $metodo)) {
    http_response_code(404);
    echo "<h1>404 - Método não encontrado</h1>";
    exit;
}

// Chama o método
if ($param) {
    $controller->$metodo($param);
} else {
    $controller->$metodo();
}
