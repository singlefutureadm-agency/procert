<?php

class LoginController extends Controller
{


    public function index()
    {

        $dados = array();

        $dados['mensagem'] = 'Bem-vindo a Procert';

    

        $this->carregarViews('login', $dados);
    }
}
