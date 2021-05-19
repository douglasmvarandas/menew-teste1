<?php 

include ('connect.php');

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);


$sql = "UPDATE agenda SET nome ='$nome', email ='$email', telefone ='$telefone', cidade = '$cidade', estado = '$estado', categoria = '$categoria' WHERE idcadastro = '$id'";

mysqli_query($connect, $sql) or die($mysqli->error);;

if(mysqli_affected_rows($connect) > 0){
    echo "<script>alert('Sucesso: Atualizado corretamente!');
    window.location='index.php';</script>";
  }else{
    echo "<script>alert('Aviso: Não foi atualizado!);
    window.location='index.php';</script>";
  }
mysqli_close($connect)

?>