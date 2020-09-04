<?php require_once("../../include/conexao.php"); ?>
<?php
    //Inserção  
    if(isset($_POST["saveCadastro"])){
        //print_r($_POST);
        $nome       = utf8_decode($_POST["nome"]);
        $telefone   = utf8_decode($_POST["telefone"]);
        $email	    = $_POST["email"];
        $cidade     = utf8_decode($_POST["cidade"]);
        $estado     = $_POST["estado"];
        $tipo       = $_POST["tipo"];
        
        $inserir = "INSERT INTO entidade (nome,telefone,email,cidade,estado,tipo) VALUES ('$nome','$telefone','$email','$cidade','$estado','$tipo')";
        $operacao_inserir = mysqli_query($conect,$inserir);

        if(!$operacao_inserir){
            echo '<script> alert("Falha ao Salvar Cadastro"); </script>';
            header("location: index.php");
        }else{
            echo '<script> alert("Cadastro Salvo"); </script>';
            header("location: ../../index.php");
        }
    }

?>