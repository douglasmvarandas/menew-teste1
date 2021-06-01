$('.excluir').click(async function (event){
    let ancora = $(this).attr('href');
    event.preventDefault();
    let result = await Swal.fire({
        title: 'Tem certeza que deseja excluir',
        text: "Você não poderá reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim'
      });

      if (result.isConfirmed) {
          window.location.href = ancora;
      }
})
