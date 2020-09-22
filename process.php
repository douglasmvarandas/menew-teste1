<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'agenda_menew') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$nome = '';
$telefone = '';
$email = '';
$cidade = '';
$estado = '';
$categoria = '';

if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];

    $mysqli->query("INSERT INTO agenda (nome, telefone, email, cidade, estado, categoria) VALUES ('$nome','$telefone','$email','$cidade','$estado','$categoria')")or
            die($mysqli->error);
    
    $_SESSION['message'] = "Contato salvo!";
    $_SESSION['msg_type'] = "success";
    
    header("location: index.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM agenda WHERE id=$id")or die($mysqli->error());
    
    $_SESSION['message'] = "Contato apagado!";
    $_SESSION['msg_type'] = "danger";
    
    header("location: index.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM agenda WHERE id=$id") or die($mysqli->error());
    if(isset($result->num_rows) && $result->num_rows > 0){
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $nome = $row['nome'];
        $telefone = $row['telefone'];
        $email = $row['email'];
        $cidade = $row['cidade'];
        $estado = $row['estado'];
        $categoria = $row['categoria'];
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];
    
    $mysqli->query("UPDATE agenda SET nome='$nome', telefone='$telefone', email='$email', cidade='$cidade', estado='$estado', categoria='$categoria' WHERE id=$id")or
            die($mysqli->error);
    
    $_SESSION['message'] = "Contato atualizado!";
    $_SESSION['msg_type'] = "warning";
    
    header('location: index.php');
}