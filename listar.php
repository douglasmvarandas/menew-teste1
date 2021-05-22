<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda | Listar</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Agenda</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro.php">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="listar.php">Listar</a>
                    </li>
                    
                </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container-fluid">
        <h4 style="margin-top: 20px;">Lista</h4>
        <table class="table">
            <thead class="thead-dark">
            <tr class="tr">
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
            
                <?php
                    include 'connect/connect.php';
                    $sql = "SELECT * FROM `agenda`";
                    $lista = mysqli_query($connect, $sql);

                    while($array = mysqli_fetch_array($lista)){
                        $id_agenda = $array['id_agenda'];
                        $nome = $array['nome'];
                        $tel = $array['tel'];
                        $email = $array['email'];
                        $cidade = $array['cidade'];
                        $estado = $array['estado'];
                        $categoria = $array['categoria'];

                ?>
            <tr>
                <td><?php echo $nome ?></td>
                <td><?php echo $tel ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $cidade ?></td>
                <td><?php echo $estado ?></td>
                <td><?php echo $categoria ?></td>
                <td><a class="btn btn-warning btn-sm" href="editar.php?id=<?php echo $id_agenda ?>" role="button">Editar</a></td>

                <?php   
                    }
                ?>
            </tr>
            
        </table>
    </div>

    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>