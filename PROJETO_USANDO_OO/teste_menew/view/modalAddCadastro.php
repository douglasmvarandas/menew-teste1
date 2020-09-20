<?php 
    require_once 'C:/xampp/htdocs/teste_menew/controller/ListarEstado.php';
    require_once 'C:/xampp/htdocs/teste_menew/controller/ListarTipoEntidade.php';
    
?>

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

                <form method="post" action="../../teste_menew/controller/CadastrarEntidade.php">

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
                            <label for="tipo">Categoria</label>
                            <select name="tipo" class="form-control">

                                <?php new ListarTipoEntidade(); ?>

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

                                <?php new ListarEstado();?>

                            </select>
                        </div>

                    </div>
                    
                    <div class="form-row">
                                
                        <div class="form-group col-md-6">
                            <select name="ativo" class="form-control">
                                <option value="S">Ativo</option>
                                <option value="N">Desativado</option>
                            </select>
                        </div>    
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="cadastrar">Gravar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<!-- Fim Modal AddCadastro -->