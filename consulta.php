<?php

include "conexao.php";

$query = mysqli_query($conn, "SELECT cod_pessoas, nome, telefone, email, cidade, estado, categoria FROM pessoas");

$linhas = mysqli_num_rows($query);

?>
<html>
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta nome="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Consulta de Pessoas</title>
    <link rel="shortcut icon" href="imagens/pessoas.png">
    </head>
    <body>
    <div class="container-fluid" style="margin-top: 30px;">
    <div class="container col-md-12" align="center">
        <table class="table table-bordered text-center" style="max-width:710px;margin-top:50px;">
        <h2 class="text-center">Consulta de Pessoas</h2>
        <hr>
        <thead class="thead-dark">
            <tr>
                <th class="align-middle">Código</td>
                <th class="align-middle">Nome</td>
                <th class="align-middle">Telefone</td>
                <th class="align-middle">E-mail</td>
                <th class="align-middle">Cidade</td>
                <th class="align-middle">Estado</td>
                <th class="align-middle">Categoria</td>
                <th class="align-middle">Ação</td>
            </tr>
            <thead class="thead-dark">
            <?php while($linhas = mysqli_fetch_array($query)){ ?>
            <tr>
                <td><?php echo $linhas["cod_pessoas"]; ?></td>
                <td><?php echo $linhas["nome"]; ?></td>
                <td><?php echo $linhas["telefone"]; ?></td>
                <td><?php echo $linhas["email"]; ?></td>
                <td><?php echo $linhas["cidade"]; ?></td>
                <td><?php echo $linhas["estado"]; ?></td>
                <td><?php echo $linhas["categoria"]; ?></td>
                <td><a href="editar_cadastro.php?id=<?php echo $linhas['cod_pessoas'] ?>" class="btn btn-warning">Editar</a></td>
            </tr> 
            <?php } ?>       
        </table>
        <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>        