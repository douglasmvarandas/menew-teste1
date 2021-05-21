var table;
//Value 1 create - value 2 update
var typeMethod;
jQuery(function () {
    //Token laravel
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //remove the validation 
    $("#formClient input, div, select").focusin(function (e) {
        $(this).removeClass('is-invalid');
    });

    //Open modal
    $("#addClient").on('click', function () {
        $("#saveClient").show();
        typeMethod = 1;
        $("#titleModal").text('Criar Cliente');
        //Reset form
        $("#formClient input, select").each(function (index) {
            $(this).val('');
            $(this).removeClass('is-invalid');
            //enabling all fields on the form
            $(this).attr('disabled', false);

        });
        //
        $('input[name=phone]').mask('(00) 00000-0000');

        $("#modalCreate").modal('show');
    });

    tableRegister();

});

//creating the table 
function tableRegister() {
    table = $('#tableClient').DataTable({
        //the data will be processed on the client-side
        bServerSide: false,
        bDestroy: true,
        //Load
        "processing": true,
        "order": [[0, "asc"]],
        //restricting some elements
        dom: 'Bfrtip',
        //requisition route
        ajax: "/administrador/tabela",
        //columns returned from the request
        columns: [
            { data: 'id_client' },
            { data: 'name' },
            { data: 'phone' },
            { data: 'name_category_client' },
            { data: 'action', name: 'action', orderable: false, searchable: false }

        ],
        //Translating the Table into PORTUGUESE
        "bJQueryUI": true,
        "oLanguage": {
            "lengthChange": false,
            "pageLength": 10,
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Pesquisar: ",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"
            }
        }

    });

}

//Display the specified resource.
function viewClient(idClient) {
    $("#saveClient").hide();
    $.ajax({
        type: "GET",
        url: "administrador/visualizar",
        data: {
            idClient
        },
        dataType: "JSON",
        success: function (data) {
            $("#titleModal").text('Visualizar Cliente');
            $('input[name=idClient]').val(data[0].id_client);
            $('input[name=name]').val(data[0].name);
            $('input[name=email]').val(data[0].email);
            $('input[name=phone]').val(data[0].phone);
            $('input[name=city]').val(data[0].name_city);
            $('select[name=state]').val(data[0].id_state);
            $('select[name=category]').val(data[0].id_category_client);
            //disabled form
            $("#formClient input, select").each(function (index) {
                $(this).attr('disabled', true);
                $(this).removeClass('is-invalid');
            });
            $("#modalCreate").modal('show');

        }
    });
}

//Show the form for editing the specified resource.
function editClient(idClient) {
    $("#saveClient").show();
    typeMethod = 2;
    $.ajax({
        type: "GET",
        url: "administrador/editar",
        data: {
            idClient
        },
        dataType: "JSON",
        success: function (data) {
            $("#titleModal").text('Editar Cliente');
            $('input[name=idClient]').val(data[0].id_client);
            $('input[name=name]').val(data[0].name);
            $('input[name=email]').val(data[0].email);
            $('input[name=phone]').val(data[0].phone);
            $('input[name=city]').val(data[0].name_city);
            $('select[name=state]').val(data[0].id_state);
            $('select[name=category]').val(data[0].id_category_client);
            //disabled form
            $("#formClient input, select").each(function (index) {
                $(this).attr('disabled', false);
                $(this).removeClass('is-invalid');
            });
            $("#modalCreate").modal('show');

        }
    });
}

//método faz um requisição para alterar o status de atividade
function deleteClient(idClient) {
    //Alert
    Swal.fire({
        title: 'Você tem certeza?',
        text: "Você não poderá reverter isso!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, delete!',
        cancelButtonText: 'Cancelar!',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: "administrador/deletar",
                data: {
                    idClient
                },
                dataType: "JSON",
                success: function (response) {
                    //reload the table
                    $('#tableClient').DataTable().ajax.reload();
                    //Alert
                    Swal.fire({
                        title: 'Deletado!',
                        text: 'O Cliente foi excluído',
                        type: 'success',
                        timer: 1500
                    });
                }
            });
        }
    });
}

//request to create a new customer or update
$("#saveClient").on('click', function () {
    var url;
    if (typeMethod == 1) {
        url = "administrador/criar";
    } else {
        url = "administrador/atualizar";
    }

    var formData = new FormData($("#formClient")[0]);
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        dataType: "JSON",
        success: function (data) {
            //reload the table
            $('#tableClient').DataTable().ajax.reload();
            //Alert
            Swal.fire({
                title: 'Atividade realizada com sucesso!',
                type: 'success',
                timer: 1500
            });

            $("#modalCreate").modal('hide');
        }, error: function (error) {
            //check if the error return is a validation error
            if (error.status == 422) {
                $.each(error.responseJSON.errors, function (index, value) {
                    $('.validation_' + index).addClass('is-invalid');
                    $('.response_' + index).text(value);
                });
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error!',
                    text: 'Ocorreu um erro inesperado, tente novamente em alguns instantes.',
                    showConfirmButton: true,
                    timer: 2000
                });
            }
        }
    });
});