function swallTrigger(params) {
    console.log(params);
    Swal.fire({
        title: "Excluir",
        text: "Deseja excluir este contato?",
        showCancelButton: true,
        confirmButtonColor: "#6A9944",
        confirmButtonText: "Confirmar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: params.base + '/controlls/ctrl_excluir.php',
                type: 'post',
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                data: JSON.stringify(params),
                success: function (resultado) {
                    window.location.href = resultado.base;
                }
            });
        }
    });
}