@extends('layouts.root')
@extends('layouts.sidebar')
@extends('layouts.footer')

@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Novo Contato</h3>
        <div class="row mb-3">
            <div class="col">
                <div class="row mb-3 d-none">
                    <div class="col">
                        <div class="card text-white bg-primary shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                </div>
                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Novo Contato</p>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-row flex-column flex-lg-row flex-xl-row">
                                        <div class="col">
                                            <div class="form-group"><label for="username"><strong>Nome</strong></label><input class="form-control" type="text" placeholder="Fulano de Tal" name="username"></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="email"><strong>Email</strong></label><input class="form-control" type="email" placeholder="fulano@exemplo.com" name="email"></div>
                                        </div>
                                    </div>
                                    <div class="form-row flex-column flex-lg-row flex-xl-row">
                                        <div class="col">
                                            <div class="form-group"><label for="first_name"><strong>Telefone</strong></label><input class="form-control" type="text" placeholder="(XX) XXXXX-XXXX" name="first_name"></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="last_name"><strong>Categoria</strong></label><input class="form-control" type="text" placeholder="Ex: João Pessoa" name="last_name"></div>
                                        </div>
                                    </div>
                                    <div class="form-row flex-column flex-lg-row flex-xl-row">
                                        <div class="col">
                                            <div class="form-group"><label for="first_name"><strong>Cidade</strong></label><input class="form-control" type="text" placeholder="(XX) XXXXX-XXXX" name="first_name"></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="last_name"><strong>Estado</strong></label><input class="form-control" type="text" placeholder="Ex: João Pessoa" name="last_name"></div>
                                        </div>
                                    </div>
                                    <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Salvar</button></div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-5"></div>
    </div>
@endsection
