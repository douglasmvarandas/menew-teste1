<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Menew</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!-- Custom css -->
    <link rel="stylesheet" href="assets/css/app.css">

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
    

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <img src="assets/img/logo-menew.png" width="30" height="30" class="d-inline-block align-top" alt="">
    &nbsp;&nbsp;&nbsp;
    Agenda Menew
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse ml-5" id="navbarNav">
    <ul class="navbar-nav">

      <li class="nav-item <?= isset($_GET['p']) && $_GET['p'] == 'home' ? 'active' : '' ?>">
        <a class="nav-link" href="?p=home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?= isset($_GET['p']) && $_GET['p'] == 'adicionar' ? 'active' : '' ?>">
        <a class="nav-link" href="?p=adicionar">Adicionar</a>
      </li>

    </ul>
  </div>
</nav>