<?php

$site = '127.0.0.1/agenda-php/';

$nome_banco = "agenda_php";

$con = mysqli_connect("127.0.0.1","root","",$nome_banco);

if (mysqli_connect_errno()) {
  echo "Falha ao conectar com o MySQL: " . mysqli_connect_error();
}

mysqli_select_db($con,$nome_banco);

?>

