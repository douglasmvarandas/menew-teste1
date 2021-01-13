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
                <input type="text" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome" required autofocus>
                @error('nome')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col">
                <label for="telefone" class="sr-only">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="form-control @error('telefone') is-invalid @enderror" placeholder="Telefone" required autofocus>
                @error('telefone')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row my-2">
            <div class="col">
                <label for="email" class="sr-only">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Endereço de email" required autofocus>
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col">
                <label for="cidade" class="sr-only">Cidade</label>
                <input type="text" id="cidade" name="cidade" class="form-control @error('cidade') is-invalid @enderror" placeholder="Cidade" required autofocus>
                @error('cidade')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row my-2">
            <div class="col d-flex">
                <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror" required>
                    <option value="">Escolha o estado</option>
                    <option value="rn">RN</option>
                    <option value="pb">PB</option>
                    <option value="pe">PE</option>
                    <option value="ce">CE</option>
                    <option value="sp">SP</option>
                </select>
                @error('estado')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col">
                <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror" required>
                    <option value="">Escolha uma categoria</option>
                    <option value="cliente">Cliente</option>
                    <option value="fornecedor">Fornecedor</option>
                    <option value="funcionário">Funcionário</option>
                </select>
                @error('categoria')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Adicionar contato</button>
    </form>

    <a class="btn btn-link" href="{{route('contato.index')}}">Voltar para a tela principal</a>
@endsection