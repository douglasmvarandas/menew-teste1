<?php

namespace app\controllers;

use app\model\Agenda;
use Exception;

class Main
{
    public function index()
    {
        $agenda = new Agenda();
        $dados = $agenda->lista_contatos();

        $this::layout([
            'layouts/header',
            'home',
            'layouts/footer',
        ], $dados);
    }

    public static function layout($estruturas, $dados = null) 
    {
        if(!is_array($estruturas)):
            throw new Exception("Coleção de estruturas inválida");
        endif;

        if(!empty($dados) && is_array($dados)):
            extract($dados);
        endif;

        //apresenta as views da aplicação
        foreach($estruturas as $estrutura):
            include("../app/views/$estrutura.php");
        endforeach;
    }

    public function page404()
    {
        $this::layout([
            'layouts/header',
            '404',
            'layouts/footer',
        ]);  
    }
}