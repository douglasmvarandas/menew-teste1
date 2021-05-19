@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header  text-center">
                    Administração de agendamentos
                </h3>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('schedules.create')}}" class="btn btn-outline-primary">
                            <span><i class="bi bi-plus-square"></i>&nbspAdicionar</span>
                        </a>
                    </div>
                    <div class="form-group col-md-2 offset-md-4">
                        <input type="text" class="form-control " id="search" placeholder="Pesquisa">
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive-sm">
                        <table  class="table table-bordered text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody id="table">
                                @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{$schedule->id}}</td>
                                    <td>{{$schedule->name}}</td>
                                    <td>{{$schedule->email}}</td>
                                    <td>
                                        <a href="{{route('schedules.edit', $schedule->id)}}" class="btn btn-outline-info btn-sm">
                                            <span><i class="bi bi-pencil-square"></i>&nbspEditar</span>
                                        </a>
                                        &nbsp
                                        <a href="{{route('schedules.show', $schedule->id)}}" class="btn btn-outline-info btn-sm">
                                            <span><i class="bi bi-box-arrow-right"></i>&nbspAcessar</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            let $rows = $('#table tr');
            $('#search').keyup(function() {

                let val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
                    reg = RegExp(val, 'i'),
                    text;

                $rows.show().filter(function() {
                    text = $(this).text().replace(/\s+/g, ' ');
                    return !reg.test(text);
                }).hide();
            });
        });
    </script>
@endpush
