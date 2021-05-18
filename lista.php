<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <title>Lista de Agendamentos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <li class="navbar-brand">
            <a href="index.php">Novo Agendamento</a>
        </li>
        <li class="navbar-brand">
            <a href="atualiza.php">Editar Agendamento</a>
        </li>
    </nav>

    <div class="row d-flex justify-content-center">
        <h1>Lista de Agendamentos</h1>
        <?php include('listar.php')   ?>
    </div>
</body>

</html>