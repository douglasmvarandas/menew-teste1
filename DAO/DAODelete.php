<?php

session_start();
include './DAOConexao.php';
$id = $_GET['id'];

try {
    $query = ("DELETE FROM TBCLIENTES WHERE ID='$id'");
    mysqli_query($conexao, $query);
    //echo 'excluido';
    header("Location:../index.php");
    echo"<script type='text/javascript'>
        alert(“o cliente foi excluído”);
        </script>";
} catch (Exception $ex) {
    $texto = 'Erro ao editar -> ' . mysqli_errno($link);
}
?>
