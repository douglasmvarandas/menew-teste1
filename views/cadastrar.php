<?php
require_once dirname(__DIR__) . '/config.php';
$title = "Cadastro";
require_once dirname(__DIR__) . '/partials/header.php';
?>
<div class="container">
    <?php require_once dirname(__DIR__) . '/partials/navbar.php'; ?>
    <header>
        <h1 class="text-center">Acrescentar Contato</h1>
    </header>
    <br />
    <form method="POST" action="<?= $base ?>/controlls/ctrl_cadastro.php">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="InputNome">Nome</label>
                <input type="text" class="form-control" id="InputNome" name="nome" required>
            </div>
            <div class="form-group col-md-6">
                <label for="InputTel">Telefone</label>
                <input type="text" class="form-control" id="InputTel" placeholder="Ex: 6198765-4321" name="telefone" required>
            </div>
        </div>
        <div class="form-group">
            <label for="InputEmail">Email</label>
            <input type="email" class="form-control" id="InputEmail" placeholder="Ex: exemplo@email.com" name="email">
        </div>
        <div class="form-row">
            <div class="form-group  col-md-6">
                <label for="InputCidade">Cidade</label>
                <input type="text" class="form-control" id="InputCidade" placeholder="Ex: Brasília" name="cidade" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Estado</label>
                <select id="inputState" class="form-control" name="estado" required>
                    <option selected>Estado...</option>
                    <option value="DF">DF</option>
                    <option value="SP">SP</option>
                    <option value="RJ">RJ</option>
                    <option value="MG">MG</option>
                    <option value="RS">RS</option>

                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="SelectCategoria">Categoria</label>
                <select id="SelectCategoria" class="form-control" name="categoria" required>
                    <option selected>Categoria...</option>
                    <option value="Cliente">Cliente</option>
                    <option value="Fornecedor">Fornecedor</option>
                    <option value="Funcionário">Funcionário</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<?php require_once dirname(__DIR__) . '/partials/footer.php'; ?>