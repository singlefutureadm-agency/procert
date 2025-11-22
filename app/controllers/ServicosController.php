<?php

class ServicosController extends Controller
{

    private $servicoModel;

    public function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instaciar o modelo servico
        $this->servicoModel = new Servico();
    }


    // 1- Método para listar todos os serviços
    public function listar()
    {
        $dados = array();

        
        // Carregar os servicos com base no status
        $servicoModel = new Servico();
        $servico = $servicoModel->getCertificacoes();
        $dados['servicos'] = $servico;

        $dados['conteudo'] = 'dash/servico/listar';

        if ($_SESSION['id_tipo_usuario'] == '1') {
            $func = new Funcionario();
            $dadosFunc = $func->buscarfuncionario($_SESSION['userEmail']);
            $dados['func'] = $dadosFunc;

            $dados['conteudo'] = 'dash/servico/listar';
            $this->carregarViews('dash/dashboard', $dados);
        } else if ($_SESSION['id_tipo_usuario'] == '2') {
            $func = new Funcionario();
            $dadosFunc = $func->buscarfuncionario($_SESSION['userEmail']);
            $dados['func'] = $dadosFunc;

            $dados['conteudo'] = 'dash/servico/listar';
            $this->carregarViews('dash/dashboard-funcionario', $dados);
        }
    }

  



    private function uploadFoto($file)
    {

        // var_dump($file);
        $dir = '../public/uploads/servico/';

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid() . '.' . $ext;


        if (move_uploaded_file($file['tmp_name'], $dir . $nome_arquivo)) {
            return 'servico/' . $nome_arquivo;
        }
        return false;
    }
}
