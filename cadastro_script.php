<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta nome="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Formulário de Cadastro</title>
    <link rel="shortcut icon" href="imagens/pessoas.png">
  </head>     

  <body>
    <div class="container-fluid" style="margin-top: 30px;">
        <div class="container" style="margin-top: 250px;max-width:370px;">
           <?php
               include "conexao.php";

               $nome = $_POST['nome'];
               $telefone = $_POST['telefone'];
               $email = $_POST['email'];
               $cidade = $_POST['cidade'];
               $estado = $_POST['estado'];
               $categoria = $_POST['categoria'];

               $sql = "INSERT INTO `pessoas` ( `nome`, `telefone`, `email`, `cidade`, `estado`, `categoria`) VALUES ('$nome','$telefone','$email','$cidade','$estado','$categoria')";
            
               if (mysqli_query($conn, $sql)) {
                    mensagem("$nome ( Cadastrado com sucesso! )",'success');
                } else
                    mensagem("$nome ( NÃO cadastrado! )",'danger');

            ?>
            <center>
            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

         
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
    
  </body>
</html>