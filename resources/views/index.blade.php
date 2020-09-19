@extends('layouts.template')

@section('content')

<button class="btn btn-primary mt-5" data-toggle="modal" data-target="#add-window">Novo contato</button>
<div class="d-flex justify-content-center">
    <div id="contacts-container"></div>
</div>

<!-- Modal Adicionar -->
<div class="modal fade" id="add-window">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header" >
      <h5 class="modal-title">Adicionar contato</h5>
      <button class="close" data-dismiss="modal"><span>&times;</span></button>
    </div>
    <div class="modal-body">

      <form onsubmit="return postData() & closeModal(event)" id="post-form">

        <div class="form-group">
          <label for="email">Nome:</label>
          <div class="input-group input-group-lg">
            <input class="form-control" type="text" name="name" minlength=3 required>
          </div>
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <div class="input-group input-group-lg">
            <input class="form-control" type="email" name="email" required>
          </div>
        </div>

        <div class="form-group">
          <label for="email">Telefone:</label>
          <div class="input-group input-group-lg">
            <input class="form-control" type="number" min="0" minlength="8" name="phone" required>
          </div>
        </div>

        <div class="form-group">
          <label for="categoria">Estado:</label>
          <select name="state" class="custom-select" required>
              <option value="RJ">Rio de Janeiro</option>
              <option value="PB">Paraíba</option>
              <option value="RN">Rio Grande do Norte</option>
              <option value="SC">Santa Catarina</option>
              <option value="MG">Minas Gerais</option>
          </select>
        </div>

        <div class="form-group">
          <label for="email">Cidade:</label>
          <div class="input-group input-group-lg">
            <input class="form-control" type="text" name="city" required>
          </div>
        </div>

        <div class="form-group">
          <label for="categoria">Categoria:</label>
          <select name="category" class="custom-select" required>
              <option value="cliente">Cliente</option>
              <option value="fornecedor">Fornecedor</option>
              <option value="funcionario">Funcionário</option>
          </select>
        </div>

        <button class="btn btn-primary btn-block btn-lg mt-5">Salvar</button>

      </form>
    </div>
  </div>
</div>
</div>

<script>

    const baseUrl = "http://localhost:8000/api/contacts/"
    const containerElem = document.getElementById('contacts-container')

    function deleteContact(id) {
        fetch(baseUrl+id, {
            method: 'DELETE'
        })
            .then(res => {
                if (!res.ok) {
                    console.warn(res)
                    throw new Error()
                }
                return res.json()
            })
            .then(() => {
                location.reload()
                return false
            })
            .catch(error => console.warn(error))

        renderContacts()
    }

    function closeModal(event) {
        event.preventDefault();
        $('#add-window').modal('hide');
    }

    function postData() {
        const formData = new this.FormData(document.getElementById('post-form'))

        fetch(baseUrl, {
            method: 'POST',
            body: formData
        })
            .then(res => {
                if (!res.ok) {
                    console.warn(res)
                    throw new Error()
                }
                return res.json()
            })
            .then((data) => {
                console.log(data)
            })
            .catch(error => console.warn(error))

        renderContacts()
        return false
    }

    function renderContacts(queryParam = '') {
        fetch(baseUrl+"?search="+queryParam)
            .then(res => {
                if (!res.ok) {
                    console.warn(res)
                    throw new Error()
                }
                return res.json()
            })
            .then(data => {
                removeContacts()
                const html = data.map(contact => {
                    const {id, name, phone, email, state, city, category} = contact
                    return `
                        <div class="jumbotron mt-5" style="max-width:520px;">
                            <div class="d-flex flex-wrap justify-content-between">
                                <p class="d-inline mr-5"><strong>Nome:</strong> ${name}</p>
                                <p class="d-inline mr-5"><strong>Telefone:</strong> ${phone}</p>
                                <p class="d-inline mr-5"><strong>Email:</strong> ${email}</p>
                                <p class="d-inline mr-5"><strong>Estado:</strong> ${state}</p>
                                <p class="d-inline mr-5"><strong>Cidade:</strong> ${city}</p>
                                <p class="d-inline mr-5"><strong>Categoria:</strong> ${category}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a onclick="deleteContact(${id})" class="btn btn-danger btn-sm mr-5">Excluir</a>
                                <a href="http://localhost:8000/edit?id=${id}" class="btn btn-success btn-sm mr-5">Editar</a>
                            </div>
                        </div>
                    `
                }).join('')
                if (html) {
                    containerElem.insertAdjacentHTML('afterbegin', html)
                } else {
                    containerElem.insertAdjacentHTML('afterbegin',
                        '<h4 class="text-center mt-5">Ainda não há nenhum contato</h4>'
                    )
                }
            })
            .catch(error => console.warn(error))
    }

    function removeContacts() {
        containerElem.innerHTML = '';
    }

    renderContacts()

</script>

@endsection
