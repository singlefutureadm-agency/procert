<?php


// Sempre começa carregando a config (BD, BASE_URL, autoload)
require_once __DIR__ . '/../config/config.php';

// Carrega o sistema de rotas
require_once __DIR__ . '/../core/Router.php';

// Carrega o arquivo com suas rotas
require_once __DIR__ . '/../routes/routes.php';

// Inicializa o Router
$router = new Router();


// Inicia o roteamento
$router->run();

