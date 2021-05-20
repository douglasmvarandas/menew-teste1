<?php
include("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);

if (isset($_GET['id'])) {
    if(isset($_GET['apagar'])){
        $query = "DELETE FROM usuarios WHERE usuarios.id = $_GET[id]";
    }else{
        $query = "UPDATE usuarios SET 
        nome = '$nome',
        telefone = '$telefone', 
        email = '$email', 
        cidade = '$cidade', 
        estado = '$estado', 
        categoria = '$categoria' 
        WHERE usuarios.id=$_GET[id]";
    }
    
} else {
    $query = "INSERT INTO usuarios 
    (nome,telefone,email,cidade,estado,categoria) 
    VALUES 
    ('$nome','$telefone','$email','$cidade','$estado','$categoria')";
}

$result = mysqli_query($connection, $query);

header("Location: index.php");