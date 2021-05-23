<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sucesso</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
</head>
<body>
    <?php
    
        include 'connect/connect.php';
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $categoria = $_POST['categoria'];

        $sql = "UPDATE `agenda` SET `nome`='$nome',
        `tel`=$tel,`email`='$email',`cidade`='$cidade',
        `estado`='$estado',`categoria`='$categoria' WHERE id_agenda = $id";

        $atualizar = mysqli_query($connect, $sql);

    ?>
    <script>
        window.alert("Atualização de cadastro realizada com sucesso. Deseja retornar?");
        window.location.href = "listar.php";
    </script>

    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>