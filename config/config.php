<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

// URL base
define("BASE_URL","http://localhost/procert/public/");

// Configuração do Banco de Dados
define("DB_HOST", "db_procert_dev.mysql.dbaas.com.br");
define("DB_NAME", "db_procert_dev");
define("DB_USER", "db_procert_dev");
define("DB_PASS", "Procert@2025");

// Configuração do Email
define('EMAIL_HOST', 'smtp.hostinger.com');
define('EMAIL_PORT', '465');
define('EMAIL_USER', 'innovaclicktipi02@smpsistema.com.br');
define('EMAIL_PASS', 'Senac@tipi02');


// ======== FUNÇÃO DE CONEXÃO PDO (O QUE FALTAVA!) ========
function getPDO()
{
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        return new PDO($dsn, DB_USER, DB_PASS, $options);

    } catch (PDOException $e) {
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
}


// ======== AUTOLOAD ========
spl_autoload_register(function ($classe){

    if(file_exists('../app/controllers/' . $classe .'.php')){
        require_once '../app/controllers/'. $classe .'.php';
    }

    if(file_exists('../app/models/'. $classe .'.php')){
        require_once '../app/models/'. $classe .'.php';
    }

    if(file_exists('../core/'. $classe .'.php')){
        require_once '../core/'. $classe .'.php';
    }
});
