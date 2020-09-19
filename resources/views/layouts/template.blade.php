<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Menew Contatos</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm shadow-lg navbar-dark bg-dark">
        <a href="http://localhost:8000">
            <img width="70px" height="auto" src="https://mvarandas.com.br/static/default/images/menew-bymv.png" alt="logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <div class="input-group input-group-lg">
                    <input class="form-control" type="search" id="search" placeholder="Pesquisar contato" aria-label="Search">
                    <div class="input-group-append">
                        <button onclick="searchContact()" class="btn" style="background-color: #bc0723"><i style="color:white;" class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>


    <script src="https://kit.fontawesome.com/cfd8b43b94.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>

        const searchField = document.getElementById('search');

        function searchContact() {
            queryParam = searchField.value
            renderContacts(queryParam)
        }

    </script>
  </body>
</html>
