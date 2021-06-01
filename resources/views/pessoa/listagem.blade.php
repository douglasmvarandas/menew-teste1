@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::get('message'))
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success">
                        {{ Session::remove('message') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center">Lista de contatos</h3>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-sm-12">
                <a href="/pessoa/add" class="btn btn-success">Adicionar contato</a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </thead>

                    <tbody>
                        {!! html_entity_decode($html) !!}
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="/js/listagem.js"></script>
@endsection
