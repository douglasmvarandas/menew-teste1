@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center">Adicionar Contato</h3>
            </div>
        </div>
        <form action="/pessoa/add" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label>Nome:</label>
                    <input type="text" name="nome" required class="form-control">
                    @error('nome')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-sm-12 form-group">
                    <label>E-mail:</label>
                    <input type="email" name="email" required class="form-control">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-sm-12 form-group">
                    <label>Telefone:</label>
                    <input type="text" name="telefone" required class="form-control">
                    @error('telefone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-sm-12 form-group">
                    <label>Cidade:</label>
                    <input type="text" name="cidade" required class="form-control">
                    @error('cidade')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-sm-12 form-group">
                    <label>Estado:</label>
                    <select name="estado" class="form-control" required>
                        {!! html_entity_decode($estados) !!}
                    </select>
                    @error('estado')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-sm-12 form-group">
                    <label>Categoria:</label>
                    <select name="categoria" class="form-control" required>
                        {!! html_entity_decode($categorias) !!}
                    </select>

                    @error('categoria')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-sm-12 form-group">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
