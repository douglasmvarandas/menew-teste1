<x-app-layout>
    <nav class="navbar navbar-dark navbar-expand-md bg-dark navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="#" style="color: rgb(255,255,255);">Menew Agenda</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <form class="form-inline mr-auto" target="_self">
                    <div class="form-group">
                        <label for="search-field">
                            <i class="fa fa-search"></i>
                        </label>
                        <input class="form-control search-field" type="search" id="search-field" name="search"
                               placeholder="{{__('Search contact')}}"></div>
                </form>
            </div>
        </div>
    </nav>
    <section class="d-md-flex justify-content-md-center" style="margin-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2>{{__('Contact List')}}</h2>
                </div>
                <div class="col-md-3 col-lg-3"><button class="btn btn-dark" type="button">{{__('Add new')}}</button></div>
            </div>
            <div class="row mt-1">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Telephone')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->telephone}}</td>
                                <td>{{$contact->email}}</td>
                                <td>
                                    <div role="group" class="btn-group">
                                        <button class="btn btn-outline-dark" type="button">{{__('Visualize')}}</button>
                                        <button class="btn btn-outline-dark" type="button">{{__('Edit')}}</button>
                                        <button class="btn btn-outline-dark" type="button">{{__('Delete')}}</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
