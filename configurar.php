<?php
include("conexao.php");

$nome = $telefone = $email = $cidade = $estado = $categoria = "";

if(isset($_GET['id'])){
    $set = true;
    $query = "SELECT * FROM usuarios WHERE id = $_GET[id]";
    $result = mysqli_query($connection,$query);
    $user = $result->fetch_assoc();
    
    $nome = $user['nome'];
    $telefone = $user['telefone'];
    $email = $user['email'];
    $cidade = $user['cidade'];
    $estado = $user['estado'];
    $categoria = $user['categoria'];
}else{
    $set=false;
}

if(isset($_POST['submit'])){

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];

}

$erros = [];
$camposErrados = [];
if(isset($_POST['submit'])){
    if(empty($nome)){
        array_push($erros,"Campo Nome Vazio!");
        array_push($camposErrados,$nome);
    }
    if(empty($email)){
        array_push($erros,"Campo Email vazio!");
        array_push($camposErrados,$email);
    }
    if(empty($telefone)){
        array_push($erros,"Campo Telefone vazio!");
        array_push($camposErrados,$telefone);
    }else if(!is_numeric($telefone)){
        array_push($erros,"Campo Telefone aceita apenas números!");
        array_push($camposErrados,$telefone);
    }else if(strlen($telefone)<9){        
        var_dump(strlen($telefone));
        array_push($erros,"Campo Telefone deve ter 9 digitos");
        array_push($camposErrados,$telefone);
    }
    if(empty($cidade)){
        array_push($erros,"Campo Cidade vazio!");
        array_push($camposErrados,$cidade);
    }
    if(empty($estado)){
        array_push($erros,"Selecione um Estado!");
        array_push($camposErrados,$estado);
    }
    if(empty($categoria)){
        array_push($erros,"Selecione uma Categoria!");
        array_push($camposErrados,$categoria);
    }
    var_dump(sizeof($erros));
    if(sizeof($erros) > 0){
            
        echo "<script type='text/javascript'>alert('";
            foreach ($erros as $erro) {
                echo "\\n $erro";
            };        
        echo "')</script>";
    }else{
        include('processo.php');
        header("Location: index.php");
    }
}

function validar($str, $campos){
    if(is_numeric(array_search($str,$campos))){
        echo 'border-color: red;';
    }
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar</title>
</head>

<body>
    <div class="col-md-8 container def-background page">        
        <h1 class="text-center" id="titulo">Configurar</h1>      

        <div id="formulario">
            <a class="btn-secondary botao" href="index.php" id="voltar">Voltar</a>
            <?php if(isset($_GET['id']))echo "<a class='btn-danger botao' href='processo.php?id=<?php echo $_GET[id]?>&apagar=true' id='voltar'>Apagar</a>";?>

            <!-- <form class="col-md-8" action="processo.php<?php if($set) echo "?id=$user[id]";?>" method="POST"> -->
            <form class="col-md-8" action="" method="POST">
                <div class="form-group text-center">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="nome" class="col-sm-4">Nome:</label>                    
                            <input class="form-control" type='text' name='nome' id="nome" value="<?php if($set){echo $nome; }?>" style="<?php if($set)validar($nome, $camposErrados); ?>">
                        </div> 
                        <div class="col-md-4">
                            <label for="telefone" class="col-sm-4">Telefone:</label>
                            <input class="form-control" type="text" name="telefone" id="telefone" value="<?php if($set){echo $telefone;}?>" style="<?php if($set)validar($telefone, $camposErrados); ?>">
                        </div>                   
                    </div>                    
                    <div class="row">
                        <div class="col-md-12">
                            <label for="email" class="col-sm-4">Email:</label>
                            <input class="form-control" type="email" name="email" id="email" value="<?php if($set){echo $email;}?>" style="<?php if($set)validar($email, $camposErrados); ?>">                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="cidade" class="col-sm-4">Cidade:</label>
                            <input class="form-control" type="text" name="cidade" id="cidade" value="<?php if($set){echo $cidade;}?>" style="<?php if($set)validar($cidade, $camposErrados); ?>">                                    
                        </div>
                        <div class="col-md-4">
                            <label for="estado" class="col-sm-4">Estado:</label>                       
                            <select class="form-control" name="estado" id="estado" style="<?php if($set)validar($estado, $camposErrados); ?>">  
                                <option selected disabled>Escolher</option>
                                <option value="Paraíba" <?php if($set and $estado=="Paraíba"){echo 'selected';}?>>Paraíba</option>
                                <option value="Rio Grande do Norte" <?php if($set and $estado=="Rio Grande do Norte"){echo 'selected';}?>>Rio Grande do Norte</option>
                                <option value="Bahia" <?php if($set and $estado=="Bahia"){echo 'selected';}?>>Bahia</option>
                                <option value="Pernambuco" <?php if($set and $estado=="Pernambuco"){echo 'selected';}?>>Pernambuco</option>
                                <option value="Ceará" <?php if($set and $estado=="Ceará"){echo 'selected';}?>>Ceará</option>
                            </select>                    
                        </div>
                        <div class="col-md-4">
                            <label for="categoria" class="col-sm-4">Categoria:</label>
                            <select class="form-control" name="categoria" id="categoria" style="<?php if($set)validar($categoria, $camposErrados); ?>">
                                <option selected disabled>Escolher</option>
                                <option value="Cliente" <?php if($set and $categoria=="Cliente"){echo 'selected';}?>>Cliente</option>
                                <option value="Fornecedor" <?php if($set and $categoria=="Fornecedor"){echo 'selected';}?>>Fornecedor</option>
                                <option value="Funcionário" <?php if($set and $categoria=="Funcionário"){echo 'selected';}?>>Funcionário</option>
                            </select>
                        </div>
                    </div>        
                    <br>
                    <input class="botao btn-primary" id="enviar" name="submit" type="submit">
                </div>
            </form>
        </div>


    </div>

</body>

</html>