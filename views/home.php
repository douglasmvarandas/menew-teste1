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



$_SESSION['aviso'] = null;

require_once dirname(__DIR__) . '/partials/header.php';
?>
<div class="container">
    <?php require_once dirname(__DIR__) . '/partials/navbar.php'; ?>

    <div class="table-responsive">
        <table id="table" class="table caption">
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
            <tbody id="tbody">
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
                            <a href="<?= $base ?>/views/cadastrar.php?id_contato=<?= $lista->id_contato ?>" class="btn btn-sm btn-primary">
                                <i class="material-icons">tune</i>
                            </a>
                        </td>
                        <td>
                            <a onclick="event.preventDefault();swallTrigger({base:'<?= $base ?>',id:'<?= $lista->id_contato ?>'})" href="#" class="btn btn-sm btn-danger">
                                <i class="material-icons">clear</i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= $base ?>/assets/functions.js"></script>
<?php require_once dirname(__DIR__) . '/partials/footer.php'; ?>