<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>AGENDA</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-light" style="background-color: #d3362d;">
                <a class="navbar-brand" href="index.php">
                  <img src="images/logo-menew.png" width="50" class="d-inline-block align-top" alt="Menew" loading="lazy">
                  <a class="navbar-brand"></a>
                </a>
            </nav>
        </header>
        <div class="container">
        <?php require_once 'process.php'; ?>
            
        <?php
            if(isset($_SESSION['message'])):?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
        <?php endif ?>
        <div class="row justify-content-center">
            <h1>
                <span class="red" style="color:rgb(216, 75, 75)">AGENDA</span>
            </h1>
        </div>
        <h3 class="row justify-content-center">- Cadastro -</h3>
        <div class="row justify-content-center">
            <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" 
                           value="<?php echo $nome; ?>" placeholder="Insira seu nome">
                </div>
                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" name="telefone" class="form-control" 
                           value="<?php echo $telefone; ?>" placeholder="Insira seu telefone">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" 
                           value="<?php echo $email; ?>" placeholder="Insira seu email">
                </div>
                <div class="form-group">
                    <label>Cidade</label>
                    <input type="text" name="cidade" class="form-control"
                           value="<?php echo $cidade; ?>" placeholder="Insira sua cidade">
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <select id="estado" name="estado">
                        <?php if(isset($_GET['edit'])): ?>
                        <option value="<?= $estado;?>"><?= $estado;?></option>
                        <?php endif; ?>
                        <option value="Pernambuco">Pernambuco</option>
                        <option value="Paraíba">Paraíba</option>
                        <option value="Sergipe">Sergipe</option>
                        <option value="Bahia">Bahia</option>
                        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Categoria</label>
                    <select id="categoria" name="categoria">
                        <?php if(isset($_GET['edit'])): ?>
                        <option value="<?= $categoria;?>"><?= $categoria;?></option>
                        <?php endif; ?>
                        <option value="Cliente">Cliente</option>
                        <option value="Fornecedor">Fornecedor</option>
                        <option value="Funcionário">Funcionário</option>
                    </select>
                </div>
                <div class="form-group">
                    <?php
                    if($update == true):
                    ?>
                        <button type="submit" class="btn btn-info" name="update">Atualizar</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
            <?php
                $mysqli = new mysqli('localhost', 'root', '', 'agenda_menew') or die(mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM agenda ORDER BY nome") or die($mysqli->error);
            ?>
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>Categoria</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['nome']; ?></td>
                                <td><?php echo $row['telefone']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['cidade']; ?></td>
                                <td><?php echo $row['estado']; ?></td>
                                <td><?php echo $row['categoria']; ?></td>
                                <td>
                                    <a href="index.php?edit=<?php echo $row['id'];?>"
                                       class="btn btn-info">Editar</a>
                                    <a href="process.php?delete=<?php echo $row['id'];?>"
                                       class="btn btn-danger">Excluir</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            <?php

                function dadosSalvos($array) {
                    echo'<pre>';
                    print_r($array);
                    echo'<pre>';
                }
            ?>
        </div>
    </body>
</html>