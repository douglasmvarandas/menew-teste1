<?php

include 'connect.php';

$nome = $_POST['nomeE'];
$tel = $_POST['telE'];
$email = $_POST['emailE'];
$cidade = $_POST['cidadeE'];
$estado = $_POST['estadoE'];
$categoria = $_POST['categoriaE'];

$sql = "INSERT INTO `agenda`( `nome`, `tel`, `email`, `cidade`, `estado`, `categoria`) VALUES ('$nome',$tel,'$email','$cidade','$estado','$categoria')";

$inserir = mysqli_query($connect, $sql);

?>

<div>
    <button ></button>
</div>