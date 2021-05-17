<?php

require_once("../models/Pessoa.php");
require_once("../models/Categoria.php");

class AgendaController
{
    private $pessoaDb;
    private $categoriaDb;

    function __construct()
    {
        $this->pessoaDb = new Pessoa();
        $this->categoriaDb = new Categoria();
    }

    public function listagem()
    {
        $listaDados = $this->pessoaDb->findAll();

        return $listaDados;
    }

    public function buscar()
    {
        $busca = $this->pessoaDb->search(utf8_decode($_POST['valor']));

        return $busca;
    }

    public function editar()
    {
        $pessoa = $this->pessoaDb->findRow($_GET['id']);

        return $pessoa;
    }

    public function getCategorias()
    {
        $categorias = $this->categoriaDb->findAll();

        return $categorias;
    }

    public function adicionar()
    {
        if ($this->validar()) {
            // Trata valor telefone
            $caracteres = ['(', ')', '-', ' '];
            $telefone = str_replace($caracteres, '', $_POST['telefone']);
            // Adiciona ao db
            $adicionar = $this->pessoaDb->insertRow(utf8_decode($_POST["nome"]), $telefone, $_POST["email"], utf8_decode($_POST["cidade"]), utf8_decode($_POST["estado"]), $_POST["categoria"]);

            if ($adicionar) {
                $url = "listagem.php?messagem=Agenda adicionada com sucesso";
            } else {
                $url = "formulario.php?messagem=Ocorreu um erro ao adicionar";
            }

            header("Location: {$url}");
        }

        return false;
    }

    public function atualizar()
    {
        if ($this->validar()) {
            // Trata valor telefone
            $caracteres = ['(', ')', '-', ' '];
            $telefone = str_replace($caracteres, '', $_POST['telefone']);
            // Adiciona ao db
            $adicionar = $this->pessoaDb->updateRow($_POST['id'], utf8_decode($_POST["nome"]), $telefone, $_POST["email"], utf8_decode($_POST["cidade"]), utf8_decode($_POST["estado"]), $_POST["categoria"]);

            if ($adicionar) {
                $url = "listagem.php?messagem=Agenda atualizada com sucesso";
            } else {
                $url = "formulario.php?id={$_POST['id']}&messagem=Ocorreu um erro ao atualizar";
            }

            header("Location: {$url}");
        }

        return false;
    }

    // Valida form
    private function validar()
    {
        $msgErro = '';

        foreach ($_POST as $key => $post) {
            if ($post == '') {
                $msgErro = $key . " inválido!";
            }
        }


        if ($msgErro != '') {
            if (headers_sent() === false) {
                $url = "formulario.php" . (isset($_POST['id'])) ? "?id={$_POST['id']}" : '';
                header("Location: {$url}&messagem={$msgErro}");
            }
            return false;
        }

        return true;
    }
}
