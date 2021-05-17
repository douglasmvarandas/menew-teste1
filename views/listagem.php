<?php

require_once("../controllers/AgendaController.php");

$agenda = new AgendaController();

$listaDados = $agenda->listagem();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $listaDados = $agenda->buscar();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Listagem</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1 class="font-weight-lighter">Agenda
                    <small class="text-muted">Listagem</small>
                </h1>

            </div>
        </div>
        <form action="" method="POST">
            <div class="form-group row">
                <label for="inputBuscar" class="col-sm-1 col-form-label">Buscar</label>
                <div class="col-sm-4">
                    <input type="text" name="valor" class="form-control" id="inputBuscar" placeholder="Digite algo...">
                </div>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
                <div class="col-sm-1">
                    <a href="formulario.php" type="submit" class="btn btn-success">Adicionar</a>
                </div>
            </div>
        </form>
        <?php if (isset($_GET['messagem'])) : ?>
            <div class="alert alert-success" role="alert">
                <?= $_GET['messagem'] ?>
            </div>
        <?php endif; ?>
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaDados as $pessoa) : ?>
                    <tr>
                        <td scope="row"><?= $pessoa['ID'] ?></td>
                        <td><?= utf8_encode($pessoa['Nome']) ?></td>
                        <td><?= $pessoa['Telefone'] ?></td>
                        <td><?= $pessoa['Email'] ?></td>
                        <td><?= utf8_encode($pessoa['Cidade']) ?></td>
                        <td><?= utf8_encode($pessoa['Estado']) ?></td>
                        <td><?= utf8_encode($pessoa['Descricao']) ?></td>
                        <td><a href="formulario.php?id=<?= $pessoa['ID'] ?>"><i class="fas fa-edit"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('.alert').fadeOut(5000);
    });
</script>

</html>