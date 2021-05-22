<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">         </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">      </script>

    <title>DESAFIO STONE</title>

</head>

<body id="fundo">
<!-- ========================= INICIO NAVBAR ========================================================= -->
    <nav class="navbar navbar-expand-sm  navbar-expand-md bg-dark navbar-dark">

        <a class="navbar-brand" href="#">
            <img src="../STONE/img/menew-bymv.png" alt="logo" style="width:100px;">
        </a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link  text-white" href="#">ESTOQUE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-white" href="#">FINANCEIRO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-white" href="#">PAY</a>
            </li>
        </ul>
    </nav><br>
<!-- ========================= FIM NAVBAR ============================================================ -->

<!-- ========================= INICIO DIRETIVAS ====================================================== -->
    <!-- <div class="container text-light">
        <h3>TESTE PARA DEV STONE</h3>
        <p class="text-dark">Para submeter o seu projeto, faça um fork deste repositório e realize um pull request para enviar o seu código;

            O backend deve ser desenvolvido com PHP e o Banco de Dados preferencialmente MySQL;

            O dump do Banco de Dados deve fazer parte dos arquivos versionados.

            Questão:

            Elaborar uma aplicação de agenda para listar, cadastrar e editar informações.

            a) Os campos do formulário são os seguintes:

            nome (input text)
            telefone (input text)
            email (input text)
            cidade (input text)
            estado (select box com os 5 Estados de sua preferência)
            categoria (select box com os itens Cliente, Fornecedor e Funcionário)
            b) A interface deve ter uma busca de registros e respeitar os seguintes requisitos:

            o código precisa ser bem formatado;
            precisa respeitar padrões de responsividade;
            deve ser desenvolvida com o uso de Bootstrap 4;
            ...Boa Sorte!</p>
    </div> -->
<!-- ========================= FIM DIRETIVAS ========================================================= -->

<!-- ========================= INICIO CONEXÃO ======================================================== -->
    <?php require_once 'conexao.php'; ?>
    <?php

    if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
    <div class="container">
        <?php $mysqli = new mysqli('localhost', 'root', '', 'STONE') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM DADOS") or die($mysqli->error);

        //pre_r($result);
        ?>
<!-- ========================= FIM CONEXÃO =========================================================== -->

<!-- ========================= INICIO TABELA ========================================================= -->

        <div class="row justify-content-center">
            <table id="tabela" class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl  table-hover  text-light">
                <thead class="thead-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Categoria</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>

                <?php

                while ($row = $result->fetch_assoc()) : ?>

                    <tr class="text-black">
                        <td>
                            <h6><?php echo $row['nome']; ?></h6>
                        </td>
                        <td>
                            <h6><?php echo $row['telefone']; ?></h6>
                        </td>
                        <td>
                            <h6><?php echo $row['email']; ?></h6>
                        </td>
                        <td>
                            <h6><?php echo $row['cidade']; ?></h6>
                        </td>
                        <td>
                            <h6><?php echo $row['estado']; ?></h6>
                        </td>
                        <td>
                            <h6><?php echo $row['categoria']; ?></h6>
                        </td>

                        <td class="col-*-* ">
                            <a href="index.php?editar=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a>
                        </td>
                        <td class="col-*-* ">
                            <a href="conexao.php?deletar=<?php echo $row['id']; ?>" class="btn btn-warning">Deletar</a>
                        </td>

                    </tr>
                <?php endwhile; ?>
            </table>

<!-- ========================= FIM TABELA ============================================================ -->

            <?php
            // pre_r($result->fetch_assoc());

            function pre_r($array)
            {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
            ?>

<!-- ========================= INICIO CADASTRO ====================================================== -->
            <div class="container pt-3 ">
                <div id="formulario" class="container-sm  my-5 text-white col-sm-6">
                    <form  action="conexao.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <h1 class="pt-3 my-4 text-center">STONE DEV JUNIOR</h1>
                        <h4 class="text-center">por favor entre com seus dados</h4>
                        <div class="container pt-3 my-4">
                            <label for="nome">nome:</label><br>
                            <input type="text" name="nome" value="<?PHP echo $nome; ?>" placeholder="seu nome"><br><br>
                            <label for="telefone">telefone:</label><br>
                            <input type="text" name="telefone" value="<?PHP echo $telefone; ?>" placeholder="seu telefone"><br><br>
                            <label for="email">email:</label><br>
                            <input type="email" name="email" value="<?PHP echo $email; ?>" placeholder="seu email"><br><br>
                            <label for="cidade">cidade:</label><br>
                            <input type="text" name="cidade" value="<?PHP echo $cidade; ?>" placeholder="sua cidade"><br><br>

                            <p>ESTADO:</p>
                            <select id="estado" name="estado" class="custom-select mb-3">
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PB">Paraíba</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                            </select><br><br>
                            <p>CATEGORIA:</p>
                            <select id="categoria" name="categoria" class="custom-select mb-3">
                                <option value="cliente">Cliente</option>
                                <option value="fornecedor">Fornecedor</option>
                                <option value="funcionario">Funcionario</option>
                            </select><br><br>
                            <?php
                            if ($atualizar == true) :
                            ?>
                                <button type="submit" class="btn btn-info" name="atualizar">Atualizar</button>
                            <?php else : ?>
                                <button type="submit" class="btn btn-success" name="save">Save</button><br><br>
                            <?php endif; ?>
                        </div>

                </div>
                </form>
            </div>
<!-- ========================= FIM CADASTRO =================================================================== -->
        </div>
    </div>
</body>

</html>