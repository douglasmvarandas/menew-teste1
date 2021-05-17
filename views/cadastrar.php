<?php
require_once dirname(__DIR__) . '/config.php';
if ($_GET) {
    require_once dirname(__DIR__) . '/dao/contatosMySql.php';
    $contatoDao = new contatosMySql($pdo);
    $contatoToUpdate = $contatoDao->searchContatoById($_GET['id_contato']);
    $baseAction = $base . '/controlls/ctrl_atualizar.php';
    $buttonValue = "Atualizar";
    $title = "Atualizar Contato";
} else {
    $title = "Cadastro";
    $baseAction = $base . '/controlls/ctrl_cadastro.php';
    $contatoToUpdate = [];
    $buttonValue = "Cadastrar";
}

require_once dirname(__DIR__) . '/partials/header.php';
?>
<div class="container">
    <?php require_once dirname(__DIR__) . '/partials/navbar.php'; ?>
    <header>
        <h1 class="text-center">Acrescentar Contato</h1>
    </header>
    <br />
    <form method="POST" action="<?= $baseAction ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="InputNome">Nome</label>
                <input type="text" class="form-control" id="InputNome" name="nome" value="<?= $contatoToUpdate['nome'] ?? '' ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="InputTel">Telefone</label>
                <input type="text" class="form-control" id="InputTel" placeholder="Ex: 6198765-4321" name="telefone" value="<?= $contatoToUpdate['telefone'] ?? '' ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="InputEmail">Email</label>
            <input type="email" class="form-control" id="InputEmail" placeholder="Ex: exemplo@email.com" value="<?= $contatoToUpdate['email'] ?? '' ?>" name="email">
        </div>
        <div class="form-row">
            <div class="form-group  col-md-6">
                <label for="InputCidade">Cidade</label>
                <input type="text" class="form-control" id="InputCidade" placeholder="Ex: Brasília" name="cidade" value="<?= $contatoToUpdate['cidade'] ?? '' ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Estado</label>
                <select id="inputState" class="custom-select form-control" name="estado" required>
                    <option selected value="<?= $contatoToUpdate['estado'] ?? '' ?>"><?= $contatoToUpdate['estado'] ?? 'Estado...' ?></option>
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
                <select id="SelectCategoria" class="custom-select form-control" name="categoria" required>
                    <option selectedvalue="<?= $contatoToUpdate['categoria'] ?? '' ?>"><?= $contatoToUpdate['categoria'] ?? 'Categoria...' ?></option>
                    <option value="Cliente">Cliente</option>
                    <option value="Fornecedor">Fornecedor</option>
                    <option value="Funcionário">Funcionário</option>
                </select>
            </div>
        </div>
        <input type="hidden" value="<?= $_GET['id_contato'] ?? '' ?>" name="id_contato">
        <button type="submit" class="btn btn-primary"><?= $buttonValue ?></button>
    </form>
</div>

<?php require_once dirname(__DIR__) . '/partials/footer.php'; ?>