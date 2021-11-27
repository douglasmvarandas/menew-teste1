<?php 

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'STONE') or die(mysqli_error($mysqli));

$id = 0;
$atualizar = false;
$nome = '';
$telefone = '';
$email = '';
$cidade = '';
$estado = '';
$categoria = '';

if(isset($_POST['save'])){
    $nome   = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $categoria= $_POST['categoria'];
    $mysqli->query("INSERT INTO DADOS (nome, telefone, email, cidade, estado, categoria) VALUES('$nome', '$telefone', '$email', '$cidade', '$estado', '$categoria')") or 
        die($mysqli->error);

    $_SESSION['message'] = "Registro salvo!";
    $_SESSION['msg_type']= "success";

    header("location: index.php");
}

if(isset($_GET['deletar'])){
    $id = $_GET['deletar'];
    $mysqli->query("DELETE FROM DADOS WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Registro deletado!";
    $_SESSION['msg_type']= "danger";
    
    header("location: index.php");
}

if (isset($_GET['editar'])){
    $id = $_GET['editar'];
    $atualizar = true;
    $result = $mysqli->query("SELECT * FROM DADOS WHERE id=$id") or die($mysqli->error);
    if ($result->num_rows){
        $row = $result->fetch_array();
        $nome   = $row['nome'];
        $telefone = $row['telefone'];
        $email = $row['email'];
        $cidade = $row['cidade'];
        $estado = $row['estado'];
        $categoria= $row['categoria'];
    }
}

if (isset($_POST['atualizar'])){
    $id     = $_POST['id'];
    $nome   = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];

    $mysqli->query("UPDATE DADOS SET nome='$nome', telefone='$telefone', email='$email', cidade='$cidade', estado='$estado', categoria='$categoria' WHERE id=$id") or
            die($mysqli->error);
    
    $_SESSION['message'] = "Dado atualizado";
    $_SESSION['msg_type'] = "warning";

    header("location: index.php");
}