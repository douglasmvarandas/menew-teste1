<?php
include "../config.php";

$query = "UPDATE agenda SET nome = '$_POST[nome]', email = '$_POST[email]', telefone = '$_POST[telefone]',
  celular = '$_POST[celular]', cidade = '$_POST[cidade]', estado = '$_POST[estado]', categoria = '$_POST[categoria]'
  WHERE cod_contato = $_POST[cod_contato];";

$query = mysqli_query($con, $query);

if ($query == true) {
    echo "<script>alert('Usuário Editado com sucesso');</script>";
    echo "<META http-equiv='refresh' content='1;URL=http://".$site."index.php?page=editar_contato&contato=$_POST[cod_contato]'> ";
}
else {
    echo "Não foi possivel editar o registro - entre em contato com o webmaster <br><br>".mysqli_error();
}
?>