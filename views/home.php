<?php
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/dao/contatosMysql.php';

$title = "Home";

$listDao = new contatosMySql($pdo);
if ($_POST) {
    $listContatos = ($listDao->searchContatoByName($_POST['pesquisar'])) ? $listDao->searchContatoByName($_POST['pesquisar']) : [];
} else {
    $listContatos = ($listDao->listContatos()) ? $listDao->listContatos() : [];
}


require_once dirname(__DIR__) . '/partials/header.php';
?>
<div class="container">
    <?php require_once dirname(__DIR__) . '/partials/navbar.php'; ?>

    <div class="table-responsive">
        <table class="table caption">
            <caption>Agenda</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listContatos as $lista) : ?>
                    <tr>
                        <th scope="row"><?= $lista->id_contato ?></th>
                        <td><?= $lista->nome ?></td>
                        <td><?= $lista->telefone ?></td>
                        <td><?= $lista->email ?></td>
                        <td><?= $lista->cidade ?></td>
                        <td><?= $lista->estado ?></td>
                        <td><?= $lista->categoria ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary">
                                <i class="material-icons">tune</i>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger">
                                <i class="material-icons">clear</i>
                            </button>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once dirname(__DIR__) . '/partials/footer.php'; ?>