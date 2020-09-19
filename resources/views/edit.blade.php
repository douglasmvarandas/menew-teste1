@extends('layouts.template')

@section('content')

<?php $id = $_GET['id']; ?>

<a class="btn btn-secondary mt-5" href="http://localhost:8000">Voltar</a>

<h1 class="text-center mt-5">Editar contato</h1>

<form class="mb-5" action="http://localhost:8000/api/contacts/<?= $id ?>/" method="POST" id="edit-form">
    @csrf

    <input type="hidden" name="_method" value="put" />

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
            <input class="form-control" type="number" min="0" length="8" name="phone" required>
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

    <button class="btn btn-primary btn-block btn-lg mt-5" onclick="redirectToHomePage()">Salvar</button>
</form>

<script>

    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    const url = `http://localhost:8000/api/contacts/${id}`


    function redirectToHomePage() {
        setTimeout(() => {
            window.location.replace('http://localhost:8000')
        }, 100);
    }

    fetch(url)
        .then(res => {
            if (!res.ok) {
                console.warn(res)
                throw new Error()
            }
            return res.json()
        })
        .then(data => {
            const { name, email, city, phone, category, state} = data
            document.getElementsByName('name')[0].value = name
            document.getElementsByName('email')[0].value = email
            document.getElementsByName('phone')[0].value = phone
            document.getElementsByName('city')[0].value = city
            document.getElementsByName('category')[0].value = category
            document.getElementsByName('state')[0].value = state
        })
        .catch(error => console.warn(error))

</script>

@endsection
