<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
</head>
<body>
    <?php

        include 'connect/connect.php';

        $nome = $_POST['nomeE'];
        $tel = $_POST['telE'];
        $email = $_POST['emailE'];
        $cidade = $_POST['cidadeE'];
        $estado = $_POST['estadoE'];
        $categoria = $_POST['categoriaE'];

        $sql = "INSERT INTO `agenda`( `nome`, `tel`, `email`, `cidade`, `estado`, `categoria`) VALUES ('$nome',$tel,'$email','$cidade','$estado','$categoria')";

        $inserir = mysqli_query($connect, $sql);

    ?>

    <script>
        window.alert("Cadastro realizado com sucesso. Deseja retornar?");
        window.location.href = "index.php";
    </script>

    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>

