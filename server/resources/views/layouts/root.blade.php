<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{asset('/assets/fonts/fontawesome-all.min.css')}}">
</head>

<body id="page-top">
<div id="wrapper">
    @yield('sidebar')
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            @yield('content')
        </div>
        @yield('footer')
    </div>
</div>
</body>

</html>
