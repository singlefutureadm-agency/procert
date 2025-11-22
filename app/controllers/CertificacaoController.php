<?php

class CertificacaoController extends Controller
{

    private $certificacaoModel;

    public function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instaciar o modelo certificacao
        $this->certificacaoModel = new Certificacao();
    }

    
 // 1- Método para listar todos os serviços
    public function verMais($id_cliente, $id_produto)
    {
        $dados = array();

        
        // Carregar os certificacaos com base no status
        $certificacaoModel = new Certificacao();
        $certificacao = $certificacaoModel->getCertificacaoCompleta($id_cliente, $id_produto);
        $dados['certificacao'] = $certificacao;

        $dados['conteudo'] = 'dash/certificacao/listar';

        if ($_SESSION['id_tipo_usuario'] == '1') {
            $func = new Funcionario();
            $dadosFunc = $func->buscarfuncionario($_SESSION['userEmail']);
            $dados['func'] = $dadosFunc;

            $dados['conteudo'] = 'dash/certificacao/listar';
            $this->carregarViews('dash/dashboard', $dados);
        } else if ($_SESSION['id_tipo_usuario'] == '2') {
            $func = new Funcionario();
            $dadosFunc = $func->buscarfuncionario($_SESSION['userEmail']);
            $dados['func'] = $dadosFunc;

            $dados['conteudo'] = 'dash/certificacao/listar';
            $this->carregarViews('dash/dashboard-funcionario', $dados);
        }
    }

  


 
}
