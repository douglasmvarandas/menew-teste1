<?php

include "./DAOConexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$categoria = $_POST['categoria'];
$texto = $_POST['lbResultado'];
try {
    $query = ("INSERT INTO TBCLIENTES(NOME,EMAIL,TELEFONE,CIDADE,ESTADO,CATEGORIA)VALUES('$nome','$email','$telefone','$cidade','$estado','$categoria')");
    mysqli_query($conexao, $query);
    header("Location:../index.php");
    $texto = "Salvo com sucesso!";
} catch (Exception $ex) {
    $texto =  'Erro ao salvar -> '.  mysqli_errno($link);
}