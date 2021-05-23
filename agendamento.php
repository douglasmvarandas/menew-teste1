<?php

    require_once('database/dbConnect.php');

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();
    
    //Criando Query de inserção de dados.
    $sqlinsert = " insert into agendars(nome, telefone, email, cidade, estado, categoria) 
                                values ('$nome','$telefone','$email','$cidade','$estado','$categoria') ";

    // executar a query
    if(mysqli_query($link, $sqlinsert)){
        echo 'Agendamento Realizado com Suesso!';
        header('Location: '.'index.php');
    }else{
        echo 'Erro ao Agenda';
        header('Location: '.'index.php');
    }

?>