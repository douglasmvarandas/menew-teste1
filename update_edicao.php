<?php 
include "conn.php";

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
    $sql = "UPDATE registros SET nome='$nome', telefone='$telefone', email='$email', cidade='$cidade', estado='$estado', categoria='$categoria' WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('Edição em $nome feita com sucesso!'); window.location = 'index.php';</script>";
    } else {
        echo "Deu erro: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "<script> alert('Erro ao efetuar a atualização !'); window.location = 'editar.php?id=$id';</script>";
}
mysqli_close($conn);
?>