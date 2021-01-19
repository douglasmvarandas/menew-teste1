<!DOCTYPE html>
<?php

session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menew Agenda</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    </head>

    <?php
    include "./DAO/DAOConexao.php";

    //$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);
    $id=$_GET['id'];
    $_SESSION['id'] = $id;
    $Xquery = mysqli_query($conexao, "select * from tbclientes where id='$id'");

    while ($vetor = mysqli_fetch_array($Xquery)) :

        $id = $vetor['ID'];
        $nome = $vetor['NOME'];
        $email = $vetor['EMAIL'];
        $telefone = $vetor['TELEFONE'];
        $cidade = $vetor['CIDADE'];
        $estado = $vetor['ESTADO'];
        $categoria = $vetor['CATEGORIA'];

    endwhile;
    ?>
    <body>
        <div class="container" style="padding: 100px;">
            <form action="DAO/DAOUpdate.php" method="POST">

                <label name="lbResultado"></label>

                <fieldset class="col-md-13">
                    <div class="form-group">
                        <label >Nome</label>
                        <input type="text" class="form-control" id="nome" value="<?php echo $nome ?>" autocomplete="off" name="nome" required="req">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email;?>" id="inputEmail4" autocomplete="off" required="req">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Telefone</label>
                            <input type="text" name="telefone" class="form-control" value="<?php echo $telefone?>" id="telefone" autocomplete="off" required="req">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label >Cidade</label>
                            <input type="text" name="cidade" class="form-control" id="cidade" value="<?php echo $cidade ?>" required="req">
                        </div>
                        <div class="form-group col-md-4">
                            <label >Estado</label>
                            <select id="inputState" name="estado" value='<?php echo $estado ?>' class="form-control">
                                <option>Escolha</option>
                                <option>Ceara</option>
                                <option>Paraiba</option>
                                <option>Pernanbuco</option>
                                <option>Rio de Janeiro</option>
                                <option>Sao Paulo</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState" >Categoria</label>
                            <select id="inputState" name="categoria" value="<?php echo $categoria ?>" class="form-control">
                                <option>Escolha</option>
                                <option>Cliente</option>
                                <option>Fornecedor</option>
                                <option>Funcionario</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
            <input type="submit" class="btn btn-success" value="Editar" name="Editar"/>
            <a class="btn btn-danger" href="index.php"  >Cancelar</a> 
            </form>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>
</html>