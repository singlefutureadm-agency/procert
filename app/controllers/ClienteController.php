a<?php

class ClientesController extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Método para acessar o dashboard do cliente
    public function dashboard()
    {
        // Verifica se o usuário está logado como cliente
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'cliente') {
            header('Location:' . BASE_URL); // Redireciona para a página inicial
            exit;
        }

        $dados = array();

        // Aqui você pode adicionar dados do cliente se precisar
        // Ex: $dados['cliente'] = $_SESSION['userEmail'];

        $dados['conteudo'] = 'dash/cliente/dashboard'; // view do dashboard
        $this->carregarViews('dash/dashboard', $dados);
    }
}
