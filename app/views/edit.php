
<?php 
if(empty($dados)) {
    header('Location: ?p=home&erro=ok'); 
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-10 text-left">
            <h3 class="mt-5 mb-3 text-white">Editar contato</h3>
            
            <div class="card shadow">
                <div class="card-body">
                    <form class="form-card p-2" method="post" action="?p=edit_contato&id=<?= $dados->id ?>" id="formEdit">

                        <div class="form-group col-9">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= $dados->nome ?>">
                            <?php
                                if(!empty($_SESSION['nome_erro'] )) {
                                    echo '<small class="text-danger">'.$_SESSION['nome_erro'].'</small>';
                                    unset($_SESSION['nome_erro']);
                                }
                            ?>
                        </div>

                        <div class="form-group col-9">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" value="<?= $dados->email ?>">
                            <?php
                                if(!empty($_SESSION['email_erro'] )) {
                                    echo '<small class="text-danger">'.$_SESSION['email_erro'].'</small>';
                                    unset($_SESSION['email_erro']);
                                }
                            ?>
                        </div>

                        <div class="form-group col-6">
                            <label for="inputTelefone">Telefone</label>
                            <input type="text" class="form-control" id="inputTelefone" name="telefone" value="<?= $dados->telefone ?>">
                            <?php
                                if(!empty($_SESSION['telefone_erro'] )) {
                                    echo '<small class="text-danger">'.$_SESSION['telefone_erro'].'</small>';
                                    unset($_SESSION['telefone_erro']);
                                }
                            ?>
                        </div>                        

                        <div class="form-group col-6">
                            <label for="inputCidade">Cidade</label>
                            <input type="text" class="form-control" id="inputcidade" name="cidade" value="<?= $dados->cidade ?>">
                            <?php
                                if(!empty($_SESSION['cidade_erro'] )) {
                                    echo '<small class="text-danger">'.$_SESSION['cidade_erro'].'</small>';
                                    unset($_SESSION['cidade_erro']);
                                }
                            ?>
                        </div>

                        <div class="form-group col-6">
                            <label for="selectEstado">Estado</label>
                            <select class="form-control" id="selectEstado" name="estado">
                                <option value="<?= $dados->estado ?>"><?= $dados->estado ?></option>
                                <option value="AL">AL</option>
                                <option value="CE">CE</option>
                                <option value="PB">PB</option>
                                <option value="PE">PE</option>
                                <option value="RN">RN</option>
                            </select>
                            <?php
                                if(!empty($_SESSION['estado_erro'] )) {
                                    echo '<small class="text-danger">'.$_SESSION['estado_erro'].'</small>';
                                    unset($_SESSION['estado_erro']);
                                }
                            ?>
                        </div>
                        
                        <div class="form-group col-6">
                            <label for="selectCategoria">Categoria</label>
                            <select class="form-control" id="selectCategoria" name="categoria">
                                <option value="<?= $dados->categoria ?>"><?= $dados->categoria ?></option>
                                <option value="cliente">Cliente</option>
                                <option value="fornecedor">Fornecedor</option>
                                <option value="funcionario">Funcionário</option>
                            </select>
                            <?php
                                if(!empty($_SESSION['categoria_erro'] )) {
                                    echo '<small class="text-danger">'.$_SESSION['categoria_erro'].'</small>';
                                    unset($_SESSION['categoria_erro']);
                                }
                            ?>
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-danger">Salvar</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>

<?php unset($_SESSION['temp_dados']); ?>