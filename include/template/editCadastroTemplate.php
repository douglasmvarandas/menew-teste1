<?php require_once("../../functions/repository/selectForUpdate.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste_MENEW_PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

<?php include_once("_nav.php"); ?>

<div class="container" style="margin-top: 2%;">

    <div class="jumbotron">
        <div class="card" align="center">
                    <h2 class="modal-title" id="exampleModalLabel">Editar Cadastro</h2>
        </div>

        <div class="card">
        
            <div class="card-body">

                <form action="../../functions/repository/editCadastro.php" method="post">
                        
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nomeEdit">Nome</label>
                            <input type="text" class="form-control" name="nomeEdit" id="nomeEdit" placeholder="Nome"
                            value="<?php echo utf8_encode($info_entidade["nome"]) ?>">
                        </div>

                        <div class="form-group col-md-6">
                                <label for="telefoneEdit">Telefone</label>
                                <input type="number" class="form-control" name="telefoneEdit" id="telefoneEdit" placeholder="Telefone"
                                value="<?php echo $info_entidade["telefone"] ?>">
                        </div>
                    </div>

                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="tipoEdit">Categoria</label>
                                    <select id="tipoEdit" name="tipoEdit" class="form-control">
                                    <?php
                                        $meuTipo = $info_entidade["tipo"];
                                        while($linha = mysqli_fetch_assoc($lista_tipos)) {
                                            $tipo_principal = $linha["sigla"];
                                            if($meuTipo == $tipo_principal) {
                                    ?>
                                    
                                        <option value="<?php echo utf8_encode($linha["sigla"]) ?>" selected>
                                            <?php echo utf8_encode($linha["nomeEntidade"]) ?>
                                        </option>
                                   
                                        <?php
                                            } else {
                                        ?>
                                            <option value="<?php echo $linha["sigla"] ?>" >
                                                <?php echo utf8_encode($linha["nomeEntidade"]) ?>
                                            </option>                        
                                        <?php 
                                                }
                                            }
                                        ?>
                                   
                                    </select>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="emailEdit">Email</label>
                                <input type="email" class="form-control" name="emailEdit" id="emailEdit" placeholder="Email"
                                value="<?php echo $info_entidade["email"] ?>">
                            </div>
                    </div>

                    <div class="form-row">
                                
                        <div class="form-group col-md-6">
                            <label for="cidadeEdit">Cidade</label>
                            <input type="text" class="form-control" name="cidadeEdit" id="cidadeEdit" placeholder="Cidade"
                            value="<?php echo utf8_encode($info_entidade["cidade"]) ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="estadoEdit">Estado</label>
                            <select name="estadoEdit" id="estadoEdit" class="form-control">
                                
                            <?php 
                                $meuestado = $info_entidade["estado"];
                                while($linhaEstado = mysqli_fetch_assoc($lista_estados)) {
                                    $estado_principal = $linhaEstado["uf"];
                                    if($meuestado == $estado_principal) {
                            ?>
                                <option value="<?php echo $linhaEstado["uf"] ?>" selected>
                                    <?php echo utf8_encode($linhaEstado["nomeEstado"]) ?>
                                </option>
                            <?php
                                    } else {
                            ?>
                                <option value="<?php echo $linhaEstado["uf"] ?>" >
                                    <?php echo utf8_encode($linhaEstado["nomeEstado"]) ?>
                                </option>                        
                            <?php 
                                    }
                                }
                            ?>

                            </select>
                        </div>
                                
                    </div>

                    <input type="hidden" name="entidadeId" value="<?php echo $info_entidade["idEntidade"] ?>">

                    <div class="modal-footer">
                        <a href="../../index.php" type="button" class="btn btn-secondary">Close</a>
                        <button type="submit" name="editarCadastro" class="btn btn-primary">Editar</button>
                    </div>
                    
                </form>
            </div>    
        </div>
    </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>