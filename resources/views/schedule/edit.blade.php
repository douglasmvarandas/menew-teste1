@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header  text-center">
                    Atualizar Agendamento de {{$schedule->name}}
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
                        <form method="POST" action="{{ route('schedules.update', $schedule->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" value="{{$schedule->name}}" name="name" placeholder="Nome">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="telephone">Telefone</label>
                                    <input type="text" class="form-control" id="telephone" value="{{$schedule->telephone}}" name="telephone" placeholder="Telefone">
                                </div>
                                  <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" value="{{$schedule->email}}" name="email" placeholder="Email">
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="city">Cidade</label>
                                    <input type="text" class="form-control" id="city" value="{{$schedule->city}}" name="city" placeholder="Cidade">
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="states">Estado</label>
                                    <select class="form-control" id="states" name="state_id">
                                      @foreach ($states as $state)
                                          <option {{ $schedule->state_id == $state->id ? 'selected' : '' }} value="{{$state->id}}">{{$state->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="category">Categoria</label>
                                    <select class="form-control" id="category" name="category_id">
                                      @foreach ($categories as $category)
                                          <option {{ $schedule->category_id == $category->id ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-outline-success float-right"><i class="bi bi-check2-square"></i>&nbspAtualizar</button>
                                  </div>
                            </div>
                          </form>
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
