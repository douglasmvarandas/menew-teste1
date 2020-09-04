<?php require_once("include/conexao.php"); ?>
<?php require_once("functions/repository/selectPrincipal.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste_MENEW_PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">


</head>
<body>

<?php include_once("include/template/modalAddCadastro.php"); ?>
<?php include_once("include/template/_nav.php"); ?>

<div class="container" style="margin-top: 2%;">

    <div class="jumbotron">
    
        <div class="card" align="center">

            <h2>Adicionar Cadastro</h2>

        </div>

        <div class="card">
            <div type="button" class="card-body btn btn-outline-primary" data-toggle="modal" data-target="#addCadastro">

                <h4>Add Cadastro</h4>

                <!-- Button trigger modal AddCadastro 
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCadastro">
                    
                </button>-->

            </div>
        </div>

        <div class="card" align="center">

                <form action="index.php" method="get">
                    <input type="text" class="form-control" name="pesquisaNome" placeholder="Pesquisa Nome">
                    <button type="subimit" class="btn btn-primary form-control" aria-label="Alinhar na esquerda">Pesquisar
                    </button>
                </form>
        </div>

        <div class="card">
            <div class="card-body">
            
                <table id="listar" class="table table-striped display">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Opções</th>
                            </tr>
                        </thead>
                        
                        <?php     

                        foreach($resultado as $linha) {
                        ?>
                        
                        <tbody>
                            <tr>
                                <td><?php echo utf8_encode($linha["idEntidade"]) ?></td>
                                <td><?php echo utf8_encode($linha["nome"]) ?></td>
                                <td><?php echo utf8_encode($linha["telefone"]) ?></td>
                                <td><?php echo utf8_encode($linha["tipo"]) ?></td>
                                <td>
                                    <a href="include/template/editCadastroTemplate.php?idEntidade=<?php echo $linha["idEntidade"] ?>" 
                                    type="button" class="btn btn-outline-primary">Editar</a>
                                </td>
                            </tr>
                        </tbody>
                        
                        <?php
                            }
                        ?> 
                        
                    </table>
            
            </div>

        </div>
    </div>

</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" ></script>
    <script type="text/javascript" src="js/forSeach.js"></script>

    <script>

        $(document).ready(function () {
            $('.editOpcao').on('click', function () {
                $('#editCadastro').modal('show');

        });

    </script>
</body>
</html>