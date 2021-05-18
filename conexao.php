<?php
$servidor = "localhost";
$dbname = "cadastros";
$dbusuario = "root";
$dbsenha = "";

$conexao = mysqli_connect($servidor,$dbusuario,$dbsenha,$dbname);
if(!$conexao) {
    die("Conexão falhou: " .mysqli_connect_error());
}
?>