<?php

$mysqli = new mysqli('localhost', 'root', '', 'agenda-menew') or die(mysqli_error($mysqli));

if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];

    $mysqli->query("INSERT INTO agenda (nome, telefone, email, cidade, estado, categoria) VALUES ('$nome','$telefone','$email','$cidade','$estado','$categoria')")or
            die($mysqli->error);
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM agenda WHERE id=$id")or die($mysqli->error());
}