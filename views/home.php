<?php
require_once 'config.php';
$title = "Home";
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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>256985478</td>
                    <td>mark@email.com</td>
                    <td>Brasília</td>
                    <td>DF</td>
                    <td>Fornecedor</td>
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
            </tbody>
        </table>
    </div>
</div>

<?php require_once dirname(__DIR__) . '/partials/footer.php'; ?>