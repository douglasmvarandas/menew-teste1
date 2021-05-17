<?php

namespace app\controllers;

use app\model\Agenda;

class AgendaController
{
    public function adicionar()
    {
        Main::layout([
            'layouts/header',
            'adicionar',
            'layouts/footer',
        ]);
    }

    public function save_contato()
    {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = trim($_POST['email']);
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $categoria = $_POST['categoria'];

        //verificações do form
        $erro = false;

        if(empty($nome) || strlen($nome) < 3) {
            $_SESSION['nome_erro'] = 'Campo nome não pode ser vazio ou com menos de 3 caracteres.';
            $erro = true;
        }

        if(empty($telefone) || strlen($telefone) < 8) {
            $_SESSION['telefone_erro'] = 'Campo nome não pode ser vazio ou com menos de 8 caracteres.';
            $erro = true;            
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['email_erro'] = "Endereço de email inválido";
            $erro = true;
        }

        if(empty($cidade) || strlen($cidade) < 3) {
            $_SESSION['cidade_erro'] = 'Campo cidade não pode ser vazio.';
            $erro = true;
        }

        if(empty($estado)) {
            $_SESSION['estado_erro'] = 'Escolha um estado.';
            $erro = true;
        }

        if(empty($categoria)) {
            $_SESSION['categoria_erro'] = 'Escolha uma categoria.';
            $erro = true;
        }

        $agenda = new Agenda();
        $verifica_email = $agenda->verificar_email_existe($email);

        if($verifica_email){
            $_SESSION['email_erro'] = "Email já existente no sistema. Tente outro.";
            $erro = true;
        }

        if($erro == true) {
            $_SESSION['temp_dados']['nome'] = $nome;
            $_SESSION['temp_dados']['telefone'] = $telefone;
            $_SESSION['temp_dados']['email'] = $email;
            $_SESSION['temp_dados']['cidade'] = $cidade;
            $_SESSION['temp_dados']['estado'] = $estado;
            $_SESSION['temp_dados']['categoria'] = $categoria;

            header("location: {$_SERVER['HTTP_REFERER']}");
            return;
        }

        $agenda->save_contato($nome, $email, $telefone, $cidade, $estado, $categoria);

        header('Location: ?p=adicionar&add=ok'); 

    }

        public function edit()
    {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            header('Location: ?p=home'); 
            return;
        }

        $agenda = new Agenda();
        $dados = $agenda->lista_contato_id($id)[0];

        Main::layout([
            'layouts/header',
            'edit',
            'layouts/footer',
        ], $dados);
    }

    public function edit_contato()
    {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            header('Location: ?p=home'); 
            return;
        }
        
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = trim($_POST['email']);
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $categoria = $_POST['categoria'];

        //verificações do form
        $erro = false;

        if(empty($nome) || strlen($nome) < 3) {
            $_SESSION['nome_erro'] = 'Campo nome não pode ser vazio ou com menos de 3 caracteres.';
            $erro = true;
        }

        if(empty($telefone) || strlen($telefone) < 8) {
            $_SESSION['telefone_erro'] = 'Campo nome não pode ser vazio ou com menos de 8 caracteres.';
            $erro = true;            
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['email_erro'] = "Endereço de email inválido";
            $erro = true;
        }

        if(empty($cidade) || strlen($cidade) < 3) {
            $_SESSION['cidade_erro'] = 'Campo cidade não pode ser vazio.';
            $erro = true;
        }

        if(empty($estado)) {
            $_SESSION['estado_erro'] = 'Escolha um estado.';
            $erro = true;
        }

        if(empty($categoria)) {
            $_SESSION['categoria_erro'] = 'Escolha uma categoria.';
            $erro = true;
        }

        if($erro == true) {
            $_SESSION['temp_dados']['nome'] = $nome;
            $_SESSION['temp_dados']['telefone'] = $telefone;
            $_SESSION['temp_dados']['email'] = $email;
            $_SESSION['temp_dados']['cidade'] = $cidade;
            $_SESSION['temp_dados']['estado'] = $estado;
            $_SESSION['temp_dados']['categoria'] = $categoria;

            header("location: {$_SERVER['HTTP_REFERER']}");
            return;
        }

        $agenda = new Agenda();
        $agenda->edit_contato($id, $nome, $email, $telefone, $cidade, $estado, $categoria);

        header('Location: ?p=home&edit=ok'); 

    }

    public function delete_contato()
    {   
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            header('Location: ?p=home'); 
            return;
        }

        $agenda = new Agenda();
        $agenda->delete_contato($id);
        header('Location: ?p=home&delete=ok'); 
    }
}