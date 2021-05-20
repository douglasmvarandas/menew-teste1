<?php

include('conexao.php');

$query = 'SELECT * FROM usuarios';

if(isset($_GET['a'])){
    $query = "$query WHERE usuarios.nome LIKE '%$_POST[busca]%'";
    if(isset($_POST['estado'])){
        $query = "$query AND estado LIKE '$_POST[estado]'";
    }
    if(isset($_POST['categoria'])){
        $query = "$query AND categoria LIKE '$_POST[categoria]'";
    }
}

$dados = mysqli_query($connection, $query);

?>
<div class="cabecalho">
    <div class="row">
        <div class="col-md-10">
            <p>Lista de Dados</p>
        </div>
        <div class="col-md-2">
            <a class="btn-success botao" id="cadastrar" href="configurar.php">Cadastrar</a>
        </div>
    </div>
</div>
<?php

if(empty($dados) or mysqli_num_rows($dados) == 0){
    echo "<h3>Nenhum cadastro encontrado</h3>";
}else{
    foreach ($dados as $dado) {
        // var_dump($dado);
        echo '<hr>';
        echo "<div class='row'>                    
                <div class='col-sm-10 dado'>
                    <p>
                    Nome: $dado[nome]
                        | Email: $dado[email]
                        | Cidade: $dado[cidade]
                        | Estado: $dado[estado]
                    </p>
                </div>
                <div class='col-sm-2 dado'>
                    <a class='btn-primary botao' href='configurar.php?id=$dado[id]' id='Editar'>Editar</a>
                </div>
            </div>";
    }
}

