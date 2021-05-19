@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header  text-center">
                    Agendamento de {{$schedule->name}}
                </h3>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('schedules.index')}}" class="btn btn-outline-info">
                            <span><i class="bi bi-arrow-left-square"></i></i>&nbspVoltar</span>
                        </a>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="nome">Nome</label>
                                <input disabled type="text" class="form-control" id="nome" value="{{$schedule->name}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telephone">Telefone</label>
                                <input disabled type="text" class="form-control" id="telephone" value="{{$schedule->telephone}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input disabled type="email" class="form-control" id="email" value="{{$schedule->email}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="city">Cidade</label>
                                <input disabled type="text" class="form-control" id="city" value="{{$schedule->city}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="states">Estado</label>
                                <input disabled type="text" class="form-control" id="states" value="{{$schedule->state->name}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="category">Categoria</label>
                                <input disabled type="text" class="form-control" id="category" value="{{$schedule->category->name}}">
                            </div>
                            <form method="POST" action="{{route('schedules.destroy', $schedule->id)}}" class="orm-group col-md-12">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger float-right"><i class="bi bi-trash"></i>&nbspExcluir</button>
                            </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#telephone').mask('(99) 99999-9999');
        });
    </script>
@endpush
