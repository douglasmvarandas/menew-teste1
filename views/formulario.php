<?php
require_once("../controllers/AgendaController.php");
$agenda = new AgendaController();
$categorias = $agenda->getCategorias();

if (isset($_GET['id'])) {
    $pessoa = $agenda->editar();
} else {
    $pessoa = ["Nome" => "", "Telefone" => "", "Email" => "", "Cidade" => "", "Estado" => "", "Descricao" => "", "ID_Cat" => ""];
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Atualiza dados
    if (isset($_POST['id'])) {
        $agenda->atualizar();
    }
    // Adiciona dados
    else {
        $agenda->adicionar();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Formulário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="../public/js/formulario.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1 class="font-weight-lighter">Agenda
                    <small class="text-muted">Formulário</small>
                </h1>
            </div>
        </div>
        <form action="" method="POST">
            <?php if (isset($_GET['messagem'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_GET['messagem'] ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['id'])): ?>
                <input type="hidden" name="id" value="<?= $pessoa['ID'] ?>">
            <?php endif; ?>
            <div class="form-group">
                <label for="inputNome">Nome</label>
                <input type="text" name="nome" class="form-control" id="inputNome" placeholder="Digite seu nome" maxlength="255" value="<?= utf8_encode($pessoa['Nome']) ?>" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputEmail">Endereço de Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="nome@exemplo.com" value="<?= $pessoa['Email'] ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputTelefone">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="inputTelefone" placeholder="Digite seu telefone" maxlength="14" value="<?= $pessoa['Telefone'] ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputCidade">Cidade</label>
                    <input type="text" name="cidade" class="form-control" id="inputCidade" placeholder="Digite sua Cidade" maxlength="100" value="<?= utf8_encode($pessoa['Cidade']) ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="selectEstado">Estado</label>
                    <select name="estado" id="selectEstado" class="form-control">
                        <option value="" selected>Escolha...</option>
                        <option value="Paraíba" <?= utf8_encode($pessoa['Estado']) == "Paraíba"?"selected":"" ?>>Paraíba</option>
                        <option value="Pernambuco" <?= utf8_encode($pessoa['Estado']) == "Pernambuco"?"selected":"" ?>>Pernambuco</option>
                        <option value="São Paulo" <?= utf8_encode($pessoa['Estado']) == "São Paulo"?"selected":"" ?>>São Paulo</option>
                        <option value="Rio de Janeiro" <?= utf8_encode($pessoa['Estado']) == "Rio de Janeiro"?"selected":"" ?>>Rio de Janeiro</option>
                        <option value="Rio Grande do Sul" <?= utf8_encode($pessoa['Estado']) == "Rio Grande do Sul"?"selected":"" ?>>Rio Grande do Sul</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="selectCategoria">Categoria</label>
                <select name="categoria" id="selectCategoria" class="form-control">
                    <option value="" selected>Escolha...</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria['ID'] ?>" <?= $pessoa['ID_Cat'] == $categoria['ID']?"selected":"" ?>><?= utf8_encode($categoria['Descricao']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="listagem.php" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</body>

</html>