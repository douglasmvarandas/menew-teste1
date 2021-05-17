
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-10 text-left">
            <h3 class="mt-5 mb-3 text-white">Cadastrar contato</h3>
            <?php if(isset($_GET['add']) && $_GET['add'] == 'ok'): ?>
                <div class="alert alert-success" role="alert">
                    Contato adcionado com sucesso.
                </div>
            <?php endif; ?>

            
            <div class="card shadow">
                <div class="card-body">
                    <form class="form-card p-2" method="post" action="?p=save_contato" id="formAdicionar">

                        <div class="form-group col-9">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= isset($_SESSION['temp_dados']['nome']) ? $_SESSION['temp_dados']['nome'] : '' ?>">
                            <?php
                                if(!empty($_SESSION['nome_erro'] )) {
                                    echo '<small class="text-danger">'.$_SESSION['nome_erro'].'</small>';
                                    unset($_SESSION['nome_erro']);
                                }
                            ?>
                        </div>

                        <div class="form-group col-9">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" value="<?= isset($_SESSION['temp_dados']['email']) ? $_SESSION['temp_dados']['email'] : '' ?>">
                            <?php
                                if(!empty($_SESSION['email_erro'] )) {
                                    echo '<small class="text-danger">'.$_SESSION['email_erro'].'</small>';
                                    unset($_SESSION['email_erro']);
                                }
                            ?>
                        </div>

                        <div class="form-group col-6">
                            <label for="inputTelefone">Telefone</label>
                            <input type="text" class="form-control" id="inputTelefone" name="telefone" value="<?= isset($_SESSION['temp_dados']['telefone']) ? $_SESSION['temp_dados']['telefone'] : '' ?>">
                            <?php
                                if(!empty($_SESSION['telefone_erro'] )) {
                                    echo '<small class="text-danger">'.$_SESSION['telefone_erro'].'</small>';
                                    unset($_SESSION['telefone_erro']);
                                }
                            ?>
                        </div>                        

                        <div class="form-group col-6">
                            <label for="inputCidade">Cidade</label>
                            <input type="text" class="form-control" id="inputcidade" name="cidade" value="<?= isset($_SESSION['temp_dados']['cidade']) ? $_SESSION['temp_dados']['cidade'] : '' ?>">
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
                                <?= isset($_SESSION['temp_dados']['estado']) ? '<option value="'.$_SESSION['temp_dados']['estado'].'">'.$_SESSION['temp_dados']['estado'].'</option>' : '<option value="">Escolha um estado</option>' ?>
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
                                <?= isset($_SESSION['temp_dados']['categoria']) ? '<option value="'.$_SESSION['temp_dados']['categoria'].'">'.$_SESSION['temp_dados']['categoria'].'</option>' : '<option value="">Escolha uma categoria</option>' ?>
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