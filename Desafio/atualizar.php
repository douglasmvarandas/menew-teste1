<?php 

//chamando função para conectar no banco
include ('connect.php');

//declarando variáveis para receber dados do formulário html
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);

//variável que guarda comando sql para editar registros
$sql = "UPDATE agenda SET nome ='$nome', email ='$email', telefone ='$telefone', cidade = '$cidade', estado = '$estado', categoria = '$categoria' WHERE idcadastro = '$id'";

//função que executa o comando no banco de dados
mysqli_query($connect, $sql) or die($mysqli->error);;

//função que verfica se foi feita alguma edição. 
if(mysqli_affected_rows($connect) > 0){
    //exibindo um alerta caso tenha tido alterações e redirecionando à página inicial
    echo "<script>alert('Sucesso: Atualizado corretamente!'); 
    window.location='index.php';</script>";
  }else{
    //caso não tenha tido alterações é feito um aviso e redireciona a pagina inicial
    echo "<script>alert('Aviso: Não foi atualizado!);
    window.location='index.php';</script>";
  }
  //fechando conexão com o banco
mysqli_close($connect)

?>