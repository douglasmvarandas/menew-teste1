<?php require_once("include/conexao.php"); ?>

<?php
    
        // Determinar localidade BR
        setlocale(LC_ALL, 'pt_BR');

        $entidades = "SELECT idEntidade, nome, telefone, tipo ";
        $entidades .= "FROM entidade ";
        if ( isset($_GET["pesquisaNome"]) ) {
            $nome = $_GET["pesquisaNome"];
            $entidades .= "WHERE nome LIKE '%{$nome}%' ";
        }
        $resultado = mysqli_query($conect, $entidades);
        if(!$resultado) {
            die("Falha na consulta ao banco");   
        }

?>