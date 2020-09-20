
<!DOCTYPE html>
<html lang="en">
    
    <?php include("head.php"); ?>
    
<body>

<?php include_once("_nav.php"); ?>
<?php require_once("C:/xampp/htdocs/teste_menew/controller/EditarEntidade.php");?>
<?php require_once("C:/xampp/htdocs/teste_menew/controller/ListarEstado.php");?>
<?php require_once("C:/xampp/htdocs/teste_menew/controller/ListarTipoEntidade.php");?>
<div class="container" style="margin-top: 2%;">

    <div class="jumbotron">
        <div class="card" align="center">
                    <h2 class="modal-title" id="exampleModalLabel">Editar Cadastro</h2>
        </div>

        <div class="card">
        
            <div class="card-body">

                <form method="post" action="../../teste_menew/controller/EditarEntidade.php">
                        
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome"
                            value="<?php echo utf8_decode($editar->getNome()); ?>">
                        </div>

                        <div class="form-group col-md-6">
                                <label for="telefone">Telefone</label>
                                <input type="number" class="form-control" name="telefone" id="telefone" placeholder="Telefone"
                                value="<?php echo $editar->getTelefone(); ?>">
                        </div>
                    </div>

                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="tipo">Categoria</label>
                                    <select id="tipo" name="tipo" class="form-control">
                                    
                                        <?php
                                        $meuTipo = $editar->getTipo();
                                        while ($linha = mysqli_fetch_assoc($lista_tipos)) {
                                            $tipo_principal = $linha["sigla"];
                                            if ($meuTipo == $tipo_principal) {
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
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                value="<?php echo $editar->getEmail(); ?>">
                            </div>
                    </div>

                    <div class="form-row">
                                
                        <div class="form-group col-md-6">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade"
                            value="<?php echo utf8_decode($editar->getCidade()); ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" class="form-control">
                                
                                <?php 
                                    $meuestado = $editar->getEstado();
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
                    
                    <div class="form-row">
                                
                        <div class="form-group col-md-6">
                            <select name="ativo" class="form-control">
                                <?php $c = $editar->getAtivo();?>
                                <option value="<?php echo $editar->getAtivo();?>"><?php echo  ($editar->getAtivo()== "N")? "Desativado" :"Ativado" ?></option>
                                <option value="<?php echo ($c == "N")? 'S' : 'N' ?>"><?php echo ($editar->getAtivo()!= "N")? "Desativado" :"Ativado" ?></option>
                            </select>
                        </div>    
                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo $editar->getId(); ?>">

                    <div class="modal-footer">
                        <a href="../../teste_menew/index.php" type="button" class="btn btn-secondary">Close</a>
                        <button type="submit" name="submit" class="btn btn-primary">Editar</button>
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