<?php 
    require_once './controller/ListarEntidade.php';
    require_once './controller/BuscarEntidade.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

    <?php include_once("view/head.php"); ?>

    <body>
        
        <?php include_once 'view/modalAddCadastro.php'; ?>
        <?php include("view/_nav.php"); ?>
        
        <div class="container" style="margin-top: 2%;">

            <div class="jumbotron">

                <div class="card" align="center">

                    <h2>Adicionar Cadastro</h2>

                </div>

                <div class="card">
                    <div type="button" class="card-body btn btn-outline-primary" data-toggle="modal" data-target="#addCadastro">

                        <h4>Add Cadastro</h4>

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

                        <table class="table table-striped display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>Email</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>

                            <tbody>
                
                                <?php 
                                
                                    if(isset($_GET['pesquisaNome'])){
                                        
                                        $pesquisa = $_GET['pesquisaNome'];
                                        
                                        new BuscarEntidade($pesquisa);
                                        
                                        echo "<pre>";
                                            echo $pesquisa;
                                        echo "</pre>";
                                    }else{
                                        new ListarEntidade();
                                    }
                                
                                ?>

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        
    </body>
</html>
