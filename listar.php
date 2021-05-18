<?php
include("conexao.php");
$consulta = "SELECT * FROM usuario";
$con = mysqli_query($conexao, $consulta) or die(mysqli_error($conexao));

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Menew</title>
    <link rel="stylesheet" href="listar.css">
</head>

<body>
    <h1>Cadastros!</h1>
    <div id="main">
        <div><img src="images/Menew_logo.png" id="logo"></div>
        <a href="index.php" class="btn btn-primary" id="btn">Voltar ao menu anterior</a>
    </div>
    <div id="frame">
        <table class="table table-hover table-dark" style="border-radius: 2px;">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">
                        <div style="width: 120px;">Usuario</div>
                    </th>
                    <th scope="col" id="telefone">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">
                        <div style="width: 150px;">Cidade</div>
                    </th>
                    <th scope="col">
                        <div style="width: 170px;">Estado</div>
                    </th>
                    <th scope="col">Categoria</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($dado = $con->fetch_array()) { ?>
                    <tr>
                        <th scope="row"><?php echo $dado["usuario_id"];$id_user=$dado["usuario_id"] ?></th>
                        <td><?php echo $dado["usuario"]; ?></td>
                        <td><?php echo $dado["telefone"]; ?></td>
                        <td><?php echo $dado["email"]; ?></td>
                        <td><?php echo $dado["cidade"]; ?></td>
                        <td><?php echo $dado["estado"]; ?></td>
                        <td><?php echo $dado["categoria"]; ?></td>
                        <td><a href="editar.php?id=<?php echo $id_user?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="color: white;">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg></a></td>
            </tbody>
        <?php } ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>