<?php
include "../config.php";

$query = "INSERT INTO agenda(nome, email, telefone, celular, cidade, estado, categoria)
  VALUES ('".$_POST["nome"]."', '".$_POST["email"]."', '".$_POST['telefone']."',
  '".$_POST['celular']."', '".$_POST['cidade']."', '".$_POST['estado']."', '".$_POST['categoria']."')";

$query = mysqli_query($con, $query);

if($query == true) {
  echo "<script>alert('usuário cadastrado com sucesso');</script>";
  echo "<META http-equiv='refresh' content='1;URL=http://".$site."index.php?page=listar_contatos&contato='> ";
}
else {
  echo "Não foi possivel inserir o registro - entre em contato com o webmaster <br><br>".mysqli_error();
}
?>