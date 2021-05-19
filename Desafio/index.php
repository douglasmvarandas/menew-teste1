<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <title> Cadastrar </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <li class="navbar-brand">
            <a href="lista.php">Listar Agendamento</a>
        </li>
        <li class="navbar-brand">
            <a href="atualiza.php">Editar Agendamento</a>
        </li>
    </nav>
    <div class="container">
        <div class="row d-flex justify-content-center" style="padding: 40px;">
            <form method="POST" action="processos.php">
                <h1>Formulário de Agendamento</h1>
                
                    <br>
                    <div class="form-group">
                        <label>Nome:</label>
                        <input class="form-control" type="text" name="nome" placeholder="Digite o Seu Nome" required><br>
                    </div>
                    <div class="form-group">
                        <label>Telefone:</label>
                        <input class="form-control" type="text" name="telefone" placeholder="Digite o Seu Telefone" required><br>
                    </div>
                    <div class="form-group">
                        <label>E-mail:</label>
                        <input class="form-control" type="text" name="email" placeholder="Digite o Seu Email" required><br>
                    </div>
                    <div class="form-group">
                        <label>Cidade:</label>
                        <input class="form-control" type="text" name="cidade" placeholder="Digite a Sua Cidade"><br>
                    </div>
                    <div class="form-group">
                        <label>Estado:</label>
                        <select class="form-control" name="estado">
                            <option disabled selected>Selecione um Estado</option>
                            <option>Ceará</option>
                            <option>Paraíba</option>
                            <option>Pernambuco</option>
                            <option>Piauí</option>
                            <option>Rio Grande do Norte</option>
                        </select><br>
                    </div>
                    <div class="form-group">
                        <label>Categoria:</label>
                        <select class="form-control" name="categoria">
                            <option disabled selected>Selecione uma Categoria</option>
                            <option>Cliente</option>
                            <option>Fornecedor</option>
                            <option>Funcionário</option>
                        </select>
                        <br><br>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" onclick="window.location.href = 'index.php'">Enviar</button>
                    </div>


                </form>

            </div>
            <div class="row d-flex justify-content-center" style="padding: 40px;">
                <h1>Lista de Agendamentos</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID:</th>
                            <th>Nome:</th>
                            <th>Telefone:</th>
                            <th>Email:</th>
                            <th>Cidade:</th>
                            <th>Estado:</th>
                            <th>Categoria:</th>
                            <th colspan="2">Ação:</th>
                        </tr>
                    </thead>
                        <?php
                        include('listar.php')
                        ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>