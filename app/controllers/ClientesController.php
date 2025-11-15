<?php

class ClientesController extends Controller
{

    private $clienteModel;

    public function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instaciar o modelo cliente
        $this->clienteModel = new Cliente();
    }


    // 1- Método para listar todos os serviços
    public function listar()
    {
        $dados = array();

        $status = isset($_GET['status']) ? $_GET['status'] : null;  // Pega o status da URL ou usa 'Ativo' por padrão

        // Carregar os clientes com base no status
        $clienteModel = new Cliente();
        $cliente = $clienteModel->getListarCliente($status);
        $dados['clientes'] = $cliente;

        $dados['conteudo'] = 'dash/cliente/listar';

        if ($_SESSION['id_tipo_usuario'] == '1') {
            $func = new Funcionario();
            $dadosFunc = $func->buscarfuncionario($_SESSION['userEmail']);
            $dados['func'] = $dadosFunc;

            $dados['conteudo'] = 'dash/cliente/listar';
            $this->carregarViews('dash/dashboard', $dados);
        } else if ($_SESSION['id_tipo_usuario'] == '2') {
            $func = new Funcionario();
            $dadosFunc = $func->buscarfuncionario($_SESSION['userEmail']);
            $dados['func'] = $dadosFunc;

            $dados['conteudo'] = 'dash/cliente/listar';
            $this->carregarViews('dash/dashboard-funcionario', $dados);
        }
    }


}
