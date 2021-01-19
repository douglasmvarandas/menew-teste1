<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Menew</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>


    <div>
        <form style="padding: 40px; ">
            <div style="margin-top: 30px;">
                <div class="col-md-6">
                    <div>

                    </div>

                    <div class="input-group h3">
                        <form action="" style="padding: 60px;">
                            <input class="form-control" name="consulta" autocomplete="off" type="text" placeholder="Pesquisar clientes">&nbsp;
                            <span class="input-group-btn">

                            </span>
                            <div class="col-md-0">
                                <input type="submit" class="btn btn-primary pull-right h2" value="Pesquisar" />
                            </div>
                            <div class="col-md-2">
                                <a href="viewadicionar.php" class="btn btn-primary pull-right h2">Novo Cliente</a>
                            </div>
                           
                        </form>
                    </div>
                </div>
                <div class="table-overflow" style="max-height:600px; overflow-y:auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Acoes</th>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Categoria</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include "DAO/DAORead.php";

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>