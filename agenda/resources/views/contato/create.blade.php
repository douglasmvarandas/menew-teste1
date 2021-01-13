@extends('template')

@section('conteudo')
    <div class="row">
        <div class="col-sm-4 col">
            <h2>Criar novo contato</h2>
        </div>
    </div>

    <hr/>

    <form method="POST" action="{{route('contato.store')}}">
        @csrf
        <div class="row my-2">
            <div class="col">
                <label for="nome" class="sr-only">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required autofocus>
            </div>
            <div class="col">
                <label for="telefone" class="sr-only">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone" required autofocus>
            </div>
        </div>

        <div class="row my-2">
            <div class="col">
                <label for="email" class="sr-only">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Endereço de email" required autofocus>
            </div>
            <div class="col">
                <label for="telefone" class="sr-only">Cidade</label>
                <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" required autofocus>
            </div>
        </div>

        <div class="row my-2">
            <div class="col d-flex">
                <select name="estado" id="estado" class="form-control" required>
                    <option value="">Escolha o estado</option>
                    <option value="rn">RN</option>
                    <option value="pb">PB</option>
                    <option value="pe">PE</option>
                    <option value="ce">CE</option>
                    <option value="sp">SP</option>
                </select>
            </div>
            <div class="col">
                <select name="categoria" id="categoria" class="form-control" required>
                    <option value="">Escolha uma categoria</option>
                    <option value="cliente">Cliente</option>
                    <option value="fornecedor">Fornecedor</option>
                    <option value="funcionário">Funcionário</option>
                </select>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Adicionar contato</button>
    </form>
@endsection