<!DOCTYPE html>
<html lang="PT-Br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Agenda Telefônica</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css?v2=<?php echo time();?>" rel="stylesheet">
  </head>

<?php
  include "config.php";
?>

<body>
  <div class="container">
    <div align="center">
      <img src="imagens/padlock.png" align="center" width="128px">
    </div>
    <form class="form-signin" method="POST" action="dao/verifica_login.php">
      <h2 class="form-signin-heading" align="center">Credenciais de acesso</h2>
      <label for="inputEmail" class="sr-only">login</label>
      <input type="text" id="inputEmail"  name="login"class="form-control" placeholder="usuário" required autofocus>
      <label for="inputPassword" class="sr-only">senha</label>
      <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="senha" required>
        <button class="btn btn-lg btn-primary btn-block" name="entrar" type="submit">Logar</button>
        <?php 
        if(isset($_GET['erro'])) {
          echo '<div class="alert alert-danger error">';
          echo "Login ou senha inválidos!";
          echo '</div>';
        }
        ?>
      </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  </body>
</html>
