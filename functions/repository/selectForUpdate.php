<?php require_once("../../include/conexao.php"); ?>


<?php
    $tr = "SELECT * ";
    $tr .= "FROM entidade ";
    if(isset($_GET["idEntidade"]) ) {
        $id = $_GET["idEntidade"];
        $tr .= "WHERE idEntidade = {$id} ";
    } else {
        $tr .= "WHERE idEntidade = 1 ";
    }
    
    $con_entidade = mysqli_query($conect,$tr);
    if(!$con_entidade) {
        die("Erro na consulta");
    }

    $info_entidade = mysqli_fetch_assoc($con_entidade);


    
    $tipoEntidade = "SELECT * ";
    $tipoEntidade .= "FROM tipoEntidade ";
    $lista_tipos = mysqli_query($conect, $tipoEntidade);
    if(!$lista_tipos) {
       die("erro no banco"); 
    }

    // consulta aos estados
    $estados = "SELECT * ";
    $estados .= "FROM estados ";
    $lista_estados = mysqli_query($conect, $estados);
    if(!$lista_estados) {
       die("erro no banco"); 
    }
?>