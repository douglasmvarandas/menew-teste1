<!DOCTYPE html>
<html lang="pt-br">
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste para menew - teste 1</title>
    <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">
    {{-- Style DataTables --}}
    <link rel="stylesheet" href="{{ asset('libs/DataTables/datatables.min.css') }}">
    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @yield('css')
</head>

<body>
    <div class="wrapper">
        <!-- Page Content  -->
        <div id="content">
            <div class="container-fluid">
                @yield('container')
            </div>
        </div>
    </div>
    <script src="{{ asset('libs/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.js') }}"></script>
    {{-- Table --}}
    <script src="{{ asset('libs/DataTables/datatables.min.js') }}"></script>
    {{-- Alert --}}
    <script src="{{ asset('libs/sweetalert2.all.min.js') }}"></script>
    {{-- input mask --}}
    <script src="{{ asset('libs/jquery.mask.min.js') }}"></script>
    @yield('js')
</body>

</html>
