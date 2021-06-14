<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;url=agenda.php" />
    <!-- Bootstrap -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Redirecionando...</title>
</head>

<body>
    <div id="page-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-left:2%">
            <a class="navbar-brand" href="#">Agenda Menew
                <img src="./assets/img/notebook.png" width="31" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro.php">Cadastro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="agenda.php">Sua Agenda</a>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="container d-flex justify-content-center pt-4">
            <div class="row">
                <?php
                include "connect-bd.php";

                $id = $_POST['id'];
                $nome = $_POST['nome'];

                $sql = "DELETE FROM `pessoas` WHERE id = '$id'";


                if (mysqli_query($connection, $sql)) {
                    echo "<h1 class='display-6'>$nome foi excluído(a)!</h1>";
                } else
                    echo "<h1 class='display-6'>Erro ao tentar excluir $nome</h1>";

                ?>
            </div>
        </div>

        <div class="container ">
            <div class="row d-flex justify-content-center">
                <center></center>
                <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 550 100" enable-background="new 0 0 0 0" xml:space="preserve">
                    <path fill="#ED4848" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                        <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                    </path>
                </svg>
            </div>
        </div>
    </div>


    <?php
    include_once 'assets/includes/footer.php';
    ?>