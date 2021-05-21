@extends('layout.app')

@section('container')
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <h1>Registro de clientes</h1>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary float-right" id="addClient">Adicionar</button>
            </div>
        </div>
        <table class="table table-bordered" id="tableClient" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
        </table>
    </div>
    @include('modal-register')
@endsection
@section('js')
    <script src="{{ asset('js/admin.js') }}"></script>
@endsection
