<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda | Início</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
</head>

<body>
    
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Agenda</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro.php">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar.php">Listar</a>
                    </li>
                </ul>
                </div>
            </div>
            <!--pesquisa-->
            <form action="pesquisa.php" method="POST">
            <div class="input-group">
                <input type="search" class="form-control rounded" name="nome" placeholder="Pesquisar" aria-label="Search"
                    aria-describedby="search-addon" />
                <button type="submit" class="btn" style="color: white; font-weight: bold; border-color: white;">Pesquisar</button>
            </div>
            </form>
        </nav>
    </div>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>