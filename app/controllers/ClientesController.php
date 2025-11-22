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

    // 2- Método para adicionar Alunos
    public function adicionar()
    {


        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email_cliente                  = filter_input(INPUT_POST, 'email_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $nome_cliente                   = filter_input(INPUT_POST, 'nome_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $foto_cliente                   = filter_input(INPUT_POST, 'foto_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $nasc_cliente                   = filter_input(INPUT_POST, 'nasc_cliente', FILTER_SANITIZE_NUMBER_FLOAT);
            $senha_cliente                  = filter_input(INPUT_POST, 'senha_cliente', FILTER_SANITIZE_NUMBER_FLOAT);
            $cpf_cliente                    = filter_input(INPUT_POST, 'cpf_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $cnpj_cliente                   = filter_input(INPUT_POST, 'cnpj_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $cep_cliente                    = filter_input(INPUT_POST, 'cep_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $status_cliente                 = filter_input(INPUT_POST, 'status_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone_cliente               = filter_input(INPUT_POST, 'telefone_cliente', FILTER_SANITIZE_NUMBER_INT);
            $endereco_cliente               = filter_input(INPUT_POST, 'endereco_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $bairro_cliente                 = filter_input(INPUT_POST, 'bairro_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $cidade_cliente                 = filter_input(INPUT_POST, 'cidade_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo_cliente                   = filter_input(INPUT_POST, 'tipo_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_uf                          = filter_input(INPUT_POST, 'id_uf', FILTER_SANITIZE_SPECIAL_CHARS);




            if ($nome_cliente && $email_cliente && $senha_cliente !== false) {


                // 3 Preparar Dados 

                $dadoscliente = array(

                    'nome_cliente'                => $nome_cliente,
                    'foto_cliente'                => $foto_cliente,
                    'cnpj_cliente'                => $cnpj_cliente,
                    'cpf_cliente'                 => $cpf_cliente,
                    'cep_cliente'                 => $cep_cliente,
                    'email_cliente'               => $email_cliente,
                    'nasc_cliente'                => $nasc_cliente,
                    'senha_cliente'               => $senha_cliente,
                    'status_cliente'              => $status_cliente,
                    'telefone_cliente'            => $telefone_cliente,
                    'endereco_cliente'            => $endereco_cliente,
                    'bairro_cliente'              => $bairro_cliente,
                    'cidade_cliente'              => $cidade_cliente,
                    'tipo_cliente'                => $tipo_cliente,
                    'id_uf'                       => $id_uf,

                );

                // 4 Inserir cliente

                $id_cliente = $this->clienteModel->addCliente($dadoscliente);



                if ($id_cliente) {
                    if (isset($_FILES['foto_cliente']) && $_FILES['foto_cliente']['error'] == 0) {


                        $arquivo = $this->uploadFoto($_FILES['foto_cliente']);


                        if ($arquivo) {
                            //Inserir na galeria

                            $this->clienteModel->addFotocliente($id_cliente, $arquivo, $nome_cliente);
                        } else {
                            //Definir uma mensagem informando que não pode ser salva
                        }
                    }


                    // Mensagem de SUCESSO 
                    $_SESSION['mensagem'] = "cliente Cadastrado com Sucesso";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: http://localhost/procert/public/clientes/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao adicionar Ao adcionar cliente";
                    $dados['tipo-msg'] = "erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
                $dados['tipo-msg'] = "erro";
            }
        }


        // Buscar professors 
        $func = new Funcionario();
        $dadosFunc = $func->buscarFuncionario($_SESSION['userEmail']);


        // Buscar Estado
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();



        $dados['conteudo'] = 'dash/cliente/adicionar';
        $dados['func'] = $dadosFunc;

        if ($_SESSION['id_tipo_usuario'] == '1') {
            $func = new Funcionario();
            $dadosFunc = $func->buscarfuncionario($_SESSION['userEmail']);
            $dados['func'] = $dadosFunc;

            $dados['conteudo'] = 'dash/cliente/adicionar';
            $this->carregarViews('dash/dashboard', $dados);
        } else if ($_SESSION['id_tipo_usuario'] == '2') {
            $func = new Funcionario();
            $dadosFunc = $func->buscarfuncionario($_SESSION['userEmail']);
            $dados['func'] = $dadosFunc;

            $dados['conteudo'] = 'dash/cliente/adicionar';
            $this->carregarViews('dash/dashboard-funcionario', $dados);
        }
    }




    public function editar($id = null)
    {


        $dados = array();


        if ($id === null) {
            header('Location: http://localhost/procert/public/clientes/listar');
            exit;
        }




        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Sanitização
            $email_cliente      = filter_input(INPUT_POST, 'email_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $nome_cliente       = filter_input(INPUT_POST, 'nome_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $foto_cliente       = filter_input(INPUT_POST, 'foto_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $nasc_cliente       = filter_input(INPUT_POST, 'nasc_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $senha_cliente      = filter_input(INPUT_POST, 'senha_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $cpf_cliente        = filter_input(INPUT_POST, 'cpf_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $cep_cliente        = filter_input(INPUT_POST, 'cep_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $cnpj_cliente       = filter_input(INPUT_POST, 'cnpj_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $status_cliente     = filter_input(INPUT_POST, 'status_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone_cliente   = filter_input(INPUT_POST, 'telefone_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $endereco_cliente   = filter_input(INPUT_POST, 'endereco_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $bairro_cliente     = filter_input(INPUT_POST, 'bairro_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $cidade_cliente     = filter_input(INPUT_POST, 'cidade_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo_cliente       = filter_input(INPUT_POST, 'tipo_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_uf              = filter_input(INPUT_POST, 'id_uf', FILTER_SANITIZE_SPECIAL_CHARS);


            // Foto do cliente já existente
            $clienteAtual = $this->clienteModel->getclienteById($id);
            $foto_cliente = $clienteAtual['foto_cliente'];

            // Upload da foto (se houver)
              if (isset($_FILES['foto_cliente']) && $_FILES['foto_cliente']['error'] == 0) {


                        $arquivo = $this->uploadFoto($_FILES['foto_cliente']);


                        if ($arquivo) {
                            //Inserir na galeria

                            $this->clienteModel->addFotocliente($id, $arquivo);
                        } else {
                            //Definir uma mensagem informando que não pode ser salva
                        }
                    }


            
            // Montar dados para update
            $dadoscliente = [
                'nome_cliente'      => $nome_cliente,
                'foto_cliente'      => $foto_cliente,
                'cnpj_cliente'      => $cnpj_cliente,
                'cpf_cliente'       => $cpf_cliente,
                'cep_cliente'       => $cep_cliente,
                'email_cliente'     => $email_cliente,
                'nasc_cliente'      => $nasc_cliente,
                'senha_cliente'     => $senha_cliente,
                'status_cliente'    => $status_cliente,
                'telefone_cliente'  => $telefone_cliente,
                'endereco_cliente'  => $endereco_cliente,
                'bairro_cliente'    => $bairro_cliente,
                'cidade_cliente'    => $cidade_cliente,
                'tipo_cliente'      => $tipo_cliente,
                'id_uf'             => $id_uf
            ];

            // Chamar update correto
            $resposta = $this->clienteModel->updateCliente($id, $dadoscliente);

            if (isset($resposta['erro'])) {
                $_SESSION['error'] = $resposta['erro'];
                header("Location: /clientes/editar/$id");
                exit;
            }

            $_SESSION['mensagem'] = "Cliente atualizado com sucesso!";
            $_SESSION['tipo-msg'] = "sucesso";
            header('Location: http://localhost/procert/public/clientes/listar');
            exit;
        }


        // Buscar professors 
        $func = new Funcionario();
        $dadosFunc = $func->buscarFuncionario($_SESSION['userEmail']);


        // Buscar Estado
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();

        $dados['clientes'] = $this->clienteModel->getclienteById($id);


        $dados['conteudo'] = 'dash/cliente/editar';
        $dados['func'] = $dadosFunc;

        if ($_SESSION['id_tipo_usuario'] == '1') {
            $func = new Funcionario();
            $dadosFunc = $func->buscarfuncionario($_SESSION['userEmail']);
            $dados['func'] = $dadosFunc;

            $dados['conteudo'] = 'dash/cliente/editar';
            $this->carregarViews('dash/dashboard', $dados);
        } else if ($_SESSION['id_tipo_usuario'] == '2') {
            $func = new Funcionario();
            $dadosFunc = $func->buscarfuncionario($_SESSION['userEmail']);
            $dados['func'] = $dadosFunc;

            $dados['conteudo'] = 'dash/cliente/editar';
            $this->carregarViews('dash/dashboard-funcionario', $dados);
        }
    }





    private function uploadFoto($file)
    {

        // var_dump($file);
        $dir = '../public/uploads/cliente/';

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid() . '.' . $ext;


        if (move_uploaded_file($file['tmp_name'], $dir . $nome_arquivo)) {
            return 'cliente/' . $nome_arquivo;
        }
        return false;
    }
}
