<?php
    session_start();
    require_once('database/dbConnect.php');

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();
    
    //Criando Query de inserção de dados.

    $sqlinsert = "UPDATE agendars SET nome='$nome', telefone='$telefone', 
    email='$email', cidade='$cidade', estado='$estado', categoria='$categoria' WHERE id='$id'";
    $resultEdite = mysqli_query($link, $sqlinsert);

    if(mysqli_affected_rows($link)){
        $_SESSION['msg'] = "<p style='color:green;'> Usuario editado com Sucesso! </p>";
        header("Location: pesquisar.php");
    }
    else{
        $_SESSION['msg'] = "<p style='color:red;'> Erro Ao editar Usuario! </p>";
        header("Location: editar.php?id=$id");
    }

?>