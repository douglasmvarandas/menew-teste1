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
        $id = $_GET['id'];

        $sql = "DELETE FROM `agenda` WHERE id_agenda = $id";

        $excluir = mysqli_query($connect, $sql);

    ?>

    <script>
        window.alert("Cadastro excluido com sucesso. Deseja retornar?");
        window.location.href = "listar.php";
    </script>

    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>