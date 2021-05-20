<?php 
include "conexao.php";

$id= $_POST["id"];
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$categoria = $_POST["categoria"];

$conn = mysqli_connect($server, $user, $pass, $bd);
mysqli_select_db($conn,$bd);
if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($cidade)) {
    $sql = "UPDATE pessoas SET nome='$nome', telefone='$telefone', email='$email', cidade='$cidade', estado='$estado', categoria='$categoria' WHERE cod_pessoas = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('Edição feita com sucesso!'); window.location = 'consulta.php';</script>";
    } else {
        echo "Deu erro: " . $sql . "<br>" . mysqli_error($conexao);
    }
} else {
    echo "<script> alert('Erro ao efetuar a atualização !'); window.location = 'editar_cadastro.php?id=$id';</script>";
}
mysqli_close($conexao);
?>