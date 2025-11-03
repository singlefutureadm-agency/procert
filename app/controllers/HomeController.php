<?php

class HomeController extends Controller
{


    public function index()
    {

        $dados = array();

        $dados['mensagem'] = 'Bem-vindo a Procert';

    

        $this->carregarViews('home', $dados);
    }
}
