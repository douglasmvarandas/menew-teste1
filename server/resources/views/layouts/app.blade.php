<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
    </head>
    <body>

    <nav class="navbar navbar-dark navbar-expand-md bg-dark navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="/" style="color: rgb(255,255,255);">Menew Agenda</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="form-inline mr-auto" method="POST" action="{{url('search/contacts')}}">
                    @csrf
                    <div class="form-group">
                        <label for="search-field">
                            <i class="fa fa-search"></i>
                        </label>
                        <input class="form-control search-field" style="color:white" type="search" id="search-field" name="search"
                               placeholder="{{__('Search contact')}}"></div>
                </form>
            </div>
        </div>
    </nav>

        {{ $slot }}

        @stack('modals')

        @livewireScripts
    </body>
</html>
