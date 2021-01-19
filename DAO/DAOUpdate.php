<?php
session_start();
include './DAOConexao.php';

$id = $_SESSION['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$categoria = $_POST['categoria'];

try {
    $query = ("UPDATE TBCLIENTES set NOME='$nome',EMAIL='$email',TELEFONE='$telefone',CIDADE='$cidade',ESTADO='$estado',CATEGORIA='$categoria' WHERE ID='$id' ");
    mysqli_query($conexao, $query);
    echo 'Salvo';
    header("Location:../index.php");
} catch (Exception $ex) {
    $texto =  'Erro ao editar -> '.  mysqli_errno($link);
}

?>
