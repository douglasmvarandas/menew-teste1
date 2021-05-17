

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-10 text-left">
            <h3 class="mt-5 mb-3 text-white">Lista de contatos</h3>

            <?php if(isset($_GET['edit']) && $_GET['edit'] == 'ok'): ?>
                <div class="alert alert-success" role="alert">
                    Alterações efetuadas com sucesso.
                </div>
            <?php endif; ?>

            <?php if(isset($_GET['delete']) && $_GET['delete'] == 'ok'): ?>
                <div class="alert alert-warning" role="alert">
                    Contato excluído com sucesso.
                </div>
            <?php endif; ?>

            <?php if(isset($_GET['erro']) && $_GET['erro'] == 'ok'): ?>
                <div class="alert alert-danger" role="alert">
                    Não foi possível carregar informações do contato.
                </div>
            <?php endif; ?>

            <div class="card shadow">
                <div class="card-body table-responsive">

                    <table class="table table-hover" id="tabela-contatos">
                        <thead class="table-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>Categoria</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach($dados as $contato): ?>
                                <tr>
                                    <td><?= $contato->nome ?></td>
                                    <td><?= $contato->email ?></td>
                                    <td><?= $contato->telefone ?></td>
                                    <td><?= $contato->cidade ?></td>
                                    <td><?= $contato->estado ?></td>
                                    <td><?= ucfirst($contato->categoria) ?></td>
                                    <td class="text-right">
                                        <a href="?p=edit&id=<?= $contato->id ?>" data-toggle="popover" data-content="Editar selecionado">
                                            <i class="far fa-edit" style="font-size: 1.2em; color: green"></i>
                                        </a>
                                    </td>
                                    <td class="text-right">
                                        <a href="?p=delete_contato&id=<?= $contato->id ?>" data-toggle="popover" data-content="Excluir selecionado">
                                            <i class="far fa-trash-alt" style="font-size: 1.2em; color: red;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready( function () {
        $('#tabela-contatos').DataTable({
            language: {
                search: "Pesquisar",
                lengthMenu: "Apresenta _MENU_ contatos por página",
                zeroRecords: "Não foram encontrados contatos",
                info: "Página _PAGE_ de _PAGES_",
                infoEmpty: "Não existem contatos diponíveis",
                infoFiltered: "(Filtrado de um total de _MAX_ total)",
                paginate: {
                    first: "Primeiro",
                    last: "Último",
                    next: "Próximo",
                    previous: "Anterior"
                },
            },
            aoColumnDefs: [
                { 'bSortable': false, 'aTargets': [ 6,7 ] }
            ]
        });
    });

    $(document).ready(function(){
        $('[data-toggle="popover"]').popover({
            placement : 'top',
            trigger : 'hover'
        });
    });
    
</script>
