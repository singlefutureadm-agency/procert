<?php
class Auth
{
    // Exigir que esteja logado para acessar páginas protegidas
    public static function exigirLogin()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Aqui verificamos a SESSÃO correta (usuario)
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
    }

    // Usado quando login for realizado com sucesso
    public static function login($usuarioData)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Aqui salva os dados completos do usuário
        $_SESSION['usuario'] = $usuarioData;
    }

    // Finaliza a sessão
    public static function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();
        header("Location: " . BASE_URL . "login");
        exit;
    }
}
