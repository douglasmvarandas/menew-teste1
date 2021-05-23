<?php
    require_once("heade.php");
    require_once('database/dbConnect.php');

    $objDb = new db();
    $link = $objDb->conecta_mysql();
?>
<!DOCTYPE html>


<body>  
    <div class="voltarList">
        <a href="index.php">
            <button type="button" class="btn btn-link">Voltar</button>
        </a>
    </div>
    
    <form method="POST" action="pesquisarAgenda.php">
        <div class="row campoPesquisa">
            <div class="col-6">
                <input class="form-control" type="text" name="nome" placeholder="Pesquisar Agendamento">
            </div>
            <div class="col-6">
                <button class="btn btn-outline-success my-2 my-sm-0 pesquisar" name="pesquisar" type="submit" value="Pesquisar">Pesquisar</button>
            </div>
        </div>
    </form>
    
    <?php
    $pesquisar = $_POST['pesquisar'];
    if($pesquisar){
        $nome = $_POST['nome'];
        $consultar = "SELECT * FROM agendars WHERE nome LIKE '%$nome%'";
        $resultConsulta = mysqli_query($link, $consultar);
        while($dados = mysqli_fetch_assoc($resultConsulta)){?>
        <div class="campoListagem">
                <div class="row">
                    <div class="col-6">
                        <p class="centralizarItem">Nome: <?php echo $dados['nome']; ?></p>
                        <p class="centralizarItem">Telefone: <?php echo $dados['telefone']; ?></p>
                        <p class="centralizarItem">E-Mail: <?php echo $dados['email']; ?></p>
                    </div>
                    <div class="col-6">
                        <p class="centralizarItem">Cidade: <?php echo $dados['cidade']; ?></p>
                        <p class="centralizarItem">Estado: <?php echo $dados['estado']; ?></p>
                        <p class="centralizarItem">Categoria: <?php echo $dados['categoria']; ?></p>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="centralizarItem">
                        <a class="btn btn-success" href="editar.php?id=<?php echo $dados['id']; ?>">Editar</a>
                        <a class="btn btn-danger" href="deletarAgendamento.php?id=<?php echo $dados['id']; ?>">Deletar</a>
                    </div>
                </div>
        </div >
            <?php            
        }
    }
    ?>
<?php
    $consulta = "SELECT * FROM agendars";
    $consultaAgenda = mysqli_query($link, $consulta);
    while($dados = mysqli_fetch_assoc($consultaAgenda)){?>
    <div class="campoListagem" id="campoListagem">
            <div class="row">
                <div class="col-6">
                    <p class="centralizarItem">Nome: <?php echo $dados['nome']; ?></p>
                    <p class="centralizarItem">Telefone: <?php echo $dados['telefone']; ?></p>
                    <p class="centralizarItem">E-Mail: <?php echo $dados['email']; ?></p>
                </div>
                <div class="col-6">
                    <p class="centralizarItem">Cidade: <?php echo $dados['cidade']; ?></p>
                    <p class="centralizarItem">Estado: <?php echo $dados['estado']; ?></p>
                    <p class="centralizarItem">Categoria: <?php echo $dados['categoria']; ?></p>
                    
                </div>
            </div>
            <div class="row">
                <div class="centralizarItem">
                    <a class="btn btn-success" href="editar.php?id=<?php echo $dados['id']; ?>">Editar</a>
                    <a class="btn btn-danger" href="deletarAgendamento.php?id=<?php echo $dados['id']; ?>">Deletar</a>
                </div>
            </div>
    </div >
<?php } ?>
</body>
