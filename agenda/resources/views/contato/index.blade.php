@extends('template')

@section('conteudo')
    <div class="row">
        <div class="col-sm-4 col">
            <h2>Lista de contatos</h2>
        </div>
        <div class="col">
            <a href="{{route('contato.create')}}" class="btn btn-success">Adicionar contato</a>
        </div>
    </div>

    <hr/>

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contatos as $contato)
                    <tr>
                        <td>{{$contato->nome}}</td>
                        <td>{{$contato->telefone}}</td>
                        <td>{{$contato->email}}</td>
                        <td>{{$contato->cidade}}</td>
                        <td class="text-uppercase">{{$contato->estado}}</td>
                        <td class="text-capitalize">{{$contato->categoria}}</td>
                        <td>
                            <span>
                                <a href="{{route('contato.edit', $contato->id)}}" class="mx-2">
                                    <span class="mdi mdi-pencil"></span>
                                </a>
                                <a href="{{route('contato.delete', $contato->id)}}" class="mx-2">
                                    <span class="mdi mdi-delete"></span>
                                </a>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection