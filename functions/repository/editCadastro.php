<?php require_once("../../include/conexao.php"); ?>
<?php //require_once("selectForUpdate.php"); ?>

<?php
    if( isset($_POST["editarCadastro"]) ) {
        $nome       = utf8_decode($_POST["nomeEdit"]);
        $telefone   = $_POST["telefoneEdit"];
        $email      = utf8_decode($_POST["emailEdit"]);
        $cidade     = utf8_decode($_POST["cidadeEdit"]);
        $estado     = utf8_decode($_POST["estadoEdit"]);
        $tipo       = $_POST["tipoEdit"];
        $entidadeId = $_POST["entidadeId"];

        // Objeto para alterar
        $alterar = "UPDATE entidade ";
        $alterar .= "SET ";
        $alterar .= "nome = '{$nome}', ";
        $alterar .= "telefone = '{$telefone}', ";
        $alterar .= "email = '{$email}', ";
        $alterar .= "cidade = '{$cidade}', ";
        $alterar .= "estado = '{$estado}', "; 
        $alterar .= "tipo = '{$tipo}' ";
        $alterar .= " WHERE idEntidade = {$entidadeId} ";
        $operacao_alterar = mysqli_query($conect, $alterar);
        if(!$operacao_alterar) {
            die("Erro na alteracao");   
        } else {
            header("location: ../../index.php");   
        }
        
    }

?>

