<?php 
include_once "conexao.php";
$usuario = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$categoria = $_POST["categoria"];
$conexao = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname);
mysqli_select_db($conexao, '$dbname');
if (!empty($usuario) && !empty($telefone) && !empty($email) && !empty($cidade) && $estado != "default" && $categoria != "default") {
    $sql = "INSERT INTO usuario (usuario,telefone,email,cidade,estado,categoria) VALUES ('$usuario', '$telefone', '$email', '$cidade', '$estado', '$categoria')";
    if (mysqli_query($conexao, $sql)) {
        echo "<script> alert('Dados salvos !'); window.location = 'index.php';</script>";
    } else {
        echo "Deu erro: " . $sql . "<br>" . mysqli_error($conexao);
    }
} else {
    echo "<script> alert('Preencha todos os campos !'); window.location = 'cadastrar.php';</script>";
}
mysqli_close($conexao);
?>