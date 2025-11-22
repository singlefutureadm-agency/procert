<?php

class AdministradorController extends Controller
{

    private $administradorModel;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Model Funcionário
        $this->administradorModel = new Administrador();
    }

    // ============================================================
    // 1 — LISTAR ADMINISTRADORES
    // ============================================================
    public function listar()
    {
        $dados = array();

        // Busca só usuários com id_tipo_usuario = 1 (ADMIN)
        $admins = $this->administradorModel->getListarAdministrador();
        $dados['admins'] = $admins;

        $dados['conteudo'] = 'dash/administrador/listar';

        // Carrega dashboard conforme tipo de sessão
        if ($_SESSION['id_tipo_usuario'] == '1') {
            $func = new Funcionario();
            $dadosFunc = $func->buscarFuncionario($_SESSION['userEmail']);
            $dados['func'] = $dadosFunc;

            $this->carregarViews('dash/dashboard', $dados);

        } else if ($_SESSION['id_tipo_usuario'] == '2') {
            $func = new Funcionario();
            $dadosFunc = $func->buscarFuncionario($_SESSION['userEmail']);
            $dados['func'] = $dadosFunc;

            $this->carregarViews('dash/dashboard-funcionario', $dados);
        }
    }


    // ============================================================
    // 2 — ADICIONAR ADMINISTRADOR
    // ============================================================
    public function adicionar()
    {
        $dados = array();

       

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome_funcionario     = filter_input(INPUT_POST, 'nome_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $email_funcionario    = filter_input(INPUT_POST, 'email_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $senha_funcionario    = filter_input(INPUT_POST, 'senha_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $status_funcionario   = filter_input(INPUT_POST, 'status_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_uf                = filter_input(INPUT_POST, 'id_uf', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_tipo_usuario      = 1; // ADMINISTRADOR FIXO

            if ($nome_funcionario && $email_funcionario && $senha_funcionario) {

                // Preparar dados
                $dadosAdmin = array(
                    'nome_funcionario'   => $nome_funcionario,
                    'email_funcionario'  => $email_funcionario,
                    'senha_funcionario'  => password_hash($senha_funcionario, PASSWORD_DEFAULT),
                    'id_tipo_usuario'    => $id_tipo_usuario,
                    'status_funcionario' => $status_funcionario,
                    'foto_funcionario'   => '', // será substituído se enviar foto
                    'id_uf'              => $id_uf
                );

                // Inserir no banco
                $id_funcionario = $this->administradorModel->addFuncionario($dadosAdmin);

                if ($id_funcionario) {

                    // Upload de foto, se enviada
                    if (isset($_FILES['foto_funcionario']) && $_FILES['foto_funcionario']['error'] == 0) {

                        $arquivo = $this->uploadFoto($_FILES['foto_funcionario']);

                        if ($arquivo) {
                            $this->administradorModel->updateFotoFuncionario($id_funcionario, $arquivo, $nome_funcionario);
                        }
                    }

                    $_SESSION['mensagem'] = "Administrador cadastrado com sucesso!";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: ' . BASE_URL . 'administrador/adicionar');
                    exit;
                }

                $dados['mensagem'] = "Erro ao cadastrar administrador.";
                $dados['tipo-msg'] = "erro";

            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios.";
                $dados['tipo-msg'] = "erro";
            }
        }

        // Carregar estados
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();

        // Carregar usuário
        $func = new Funcionario();
        $dados['func'] = $func->buscarFuncionario($_SESSION['userEmail']);

        $dados['conteudo'] = 'dash/administrador/adicionar';

        if ($_SESSION['id_tipo_usuario'] == '1') {
            $this->carregarViews('dash/dashboard', $dados);
        } else {
            $this->carregarViews('dash/dashboard-funcionario', $dados);
        }
    }


    // ============================================================
    // 3 — EDITAR ADMINISTRADOR
    // ============================================================
    public function editar($id)
    {
        $dados = array();

        if (!isset($id) || empty($id)) {
            header('Location:' . BASE_URL . 'administrador/editar');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome_funcionario     = filter_input(INPUT_POST, 'nome_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $email_funcionario    = filter_input(INPUT_POST, 'email_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $status_funcionario   = filter_input(INPUT_POST, 'status_funcionario', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_uf                = filter_input(INPUT_POST, 'id_uf', FILTER_SANITIZE_SPECIAL_CHARS);

            $dadosAdmin = array(
                'nome_funcionario'   => $nome_funcionario,
                'email_funcionario'  => $email_funcionario,
                'senha_funcionario'  => '', // só muda se enviar
                'id_tipo_usuario'    => 1,
                'status_funcionario' => $status_funcionario,
                'foto_funcionario'   => '',
                'id_uf'              => $id_uf,
            );

            // Se enviou nova senha
            if (!empty($_POST['senha_funcionario'])) {
                $dadosAdmin['senha_funcionario'] = password_hash($_POST['senha_funcionario'], PASSWORD_DEFAULT);
            } else {
                unset($dadosAdmin['senha_funcionario']);
            }

            // Atualizar
            $this->administradorModel->updateFuncionario($id, $dadosAdmin);

            // Upload de foto
            if (isset($_FILES['foto_funcionario']) && $_FILES['foto_funcionario']['error'] == 0) {

                $arquivo = $this->uploadFoto($_FILES['foto_funcionario']);

                if ($arquivo) {
                    $this->administradorModel->updateFotoFuncionario($id, $arquivo, $nome_funcionario);
                }
            }

            $_SESSION['mensagem'] = "Administrador atualizado com sucesso!";
            $_SESSION['tipo-msg'] = "sucesso";

            header('Location: ' . BASE_URL . 'administrador/listar');
            exit;
        }

        // Buscar admin
        $dados['admin'] = $this->administradorModel->getFuncionarioById($id);

        // Estados
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();

        // Usuário logado
        $func = new Funcionario();
        $dados['func'] = $func->buscarFuncionario($_SESSION['userEmail']);

        $dados['conteudo'] = 'dash/administrador/editar';

        $this->carregarViews('dash/dashboard', $dados);
    }


    // ============================================================
    // UPLOAD DE FOTO
    // ============================================================
    private function uploadFoto($file)
    {
        $dir = '../public/uploads/admin/';

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid() . '.' . $ext;

        if (move_uploaded_file($file['tmp_name'], $dir . $nome_arquivo)) {
            return 'admin/' . $nome_arquivo;
        }

        return false;
    }
}
