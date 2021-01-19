<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Agenda Menew</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>

        <div class="container" style="padding: 100px;">
            <form action="DAO/DAOInsert.php" method="POST">

                <label name="lbResultado"></label>

                <fieldset class="col-md-12">
                    <div class="form-group">
                        <label >Nome</label>
                        <input type="text" class="form-control" id="nome" autocomplete="off" name="nome" required="req">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail4" autocomplete="off" required="req">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Telefone</label>
                            <input type="text" name="telefone" class="form-control" id="telefone" autocomplete="off" required="req">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label >Cidade</label>
                            <input type="text" name="cidade" class="form-control" id="cidade" autocomplete="off" required="req">
                        </div>
                        <div class="form-group col-md-4">
                            <label >Estado</label>
                            <select id="inputState" name="estado" class="form-control">
                                <option selected>Escolha</option>
                                <option>Ceara</option>
                                <option>Paraiba</option>
                                <option>Pernanbuco</option>
                                <option>Rio de Janeiro</option>
                                <option>Sao Paulo</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState" >Categoria</label>
                            <select id="inputState" name="categoria" class="form-control">
                                <option selected>Escolha</option>
                                <option>Cliente</option>
                                <option>Fornecedor</option>
                                <option>Funcionario</option>
                            </select>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success" value="cadastrar" name="cadastrar"/>
                    <a class="btn btn-danger" href="index.php"  >Cancelar</a> 


                </fieldset>



            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>