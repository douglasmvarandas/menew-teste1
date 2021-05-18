<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Menew</title>
    <link rel="stylesheet" href="cadastro.css">
</head>

<body>
    <h1>Cadastre-se !</h1>
    <div id="main">
        <div><img src="images/Menew_logo.png" id="logo"></div>
    </div>
    <div id="form">
        <form action="cadastro.php" method="POST">
            <input type="text" name="nome" id="nome" placeholder="Nome:" class="inp" maxlength="30">
            <input type="text" name="telefone" id="telefone" placeholder="Telefone:" class="inp" maxlength="12">
            <input type="text" name="email" id="email" placeholder="E-mail:" class="inp" maxlength="30">
            <input type="text" name="cidade" id="cidade" placeholder="Cidade:" class="inp" maxlength="30">
            <select class="inp" name="estado">
                <option value="default">Estado:</option>
                <option value="Paraíba" class="selected">Paraíba</option>
                <option value="Pernambuco" class="selected">Pernambuco</option>
                <option value="Rio Grande Do Norte" class="selected">Rio Grande Do Norte</option>
                <option value="São Paulo" class="selected">São Paulo</option>
                <option value="Rio De Janeiro" class="selected">Rio De Janeiro</option>
            </select>
            <select class="inp" name="categoria">
                <option value="default">Categoria:</option>
                <option value="Cliente" class="selected">Cliente</option>
                <option value="Fornecedor" class="selected">Fornecedor</option>
                <option value="Funcionário" class="selected">Funcionário</option>
            </select>
            <input type="submit" class="btn btn-primary" id="btn" value="Cadastrar">
            <br>
            <a href="index.php" class="btn btn-primary" id="btn">Voltar ao menu anterior</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>