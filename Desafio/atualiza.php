<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <title>Lista de Agendamentos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <section class="row d-flex justify-content-center" style="padding: 40px;">
        <div class="container">
            <h1>Editar Registros</h1>
            <form method="POST" action="atualizar.php">
                <div class="col">
                    <label>ID:</label>
                    <input class="form-control" type="text" name="id" value="<?php $id = $_GET['edit']; echo $id;?>"readonly><br>
                    <label>Nome:</label>
                    <input class="form-control" type="text" name="nome" placeholder="Digite o Seu Nome" required><br>
                    <label>Telefone:</label>
                    <input class="form-control" type="text" name="telefone" placeholder="Digite o Seu Telefone" required><br>
                    <label>E-mail:</label>
                    <input class="form-control" type="text" name="email" placeholder="Digite o Seu Email" required><br>
                    <label>Cidade:</label>
                    <input class="form-control" type="text" name="cidade" placeholder="Digite a Sua Cidade"><br>
                    <label>Estado:</label>
                    <select class="form-control" name="estado">
                        <option disabled selected>Selecione um Estado</option>
                        <option>Ceará</option>
                        <option>Paraíba</option>
                        <option>Pernambuco</option>
                        <option>Piauí</option>
                        <option>Rio Grande do Norte</option>
                    </select><br>
                    <label>Categoria:</label>
                    <select class="form-control" name="categoria">
                        <option disabled selected>Selecione uma Categoria</option>
                        <option>Cliente</option>
                        <option>Fornecedor</option>
                        <option>Funcionário</option>
                    </select>
                    <br><br>
                    <div class="col">
                        <button type="submit" class="btn btn-primary" onsubmit="index.php">Editar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>