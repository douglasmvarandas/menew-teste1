<?php require_once("include/conexao.php"); ?>
<?php
    
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