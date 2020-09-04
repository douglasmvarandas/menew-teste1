<?php require_once("selectForAdd.php"); ?>
<!-- Inicio Modal AddCadastro -->
<div class="modal fade" id="addCadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Cadastro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            
                <form action="../../teste_menew/functions/repository/insertCadastro.php" method="post">
                        
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
                        </div>

                        <div class="form-group col-md-6">
                                <label for="telefone">Telefone</label>
                                <input type="number" class="form-control" name="telefone" id="telefone" placeholder="Telefone">
                        </div>
                    </div>

                    <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="categoria">Categoria</label>
                                    <select id="tipo" name="tipo" class="form-control">

                                    <?php while($linhaTipos = mysqli_fetch_assoc($lista_tipos)) { ?>
                        
                                        <option value="<?php echo $linhaTipos["sigla"]; ?>">
                                            <?php echo utf8_encode($linhaTipos["nomeEntidade"]); ?>
                                        </option>
                                    
                                    <?php } ?>

                                    </select>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                    </div>

                    <div class="form-row">
                                
                        <div class="form-group col-md-6">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" class="form-control">

                            <?php while($linhaEstados = mysqli_fetch_assoc($lista_estados)) { ?>
                        
                                <option value="<?php echo $linhaEstados["uf"]; ?>">
                                    <?php echo utf8_encode($linhaEstados["nomeEstado"]); ?>
                                </option>
                            
                            <?php } ?>

                            </select>
                        </div>
                                
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="saveCadastro" class="btn btn-primary">Gravar</button>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Fim Modal AddCadastro -->