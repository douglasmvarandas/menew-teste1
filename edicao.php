<?php 
include_once "conexao.php";
$user_id = $_POST["usuario_id"];
$usuario = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$categoria = $_POST["categoria"];
$conexao = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);
mysqli_select_db($conexao,$dbname);
if (!empty($usuario) && !empty($telefone) && !empty($email) && !empty($cidade)) {
    $sql = "UPDATE usuario SET usuario='$usuario', telefone='$telefone', email='$email', cidade='$cidade', estado='$estado', categoria='$categoria' WHERE usuario_id = '$user_id'";
    if (mysqli_query($conexao, $sql)) {
        echo "<script> alert('Dados salvos !'); window.location = 'listar.php';</script>";
    } else {
        echo "Deu erro: " . $sql . "<br>" . mysqli_error($conexao);
    }
} else {
    echo "<script> alert('Preencha todos os campos !'); window.location = 'listar.php';</script>";
}
mysqli_close($conexao);
?>
?>