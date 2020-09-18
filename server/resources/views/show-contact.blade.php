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
                <div class="col-md-3">
                    <h2>{{__('Contact Info')}}</h2>
                </div>
                <div class="col-md-3"><button class="btn btn-dark" type="button">{{__('Edit')}}</button></div>
            </div>
            <div class="row mt-1 ml-1">
                <span><b>{{__('Name')}}: </b>{{$contact->name}}</span>
            </div>
            <div class="row mt-1 ml-1">
                <span><b>{{__('Telephone')}}: </b>{{$contact->telephone}}</span>
            </div>
            <div class="row mt-1 ml-1">
                <span><b>{{__('Email')}}: </b>{{$contact->email}}</span>
            </div>
            <div class="row mt-1 ml-1">
                <span><b>{{__('City')}}: </b>{{$contact->city}}</span>
            </div>
            <div class="row mt-1 ml-1">
                <span><b>{{__('State')}}: </b>{{$contact->state}}</span>
            </div>
            <div class="row mt-1 ml-1">
                <span><b>{{__('Category')}}: </b>{{$contact->category}}</span>
            </div>
        </div>
    </section>
</x-app-layout>
